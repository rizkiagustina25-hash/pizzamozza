<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('success', 'Keranjang kamu masih kosong.');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['subtotal'];
        }

        return view('checkout.index', [
            'cart' => $cart,
            'total' => $total,
        ]);
    }
}