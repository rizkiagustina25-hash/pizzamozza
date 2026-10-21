<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Menampilkan semua pesanan.
     */
    public function index(Request $request)
    {
        $query = Order::with([
            'user',
            'items.product',
            'items.variant',
        ]);

        // Filter status pesanan
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter status pembayaran
        if ($request->filled('payment_status')) {
            $query->where(
                'payment_status',
                $request->payment_status
            );
        }

        // Pencarian nama pelanggan / ID pesanan
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('id', $search)

                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        );
                    });

            });
        }

        $orders = $query
            ->latest()
            ->get();

        return view(
            'admin.orders.index',
            compact('orders')
        );
    }

    /**
     * Menampilkan detail pesanan.
     */
    public function show(Order $order)
    {
        $order->load([
            'user',
            'items.product',
            'items.variant',
        ]);

        return view(
            'admin.orders.show',
            compact('order')
        );
    }

    /**
     * Mengubah status pesanan.
     */
    public function updateStatus(
        Request $request,
        Order $order
    ) {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Status pesanan berhasil diperbarui.'
            );
    }
}