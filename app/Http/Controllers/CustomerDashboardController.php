<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $products = Product::with('variants')
            ->latest()
            ->get();

        $allOrders = Order::where('user_id', Auth::id())
            ->with('items.product')
            ->latest()
            ->get();

        // Menghitung pesanan yang sedang diproses
        $processingCount = $allOrders
            ->where('status', 'processing')
            ->count();

        // Menghitung pesanan yang menunggu pembayaran
        $pendingCount = $allOrders
            ->where('status', 'pending')
            ->count();

        // Mengambil 5 pesanan terbaru
        $latestOrders = $allOrders->take(5);

        return view('dashboard', compact(
            'products',
            'allOrders',
            'processingCount',
            'pendingCount',
            'latestOrders'
        ));
    }
}