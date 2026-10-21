<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard admin.
     */
    public function index()
    {
        // ==============================
        // DATA PRODUK
        // ==============================

        $totalProduk = Product::count();

        // Untuk sementara mengikuti
        // struktur dashboard yang sudah berjalan.
        $readyStock = Product::count();

        $produkTerbaru = Product::with('variants')
            ->latest()
            ->take(5)
            ->get();


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
        // DATA USER
        // ==============================

        $totalAdmin = User::where('role', 'admin')->count();

        $totalKaryawan = User::where('role', 'karyawan')->count();

        $totalPelanggan = User::where('role', 'pelanggan')->count();


        // ==============================
        // DATA OMZET
        // ==============================

        $totalOmzet = Order::where('payment_status', 'paid')
            ->sum('total_price');


        // ==============================
        // PESANAN TERBARU
        // ==============================

        $pesananTerbaru = Order::with('user')
            ->latest()
            ->take(5)
            ->get();


        // ==============================
        // KIRIM DATA KE VIEW
        // ==============================

        return view('admin.dashboard', compact(
            'totalProduk',
            'readyStock',
            'produkTerbaru',

            'totalPesanan',
            'pesananPending',
            'pesananProcessing',
            'pesananShipped',
            'pesananSelesai',
            'pesananDibatalkan',

            'totalAdmin',
            'totalKaryawan',
            'totalPelanggan',

            'totalOmzet',
            'pesananTerbaru'
        ));
    }
}