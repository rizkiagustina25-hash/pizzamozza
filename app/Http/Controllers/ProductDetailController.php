<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Topping;

class ProductDetailController extends Controller
{
    public function show($id)
    {
        $product = Product::with('variants')
            ->findOrFail($id);

        $toppings = Topping::where('active', true)->get();

        return view(
            'products.detail',
            compact('product', 'toppings')
        );
    }
}