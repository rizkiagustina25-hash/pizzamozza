<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ==============================
        // DATA PRODUK
        // ==============================

        $totalProduk = Product::count();

        $readyStock = Product::where('stock', '>', 0)->count();

        $produkTerbaru = Product::with('variants')
            ->latest()
            ->take(5)
            ->get();


        // ==============================
        // DATA USER
        // ==============================

        $totalAdmin = User::where('role', 'admin')->count();

        $totalKaryawan = User::where('role', 'karyawan')->count();

        $totalPelanggan = User::where('role', 'pelanggan')->count();


        // ==============================
        // DATA PESANAN
        // ==============================

        $totalPesanan = Order::count();

        $pesananPending = Order::where('status', 'pending')->count();

        $pesananProcessing = Order::where('status', 'processing')->count();

        $pesananShipped = Order::where('status', 'shipped')->count();

        $pesananSelesai = Order::where('status', 'completed')->count();

        $pesananDibatalkan = Order::where('status', 'cancelled')->count();


        // ==============================
        // DATA OMZET
        // ==============================

        $totalOmzet = Order::where('payment_status', 'paid')
            ->sum('total_price');


        // ==============================
        // OMZET BULAN INI
        // ==============================

        $omzetBulanIni = Order::where('payment_status', 'paid')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');


        // ==============================
        // PESANAN TERBARU
        // ==============================

        $pesananTerbaru = Order::with(['user', 'items.product'])
            ->latest()
            ->take(5)
            ->get();


        // ==============================
        // PRODUK TERLARIS
        // ==============================

        $produkTerlaris = OrderItem::query()
            ->select(
                'product_id',
                DB::raw('SUM(order_items.quantity) as total_terjual')
            )
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', '!=', 'cancelled')
            ->with('product')
            ->groupBy('product_id')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->get();


        // ==============================
        // GRAFIK PENJUALAN 7 HARI
        // ==============================

        $tanggalGrafik = collect();
        $dataGrafik = collect();

        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i);

            $tanggalGrafik->push($tanggal->format('d M'));

            $omzetHarian = Order::where('payment_status', 'paid')
                ->whereDate('created_at', $tanggal->toDateString())
                ->sum('total_price');

            $dataGrafik->push((float) $omzetHarian);
        }


        // ==============================
        // KIRIM DATA KE VIEW
        // ==============================

        return view('admin.dashboard', compact(
            'totalProduk',
            'readyStock',
            'produkTerbaru',

            'totalAdmin',
            'totalKaryawan',
            'totalPelanggan',

            'totalPesanan',
            'pesananPending',
            'pesananProcessing',
            'pesananShipped',
            'pesananSelesai',
            'pesananDibatalkan',

            'totalOmzet',
            'omzetBulanIni',

            'pesananTerbaru',
            'produkTerlaris',

            'tanggalGrafik',
            'dataGrafik'
        ));
    }
}