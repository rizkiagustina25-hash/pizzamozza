<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Menampilkan semua pesanan (dengan batas 1 bulan terakhir untuk karyawan).
     */
    public function index(Request $request)
    {
        $isKaryawan = auth()->user()?->role === 'karyawan';$minKaryawanDate = now()->subMonth()->startOfDay();

        $query = Order::with([
            'user',
            'items.product',
            'items.variant',
        ]);

        // Pembatasan hak akses karyawan: hanya dapat melihat pesanan 1 bulan terakhir
        if ($isKaryawan) {
            $query->where('created_at', '>=',$minKaryawanDate);
        }

        // Filter cepat periode (Penjualan Hari Ini)
        if ($request->period === 'today') {$query->whereDate('created_at', today());
        }

        // Filter tanggal dari kalender
        if ($request->filled('date')) {
            $query->whereDate('created_at',$request->date);
        }

        // Filter status pesanan
        if ($request->filled('status')) {
            $query->where('status',$request->status);
        }

        // Filter status pembayaran
        if ($request->filled('payment_status')) {
            $query->where('payment_status',$request->payment_status);
        }

        // Pencarian nama pelanggan / ID pesanan
        if ($request->filled('search')) {
            $search = trim($request->search);
            $numericId = preg_replace('/[^0-9]/', '',$search);

            $query->where(function ($q) use ($search,$numericId) {
                $q->where('id',$search);

                if ($numericId !== '') {
                    $q->orWhere('id', (int)$numericId);
                }

                $q->orWhereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '\%' .$search . '%');
                });
            });
        }

        $orders =$query
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
        if (
            auth()->user()?->role === 'karyawan' &&
            $order->created_at &&$order->created_at->lt(now()->subMonth()->startOfDay())
        ) {
            abort(403, 'Karyawan hanya dapat mengakses data pesanan 1 bulan terakhir.');
        }

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
    public function updateStatus(Request $request, Order$order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
            'cancellation_reason' => 'required_if:status,cancelled|nullable|string|max:1000',
        ], [
            'cancellation_reason.required_if' => 'Alasan pembatalan wajib diisi.',
            'cancellation_reason.max' => 'Alasan pembatalan maksimal 1000 karakter.',
        ]);

        $order->update([
            'status' => $request->status,
            'cancellation_reason' => $request->status === 'cancelled'
                ? $request->cancellation_reason
                : null,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}