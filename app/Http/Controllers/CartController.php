<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use App\Models\Topping;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Menampilkan keranjang
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['subtotal'];
        }

        return view('cart.index', compact('cart', 'total'));
    }


    /**
     * Menambahkan produk ke keranjang
     */
    public function add(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
            'toppings' => 'nullable|array',
            'toppings.*' => 'exists:toppings,id',
        ]);


        // Ambil variant
        $variant = ProductVariant::with('product')
            ->findOrFail($request->variant_id);


        $product = $variant->product;


        // Harga dasar
        $unitPrice = (float) $variant->price;


        // Data topping
        $selectedToppings = [];


        if ($request->has('toppings')) {

            foreach ($request->toppings as $toppingId) {

                $topping = Topping::findOrFail($toppingId);


                /*
                 * Kalau Large gunakan harga large.
                 * Selain Large gunakan harga medium.
                 */

                if (
                    strtolower($variant->name) === 'large' ||
                    strtolower($variant->name) === 'box besar'
                ) {
                    $toppingPrice = (float) $topping->price_large;
                } else {
                    $toppingPrice = (float) $topping->price_medium;
                }


                $unitPrice += $toppingPrice;


                $selectedToppings[] = [
                    'id' => $topping->id,
                    'name' => $topping->name,
                    'price' => $toppingPrice,
                ];
            }
        }


        $quantity = (int) $request->quantity;


        $subtotal = $unitPrice * $quantity;


        /*
         * Buat key unik.
         *
         * Produk yang sama dengan topping berbeda
         * dianggap sebagai item keranjang berbeda.
         */

        $toppingIds = collect($selectedToppings)
            ->pluck('id')
            ->sort()
            ->implode('-');


        $cartKey =
            $product->id .
            '-' .
            $variant->id .
            '-' .
            ($toppingIds ?: 'none');


        $cart = session()->get('cart', []);


        /*
         * Kalau item sudah ada,
         * tambahkan jumlahnya.
         */

        if (isset($cart[$cartKey])) {

            $cart[$cartKey]['quantity'] += $quantity;

            $cart[$cartKey]['subtotal'] =
                $cart[$cartKey]['unit_price'] *
                $cart[$cartKey]['quantity'];

        } else {

            $cart[$cartKey] = [

                'product_id' => $product->id,

                'product_name' => $product->name,

                'variant_id' => $variant->id,

                'variant_name' => $variant->name,

                'unit_price' => $unitPrice,

                'quantity' => $quantity,

                'toppings' => $selectedToppings,

                'subtotal' => $subtotal,

                'image' => $product->image,

            ];
        }


        session()->put('cart', $cart);


        return redirect()
            ->route('cart.index')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }


    /**
     * Update jumlah produk
     */
    public function update(Request $request, $key)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);


        $cart = session()->get('cart', []);


        if (isset($cart[$key])) {

            $cart[$key]['quantity'] =
                (int) $request->quantity;


            $cart[$key]['subtotal'] =
                $cart[$key]['unit_price'] *
                $cart[$key]['quantity'];


            session()->put('cart', $cart);
        }


        return redirect()
            ->route('cart.index');
    }


    /**
     * Hapus item
     */
    public function remove($key)
    {
        $cart = session()->get('cart', []);


        if (isset($cart[$key])) {

            unset($cart[$key]);

            session()->put('cart', $cart);
        }


        return redirect()
            ->route('cart.index')
            ->with('success', 'Produk dihapus dari keranjang.');
    }


    /**
     * Kosongkan keranjang
     */
    public function clear()
    {
        session()->forget('cart');


        return redirect()
            ->route('cart.index')
            ->with('success', 'Keranjang berhasil dikosongkan.');
    }
}