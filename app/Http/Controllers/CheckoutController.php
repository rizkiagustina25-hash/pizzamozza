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
            return redirect()->route('cart.index')->with('error', 'Keranjang kamu masih kosong.');
        }

        $total = collect($cart)->sum(fn ($item) => (float) ($item['subtotal'] ?? ((float) ($item['unit_price'] ?? $item['price'] ?? 0) * (int) ($item['quantity'] ?? 0))));
        return view('checkout.index', compact('cart', 'total'));
    }

    
public function store(Request $request)
{
    $validated = $request->validate([
        'address' => ['required', 'string', 'max:1000'],
    ]);

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

    $total = collect($cart)->sum(
        fn ($item) => (float) (
            $item['subtotal'] ??
            ((float) ($item['unit_price'] ?? $item['price'] ?? 0)
                * (int) $item['quantity'])
        )
    );

    $orderId = session()->get('order_id');

    // Gunakan kembali pesanan yang masih menunggu milik pelanggan ini.
    $order = null;

if ($orderId) {
    $order = Order::where('id', $orderId)
        ->where('user_id', Auth::id())
        ->where('status', 'pending')
        ->where('payment_status', 'pending')
        ->first();
}


    $order = DB::transaction(function () use (
        $order, $cart, $total, $validated
    ) {
        if (!$order) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $total,
                'status' => 'pending',
                'payment_status' => 'pending',
                'address' => $validated['address'],
            ]);
        } else {
            // Perbarui pesanan yang sama, bukan membuat pesanan baru.
            $order->update([
                'total_price' => $total,
                'address' => $validated['address'],
            ]);

            // Sesuaikan item dengan isi keranjang terbaru.
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
