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
    private function getPeriod(Request $request): string
    {
        $period = $request->query('period', 'week');

        $allowedPeriods = [
            'today',
            'week',
            'month',
            'year',
        ];

        return in_array($period, $allowedPeriods, true)
            ? $period
            : 'week';
    }

    /**
     * Menentukan rentang tanggal laporan.
     */
    private function getDateRange(string $period): array
    {
        $now = now();

        return match ($period) {
            'today' => [
                $now->copy()->startOfDay(),
                $now->copy()->endOfDay(),
            ],

            'week' => [
                $now->copy()->subDays(6)->startOfDay(),
                $now->copy()->endOfDay(),
            ],

            'month' => [
                $now->copy()->subDays(29)->startOfDay(),
                $now->copy()->endOfDay(),
            ],

            'year' => [
                $now->copy()->startOfYear(),
                $now->copy()->endOfYear(),
            ],

            default => [
                $now->copy()->subDays(6)->startOfDay(),
                $now->copy()->endOfDay(),
            ],
        };
    }

    /**
     * Mengambil pesanan yang selesai dan sudah dibayar.
     */
    private function getCompletedOrders(string $period)
    {
        [$startDate, $endDate] = $this->getDateRange($period);

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
                $endDate,
            ])
            ->orderBy('created_at')
            ->get();
    }

    /**
     * Menghitung ringkasan penjualan.
     */
    private function calculateSummary($orders): array
    {
        return [
            'totalSales' => (float) $orders->sum('total_price'),

            'totalTransactions' => $orders->count(),

            'totalProducts' => (int) $orders->sum(function ($order) {
                return $order->items->sum('quantity');
            }),
        ];
    }

    /**
     * Membuat data grafik penjualan.
     */
    private function generateChart($orders, string $period): array
    {
        [$startDate, $endDate] = $this->getDateRange($period);

        $labels = [];
        $values = [];

        if ($period === 'year') {

            $monthlyTotals = $orders
                ->groupBy(function ($order) {
                    return $order->created_at->format('Y-m');
                })
                ->map(function ($items) {
                    return (float) $items->sum('total_price');
                });

            $cursor = $startDate->copy()->startOfMonth();

            while ($cursor->lte($endDate)) {

                $key = $cursor->format('Y-m');

                $labels[] = $cursor->translatedFormat('M');

                $values[] = $monthlyTotals->get($key, 0);

                $cursor->addMonth();
            }

        } else {

            $dailyTotals = $orders
                ->groupBy(function ($order) {
                    return $order->created_at->format('Y-m-d');
                })
                ->map(function ($items) {
                    return (float) $items->sum('total_price');
                });

            $cursor = $startDate->copy()->startOfDay();

            $lastDay = $endDate->copy()->startOfDay();

            while ($cursor->lte($lastDay)) {

                $key = $cursor->format('Y-m-d');

                $labels[] = $cursor->format('d M');

                $values[] = $dailyTotals->get($key, 0);

                $cursor->addDay();
            }
        }

        return [
            'labels' => $labels,
            'values' => $values,
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
                    'name' => $items->first()->product->name
                        ?? 'Produk dihapus',

                    'quantity' => (int) $items->sum('quantity'),
                ];

            })
            ->sortByDesc('quantity')
            ->take(5)
            ->values();
    }
}