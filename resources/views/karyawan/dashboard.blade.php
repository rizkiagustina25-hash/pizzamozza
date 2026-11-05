<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Karyawan - PizzaMozza</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --pm-maroon: #941919;
            --pm-maroon-hover: #b52d2d;
            --pm-cream: #fffaf3;
            --pm-cream-dark: #f5ebe3;
            --pm-border: #f0e1d5;
            --pm-text: #34241f;
            --pm-muted: #81716a;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--pm-cream);
            color: var(--pm-text);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================================
           LAYOUT
        ========================================= */

        .dashboard-wrapper {
            min-height: 100vh;
        }

        /* =========================================
           SIDEBAR - SAMA DENGAN DASHBOARD ADMIN
        ========================================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 265px;
            background: var(--pm-maroon);
            border-right: none;
            z-index: 100;
            display: flex;
            flex-direction: column;
        }

        /* BRAND */

        .sidebar-brand {
            height: 88px;
            padding: 18px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 3px;
        }

        .brand-logo .pizza-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--pm-maroon);
            font-size: 19px;
        }

        .brand-logo h1 {
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #f2cccc;
            margin-left: 48px;
        }

        /* MENU */

        .sidebar-menu {
            padding: 24px 15px;
        }

        .menu-title {
            font-size: 10px;
            font-weight: 700;
            color: #e8bcbc;
            letter-spacing: 0.8px;
            margin: 0 0 12px 12px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 45px;
            padding: 0 14px;
            margin-bottom: 6px;
            border-radius: 8px;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .menu-item:hover {
            background: var(--pm-maroon-hover);
            color: #ffffff;
        }

        .menu-item.active {
            background: var(--pm-maroon-hover);
            color: #ffffff;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        /* PROFIL DAN LOGOUT */

        .sidebar-user {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding: 18px 16px;
        }

        .sidebar-user-inner {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #ffffff;
            color: var(--pm-maroon);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .user-info {
            min-width: 0;
        }

        .user-name {
            font-size: 12px;
            font-weight: 700;
            color: #ffffff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            font-size: 10px;
            color: #e8bcbc;
            margin-top: 3px;
        }

        .sidebar-user form button {
            width: 100%;
            height: 38px;
            margin-top: 15px;
            border: 1px solid #ffffff;
            border-radius: 8px;
            background: #ffffff;
            color: var(--pm-maroon);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: .2s;
        }

        .sidebar-user form button:hover {
            background: #f5e5e5;
            color: var(--pm-maroon);
        }

        /* =========================================
           MAIN CONTENT
        ========================================= */

        .main-content {
            margin-left: 265px;
            min-height: 100vh;
        }

        /* =========================================
           TOPBAR
        ========================================= */

        .topbar {
            min-height: 72px;
            padding: 12px 34px;
            background: #ffffff;
            border-bottom: 1px solid #e8e8e8;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .topbar-left {
            font-size: 13px;
            color: #777;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-user {
            text-align: right;
        }

        .topbar-user-name {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #333;
        }

        .topbar-user-role {
            display: block;
            margin-top: 3px;
            font-size: 10px;
            color: #999;
        }

        .topbar-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #fff0f4;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--pm-maroon);
            font-size: 16px;
        }

        /* =========================================
           PAGE
        ========================================= */

        .page {
            padding: 34px 34px 50px;
            background: var(--pm-cream);
        }

        /* PAGE HEADER */

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 27px;
        }

        .heading-label {
            color: var(--pm-maroon);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 7px;
        }

        .page-heading h2 {
            font-size: 28px;
            line-height: 1.1;
            color: var(--pm-text);
            margin-bottom: 8px;
        }

        .page-description {
            color: var(--pm-muted);
            font-size: 14px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 42px;
            padding: 0 22px;
            border-radius: 8px;
            background: var(--pm-maroon);
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: .2s;
        }

        .btn-primary:hover {
            background: var(--pm-maroon-hover);
        }

        /* =========================================
           STAT CARDS
        ========================================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            min-height: 162px;
            background: #ffffff;
            border-radius: 15px;
            padding: 24px 22px;
            border: 1px solid var(--pm-border);
            position: relative;
        }

        .stat-card.red,
        .stat-card.blue,
        .stat-card.orange,
        .stat-card.green {
            border-color: var(--pm-border);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-title {
            font-size: 14px;
            color: var(--pm-muted);
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-card.red .stat-icon,
        .stat-card.blue .stat-icon {
            background: #f5e5df;
            color: var(--pm-maroon);
        }

        .stat-card.orange .stat-icon {
            background: #fff0df;
            color: #a85e20;
        }

        .stat-card.green .stat-icon {
            background: #edf5e9;
            color: #477746;
        }

        .stat-number {
            font-size: 29px;
            font-weight: 700;
            color: var(--pm-text);
            margin-top: 17px;
        }

        .stat-description {
            font-size: 12px;
            color: var(--pm-muted);
            margin-top: 8px;
        }

        /* =========================================
           CONTENT GRID
        ========================================= */

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 2fr) minmax(300px, 1fr);
            gap: 23px;
        }

        /* PANEL */

        .panel {
            background: #ffffff;
            border: 1px solid var(--pm-border);
            border-radius: 15px;
            overflow: hidden;
        }

        .panel-header {
            min-height: 81px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--pm-border);
        }

        .panel-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--pm-text);
        }

        .panel-subtitle {
            color: var(--pm-muted);
            font-size: 12px;
            margin-top: 5px;
        }

        .panel-link {
            color: var(--pm-maroon);
            font-size: 12px;
            font-weight: 600;
        }

        .panel-link:hover {
            text-decoration: underline;
        }

        /* =========================================
           PRODUCT LIST
        ========================================= */

        .product-item {
            min-height: 81px;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #f5ebe3;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .product-left {
            display: flex;
            align-items: center;
            gap: 15px;
            min-width: 0;
        }

        .product-image {
            width: 47px;
            height: 47px;
            flex-shrink: 0;
            border-radius: 10px;
            background: var(--pm-cream);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-size: 22px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--pm-text);
            margin-bottom: 5px;
        }

        .product-category {
            font-size: 11px;
            color: var(--pm-muted);
        }

        .product-right {
            text-align: right;
            margin-left: 15px;
        }

        .product-price {
            font-size: 13px;
            font-weight: 700;
            color: var(--pm-text);
        }

        .product-status {
            color: var(--pm-maroon);
            font-size: 10px;
            margin-top: 4px;
        }

        /* =========================================
           QUICK ACTIONS
        ========================================= */

        .quick-action {
            min-height: 72px;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            gap: 14px;
            border-bottom: 1px solid #f5ebe3;
            transition: .2s;
        }

        .quick-action:last-child {
            border-bottom: none;
        }

        .quick-action:hover {
            background: var(--pm-cream);
        }

        .quick-icon {
            width: 41px;
            height: 41px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #f5e5df;
            color: var(--pm-maroon);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .quick-content {
            min-width: 0;
        }

        .quick-title {
            font-size: 13px;
            font-weight: 600;
            color: #27303b;
        }

        .quick-description {
            font-size: 11px;
            color: #a0a8b2;
            margin-top: 5px;
        }

        /* =========================================
           ORDER SECTION
        ========================================= */

        .orders-section {
            margin-top: 24px;
        }

        .orders-table-wrapper {
            overflow-x: auto;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th {
            padding: 14px 20px;
            text-align: left;
            font-size: 11px;
            color: var(--pm-muted);
            font-weight: 600;
            background: var(--pm-cream);
            border-bottom: 1px solid var(--pm-border);
        }

        .orders-table td {
            padding: 15px 20px;
            font-size: 12px;
            color: #59453d;
            border-bottom: 1px solid #f5ebe3;
        }

        .orders-table tr:last-child td {
            border-bottom: none;
        }

        .order-id {
            font-weight: 700;
            color: var(--pm-text);
        }

        .customer-name {
            font-weight: 600;
            color: var(--pm-text);
        }

        .order-total {
            font-weight: 700;
            color: var(--pm-text);
        }

        /* STATUS */

        .status {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 700;
        }

        .status.pending {
            background: #fff3d6;
            color: #946200;
        }

        .status.processing {
            background: #f5e5df;
            color: var(--pm-maroon);
        }

        .status.shipped {
            background: #f0eaff;
            color: #6845a5;
        }

        .status.completed {
            background: #eaf8ef;
            color: #26864b;
        }

        .status.cancelled {
            background: #ffeded;
            color: #c43838;
        }

        /* DETAIL BUTTON */

        .detail-link {
            color: var(--pm-maroon);
            font-weight: 600;
            font-size: 11px;
        }

        /* =========================================
           EMPTY STATE
        ========================================= */

        .empty-state {
            padding: 45px 20px;
            text-align: center;
            color: var(--pm-muted);
            font-size: 13px;
        }

        .empty-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        /* =========================================
           FOOTER
        ========================================= */

        .footer {
            margin-top: 35px;
            padding: 20px 0;
            border-top: 1px solid var(--pm-border);
            color: var(--pm-muted);
            font-size: 11px;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
            }

            .page {
                padding: 25px 20px;
            }

            .topbar {
                padding: 12px 20px;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .sidebar-brand {
                height: 88px;
            }

            .sidebar-user {
                position: static;
                margin-top: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .topbar {
                height: auto;
                padding: 12px 16px;
                gap: 15px;
                align-items: center;
            }

            .topbar-right {
                display: none;
            }
        }

        .menu-icon i,
        .stat-icon i,
        .quick-icon i {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-user-inner .user-avatar i,
        .topbar-avatar i {
            font-size: 19px;
        }

        .product-image i,
        .empty-icon i {
            font-size: 26px;
        }
    </style>
</head>

<body>

@php

    use App\Models\Product;
    use App\Models\Order;
    use App\Models\User;

    /*
    |--------------------------------------------------------------------------
    | DATA DASHBOARD KARYAWAN
    |--------------------------------------------------------------------------
    */

    $user = auth()->user();

    $totalProduk = Product::count();

    /*
    |--------------------------------------------------------------------------
    | READY STOCK
    |--------------------------------------------------------------------------
    */

    $readyStock = Product::count();

    $totalPesanan = Order::count();

    $pesananPending = Order::where(
        'status',
        'pending'
    )->count();

    $pesananProcessing = Order::where(
        'status',
        'processing'
    )->count();

    $pesananShipped = Order::where(
        'status',
        'shipped'
    )->count();

    $pesananSelesai = Order::where(
        'status',
        'completed'
    )->count();

    $pesananDibatalkan = Order::where(
        'status',
        'cancelled'
    )->count();

    /*
    |--------------------------------------------------------------------------
    | PRODUK TERBARU
    |--------------------------------------------------------------------------
    */

    $produkTerbaru = Product::with('variants')
        ->latest()
        ->take(5)
        ->get();

    /*
    |--------------------------------------------------------------------------
    | PESANAN TERBARU
    |--------------------------------------------------------------------------
    */

    $pesananTerbaru = Order::with([
        'user',
        'items.product',
        'items.variant'
    ])
        ->latest()
        ->take(5)
        ->get();

@endphp

<div class="dashboard-wrapper">

    <!-- =========================================
         SIDEBAR
    ========================================== -->

    <aside class="sidebar">

        <!-- BRAND -->

        <div class="sidebar-brand">

            <div class="brand-logo">

                <span class="pizza-icon">
                    <i class="fa-solid fa-pizza-slice"></i>
                </span>

                <h1>PizzaMozza</h1>

            </div>

            <div class="brand-subtitle">
                Karyawan Dashboard
            </div>

        </div>

        <!-- MENU -->

        <nav class="sidebar-menu">

            <div class="menu-title">
                MAIN MENU
            </div>

            <!-- DASHBOARD -->

            <a href="{{ route('karyawan.dashboard') }}"
               class="menu-item active">

                <span class="menu-icon">
                    <i class="bi bi-grid-fill"></i>
                </span>

                <span>Dashboard</span>

            </a>

            <!-- DATA PRODUK -->

            <a href="{{ route('karyawan.products.index') }}" class="menu-item">
    <i class="bi bi-box-seam"></i>
    <span>Data Produk</span>
</a>

            <!-- PESANAN -->

            <a href="{{ route('karyawan.orders.index') }}"
               class="menu-item">

                <span class="menu-icon">
                    <i class="bi bi-bag-check"></i>
                </span>

                <span>Pesanan</span>

            </a>

        </nav>

        <!-- PROFIL DAN LOGOUT -->

        <div class="sidebar-user">

            <div class="sidebar-user-inner">

                <div class="user-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div class="user-info">

                    <div class="user-name">
                        {{ $user->name }}
                    </div>

                    <div class="user-role">
                        Karyawan
                    </div>

                </div>

            </div>

            <!-- LOGOUT -->

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Keluar</span>
                </button>

            </form>

        </div>

    </aside>

    <!-- =========================================
         MAIN CONTENT
    ========================================== -->

    <main class="main-content">

        <!-- TOPBAR -->

        <header class="topbar">

            <div class="topbar-left">
               
            </div>

            <div class="topbar-right">

                <div class="topbar-user">

                    <div class="topbar-user-name">
                        {{ $user->name }}
                    </div>

                    <div class="topbar-user-role">
                        Karyawan
                    </div>

                </div>

                <div class="topbar-avatar">
                    <i class="bi bi-person"></i>
                </div>

            </div>

        </header>

        <!-- PAGE -->

        <div class="page">

            <!-- PAGE HEADER -->

            <div class="page-heading">

                <div>

                    <div class="heading-label">
                        Overview
                    </div>

                    <h2>Dashboard</h2>

                    <div class="page-description">
                        Kelola operasional Pizza Mozza dari satu tempat.
                    </div>

                </div>

                <!-- TAMBAH PRODUK -->

                <a href="{{ route('karyawan.products.index') }}"
                   class="btn-primary">

                    <span>+</span>

                    <span>Lihat Data Produk</span>

                </a>

            </div>

            <!-- STATISTICS -->

            <div class="stats-grid">

                <!-- TOTAL PRODUK -->

                <div class="stat-card red">

                    <div class="stat-top">

                        <div class="stat-title">
                            Total Produk
                        </div>

                        <div class="stat-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>

                    </div>

                    <div class="stat-number">
                        {{ $totalProduk }}
                    </div>

                    <div class="stat-description">
                        Menu yang tersedia
                    </div>

                </div>

                <!-- READY STOCK -->

                <div class="stat-card blue">

                    <div class="stat-top">

                        <div class="stat-title">
                            Ready Stock
                        </div>

                        <div class="stat-icon">
                            <i class="bi bi-check-lg"></i>
                        </div>

                    </div>

                    <div class="stat-number">
                        {{ $readyStock }}
                    </div>

                    <div class="stat-description">
                        Produk siap dijual
                    </div>

                </div>

                <!-- TOTAL PESANAN -->

                <div class="stat-card orange">

                    <div class="stat-top">

                        <div class="stat-title">
                            Total Pesanan
                        </div>

                        <div class="stat-icon">
                            <i class="bi bi-cart3"></i>
                        </div>

                    </div>

                    <div class="stat-number">
                        {{ $totalPesanan }}
                    </div>

                    <div class="stat-description">
                        Semua pesanan masuk
                    </div>

                </div>

                <!-- PENDING -->

                <div class="stat-card green">

                    <div class="stat-top">

                        <div class="stat-title">
                            Pesanan Pending
                        </div>

                        <div class="stat-icon">
                            <i class="bi bi-hourglass-split"></i>
                        </div>

                    </div>

                    <div class="stat-number">
                        {{ $pesananPending }}
                    </div>

                    <div class="stat-description">
                        Perlu segera diproses
                    </div>

                </div>

            </div>

            <!-- PRODUK DAN QUICK ACTION -->

            <div class="content-grid">

                <!-- PRODUK TERBARU -->

                <section class="panel">

                    <div class="panel-header">

                        <div>

                            <div class="panel-title">
                                Produk Terbaru
                            </div>

                            <div class="panel-subtitle">
                                Menu yang terakhir ditambahkan
                            </div>

                        </div>

                        <a href="{{ route('karyawan.products.index') }}"
                           class="panel-link">
                            Lihat semua
                        </a>

                    </div>

                    @forelse($produkTerbaru as $product)

                        <div class="product-item">

                            <div class="product-left">

                                <div class="product-image">

                                    @if(!empty($product->image))

                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                        >

                                    @else

                                        <i class="fa-solid fa-pizza-slice"></i>

                                    @endif

                                </div>

                                <div>

                                    <div class="product-name">
                                        {{ $product->name }}
                                    </div>

                                    <div class="product-category">
                                        {{ ucfirst($product->category ?? 'Pizza') }}
                                    </div>

                                </div>

                            </div>

                            <div class="product-right">

                                @php

                                    $hargaProduk = null;

                                    if (
                                        isset($product->variants) &&
                                        $product->variants->count()
                                    ) {
                                        $hargaProduk = $product->variants
                                            ->min('price');
                                    }

                                @endphp

                                <div class="product-price">

                                    @if($hargaProduk !== null)

                                        Rp {{ number_format(
                                            $hargaProduk,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    @else

                                        -

                                    @endif

                                </div>

                                <div class="product-status">
                                    Pre-order
                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="empty-state">

                            <div class="empty-icon">
                                <i class="bi bi-egg-fried"></i>
                            </div>

                            Belum ada produk.

                        </div>

                    @endforelse

                </section>

                <!-- QUICK ACTIONS -->

                <section class="panel">

                    <div class="panel-header">

                        <div>

                            <div class="panel-title">
                                Quick Actions
                            </div>

                            <div class="panel-subtitle">
                                Akses cepat pengelolaan data
                            </div>

                        </div>

                    </div>

                    <!-- TAMBAH PRODUK -->

                    <a href="{{ route('karyawan.products.index') }}"
                       class="quick-action">

                        <div class="quick-icon">
                            <i class="bi bi-plus-lg"></i>
                        </div>

                        <div class="quick-content">

                            <div class="quick-title">
                                Lihat Data Produk
                            </div>

                            <div class="quick-description">
                                Lihat dan periksa data produk
                            </div>

                        </div>

                    </a>

                    <!-- KELOLA PESANAN -->

                    <a href="{{ route('karyawan.orders.index') }}"
                       class="quick-action">

                        <div class="quick-icon">
                            <i class="bi bi-bag-check"></i>
                        </div>

                        <div class="quick-content">

                            <div class="quick-title">
                                Kelola Pesanan
                            </div>

                            <div class="quick-description">
                                Lihat dan proses pesanan
                            </div>

                        </div>

                    </a>

                    <!-- PESANAN PENDING -->

                    <a href="{{ route('karyawan.orders.index') }}?status=pending"
                       class="quick-action">

                        <div class="quick-icon">
                            <i class="bi bi-hourglass-split"></i>
                        </div>

                        <div class="quick-content">

                            <div class="quick-title">
                                Pesanan Pending
                            </div>

                            <div class="quick-description">
                                {{ $pesananPending }}
                                pesanan menunggu diproses
                            </div>

                        </div>

                    </a>

                </section>

            </div>

            <!-- PESANAN TERBARU -->

            <section class="panel orders-section">

                <div class="panel-header">

                    <div>

                        <div class="panel-title">
                            Pesanan Terbaru
                        </div>

                        <div class="panel-subtitle">
                            Pesanan pelanggan yang terbaru masuk
                        </div>

                    </div>

                    <a href="{{ route('karyawan.orders.index') }}"
                       class="panel-link">
                        Lihat semua
                    </a>

                </div>

                <div class="orders-table-wrapper">

                    <table class="orders-table">

                        <thead>

                            <tr>
                                <th>Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($pesananTerbaru as $order)

                                @php

                                    $statusClass = match ($order->status) {
                                        'pending' => 'pending',
                                        'processing' => 'processing',
                                        'shipped' => 'shipped',
                                        'completed' => 'completed',
                                        'cancelled' => 'cancelled',
                                        default => 'pending',
                                    };

                                    $statusText = match ($order->status) {
                                        'pending' => 'Pending',
                                        'processing' => 'Diproses',
                                        'shipped' => 'Dikirim',
                                        'completed' => 'Selesai',
                                        'cancelled' => 'Dibatalkan',
                                        default => ucfirst($order->status),
                                    };

                                @endphp

                                <tr>

                                    <!-- ORDER -->

                                    <td>

                                        <div class="order-id">
                                            #{{ $order->id }}
                                        </div>

                                        <div style="
                                            margin-top:4px;
                                            color:#9aa0a6;
                                            font-size:10px;
                                        ">
                                            {{ $order->created_at?->format('d M Y H:i') }}
                                        </div>

                                    </td>

                                    <!-- CUSTOMER -->

                                    <td>

                                        <div class="customer-name">
                                            {{ $order->user->name ?? 'Pelanggan' }}
                                        </div>

                                    </td>

                                    <!-- TOTAL -->

                                    <td>

                                        <div class="order-total">

                                            Rp {{ number_format(
                                                $order->total_price,
                                                0,
                                                ',',
                                                '.'
                                            ) }}

                                        </div>

                                    </td>

                                    <!-- STATUS -->

                                    <td>

                                        <span class="status {{ $statusClass }}">
                                            {{ $statusText }}
                                        </span>

                                    </td>

                                    <!-- DETAIL -->

                                    <td>

                                        <a href="{{ route(
                                            'admin.orders.show',
                                            $order->id
                                        ) }}"
                                           class="detail-link">
                                            Detail
                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="empty-state">

                                        <div class="empty-icon">
                                            <i class="bi bi-bag-check"></i>
                                        </div>

                                        Belum ada pesanan.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>

            <!-- FOOTER -->

            <footer class="footer">

                © {{ date('Y') }}
                PizzaMozza.
                Semua hak dilindungi.

            </footer>

        </div>

    </main>

</div>

</body>
</html>