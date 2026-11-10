<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    /**
     * Menampilkan halaman laporan penjualan.
     */
    public function index(Request $request)
    {
        $period = $this->getPeriod($request);

        $orders = $this->getCompletedOrders($period);

        $summary = $this->calculateSummary($orders);

        $chart = $this->generateChart($orders, $period);

        $products = $this->generateBestSellingProducts($orders);

        return view('reports.sales', [
            'orders' => $orders,
            'totalSales' => $summary['totalSales'],
            'totalTransactions' => $summary['totalTransactions'],
            'totalProducts' => $summary['totalProducts'],
            'period' => $period,
            'chartLabels' => $chart['labels'],
            'chartValues' => $chart['values'],
            'productRanking' => $products,
        ]);
    }

    /**
     * Mengirim data laporan terbaru dalam format JSON.
     */
    public function refresh(Request $request)
    {
        $period = $this->getPeriod($request);

        $orders = $this->getCompletedOrders($period);

        $summary = $this->calculateSummary($orders);

        $chart = $this->generateChart($orders, $period);

        $products = $this->generateBestSellingProducts($orders);

        $history = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'customer' => $order->user->name ?? 'Pelanggan',
                'email' => $order->user->email ?? '-',
                'products' => $order->items->map(function ($item) {
                    return $item->product->name ?? 'Produk dihapus';
                })->values(),
                'quantity' => $order->items->sum('quantity'),
                'total' => (float) $order->total_price,
                'payment_status' => $order->payment_status,
                'status' => $order->status,
                'date' => $order->created_at->format('d/m/Y'),
                'time' => $order->created_at->format('H:i'),
            ];
        })->values();

        return response()->json([
            'totalSales' => $summary['totalSales'],
            'totalTransactions' => $summary['totalTransactions'],
            'totalProducts' => $summary['totalProducts'],
            'chartLabels' => $chart['labels'],
            'chartValues' => $chart['values'],
            'productRanking' => $products,
            'orders' => $history,
            'updatedAt' => now()->format('H:i:s'),
        ]);
    }

    /**
     * Menentukan periode laporan.
     */
    private function getPeriod(Request $request)
    {
        $period = $request->get('period', 'month');

        $allowedPeriods = [
            'today',
            'week',
            'month',
            'year',
        ];

        return in_array($period, $allowedPeriods)
            ? $period
            : 'month';
    }

    /**
     * Mengambil pesanan yang sudah selesai dan dibayar.
     */
    private function getCompletedOrders($period)
    {
        $startDate = match ($period) {
            'today' => now()->startOfDay(),
            'week' => now()->startOfWeek(),
            'year' => now()->startOfYear(),
            default => now()->startOfMonth(),
        };

        return Order::with([
            'user',
            'items.product',
        ])
            ->whereIn('status', [
                'selesai',
                'completed',
                'complete',
            ])
            ->where('payment_status', 'paid')
            ->whereBetween('created_at', [
                $startDate,
                now()->endOfDay(),
            ])
            ->latest()
            ->get();
    }

    /**
     * Menghitung ringkasan penjualan.
     */
    private function calculateSummary($orders)
    {
        return [
            'totalSales' => $orders->sum('total_price'),

            'totalTransactions' => $orders->count(),

            'totalProducts' => $orders->sum(function ($order) {
                return $order->items->sum('quantity');
            }),
        ];
    }

    /**
     * Mengolah data grafik penjualan.
     */
    private function generateChart($orders, $period)
    {
        $grouped = $orders->groupBy(function ($order) use ($period) {
            return $period === 'year'
                ? $order->created_at->format('m/Y')
                : $order->created_at->format('d/m/Y');
        });

        return [
            'labels' => $grouped->keys()->values(),

            'values' => $grouped->map(function ($items) {
                return (float) $items->sum('total_price');
            })->values(),
        ];
    }

    /**
     * Mengambil lima produk terlaris.
     */
    private function generateBestSellingProducts($orders)
    {
        return $orders
            ->flatMap(function ($order) {
                return $order->items;
            })
            ->groupBy('product_id')
            ->map(function ($items) {
                return [
                    'name' => $items->first()->product->name ?? 'Produk dihapus',
                    'quantity' => $items->sum('quantity'),
                ];
            })
            ->sortByDesc('quantity')
            ->take(5)
            ->values();
    }
}