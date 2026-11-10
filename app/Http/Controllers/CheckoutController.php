<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        $total = collect($cart)->sum(
            fn ($item) => (float) (
                $item['subtotal'] ??
                ((float) ($item['unit_price'] ?? $item['price'] ?? 0)
                    * (int) ($item['quantity'] ?? 0))
            )
        );

        $shippingCost = 10000;

        return view('checkout.index', compact(
            'cart',
            'total',
            'shippingCost'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'delivery_method' => ['required', 'in:delivery,take_away'],
            'address' => ['nullable', 'string', 'max:1000'],
        ]);

        $deliveryMethod = $validated['delivery_method'];

        // Delivery Rp10.000, Take Away gratis.
        $shippingCost = $deliveryMethod === 'delivery'
            ? 10000
            : 0;

        // Alamat wajib untuk Delivery.
        if ($deliveryMethod === 'delivery' && empty($validated['address'])) {
            return back()
                ->withErrors(['address' => 'Alamat pengiriman wajib diisi.'])
                ->withInput();
        }

        // Untuk Take Away, alamat diisi keterangan pengambilan.
        $address = $deliveryMethod === 'delivery'
            ? $validated['address']
            : 'Take Away - Diambil langsung di toko';

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        foreach ($cart as $item) {
            if (empty($item['product_id']) || empty($item['quantity'])) {
                return redirect()
                    ->route('cart.index')
                    ->with('error', 'Data keranjang tidak lengkap. Silakan tambahkan produk kembali.');
            }
        }

        $subtotal = collect($cart)->sum(
            fn ($item) => (float) (
                $item['subtotal'] ??
                ((float) ($item['unit_price'] ?? $item['price'] ?? 0)
                    * (int) $item['quantity'])
            )
        );

        // Total akhir termasuk ongkir.
        $total = $subtotal + $shippingCost;

        $orderId = session()->get('order_id');

        // Gunakan kembali pesanan pending milik pelanggan ini.
        $order = null;

        if ($orderId) {
            $order = Order::where('id', $orderId)
                ->where('user_id', Auth::id())
                ->where('status', 'pending')
                ->where('payment_status', 'pending')
                ->first();
        }

        $order = DB::transaction(function () use (
            $order,
            $cart,
            $total,
            $address,
            $deliveryMethod,
            $shippingCost
        ) {
            if (!$order) {
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'total_price' => $total,
                    'status' => 'pending',
                    'payment_status' => 'pending',
                    'address' => $address,
                    'delivery_method' => $deliveryMethod,
                    'shipping_cost' => $shippingCost,
                ]);
            } else {
                // Perbarui pesanan pending yang sama.
                $order->update([
                    'total_price' => $total,
                    'address' => $address,
                    'delivery_method' => $deliveryMethod,
                    'shipping_cost' => $shippingCost,
                ]);

                // Sesuaikan item dengan keranjang terbaru.
                $order->items()->delete();
            }

            foreach ($cart as $item) {
                $unitPrice = (float) (
                    $item['unit_price'] ?? $item['price'] ?? 0
                );

                $quantity = (int) $item['quantity'];

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'variant_id' => $item['variant_id'] ?? null,
                    'quantity' => $quantity,
                    'price' => $unitPrice,
                    'subtotal' => (float) (
                        $item['subtotal'] ?? ($unitPrice * $quantity)
                    ),
                ]);
            }

            return $order;
        });

        session()->put('order_id', $order->id);

        return redirect()->route('payment.index');
    }
}
