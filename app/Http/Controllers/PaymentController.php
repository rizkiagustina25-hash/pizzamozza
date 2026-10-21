<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Menampilkan halaman pembayaran
     */
    public function index()
    {
        $orderId = session()->get('order_id');

        if (!$orderId) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Pesanan tidak ditemukan.');
        }

        $order = Order::with([
            'items.product',
            'items.variant'
        ])
            ->where('id', $orderId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$order) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Pesanan tidak ditemukan.');
        }

        return view('payment.index', [
            'order' => $order,
            'total' => $order->total_price,
            'payment_method' => session()->get('payment_method'),
        ]);
    }

    /**
     * Memproses pembayaran
     */
    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:qris,bank_transfer,ewallet,cod',
        ]);

        $orderId = session()->get('order_id');

        if (!$orderId) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Pesanan tidak ditemukan.');
        }

        $order = Order::where('id', $orderId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $order->update([
    'payment_status' => 'paid',
]);

session()->forget('cart');

        session()->put(
            'payment_method',
            $request->payment_method
        );

        return redirect()->route('payment.success');
    }

    /**
     * Halaman pembayaran berhasil
     */
    public function success()
    {
        $orderId = session()->get('order_id');

        $order = null;

        if ($orderId) {
            $order = Order::with([
                'items.product',
                'items.variant'
            ])
                ->where('id', $orderId)
                ->where('user_id', Auth::id())
                ->first();
        }

        return view('payment.success', [
            'order' => $order,
        ]);
    }
}