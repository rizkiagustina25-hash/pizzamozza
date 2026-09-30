<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Menampilkan semua produk di dashboard
     */
    public function index()
{
    $category = request('category', 'pizza');

    $products = Product::where('category', $category)->get();

    return view('dashboard', compact('products', 'category'));
}

    /**
     * Menampilkan detail satu produk
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }
}