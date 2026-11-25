<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    /**
     * Konfigurasi Midtrans.
     */

    private function configureMidtrans(): void
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = (bool) config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        Config::$curlOptions = [
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_HTTPHEADER => [],
        ];
    }


    /**
     * Menampilkan halaman pembayaran.
     */
    public function index()
    {
        $orderId = session('order_id');

        if (!$orderId) {
            return redirect()->route('cart.index')
                ->with('error', 'Pesanan tidak ditemukan.');
        }

        $order = Order::with(['items.product', 'items.variant'])
            ->where('id', $orderId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$order) {
            return redirect()->route('cart.index')
                ->with('error', 'Pesanan tidak ditemukan.');
        }

        return view('payment.index', [
            'order' => $order,
            'total' => $order->total_price,
            'payment_method' => session('payment_method', 'qris'),
            'snapToken' => session('snap_token'),
            'snapJsUrl' => config('services.midtrans.is_production')
                ? 'https://app.midtrans.com/snap/snap.js'
                : 'https://app.sandbox.midtrans.com/snap/snap.js',
            'clientKey' => config('services.midtrans.client_key'),
        ]);
    }

    /**
     * Membuat transaksi pembayaran QRIS melalui Midtrans Snap.
     */
    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => ['required', 'in:qris'],
        ]);

        $orderId = session('order_id');

        if (!$orderId) {
            return redirect()->route('cart.index')
                ->with('error', 'Pesanan tidak ditemukan.');
        }

        $order = Order::with(['items.product', 'items.variant'])
            ->where('id', $orderId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($order->payment_status === 'paid') {
            return redirect()->route('payment.success');
        }

        if ($order->items->isEmpty()) {
            return back()->with('error', 'Pesanan tidak memiliki item.');
        }

        // Gunakan token yang sudah tersimpan agar tidak membuat
        // transaksi Snap baru setiap kali tombol ditekan.
        if ($order->snap_token) {
            session()->put('payment_method', 'qris');
            session()->flash('snap_token', $order->snap_token);

            return redirect()->route('payment.index');
        }

        $this->configureMidtrans();

        $midtransOrderId = 'PIZZAMOZZA-' . $order->id;

        $itemDetails = [];
        $itemTotal = 0;

        foreach ($order->items as $index => $item) {
            $price = (int) round((float) $item->price);
            $quantity = (int) $item->quantity;

            if ($price < 0 || $quantity < 1) {
                return back()->with(
                    'error',
                    'Data produk dalam pesanan tidak valid.'
                );
            }

            $itemTotal += $price * $quantity;

            $itemDetails[] = [
                'id' => 'PRODUCT-' . $item->product_id . '-' . $index,
                'price' => $price,
                'quantity' => $quantity,
                'name' => substr(
                    $item->product->name ?? 'Produk PizzaMozza',
                    0,
                    50
                ),
            ];
        }

        $shippingCost = (int) round((float) $order->shipping_cost);

        if ($shippingCost > 0) {
            $itemDetails[] = [
                'id' => 'SHIPPING',
                'price' => $shippingCost,
                'quantity' => 1,
                'name' => 'Ongkos Kirim',
            ];
        }

        $grossAmount = (int) round((float) $order->total_price);
        $calculatedAmount = $itemTotal + $shippingCost;

        // Pastikan rincian item sama dengan total pesanan.
        if ($grossAmount !== $calculatedAmount) {
            Log::error('Midtrans amount mismatch saat membuat Snap Token.', [
                'order_id' => $order->id,
                'order_total' => $grossAmount,
                'calculated_total' => $calculatedAmount,
            ]);

            return back()->with(
                'error',
                'Total pesanan tidak sesuai dengan rincian produk. Silakan hubungi admin.'
            );
        }

        $user = Auth::user();

        $params = [
            'transaction_details' => [
                'order_id' => $midtransOrderId,
                'gross_amount' => $grossAmount,
            ],
            'item_details' => $itemDetails,
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'billing_address' => [
                    'address' => $order->address ?? '',
                ],
            ],
            'enabled_payments' => ['other_qris'],
            'callbacks' => [
                'finish' => route('payment.success'),
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            // Simpan token agar transaksi yang sama tidak dibuat berulang.
            $order->update([
                'snap_token' => $snapToken,
            ]);

            session()->put('payment_method', 'qris');
            session()->flash('snap_token', $snapToken);

            return redirect()->route('payment.index');


} catch (\Throwable $e) {
    Log::error('Midtrans Snap error', [
        'order_id' => $order->id,
        'exception' => get_class($e),
        'message' => $e->getMessage(),
        'code' => $e->getCode(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'trace' => $e->getTraceAsString(),
    ]);

    return redirect()->route('payment.index')
        ->with(
            'error',
            'Gagal membuat pembayaran. Silakan coba lagi.'
        );
}
    }

    /**
     * Menerima notifikasi pembayaran dari Midtrans.
     */
    public function notification(Request $request)
    {
        $payload = $request->all();
        $signatureSecretKey = config('services.midtrans.signature_key');

        if (
            empty($signatureSecretKey) ||
            empty($payload['order_id']) ||
            empty($payload['status_code']) ||
            !isset($payload['gross_amount']) ||
            empty($payload['signature_key'])
        ) {
            return response()->json([
                'message' => 'Invalid notification data',
            ], 400);
        }

        // Verifikasi signature dari Midtrans.
            $signature = hash(
            'sha512',
            $payload['order_id'] .
            $payload['status_code'] .
            $payload['gross_amount'] .
            $signatureSecretKey
        );

        if (!hash_equals($signature, $payload['signature_key'])) {
            Log::warning('Midtrans notification signature tidak valid.');

            return response()->json([
                'message' => 'Invalid signature',
            ], 403);
        }

        // Pastikan notifikasi ditujukan kepada merchant kita.
        $merchantId = config('services.midtrans.merchant_id');

        if (
            !empty($merchantId) &&
            isset($payload['merchant_id']) &&
            $payload['merchant_id'] !== $merchantId
        ) {
            return response()->json([
                'message' => 'Merchant ID mismatch',
            ], 403);
        }

        $midtransOrderId = $payload['order_id'];

        if (!preg_match('/^PIZZAMOZZA-(\d+)$/', $midtransOrderId, $matches)) {
            return response()->json([
                'message' => 'Invalid order ID',
            ], 400);
        }

        $order = Order::find($matches[1]);

        if (!$order) {
            return response()->json([
                'message' => 'Order not found',
            ], 404);
        }

        // Pastikan nominal transaksi sama dengan pesanan.
        $receivedAmount = number_format(
            (float) $payload['gross_amount'],
            2,
            '.',
            ''
        );

        $expectedAmount = number_format(
            (float) $order->total_price,
            2,
            '.',
            ''
        );

        if ($receivedAmount !== $expectedAmount) {
            Log::warning('Midtrans notification amount mismatch.', [
                'order_id' => $order->id,
                'received_amount' => $receivedAmount,
                'expected_amount' => $expectedAmount,
            ]);

            return response()->json([
                'message' => 'Amount mismatch',
            ], 400);
        }

        $transactionStatus = $payload['transaction_status'] ?? '';
        $fraudStatus = $payload['fraud_status'] ?? '';

        DB::transaction(function () use (
            $order,
            $payload,
            $transactionStatus,
            $fraudStatus
        ) {
            $lockedOrder = Order::where('id', $order->id)
                ->lockForUpdate()
                ->first();

            if (!$lockedOrder || $lockedOrder->payment_status === 'paid') {
                return;
            }

            $updateData = [
                'midtrans_transaction_id' => $payload['transaction_id'] ?? null,
                'payment_type' => $payload['payment_type'] ?? null,
            ];

            if (
                $transactionStatus === 'settlement' ||
                ($transactionStatus === 'capture' && $fraudStatus === 'accept')
            ) {
                $updateData['payment_status'] = 'paid';
                $updateData['paid_at'] = now();

            } elseif ($transactionStatus === 'pending') {
                $updateData['payment_status'] = 'pending';

            } elseif (in_array(
                $transactionStatus,
                ['expire', 'cancel', 'deny'],
                true
            )) {
                $updateData['payment_status'] = 'failed';
            } else {
                return;
            }

            $lockedOrder->update($updateData);
        });

        return response()->json([
            'message' => 'Notification processed',
        ], 200);
    }

    /**
     * Menampilkan hasil pembayaran.
     */
    public function success()
    {
        $orderId = session('order_id');

        $order = null;

        if ($orderId) {
            $order = Order::with(['items.product', 'items.variant'])
                ->where('id', $orderId)
                ->where('user_id', Auth::id())
                ->first();
        }

        // Keranjang baru dikosongkan setelah pembayaran terkonfirmasi.
        if ($order && $order->payment_status === 'paid') {
            session()->forget('cart');
        }

        return view('payment.success', [
            'order' => $order,
        ]);
    }
}
