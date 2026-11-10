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

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->get();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('variants')->findOrFail($id);

        $toppings = Topping::where('active', true)
            ->orderBy('name')
            ->get();

        return view('products.show', compact('product', 'toppings'));
    }
}