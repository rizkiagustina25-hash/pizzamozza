<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Penjualan - PizzaMozza</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6f8;
            color: #333;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 265px;
            background: #941919;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .brand {
            height: 88px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, .15);
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #b52d2d;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 21px;
        }

        .brand h1 {
            color: #fff;
            font-size: 23px;
        }

        .brand p {
            color: #f5dede;
            font-size: 11px;
            margin-top: 4px;
        }

        .sidebar-menu {
            padding: 25px 15px;
        }

        .menu-title {
            color: #f5dede;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: .8px;
            margin: 0 12px 15px;
            text-transform: uppercase;
        }

        .menu-list {
            list-style: none;
        }

        .menu-item {
            margin-bottom: 5px;
        }

        .menu-link {
            min-height: 49px;
            padding: 0 15px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            gap: 13px;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #b52d2d;
        }

        .menu-icon {
            width: 22px;
            font-size: 17px;
            text-align: center;
        }

        /* =========================
           PROFIL ADMIN
        ========================= */

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px;
            border-top: 1px solid rgba(255, 255, 255, .15);
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 17px;
        }

        .admin-avatar {
            width: 43px;
            height: 43px;
            border-radius: 50%;
            background: #b52d2d;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .admin-info strong {
            display: block;
            color: #fff;
            font-size: 12px;
        }

        .admin-info span {
            display: block;
            color: #f5dede;
            font-size: 10px;
            margin-top: 4px;
        }

        .logout-button {
            width: 100%;
            height: 42px;
            border: none;
            border-radius: 9px;
            background: #fff;
            color: #941919;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #f5dede;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main-wrapper {
            margin-left: 265px;
            min-height: 100vh;
        }

        .topbar {
            height: 72px;
            padding: 0 35px;
            background: #fff;
            border-bottom: 1px solid #e8e8e8;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar-title h3 {
            font-size: 16px;
            color: #333;
        }

        .topbar-admin {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-info {
            text-align: right;
        }

        .topbar-info strong {
            font-size: 12px;
        }

        .topbar-info span {
            display: block;
            color: #999;
            font-size: 10px;
            margin-top: 4px;
        }

        .topbar-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #fff0f0;
            color: #941919;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 30px 35px;
            max-width: 1600px;
            margin: auto;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading small {
            color: #ed1c24;
            font-size: 11px;
            font-weight: bold;
        }

        .page-heading h2 {
            font-size: 27px;
            margin-top: 8px;
            color: #292929;
        }

        .page-heading p {
            margin-top: 8px;
            color: #888;
            font-size: 12px;
        }

        /* =========================
           PANEL
        ========================= */

        .panel {
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 12px;
            margin-bottom: 22px;
            overflow: hidden;
        }

        .panel-header {
            padding: 20px 23px;
            border-bottom: 1px solid #eee;
        }

        .panel-header h3 {
            font-size: 15px;
            color: #333;
        }

        .panel-header h3 i {
            color: #941919;
            margin-right: 5px;
        }

        .panel-header p {
            margin-top: 6px;
            color: #999;
            font-size: 11px;
        }

        /* =========================
           FILTER LAPORAN
        ========================= */

        .filter-form {
            padding: 22px 24px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 14px;
        }

        .filter-select {
            height: 43px;
            width: 210px;
            padding: 0 14px;
            margin-right: auto;
            border: 1px solid #dedede;
            border-radius: 8px;
            background: #fff;
            color: #444;
            font-size: 12px;
            outline: none;
        }

        .filter-select:focus {
            border-color: #941919;
        }

        .btn {
            height: 43px;
            min-width: 105px;
            padding: 0 18px;
            border: none;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .btn-filter {
            background: #941919;
            color: #fff;
        }

        .btn-filter:hover {
            background: #781313;
        }

        .btn-reset {
            background: #fff;
            color: #555;
            border: 1px solid #ddd;
        }

        .btn-reset:hover {
            background: #f5f5f5;
        }

        .btn-print {
            background: #27814c;
            color: #fff;
        }

        .btn-print:hover {
            background: #1d693c;
        }

        /* =========================
           SUMMARY CARDS
        ========================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 12px;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 18px rgba(0, 0, 0, .04);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .green {
            background: #e8f7ed;
            color: #27814c;
        }

        .red {
            background: #fff0f0;
            color: #941919;
        }

        .orange {
            background: #fff3e3;
            color: #d18a22;
        }

        .stat-info span {
            display: block;
            font-size: 11px;
            color: #888;
            margin-bottom: 8px;
        }

        .stat-info strong {
            font-size: 20px;
            color: #292929;
        }

        /* =========================
           GRAFIK PENJUALAN
        ========================= */

        .chart-container {
            height: 370px;
            padding: 25px;
            position: relative;
        }

        .chart-canvas {
            height: 320px;
            position: relative;
        }

        .chart-empty {
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .chart-empty i {
            font-size: 45px;
            color: #941919;
            margin-bottom: 15px;
        }

        .chart-empty h4 {
            font-size: 15px;
            color: #444;
        }

        .chart-empty p {
            max-width: 400px;
            margin-top: 9px;
            color: #999;
            font-size: 11px;
            line-height: 1.7;
        }

        /* =========================
           PRODUK TERLARIS
        ========================= */

        .ranking-list {
            padding: 10px 23px;
        }

        .ranking-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid #eee;
            font-size: 12px;
        }

        .ranking-item:last-child {
            border-bottom: none;
        }

        .ranking-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .ranking-number {
            width: 30px;
            height: 30px;
            background: #fff0f0;
            color: #941919;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .ranking-name {
            font-weight: bold;
            color: #444;
        }

        .ranking-total {
            color: #941919;
            font-weight: bold;
        }

        /* =========================
           TABEL RIWAYAT PENJUALAN
        ========================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 950px;
            border-collapse: separate;
            border-spacing: 0;
        }

        thead {
            background: #faf7f5;
        }

        th {
            padding: 17px 18px;
            text-align: left;
            color: #776a64;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .5px;
            white-space: nowrap;
        }

        td {
            padding: 18px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #555;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fffaf8;
        }

        .order-number {
            color: #941919;
            font-weight: 700;
            white-space: nowrap;
        }

        .customer-name {
            font-size: 12px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .customer-email {
            color: #999;
            font-size: 10px;
        }

        .product-name {
            padding: 3px 0;
            color: #555;
        }

        .total-price {
            font-size: 12px;
            font-weight: 700;
            color: #333;
            white-space: nowrap;
        }

        .paid {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border-radius: 20px;
            background: #e8f7ed;
            color: #27814c;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .date {
            color: #777;
            line-height: 1.7;
            font-size: 11px;
            white-space: nowrap;
        }

        .quantity {
            font-weight: bold;
            color: #444;
        }

        /* =========================
           DATA KOSONG
        ========================= */

        .empty {
            padding: 45px 20px;
            text-align: center;
        }

        .empty i {
            font-size: 35px;
            color: #941919;
            margin-bottom: 12px;
        }

        .empty strong {
            display: block;
            font-size: 14px;
        }

        .empty p {
            color: #999;
            font-size: 11px;
            margin-top: 8px;
        }

        /* =========================
           MODAL LOGOUT
        ========================= */

        .logout-modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .logout-modal.show {
            display: flex;
        }

        .logout-box {
            width: 350px;
            background: #fff;
            padding: 28px;
            border-radius: 13px;
            text-align: center;
        }

        .logout-box h3 {
            margin-bottom: 10px;
        }

        .logout-box p {
            color: #888;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .logout-actions {
            display: flex;
            gap: 10px;
        }

        .logout-actions button {
            flex: 1;
            height: 40px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .cancel-logout {
            background: #eee;
            color: #555;
        }

        .confirm-logout {
            background: #941919;
            color: #fff;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 220px;
            }

            .main-wrapper {
                margin-left: 220px;
            }

            .content {
                padding: 22px 18px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                padding: 0 18px;
            }

            .filter-form {
                gap: 10px;
            }

            .filter-select {
                width: 100%;
                margin-right: 0;
            }
        }

        /* =========================
           PRINT
        ========================= */

        @media print {
            body {
                background: #fff;
            }

            .sidebar,
            .topbar,
            .filter-panel,
            .logout-modal {
                display: none !important;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .content {
                padding: 10px;
                max-width: 100%;
            }

            .panel,
            .stat-card {
                break-inside: avoid;
                box-shadow: none;
            }

            .page-heading h2 {
                font-size: 23px;
            }

            .chart-container {
                height: 300px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                <i class="fa-solid fa-pizza-slice"></i>
            </div>

            <div>
                <h1>PizzaMozza</h1>
                <p>Admin Dashboard</p>
            </div>

        </div>

        <nav class="sidebar-menu">

            <div class="menu-title">
                Main Menu
            </div>

            <ul class="menu-list">

                <li class="menu-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="menu-link">

                        <span class="menu-icon">
                            <i class="bi bi-grid-1x2"></i>
                        </span>

                        Dashboard
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.employees.index') }}"
                        class="menu-link">

                        <span class="menu-icon">
                            <i class="bi bi-people"></i>
                        </span>

                        Data Karyawan
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.customers.index') }}"
                        class="menu-link">

                        <span class="menu-icon">
                            <i class="bi bi-people"></i>
                        </span>

                        Data Pelanggan
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.products.index') }}"
                        class="menu-link">

                        <span class="menu-icon">
                            <i class="bi bi-box-seam"></i>
                        </span>

                        Data Produk
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.orders.index') }}"
                        class="menu-link">

                        <span class="menu-icon">
                            <i class="bi bi-receipt"></i>
                        </span>

                        Pesanan
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.sales-report.index') }}"
                        class="menu-link active">

                        <span class="menu-icon">
                            <i class="bi bi-bar-chart-line"></i>
                        </span>

                        Laporan Penjualan
                    </a>
                </li>

            </ul>

        </nav>

        <!-- PROFIL ADMIN -->

        <div class="sidebar-bottom">

            <div class="admin-profile">

                <div class="admin-avatar">
                    <i class="bi bi-person"></i>
                </div>

                <div class="admin-info">

                    <strong>
                        {{ auth()->user()->name ?? 'Admin PizzaMozza' }}
                    </strong>

                    <span>Administrator</span>

                </div>

            </div>

            <form action="{{ route('logout') }}"
                method="POST"
                id="logoutForm">

                @csrf

                <button type="button"
                    class="logout-button"
                    onclick="openLogoutModal()">

                    <i class="bi bi-box-arrow-right"></i>
                    Keluar
                </button>

            </form>

        </div>

    </aside>

    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <div class="main-wrapper">

        <!-- TOPBAR -->

        <header class="topbar">

            <div class="topbar-title">
                <h3>Laporan Penjualan</h3>
            </div>

            <div class="topbar-admin">

                <div class="topbar-info">

                    <strong>
                        {{ auth()->user()->name ?? 'Admin PizzaMozza' }}
                    </strong>

                    <span>Administrator</span>

                </div>

                <div class="topbar-avatar">
                    <i class="bi bi-person"></i>
                </div>

            </div>

        </header>

        <main class="content">

            <!-- JUDUL HALAMAN -->

            <div class="page-heading">

                <small>MANAJEMEN KEUANGAN</small>

                <h2>Laporan Penjualan</h2>

                <p>
                    Informasi pendapatan, transaksi, dan produk terjual
                    di sistem PizzaMozza.
                </p>

            </div>

            <!-- FILTER LAPORAN -->

            <section class="panel filter-panel">

                <div class="panel-header">

                    <h3>
                        <i class="bi bi-funnel"></i>
                        Filter Laporan
                    </h3>

                    <p>
                        Pilih periode laporan penjualan.
                    </p>

                </div>

                <form action="{{ route('admin.sales-report.index') }}"
                    method="GET"
                    class="filter-form">

                    <select name="period" class="filter-select">

                        <option value="today"
                            {{ $period === 'today' ? 'selected' : '' }}>
                            Hari Ini
                        </option>

                        <option value="week"
                            {{ $period === 'week' ? 'selected' : '' }}>
                            Minggu Ini
                        </option>

                        <option value="month"
                            {{ $period === 'month' ? 'selected' : '' }}>
                            Bulan Ini
                        </option>

                        <option value="year"
                            {{ $period === 'year' ? 'selected' : '' }}>
                            Tahun Ini
                        </option>

                    </select>

                    <button type="submit" class="btn btn-filter">
                        <i class="bi bi-search"></i>
                        Tampilkan
                    </button>

                    <a href="{{ route('admin.sales-report.index') }}"
                        class="btn btn-reset">

                        <i class="bi bi-arrow-counterclockwise"></i>
                        Reset
                    </a>

                    <button type="button"
                        class="btn btn-print"
                        onclick="window.print()">

                        <i class="bi bi-printer"></i>
                        Cetak Laporan
                    </button>

                </form>

            </section>

            <!-- RINGKASAN PENJUALAN -->

            <div class="stats-grid">

                <div class="stat-card">

                    <div class="stat-icon green">
                        <i class="bi bi-wallet2"></i>
                    </div>

                    <div class="stat-info">

                        <span>Total Pendapatan</span>

                        <strong>
                            Rp{{ number_format($totalSales, 0, ',', '.') }}
                        </strong>

                    </div>

                </div>

                <div class="stat-card">

                    <div class="stat-icon red">
                        <i class="bi bi-receipt"></i>
                    </div>

                    <div class="stat-info">

                        <span>Total Transaksi</span>

                        <strong>
                            {{ number_format($totalTransactions, 0, ',', '.') }}
                        </strong>

                    </div>

                </div>

                <div class="stat-card">

                    <div class="stat-icon orange">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div class="stat-info">

                        <span>Produk Terjual</span>

                        <strong>
                            {{ number_format($totalProducts, 0, ',', '.') }}
                        </strong>

                    </div>

                </div>

            </div>

            <!-- GRAFIK PENJUALAN -->

            <section class="panel">

                <div class="panel-header">

                    <h3>
                        <i class="bi bi-graph-up"></i>
                        Grafik Penjualan
                    </h3>

                    <p>
                        Grafik pendapatan berdasarkan tanggal transaksi.
                    </p>

                </div>

                <div class="chart-container">

                    @if (count($chartLabels) > 0)

                        <div class="chart-canvas">
                            <canvas id="salesChart"></canvas>
                        </div>

                    @else

                        <div class="chart-empty">

                            <i class="bi bi-bar-chart-line"></i>

                            <h4>Belum Ada Data Grafik</h4>

                            <p>
                                Grafik penjualan akan muncul setelah terdapat
                                transaksi yang memenuhi kriteria laporan
                                pada periode yang dipilih.
                            </p>

                        </div>

                    @endif

                </div>

            </section>

            <!-- PRODUK TERLARIS -->

            <section class="panel">

                <div class="panel-header">

                    <h3>
                        <i class="bi bi-trophy"></i>
                        Produk Terlaris
                    </h3>

                    <p>
                        Lima produk dengan jumlah penjualan tertinggi.
                    </p>

                </div>

                <div class="ranking-list">

                    @forelse ($productRanking as $product)

                        <div class="ranking-item">

                            <div class="ranking-left">

                                <div class="ranking-number">
                                    {{ $loop->iteration }}
                                </div>

                                <div class="ranking-name">
                                    {{ $product['name'] }}
                                </div>

                            </div>

                            <div class="ranking-total">
                                {{ $product['quantity'] }} terjual
                            </div>

                        </div>

                    @empty

                        <div class="empty">

                            <i class="bi bi-box-seam"></i>

                            <strong>Belum Ada Data Produk</strong>

                            <p>
                                Produk terlaris akan muncul setelah terdapat
                                transaksi yang memenuhi kriteria laporan.
                            </p>

                        </div>

                    @endforelse

                </div>

            </section>

            <!-- RIWAYAT PENJUALAN -->

            <section class="panel">

                <div class="panel-header">

                    <h3>
                        <i class="bi bi-receipt"></i>
                        Riwayat Penjualan
                    </h3>

                    <p>
                        Daftar transaksi yang telah selesai dan dibayar.
                    </p>

                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>
                                <th>NO</th>
                                <th>PESANAN</th>
                                <th>PELANGGAN</th>
                                <th>PRODUK</th>
                                <th>JUMLAH</th>
                                <th>TOTAL HARGA</th>
                                <th>PEMBAYARAN</th>
                                <th>TANGGAL</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($orders as $order)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <div class="order-number">
                                            #PM{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                                        </div>
                                    </td>

                                    <td>

                                        <div class="customer-name">
                                            {{ $order->user->name ?? 'Pelanggan' }}
                                        </div>

                                        <div class="customer-email">
                                            {{ $order->user->email ?? '-' }}
                                        </div>

                                    </td>

                                    <td>

                                        @foreach ($order->items as $item)

                                            <div class="product-name">
                                                {{ $item->product->name ?? 'Produk dihapus' }}
                                            </div>

                                        @endforeach

                                    </td>

                                    <td>
                                        <span class="quantity">
                                            {{ $order->items->sum('quantity') }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="total-price">
                                            Rp{{ number_format($order->total_price, 0, ',', '.') }}
                                        </div>
                                    </td>

                                    <td>

                                        <span class="paid">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Dibayar
                                        </span>

                                    </td>

                                    <td>

                                        <div class="date">

                                            {{ $order->created_at->format('d/m/Y') }}

                                            <br>

                                            {{ $order->created_at->format('H:i') }} WIB

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8">

                                        <div class="empty">

                                            <i class="bi bi-inbox"></i>

                                            <strong>Belum Ada Penjualan</strong>

                                            <p>
                                                Transaksi yang selesai dan dibayar
                                                akan muncul di halaman laporan ini.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>

        </main>

    </div>

    <!-- MODAL LOGOUT -->

    <div class="logout-modal" id="logoutModal">

        <div class="logout-box">

            <h3>Keluar dari Akun?</h3>

            <p>
                Apakah kamu yakin ingin keluar dari dashboard PizzaMozza?
            </p>

            <div class="logout-actions">

                <button type="button"
                    class="cancel-logout"
                    onclick="closeLogoutModal()">

                    Tidak

                </button>

                <button type="button"
                    class="confirm-logout"
                    onclick="confirmLogout()">

                    Ya, Keluar

                </button>

            </div>

        </div>

    </div>

    <!-- JAVASCRIPT -->

    <script>
        /*
        |--------------------------------------------------------------------------
        | GRAFIK PENJUALAN
        |--------------------------------------------------------------------------
        */

        const chartLabels = @json($chartLabels);
        const chartValues = @json($chartValues);

        const chartElement = document.getElementById('salesChart');

        const rupiahFormatter = new Intl.NumberFormat('id-ID');

        if (chartElement) {

            new Chart(chartElement, {

                type: 'bar',

                data: {
                    labels: chartLabels,

                    datasets: [
                        {
                            data: chartValues,

                            backgroundColor: 'rgba(148, 25, 25, 0.85)',
                            hoverBackgroundColor: '#b52d2d',

                            borderColor: '#941919',
                            borderWidth: 1,

                            borderRadius: 6,
                            borderSkipped: false,

                            maxBarThickness: 46,
                            categoryPercentage: 0.75,
                            barPercentage: 0.8
                        }
                    ]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },

                    plugins: {

                        // Legenda Pendapatan disembunyikan.
                        legend: {
                            display: false
                        },

                        tooltip: {
                            backgroundColor: '#292929',
                            titleColor: '#fff',
                            bodyColor: '#fff',

                            padding: 12,
                            displayColors: false,

                            callbacks: {
                                label: function(context) {
                                    return 'Pendapatan: Rp' +
                                        rupiahFormatter.format(context.raw || 0);
                                }
                            }
                        }
                    },

                    scales: {

                        x: {
                            grid: {
                                display: false
                            },

                            ticks: {
                                color: '#888',

                                font: {
                                    size: 11
                                }
                            }
                        },

                        y: {
                            beginAtZero: true,

                            ticks: {
                                color: '#888',

                                precision: 0,

                                callback: function(value) {
                                    return 'Rp' +
                                        new Intl.NumberFormat('id-ID', {
                                            notation: 'compact',
                                            maximumFractionDigits: 1
                                        }).format(value);
                                }
                            },

                            grid: {
                                color: '#eeeeee'
                            }
                        }
                    }
                }
            });
        }

        /*
        |--------------------------------------------------------------------------
        | MODAL LOGOUT
        |--------------------------------------------------------------------------
        */

        function openLogoutModal() {
            document.getElementById('logoutModal')
                .classList.add('show');
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal')
                .classList.remove('show');
        }

        function confirmLogout() {
            document.getElementById('logoutForm').submit();
        }

        document.getElementById('logoutModal').addEventListener(
            'click',
            function(event) {
                if (event.target === this) {
                    closeLogoutModal();
                }
            }
        );

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeLogoutModal();
            }
        });
    </script>

</body>

</html>