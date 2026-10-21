<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $cart = $request->session()->get('cart', []);
        $total = collect($cart)->sum(fn ($item) => (float) ($item['subtotal'] ?? ((float) ($item['price'] ?? 0) * (int) ($item['quantity'] ?? 0))));

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'variant_id' => ['required', 'integer', 'exists:product_variants,id'],
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
            'toppings' => ['sometimes', 'array'],
            'toppings.*' => ['integer', 'exists:toppings,id'],
        ]);

        $product = Product::with('variants')->findOrFail($validated['product_id']);
        $variant = $product->variants->firstWhere('id', (int) $validated['variant_id']);
        if (!$variant) {
            return back()->withInput()->with('error', 'Ukuran produk tidak sesuai dengan produk yang dipilih.');
        }

        $toppings = Topping::query()
            ->where('active', true)
            ->whereIn('id', $validated['toppings'] ?? [])
            ->get();
        $isLarge = str_contains(strtolower((string) $variant->name), 'large');
        $toppingRows = $toppings->map(fn ($topping) => [
            'id' => $topping->id,
            'name' => $topping->name,
            'price' => (float) ($isLarge ? $topping->price_large : $topping->price_medium),
        ])->values()->all();

        $unitPrice = (float) $variant->price + collect($toppingRows)->sum('price');
        $quantity = (int) $validated['quantity'];
        $cart = $request->session()->get('cart', []);
        $cartKey = $product->id . '-' . $variant->id . '-' . md5(json_encode(array_column($toppingRows, 'id')));

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
            $cart[$cartKey]['subtotal'] = $cart[$cartKey]['unit_price'] * $cart[$cartKey]['quantity'];
        } else {
            $cart[$cartKey] = [
                'product_id' => $product->id,
                'variant_id' => $variant->id,
                'name' => $product->name,
                'product_name' => $product->name,
                'variant_name' => $variant->name ?? 'Ukuran',
                'price' => $unitPrice,
                'unit_price' => $unitPrice,
                'quantity' => $quantity,
                'subtotal' => $unitPrice * $quantity,
                'toppings' => $toppingRows,
                'image' => $product->image ?? null,
            ];
        }

        $request->session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, string $key): RedirectResponse
    {
        $validated = $request->validate(['quantity' => ['required', 'integer', 'min:1', 'max:99']]);
        $cart = $request->session()->get('cart', []);
        if (!isset($cart[$key])) {
            return redirect()->route('cart.index')->with('error', 'Produk tidak ditemukan di keranjang.');
        }
        $cart[$key]['quantity'] = (int) $validated['quantity'];
        $unitPrice = (float) ($cart[$key]['unit_price'] ?? $cart[$key]['price'] ?? 0);
        $cart[$key]['unit_price'] = $unitPrice;
        $cart[$key]['price'] = $unitPrice;
        $cart[$key]['subtotal'] = $unitPrice * $cart[$key]['quantity'];
        $request->session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Jumlah produk berhasil diperbarui.');
    }

    public function remove(Request $request, string $key): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$key]);
        $request->session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function clear(Request $request): RedirectResponse
    {
        $request->session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
