<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Karyawan - PizzaMozza</title>
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6f8;
            color: #202124;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =====================================================
           LAYOUT
        ===================================================== */

        .dashboard-wrapper {
            min-height: 100vh;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;

            width: 265px;

            background: #ffffff;

            border-right: 1px solid #e1e4e8;

            z-index: 100;

            display: flex;
            flex-direction: column;
        }


        /* LOGO */

        .sidebar-brand {
            height: 154px;

            padding: 25px 24px;

            border-bottom: 1px solid #e5e7eb;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 3px;

            margin-bottom: 3px;
        }

        .brand-logo .pizza-icon {
            font-size: 17px;
        }

        .brand-logo h1 {
            font-size: 29px;
            font-weight: 700;

            color: #202124;

            letter-spacing: -1.2px;
        }

        .brand-subtitle {
            font-size: 15px;

            color: #333333;

            margin-left: 1px;
        }


        /* MENU */

        .sidebar-menu {
            padding: 35px 16px;
        }

        .menu-title {
            font-size: 11px;

            font-weight: 700;

            color: #9aa0a6;

            letter-spacing: .5px;

            margin: 0 0 12px 12px;
        }

        .menu-item {
            display: flex;

            align-items: center;

            gap: 12px;

            height: 45px;

            padding: 0 16px;

            margin-bottom: 6px;

            border-radius: 9px;

            color: #5f6368;

            font-size: 14px;

            font-weight: 600;

            transition: .2s;
        }

        .menu-item:hover {
            background: #f5f5f5;

            color: #e52429;
        }

        .menu-item.active {
            background: #e52429;

            color: #ffffff;
        }

        .menu-icon {
            width: 20px;

            text-align: center;

            font-size: 17px;
        }


        /* USER SIDEBAR */

        .sidebar-user {
            margin-top: auto;

            border-top: 1px solid #e5e7eb;

            padding: 18px 22px;
        }

        .sidebar-user-inner {
            display: flex;

            align-items: center;

            gap: 12px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #fff0f1;

            color: #4c277c;

            font-size: 18px;
        }

        .user-info {
            min-width: 0;
        }

        .user-name {
            font-size: 13px;

            font-weight: 700;

            color: #5f6368;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }

        .user-role {
            font-size: 11px;

            color: #9aa0a6;

            margin-top: 3px;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main-content {
            margin-left: 265px;

            min-height: 100vh;
        }


        /* =====================================================
           TOP BAR
        ===================================================== */

        .topbar {
            height: 89px;

            background: #ffffff;

            border-bottom: 1px solid #e1e4e8;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 32px;
        }

        .topbar-left {
            color: #718096;

            font-size: 14px;
        }

        .topbar-right {
            display: flex;

            align-items: center;

            gap: 12px;
        }

        .topbar-user {
            text-align: right;
        }

        .topbar-user-name {
            font-size: 14px;

            font-weight: 700;

            color: #333333;
        }

        .topbar-user-role {
            font-size: 11px;

            color: #9aa0a6;

            margin-top: 4px;
        }

        .topbar-avatar {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: #fff0f1;

            display: flex;

            align-items: center;
            justify-content: center;

            color: #4c277c;

            font-size: 17px;
        }


        /* =====================================================
           PAGE
        ===================================================== */

        .page {
            padding: 34px 34px 50px;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-heading {
            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            margin-bottom: 27px;
        }

        .heading-label {
            color: #e52429;

            font-size: 13px;

            font-weight: 500;

            margin-bottom: 7px;
        }

        .page-heading h2 {
            font-size: 28px;

            line-height: 1.1;

            color: #111827;

            margin-bottom: 8px;
        }

        .page-description {
            color: #8994a3;

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

            background: #e52429;

            color: #ffffff;

            font-size: 13px;

            font-weight: 700;

            border: none;

            cursor: pointer;

            transition: .2s;
        }

        .btn-primary:hover {
            background: #c91d22;
        }


        /* =====================================================
           STAT CARDS
        ===================================================== */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 20px;

            margin-bottom: 32px;
        }

        .stat-card {
            min-height: 162px;

            background: #ffffff;

            border-radius: 15px;

            padding: 24px 22px;

            border: 1px solid #e2e5e9;

            position: relative;
        }

        .stat-card.red {
            border-color: #f4c5c7;
        }

        .stat-card.blue {
            border-color: #cbdcf8;
        }

        .stat-card.orange {
            border-color: #f0ddc7;
        }

        .stat-card.green {
            border-color: #cce9d8;
        }

        .stat-top {
            display: flex;

            align-items: center;

            justify-content: space-between;
        }

        .stat-title {
            font-size: 14px;

            color: #718096;
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

        .stat-card.red .stat-icon {
            background: #fff0f1;

            color: #4c277c;
        }

        .stat-card.blue .stat-icon {
            background: #edf4ff;

            color: #4c277c;
        }

        .stat-card.orange .stat-icon {
            background: #fff4e9;

            color: #c87826;
        }

        .stat-card.green .stat-icon {
            background: #edf9f2;

            color: #229954;
        }

        .stat-number {
            font-size: 29px;

            font-weight: 700;

            color: #111827;

            margin-top: 17px;
        }

        .stat-description {
            font-size: 12px;

            color: #8994a3;

            margin-top: 8px;
        }


        /* =====================================================
           CONTENT GRID
        ===================================================== */

        .content-grid {
            display: grid;

            grid-template-columns:
                minmax(0, 2fr)
                minmax(300px, 1fr);

            gap: 23px;
        }


        /* =====================================================
           PANEL
        ===================================================== */

        .panel {
            background: #ffffff;

            border: 1px solid #e0e4e8;

            border-radius: 15px;

            overflow: hidden;
        }

        .panel-header {
            min-height: 81px;

            padding: 20px 24px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom: 1px solid #e5e7eb;
        }

        .panel-title {
            font-size: 16px;

            font-weight: 700;

            color: #111827;
        }

        .panel-subtitle {
            color: #8994a3;

            font-size: 12px;

            margin-top: 5px;
        }

        .panel-link {
            color: #e52429;

            font-size: 12px;

            font-weight: 600;
        }

        .panel-link:hover {
            text-decoration: underline;
        }


        /* =====================================================
           PRODUCT LIST
        ===================================================== */

        .product-item {
            min-height: 81px;

            padding: 16px 24px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom: 1px solid #edf0f2;
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

            background: #f1f3f5;

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

            color: #18202a;

            margin-bottom: 5px;
        }

        .product-category {
            font-size: 11px;

            color: #8994a3;
        }

        .product-right {
            text-align: right;

            margin-left: 15px;
        }

        .product-price {
            font-size: 13px;

            font-weight: 700;

            color: #18202a;
        }

        .product-status {
            color: #e52429;

            font-size: 10px;

            margin-top: 4px;
        }


        /* =====================================================
           QUICK ACTIONS
        ===================================================== */

        .quick-action {
            min-height: 72px;

            padding: 14px 24px;

            display: flex;

            align-items: center;

            gap: 14px;

            border-bottom: 1px solid #edf0f2;

            transition: .2s;
        }

        .quick-action:last-child {
            border-bottom: none;
        }

        .quick-action:hover {
            background: #fafafa;
        }

        .quick-icon {
            width: 41px;
            height: 41px;

            flex-shrink: 0;

            border-radius: 10px;

            background: #fff0f1;

            color: #e52429;

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


        /* =====================================================
           ORDER SECTION
        ===================================================== */

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

            color: #8994a3;

            font-weight: 600;

            background: #fafafa;

            border-bottom: 1px solid #e8eaed;
        }

        .orders-table td {
            padding: 15px 20px;

            font-size: 12px;

            color: #4b5563;

            border-bottom: 1px solid #edf0f2;
        }

        .orders-table tr:last-child td {
            border-bottom: none;
        }

        .order-id {
            font-weight: 700;

            color: #1f2937;
        }

        .customer-name {
            font-weight: 600;

            color: #374151;
        }

        .order-total {
            font-weight: 700;

            color: #1f2937;
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
            background: #fff7df;

            color: #a56b00;
        }

        .status.processing {
            background: #eaf2ff;

            color: #3267b1;
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
            color: #e52429;

            font-weight: 600;

            font-size: 11px;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {
            padding: 45px 20px;

            text-align: center;

            color: #9aa0a6;

            font-size: 13px;
        }

        .empty-icon {
            font-size: 32px;

            margin-bottom: 10px;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            margin-top: 35px;

            padding: 20px 0;

            border-top: 1px solid #e1e4e8;

            color: #9aa0a6;

            font-size: 11px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1100px) {

            .stats-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
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
                padding: 0 20px;
            }

        }


        @media (max-width: 650px) {

            .sidebar {
                position: relative;

                width: 100%;

                height: auto;
            }

            .sidebar-brand {
                height: auto;
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

                padding: 18px;

                gap: 15px;

                align-items: flex-start;
            }

            .topbar-right {
                display: none;
            }
        }

        .brand-logo {
    gap: 8px;
}

.menu-item {
    gap: 12px;
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


/* =========================================
   TEMA PIZZAMOZZA - DASHBOARD KARYAWAN
========================================= */

:root {
    --pm-maroon: #861b1b;
    --pm-maroon-hover: #a52828;
    --pm-cream: #fffaf3;
    --pm-cream-dark: #f5ebe3;
    --pm-border: #f0e1d5;
    --pm-text: #34241f;
    --pm-muted: #81716a;
}

/* Latar halaman */
body {
    background: var(--pm-cream);
    color: var(--pm-text);
}

/* Sidebar */
.sidebar {
    background: var(--pm-maroon);
    border-right: none;
}

.sidebar-brand {
    border-bottom-color: rgba(255, 255, 255, 0.16);
}

.brand-logo h1 {
    color: #ffffff;
}

.brand-logo .pizza-icon {
    color: #ffffff;
}

.brand-subtitle {
    color: #f5dede;
}

/* Menu sidebar */
.menu-title {
    color: #e8bcbc;
}

.menu-item {
    color: #ffffff;
}

.menu-item:hover {
    background: rgba(255, 255, 255, 0.12);
    color: #ffffff;
}

.menu-item.active {
    background: #ffffff;
    color: var(--pm-maroon);
}

.menu-icon {
    color: inherit;
}

/* Informasi pengguna sidebar */
.sidebar-user {
    border-top-color: rgba(255, 255, 255, 0.16);
}

.user-avatar,
.topbar-avatar {
    background: #f5e5df;
    color: var(--pm-maroon);
}

.user-name {
    color: #ffffff;
}

.user-role {
    color: #e8bcbc;
}

/* Tombol keluar */
.sidebar-user form button {
    background: #ffffff !important;
    color: var(--pm-maroon) !important;
    border-color: #ffffff !important;
}

.sidebar-user form button:hover {
    background: #f5dede !important;
    color: var(--pm-maroon) !important;
}

/* Topbar */
.topbar {
    background: #ffffff;
    border-bottom-color: var(--pm-border);
}

.topbar-left,
.topbar-user-role {
    color: var(--pm-muted);
}

.topbar-user-name {
    color: var(--pm-text);
}

/* Area konten */
.page {
    background: var(--pm-cream);
}

.heading-label {
    color: var(--pm-maroon);
}

.page-heading h2 {
    color: var(--pm-text);
}

.page-description {
    color: var(--pm-muted);
}

/* Tombol utama */
.btn-primary {
    background: var(--pm-maroon);
}

.btn-primary:hover {
    background: var(--pm-maroon-hover);
}

/* Kartu statistik */
.stat-card {
    background: #ffffff;
    border-color: var(--pm-border);
}

.stat-card.red,
.stat-card.blue,
.stat-card.orange,
.stat-card.green {
    border-color: var(--pm-border);
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

.stat-title,
.stat-description {
    color: var(--pm-muted);
}

.stat-number {
    color: var(--pm-text);
}

/* Panel dan daftar produk */
.panel {
    background: #ffffff;
    border-color: var(--pm-border);
}

.panel-header {
    border-bottom-color: var(--pm-border);
}

.panel-title,
.product-name,
.product-price,
.order-id,
.order-total {
    color: var(--pm-text);
}

.panel-subtitle,
.product-category {
    color: var(--pm-muted);
}

.panel-link,
.detail-link {
    color: var(--pm-maroon);
}

.product-item,
.quick-action {
    border-bottom-color: #f5ebe3;
}

.product-image {
    background: var(--pm-cream);
}

.product-status {
    color: var(--pm-maroon);
}

/* Aksi cepat */
.quick-action:hover {
    background: var(--pm-cream);
}

.quick-icon {
    background: #f5e5df;
    color: var(--pm-maroon);
}

/* Tabel pesanan */
.orders-table th {
    background: var(--pm-cream);
    color: var(--pm-muted);
    border-bottom-color: var(--pm-border);
}

.orders-table td {
    color: #59453d;
    border-bottom-color: #f5ebe3;
}

.customer-name {
    color: var(--pm-text);
}

/* Status pesanan tetap memiliki warna pembeda */
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

/* Kondisi kosong dan footer */
.empty-state {
    color: var(--pm-muted);
}

.footer {
    border-top-color: var(--pm-border);
    color: var(--pm-muted);
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
    | Ready Stock
    |--------------------------------------------------------------------------
    | Mengikuti konsep dashboard admin sebelumnya.
    | Saat ini setiap produk dianggap tersedia.
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
    | Produk Terbaru
    |--------------------------------------------------------------------------
    */

    $produkTerbaru = Product::with('variants')
        ->latest()
        ->take(5)
        ->get();


    /*
    |--------------------------------------------------------------------------
    | Pesanan Terbaru
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


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside class="sidebar">


        <!-- BRAND -->

        <div class="sidebar-brand">

            <div class="brand-logo">

                <span class="pizza-icon">
                    🍕
                </span>

                <h1>
                    PizzaMozza
                </h1>

            </div>

            <div class="brand-subtitle">
                Employee Dashboard
            </div>

        </div>


        <!-- MENU -->

        <nav class="sidebar-menu">

            <div class="menu-title">
                MAIN MENU
            </div>


            <!-- DASHBOARD -->

            <a
                href="{{ route('karyawan.dashboard') }}"
                class="menu-item active"
            >

                <span class="menu-icon">
                    <i class="bi bi-house-door-fill"></i>
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- DATA PRODUK -->

            <a
                href="{{ route('admin.products.index') }}"
                class="menu-item"
            >

                <span class="menu-icon">
                    <i class="bi bi-box-seam"></i>
                </span>

                <span>
                    Data Produk
                </span>

            </a>


            <!-- PESANAN -->

            <a
                href="{{ route('admin.orders.index') }}"
                class="menu-item"
            >

                <span class="menu-icon">
                    <i class="bi bi-bag-check"></i>
                </span>

                <span>
                    Pesanan
                </span>

            </a>

        </nav>


        <!-- USER -->

        <div class="sidebar-user">

    <div class="sidebar-user-inner">

        <div class="user-avatar">
            <i class="bi bi-person-circle"></i>
        </div>

        <div class="user-info">

            <div class="user-name">
                {{ $user->name }}
            </div>

            <div class="user-role">
                PizzaMozza
            </div>

        </div>

    </div>


    <!-- LOGOUT -->
    <form
        action="{{ route('logout') }}"
        method="POST"
        style="margin-top: 15px;"
    >
        @csrf

        <button
            type="submit"
            style="
                width: 100%;
                height: 38px;
                border: 1px solid #f1c5c7;
                border-radius: 8px;
                background: #fff5f5;
                color: #e52429;
                font-size: 12px;
                font-weight: 600;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                transition: .2s;
            "
            onmouseover="this.style.background='#e52429'; this.style.color='#ffffff';"
            onmouseout="this.style.background='#fff5f5'; this.style.color='#e52429';"
        >
            <span><i class="bi bi-box-arrow-right"></i></span>
            <span>Keluar</span>
        </button>

    </form>

</div>

    </aside>



    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="main-content">


        <!-- =================================================
             TOP BAR
        ================================================== -->

        <header class="topbar">

            <div class="topbar-left">
                Management System
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
                    <i class="bi bi-person-circle"></i>
                </div>

            </div>

        </header>



        <!-- =================================================
             PAGE
        ================================================== -->

        <div class="page">


            <!-- =================================================
                 PAGE HEADER
            ================================================== -->

            <div class="page-heading">

                <div>

                    <div class="heading-label">
                        Overview
                    </div>

                    <h2>
                        Dashboard
                    </h2>

                    <div class="page-description">
                        Kelola operasional Pizza Mozza dari satu tempat.
                    </div>

                </div>


                <!-- TAMBAH PRODUK -->

                <a
                    href="{{ route('admin.products.create') }}"
                    class="btn-primary"
                >

                    <span>
                        +
                    </span>

                    <span>
                        Tambah Produk
                    </span>

                </a>

            </div>



            <!-- =================================================
                 STATISTICS
            ================================================== -->

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
                            ✓
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



            <!-- =================================================
                 PRODUCT + QUICK ACTION
            ================================================== -->

            <div class="content-grid">


                <!-- =================================================
                     PRODUK TERBARU
                ================================================== -->

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


                        <a
                            href="{{ route('admin.products.index') }}"
                            class="panel-link"
                        >
                            Lihat semua
                        </a>

                    </div>


                    @forelse(
                        $produkTerbaru
                        as $product
                    )

                        <div class="product-item">


                            <div class="product-left">

                                <div class="product-image">

                                    @if(
                                        !empty($product->image)
                                    )

                                        <img
                                            src="{{ asset(
                                                'storage/' .
                                                $product->image
                                            ) }}"
                                            alt="{{ $product->name }}"
                                        >

                                    @else

                                        🍕

                                    @endif

                                </div>


                                <div>

                                    <div class="product-name">
                                        {{ $product->name }}
                                    </div>

                                    <div class="product-category">
                                        {{ ucfirst(
                                            $product->category
                                            ?? 'Pizza'
                                        ) }}
                                    </div>

                                </div>

                            </div>


                            <div class="product-right">

                                @php

                                    /*
                                    |--------------------------------------------------------------------------
                                    | Ambil harga termurah dari variant
                                    |--------------------------------------------------------------------------
                                    */

                                    $hargaProduk = null;

                                    if (
                                        isset($product->variants)
                                        &&
                                        $product->variants->count()
                                    ) {

                                        $hargaProduk =
                                            $product->variants
                                                ->min('price');

                                    }

                                @endphp


                                <div class="product-price">

                                    @if(
                                        $hargaProduk !== null
                                    )

                                        Rp
                                        {{ number_format(
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



                <!-- =================================================
                     QUICK ACTIONS
                ================================================== -->

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

                    <a
                        href="{{ route('admin.products.create') }}"
                        class="quick-action"
                    >

                        <div class="quick-icon">
                            <i class="bi bi-plus-lg"></i>
                        </div>

                        <div class="quick-content">

                            <div class="quick-title">
                                Tambah Produk
                            </div>

                            <div class="quick-description">
                                Tambahkan menu baru
                            </div>

                        </div>

                    </a>


                    <!-- KELOLA PESANAN -->

                    <a
                        href="{{ route('admin.orders.index') }}"
                        class="quick-action"
                    >

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

                    <a
                        href="{{ route('admin.orders.index') }}?status=pending"
                        class="quick-action"
                    >

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



            <!-- =================================================
                 PESANAN TERBARU
            ================================================== -->

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


                    <a
                        href="{{ route('admin.orders.index') }}"
                        class="panel-link"
                    >
                        Lihat semua
                    </a>

                </div>


                <div class="orders-table-wrapper">

                    <table class="orders-table">

                        <thead>

                            <tr>

                                <th>
                                    Pesanan
                                </th>

                                <th>
                                    Pelanggan
                                </th>

                                <th>
                                    Total
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse(
                                $pesananTerbaru
                                as $order
                            )

                                @php

                                    $statusClass =
                                        match ($order->status) {

                                            'pending'
                                                => 'pending',

                                            'processing'
                                                => 'processing',

                                            'shipped'
                                                => 'shipped',

                                            'completed'
                                                => 'completed',

                                            'cancelled'
                                                => 'cancelled',

                                            default
                                                => 'pending',

                                        };


                                    $statusText =
                                        match ($order->status) {

                                            'pending'
                                                => 'Pending',

                                            'processing'
                                                => 'Diproses',

                                            'shipped'
                                                => 'Dikirim',

                                            'completed'
                                                => 'Selesai',

                                            'cancelled'
                                                => 'Dibatalkan',

                                            default
                                                => ucfirst(
                                                    $order->status
                                                ),

                                        };

                                @endphp


                                <tr>

                                    <!-- ORDER -->

                                    <td>

                                        <div class="order-id">
                                            #{{ $order->id }}
                                        </div>

                                        <div
                                            style="
                                                margin-top:4px;
                                                color:#9aa0a6;
                                                font-size:10px;
                                            "
                                        >
                                            {{ $order->created_at?->format(
                                                'd M Y H:i'
                                            ) }}
                                        </div>

                                    </td>


                                    <!-- CUSTOMER -->

                                    <td>

                                        <div class="customer-name">

                                            {{ $order->user->name
                                                ?? 'Pelanggan'
                                            }}

                                        </div>

                                    </td>


                                    <!-- TOTAL -->

                                    <td>

                                        <div class="order-total">

                                            Rp
                                            {{ number_format(
                                                $order->total_price,
                                                0,
                                                ',',
                                                '.'
                                            ) }}

                                        </div>

                                    </td>


                                    <!-- STATUS -->

                                    <td>

                                        <span
                                            class="status {{ $statusClass }}"
                                        >
                                            {{ $statusText }}
                                        </span>

                                    </td>


                                    <!-- DETAIL -->

                                    <td>

                                        <a
                                            href="{{ route(
                                                'admin.orders.show',
                                                $order->id
                                            ) }}"
                                            class="detail-link"
                                        >
                                            Detail
                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="empty-state"
                                    >

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



            <!-- =================================================
                 FOOTER
            ================================================== -->

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