<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CartController extends Controller
{
    /**
     * Ambil data keranjang (dari database jika login, dari session jika tamu)
     * sekaligus menyinkronkan ke session agar Checkout & badge tetap terbaca.
     */
    private function getCartData(): array
    {
        $cart = [];
        $total = 0;

        if (auth()->check() && Schema::hasTable('cart_items')) {
            $items = CartItem::with('product')
                ->where('user_id', auth()->id())
                ->get();

            foreach ($items as $item) {
                if (!$item->product) {
                    continue;
                }

                $subtotal = (int) $item->price * (int) $item->quantity;

                $cart[$item->id] = [
                    'product_id'   => $item->product_id,
                    'name'         => $item->product->name,
                    'variant_name' => $item->variant_name,
                    'price'        => (int) $item->price,
                    'quantity'     => (int) $item->quantity,
                    'subtotal'     => $subtotal,
                    'image'        => $item->product->image ?? $item->product->gambar ?? $item->product->foto ?? null,
                ];

                $total += $subtotal;
            }

            session()->put('cart', $cart);
        } else {
            $cart = session('cart', []);
            foreach ($cart as $item) {
                $total += ((int) ($item['price'] ?? 0)) * ((int) ($item['quantity'] ?? 1));
            }
        }

        return [$cart, $total];
    }

    public function index()
    {
        [$cart, $total] = $this->getCartData();

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $product = Product::with('variants')->findOrFail($request->input('product_id'));
        $quantity = max(1, (int) $request->input('quantity', 1));

        $variantName = $request->input('variant_name');
        $unitPrice = (float) ($product->price ?? 0);

        // Cek varian ukuran jika dikirim dari halaman produk atau detail produk
        if ($request->filled('variant_id')) {
            $variant = $product->variants->firstWhere('id', $request->input('variant_id'));
            if ($variant) {
                $variantName = $variant->name;
                $unitPrice = (float) $variant->price;
            }
        } elseif ($product->variants->isNotEmpty()) {
            $firstVariant = $product->variants->first();
            $variantName = $firstVariant->name;
            $unitPrice = (float) $firstVariant->price;
        }

        // Hitung tambahan topping jika dipilih dari halaman detail produk
        $toppingIds = (array) $request->input('toppings', []);
        if (!empty($toppingIds) && class_exists(Topping::class)) {
            $selectedToppings = Topping::whereIn('id', $toppingIds)->get();
            if ($selectedToppings->isNotEmpty()) {
                $unitPrice += (float) $selectedToppings->sum('price');
                $toppingNames = $selectedToppings->pluck('name')->implode(', ');
                $variantName = $variantName
                    ? $variantName . ' (+ ' . $toppingNames . ')'
                    : 'Topping: ' . $toppingNames;
            }
        }

        $finalPrice = (int) round($unitPrice);

        if (auth()->check() && Schema::hasTable('cart_items')) {
            $cartItem = CartItem::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->where('variant_name', $variantName)
                ->where('price', $finalPrice)
                ->first();

            if ($cartItem) {
                $cartItem->increment('quantity', $quantity);
            } else {
                CartItem::create([
                    'user_id'      => auth()->id(),
                    'product_id'   => $product->id,
                    'variant_name' => $variantName,
                    'price'        => $finalPrice,
                    'quantity'     => $quantity,
                ]);
            }
        } else {
            $cart = session('cart', []);
            $key = $product->id . '-' . md5((string) $variantName . '-' . $finalPrice);

            if (isset($cart[$key])) {
                $cart[$key]['quantity'] += $quantity;
                $cart[$key]['subtotal'] = $cart[$key]['price'] * $cart[$key]['quantity'];
            } else {
                $cart[$key] = [
                    'product_id'   => $product->id,
                    'name'         => $product->name,
                    'variant_name' => $variantName,
                    'price'        => $finalPrice,
                    'quantity'     => $quantity,
                    'subtotal'     => $finalPrice * $quantity,
                    'image'        => $product->image ?? $product->gambar ?? $product->foto ?? null,
                ];
            }

            session()->put('cart', $cart);
        }

        [$cart, $total] = $this->getCartData();
        $cartCount = array_sum(array_column($cart, 'quantity'));

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success'    => true,
                'message'    => 'Produk berhasil ditambahkan ke keranjang.',
                'cart_count' => $cartCount,
                'cart_total' => $total,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, $key)
    {
        $quantity = max(1, (int) $request->input('quantity', 1));

        if (auth()->check() && Schema::hasTable('cart_items')) {
            CartItem::where('id', $key)
                ->where('user_id', auth()->id())
                ->update(['quantity' => $quantity]);
        } else {
            $cart = session('cart', []);
            if (isset($cart[$key])) {
                $cart[$key]['quantity'] = $quantity;
                $cart[$key]['subtotal'] = $cart[$key]['price'] * $quantity;
                session()->put('cart', $cart);
            }
        }

        $this->getCartData();

        return redirect()->route('cart.index')->with('success', 'Jumlah produk diperbarui.');
    }

    public function remove($key)
    {
        if (auth()->check() && Schema::hasTable('cart_items')) {
            CartItem::where('id', $key)
                ->where('user_id', auth()->id())
                ->delete();
        } else {
            $cart = session('cart', []);
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        $this->getCartData();

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    public function clear()
    {
        if (auth()->check() && Schema::hasTable('cart_items')) {
            CartItem::where('user_id', auth()->id())->delete();
        }

        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan.');
    }
}