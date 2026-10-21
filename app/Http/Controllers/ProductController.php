<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Topping;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('variants');
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $products = $query->latest()->get();
        $orders = collect();
        if (auth()->check()) {
            $orders = auth()->user()->orders()->with(['items.product', 'items.variant'])->latest()->get();
        }
        return view('dashboard', compact('products', 'orders'));
    }

    public function show($id)
    {
        $product = Product::with('variants')->findOrFail($id);
        $toppings = Topping::where('active', true)->orderBy('name')->get();
        return view('products.show', compact('product', 'toppings'));
    }
}
