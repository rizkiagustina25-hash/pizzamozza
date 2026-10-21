<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    public function show($id)
    {
        $order = Order::with([
            'items.product',
            'items.variant'
        ])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('orders.show', [
            'order' => $order
        ]);
    }
}