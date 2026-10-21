<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - PizzaMozza</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

    <style>
        /* =========================================================
           RESET
        ========================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f8fa;
            color: #222;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        select {
            font-family: inherit;
        }


        /* =========================================================
           LAYOUT
        ========================================================= */

        .admin-layout {
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;

            width: 265px;

            background: #ffffff;
            border-right: 1px solid #e8e8e8;

            display: flex;
            flex-direction: column;

            z-index: 100;
        }

        .main-wrapper {
            min-height: 100vh;
            margin-left: 265px;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .brand {
            height: 88px;

            padding: 18px 24px;

            display: flex;
            align-items: center;
            gap: 11px;

            border-bottom: 1px solid #eeeeee;
        }

        .brand-icon {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #fff0f0;

            font-size: 20px;
        }

        .brand-content h1 {
            font-size: 23px;
            font-weight: 700;

            line-height: 1.1;

            color: #f0e5da;
        }

        .brand-content p {
            margin-top: 4px;

            font-size: 11px;

            color: #999;
        }

        .sidebar-menu {
            padding: 24px 15px;
        }

        .menu-title {
            margin: 0 12px 12px;

            font-size: 10px;
            font-weight: 700;

            color: #999;

            letter-spacing: .8px;
            text-transform: uppercase;
        }

        .menu-list {
            list-style: none;
        }

        .menu-item {
            margin-bottom: 5px;
        }

        .menu-link {
            min-height: 45px;

            padding: 0 14px;

            border-radius: 9px;

            display: flex;
            align-items: center;
            gap: 12px;

            color: #555;

            font-size: 13px;
            font-weight: 600;

            transition: .2s ease;
        }

        .menu-link:hover {
            background: #fff2f2;
            color: #e5242a;
        }

        .menu-link.active {
            background: #B52D2D;
            color: #ffffff;
        }

        .menu-icon {
            width: 22px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 16px;
        }

        .sidebar-bottom {
            margin-top: auto;

            padding: 18px 16px;

            border-top: 1px solid #eeeeee;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;

            margin-bottom: 15px;

            padding: 5px 6px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;

            flex-shrink: 0;

            border-radius: 50%;

            background: #fff0f4;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #65358b;

            font-size: 17px;
        }

        .admin-info {
            min-width: 0;
        }

        .admin-info strong {
            display: block;

            font-size: 12px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .admin-info span {
            display: block;

            margin-top: 4px;

            font-size: 10px;

            color: #999;
        }

        .logout-button {
            width: 100%;
            height: 38px;

            border: 1px solid #ffbcbc;
            border-radius: 8px;

            background: #fff7f7;
            color: #e5242a;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .logout-button:hover {
            background: #ffeaea;
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

        .topbar {
            height: 72px;

            padding: 0 34px;

            background: #ffffff;

            border-bottom: 1px solid #e8e8e8;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar-title {
            font-size: 13px;
            color: #777;
        }

        .topbar-admin {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-admin-info {
            text-align: right;
        }

        .topbar-admin-info strong {
            display: block;

            font-size: 13px;
            font-weight: 700;
        }

        .topbar-admin-info span {
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

            color: #65358b;

            font-size: 16px;
        }


        /* =========================================================
           CONTENT
        ========================================================= */

        .content {
            width: 100%;
            max-width: 1280px;

            margin: 0 auto;

            padding: 32px 34px 50px;
        }

        .page-heading {
            margin-bottom: 26px;

            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
        }

        .heading-label {
            margin-bottom: 7px;

            color: #ed1c24;

            font-size: 12px;
            font-weight: 700;
        }

        .page-heading h2 {
            font-size: 30px;
            font-weight: 700;

            line-height: 1.2;

            color: #181818;
        }

        .page-heading p {
            margin-top: 7px;

            color: #8a8a8a;

            font-size: 13px;
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            min-height: 41px;

            padding: 0 18px;

            border: 0;
            border-radius: 8px;

            background: #ed1c24;
            color: #ffffff;

            font-size: 12px;
            font-weight: 700;

            transition: .2s ease;
        }

        .primary-button:hover {
            background: #c9181f;
            transform: translateY(-1px);
        }


        /* =========================================================
           STATISTICS
        ========================================================= */

        .stats-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 30px;
        }

        .stat-card {
            position: relative;

            min-height: 155px;

            padding: 21px;

            background: #ffffff;

            border: 1px solid #e5e5e5;

            border-radius: 14px;
        }

        .stat-card.red {
            border-color: #ffc9cb;
        }

        .stat-card.blue {
            border-color: #cfe0ff;
        }

        .stat-card.orange {
            border-color: #f3dfc9;
        }

        .stat-card.green {
            border-color: #cdebd9;
        }

        .stat-title {
            color: #777;

            font-size: 12px;
        }

        .stat-icon {
            position: absolute;

            top: 20px;
            right: 20px;

            width: 43px;
            height: 43px;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 17px;
        }

        .stat-card.red .stat-icon {
            background: #fff0f1;
            color: #65358b;
        }

        .stat-card.blue .stat-icon {
            background: #edf4ff;
            color: #65358b;
        }

        .stat-card.orange .stat-icon {
            background: #fff3e7;
            color: #9a6b35;
        }

        .stat-card.green .stat-icon {
            background: #eaf8f0;
            color: #1c9b55;
        }

        .stat-number {
            margin-top: 31px;

            font-size: 29px;
            font-weight: 700;

            color: #181818;
        }

        .stat-description {
            margin-top: 8px;

            color: #999;

            font-size: 11px;
        }


        /* =========================================================
           MAIN DASHBOARD GRID
        ========================================================= */

        .dashboard-grid {
            display: grid;

            grid-template-columns: minmax(0, 1.65fr) minmax(300px, .9fr);

            gap: 22px;

            align-items: start;
        }

        .panel {
            background: #ffffff;

            border: 1px solid #e3e3e3;

            border-radius: 14px;

            overflow: hidden;
        }

        .panel-header {
            min-height: 78px;

            padding: 18px 24px;

            border-bottom: 1px solid #eeeeee;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .panel-header h3 {
            font-size: 16px;
            font-weight: 700;
        }

        .panel-header p {
            margin-top: 5px;

            font-size: 11px;

            color: #999;
        }

        .panel-link {
            color: #ed1c24;

            font-size: 11px;
            font-weight: 700;
        }


        /* =========================================================
           PRODUCT LIST
        ========================================================= */

        .product-list {
            padding: 0 24px;
        }

        .product-row {
            min-height: 82px;

            display: flex;
            align-items: center;
            gap: 14px;

            border-bottom: 1px solid #eeeeee;
        }

        .product-row:last-child {
            border-bottom: 0;
        }

        .product-thumbnail {
            width: 48px;
            height: 48px;

            flex-shrink: 0;

            border-radius: 9px;

            background: #f5f6f7;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .product-thumbnail img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .product-placeholder {
            font-size: 22px;
        }

        .product-data {
            flex: 1;

            min-width: 0;
        }

        .product-data strong {
            display: block;

            margin-bottom: 4px;

            font-size: 13px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-data span {
            display: block;

            font-size: 10px;

            color: #999;
        }

        .product-price {
            text-align: right;
        }

        .product-price strong {
            display: block;

            font-size: 12px;
        }

        .product-price span {
            display: block;

            margin-top: 4px;

            color: #ed1c24;

            font-size: 10px;
        }

        .empty-product {
            padding: 35px 20px;

            text-align: center;

            color: #999;

            font-size: 12px;
        }


        /* =========================================================
           QUICK ACTIONS
        ========================================================= */

        .quick-actions {
            padding: 8px 20px 15px;
        }

        .quick-action {
            min-height: 68px;

            display: flex;
            align-items: center;
            gap: 12px;

            padding: 10px;

            border-bottom: 1px solid #eeeeee;

            transition: .2s ease;
        }

        .quick-action:last-child {
            border-bottom: 0;
        }

        .quick-action:hover {
            background: #fafafa;
        }

        .quick-action-icon {
            width: 39px;
            height: 39px;

            flex-shrink: 0;

            border-radius: 9px;

            background: #fff0f1;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #ed1c24;

            font-size: 16px;
        }

        .quick-action-content {
            flex: 1;
        }

        .quick-action-content strong {
            display: block;

            font-size: 12px;
            font-weight: 700;

            color: #333;
        }

        .quick-action-content span {
            display: block;

            margin-top: 4px;

            color: #999;

            font-size: 10px;
        }

        .quick-action-arrow {
            color: #bbb;

            font-size: 17px;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1150px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {

            .sidebar {
                width: 220px;
            }

            .main-wrapper {
                margin-left: 220px;
            }

            .content {
                padding: 25px 20px 40px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 600px) {

            .sidebar {
                position: relative;

                width: 100%;
                min-height: auto;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .admin-layout {
                display: block;
            }

            .topbar {
                padding: 0 18px;
            }

            .content {
                padding: 22px 15px 35px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .page-heading h2 {
                font-size: 25px;
            }
        }
        
/* ===== TEMA DASHBOARD PIZZAMOZZA ===== */

/* ===== WARNA SIDEBAR ADMIN PIZZAMOZZA ===== */

:root {
    --dashboard-red: #941919;
    --dashboard-red-hover: #b52d2d;
    --dashboard-bg: #fffaf3;
    --dashboard-border: #f0e1d5;
    --dashboard-text: #34241f;
}

/* Latar sidebar merah marun */
.sidebar {
    background: #941919;
    border-right: none;
}

/* Garis pemisah brand */
.brand {
    border-bottom-color: rgba(255, 255, 255, 0.15);
}

/* Logo dan judul */
.brand-icon {
    background: #b52d2d;
    color: #ffffff;
}

.brand-content h1 {
    color: #ffffff;
}

.brand-content p,
.menu-title {
    color: #f5dede;
}

/* Menu biasa */
.menu-link {
    color: #ffffff;
    background: transparent;
}

/* Hover dan tombol menu aktif */
.menu-link:hover,
.menu-link.active {
    background: #b52d2d;
    color: #ffffff;
}

/* Bagian profil admin */
.sidebar-bottom {
    border-top-color: rgba(255, 255, 255, 0.15);
}

.admin-info strong {
    color: #ffffff;
}

.admin-info span {
    color: #f5dede;
}

.admin-avatar {
    background: #b52d2d;
    color: #ffffff;
}

/* Tombol keluar */
.logout-button {
    border-color: rgba(255, 255, 255, 0.4);
    background: #ffffff;
    color: #941919;
}

.logout-button:hover {
    background: #f5dede;
    color: #941919;
}


@media (max-width: 600px) {
    .sidebar {
        position: relative;
        width: 100%;
        min-height: auto;
    }

    .main-wrapper {
        margin-left: 0;
    }
}


/* ===== POPUP KONFIRMASI LOGOUT ===== */
.logout-modal {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(35, 15, 15, 0.55);
}

.logout-modal.show {
    display: flex;
}

.logout-dialog {
    width: 100%;
    max-width: 380px;
    padding: 30px 25px;
    text-align: center;
    background: #fffaf3;
    border: 1px solid #f0e1d5;
    border-radius: 18px;
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
    animation: popupFadeIn 0.2s ease;
}

.logout-modal-icon {
    width: 65px;
    height: 65px;
    margin: 0 auto 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #f8e5e2;
    color: #941919;
    font-size: 28px;
}

.logout-dialog h3 {
    margin-bottom: 10px;
    color: #34241f;
    font-size: 21px;
}

.logout-dialog p {
    margin-bottom: 24px;
    color: #81716a;
    font-size: 13px;
    line-height: 1.6;
}

.logout-modal-actions {
    display: flex;
    gap: 10px;
}

.logout-modal-actions button {
    flex: 1;
    min-height: 42px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.2s ease;
}

.cancel-logout {
    border: 1px solid #e5d4c9;
    background: #ffffff;
    color: #59453d;
}

.cancel-logout:hover {
    background: #f5ebe3;
}

.confirm-logout {
    border: none;
    background: #941919;
    color: #ffffff;
}

.confirm-logout:hover {
    background: #b52d2d;
}

@keyframes popupFadeIn {
    from {
        opacity: 0;
        transform: translateY(10px) scale(0.98);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

    </style>
</head>


<body>

<div class="admin-layout">

    {{-- =========================================================
         SIDEBAR
    ========================================================== --}}

    <aside class="sidebar">

        {{-- BRAND --}}
        <div class="brand">

            <div class="brand-icon">
    <i class="bi bi-egg-fried"></i>
</div>

            <div class="brand-content">

                <h1>
                    PizzaMozza
                </h1>

                <p>
                    Admin Dashboard
                </p>

            </div>

        </div>


        {{-- MENU --}}
        <nav class="sidebar-menu">

            <div class="menu-title">
                Main Menu
            </div>

            <ul class="menu-list">

                {{-- DASHBOARD --}}
                <li class="menu-item">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="menu-link active"
                    >

                        <span class="menu-icon">
    <i class="bi bi-grid-1x2"></i>
</span>

                        <span>
                            Dashboard
                        </span>

                    </a>

                </li>


                {{-- DATA KARYAWAN --}}
                <li class="menu-item">

                    <a
                        href="{{ route('admin.employees.index') }}"
                        class="menu-link"
                    >

                        <span class="menu-icon">
    <i class="bi bi-people"></i>
</span>

                        <span>
                            Data Karyawan
                        </span>

                    </a>

                </li>


                {{-- DATA PELANGGAN --}}
                <li class="menu-item">

                    <a
                        href="{{ route('admin.customers.index') }}"
                        class="menu-link"
                    >

                        <span class="menu-icon">
    <i class="bi bi-people"></i>
</span>

                        <span>
                            Data Pelanggan
                        </span>

                    </a>

                </li>


                {{-- DATA PRODUK --}}
                <li class="menu-item">

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="menu-link"
                    >

                        <span class="menu-icon">
    <i class="bi bi-box-seam"></i>
</span>

                        <span>
                            Data Produk
                        </span>

                    </a>

                </li>


                {{-- PESANAN --}}
                <li class="menu-item">

                    <a
                        href="{{ route('admin.orders.index') }}"
                        class="menu-link"
                    >

                        <span class="menu-icon">
    <i class="bi bi-receipt"></i>
</span>

                        <span>
                            Pesanan
                        </span>

                    </a>

                </li>

            </ul>

        </nav>


        {{-- SIDEBAR BOTTOM --}}
        <div class="sidebar-bottom">

            <div class="admin-profile">

                <div class="admin-avatar">
    <i class="bi bi-person"></i>
</div>

                <div class="admin-info">

                    <strong>
                        {{ auth()->user()->name ?? 'Admin PizzaMozza' }}
                    </strong>

                    <span>
                        PizzaMozza
                    </span>

                </div>

            </div>


            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button type="button" class="logout-button" onclick="openLogoutModal()">
    <i class="bi bi-box-arrow-right"></i>
    Keluar
</button>

            </form>

        </div>

    </aside>


    {{-- =========================================================
         MAIN
    ========================================================== --}}

    <div class="main-wrapper">

        {{-- TOPBAR --}}
        <header class="topbar">

            <div class="topbar-title">
                Management System
            </div>


            <div class="topbar-admin">

                <div class="topbar-admin-info">

                    <strong>
                        {{ auth()->user()->name ?? 'Admin PizzaMozza' }}
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>


                <div class="topbar-avatar">
                    👤
                </div>

            </div>

        </header>


        {{-- CONTENT --}}
        <main class="content">

            {{-- PAGE HEADING --}}
            <div class="page-heading">

                <div>

                    <div class="heading-label">
                        Overview
                    </div>

                    <h2>
                        Dashboard
                    </h2>

                    <p>
                        Kelola operasional PizzaMozza dari satu tempat.
                    </p>

                </div>


                <a
                    href="{{ route('admin.products.create') }}"
                    class="primary-button"
                >
                    <span>＋</span>
                    <span>Tambah Produk</span>
                </a>

            </div>


            {{-- =================================================
                 STATISTICS
            ================================================== --}}

            <section class="stats-grid">

                {{-- TOTAL ADMIN --}}
                <div class="stat-card red">

                    <div class="stat-title">
                        Total Admin
                    </div>

                    <div class="stat-icon">
                        👤
                    </div>

                    <div class="stat-number">
                        {{ $totalAdmin }}
                    </div>

                    <div class="stat-description">
                        Administrator sistem
                    </div>

                </div>


                {{-- TOTAL KARYAWAN --}}
                <div class="stat-card blue">

                    <div class="stat-title">
                        Total Karyawan
                    </div>

                    <div class="stat-icon">
                        👥
                    </div>

                    <div class="stat-number">
                        {{ $totalKaryawan }}
                    </div>

                    <div class="stat-description">
                        Data karyawan aktif
                    </div>

                </div>


                {{-- TOTAL PRODUK --}}
                <div class="stat-card orange">

                    <div class="stat-title">
                        Total Produk
                    </div>

                    <div class="stat-icon">
                        📋
                    </div>

                    <div class="stat-number">
                        {{ $totalProduk }}
                    </div>

                    <div class="stat-description">
                        Menu yang tersedia
                    </div>

                </div>


                {{-- READY STOCK --}}
                <div class="stat-card green">

                    <div class="stat-title">
                        Ready Stock
                    </div>

                    <div class="stat-icon">
                        ✓
                    </div>

                    <div class="stat-number">
                        {{ $readyStock }}
                    </div>

                    <div class="stat-description">
                        Produk siap dijual
                    </div>

                </div>

            </section>


            {{-- =================================================
                 LOWER DASHBOARD
            ================================================== --}}

            <section class="dashboard-grid">

                {{-- =================================================
                     PRODUK TERBARU
                ================================================== --}}

                <div class="panel">

                    <div class="panel-header">

                        <div>

                            <h3>
                                Produk Terbaru
                            </h3>

                            <p>
                                Menu yang terakhir ditambahkan
                            </p>

                        </div>


                        <a
                            href="{{ route('admin.products.index') }}"
                            class="panel-link"
                        >
                            Lihat semua
                        </a>

                    </div>


                    <div class="product-list">

                        @forelse($produkTerbaru as $product)

                            @php

                                $variant = $product->variants->first() ?? null;

                                $price = $variant?->price
                                    ?? $product->price
                                    ?? 0;

                            @endphp


                            <div class="product-row">

                                {{-- IMAGE --}}
                                <div class="product-thumbnail">

                                    @if(!empty($product->image))

                                        <img
                                            src="{{ asset('image/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                        >

                                    @else

                                        <div class="product-placeholder">
                                            🍕
                                        </div>

                                    @endif

                                </div>


                                {{-- PRODUCT INFO --}}
                                <div class="product-data">

                                    <strong>
                                        {{ $product->name }}
                                    </strong>

                                    <span>
                                        Pizza
                                    </span>

                                </div>


                                {{-- PRICE --}}
                                <div class="product-price">

                                    <strong>
                                        Rp {{ number_format($price, 0, ',', '.') }}
                                    </strong>

                                    <span>
                                        Pre-order
                                    </span>

                                </div>

                            </div>

                        @empty

                            <div class="empty-product">
                                Belum ada produk.
                            </div>

                        @endforelse

                    </div>

                </div>


                {{-- =================================================
                     QUICK ACTIONS
                ================================================== --}}

                <div class="panel">

                    <div class="panel-header">

                        <div>

                            <h3>
                                Quick Actions
                            </h3>

                            <p>
                                Akses cepat pengelolaan data
                            </p>

                        </div>

                    </div>


                    <div class="quick-actions">

                        {{-- TAMBAH PRODUK --}}
                        <a
                            href="{{ route('admin.products.create') }}"
                            class="quick-action"
                        >

                            <div class="quick-action-icon">
                                ＋
                            </div>

                            <div class="quick-action-content">

                                <strong>
                                    Tambah Produk
                                </strong>

                                <span>
                                    Tambahkan menu baru
                                </span>

                            </div>

                            <div class="quick-action-arrow">
                                ›
                            </div>

                        </a>


                        {{-- KELOLA KARYAWAN --}}
                        <a
                            href="{{ route('admin.employees.index') }}"
                            class="quick-action"
                        >

                            <div class="quick-action-icon">
                                👥
                            </div>

                            <div class="quick-action-content">

                                <strong>
                                    Kelola Karyawan
                                </strong>

                                <span>
                                    Data karyawan PizzaMozza
                                </span>

                            </div>

                            <div class="quick-action-arrow">
                                ›
                            </div>

                        </a>


                        {{-- KELOLA PELANGGAN --}}
                        <a
                            href="{{ route('admin.customers.index') }}"
                            class="quick-action"
                        >

                            <div class="quick-action-icon">
                                👤
                            </div>

                            <div class="quick-action-content">

                                <strong>
                                    Kelola Pelanggan
                                </strong>

                                <span>
                                    Master data pelanggan
                                </span>

                            </div>

                            <div class="quick-action-arrow">
                                ›
                            </div>

                        </a>


                        {{-- KELOLA PESANAN --}}
                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="quick-action"
                        >

                            <div class="quick-action-icon">
                                🛒
                            </div>

                            <div class="quick-action-content">

                                <strong>
                                    Kelola Pesanan
                                </strong>

                                <span>
                                    Lihat dan proses pesanan
                                </span>

                            </div>

                            <div class="quick-action-arrow">
                                ›
                            </div>

                        </a>


                        {{-- KELOLA PRODUK --}}
                        <a
                            href="{{ route('admin.products.index') }}"
                            class="quick-action"
                        >

                            <div class="quick-action-icon">
                                📋
                            </div>

                            <div class="quick-action-content">

                                <strong>
                                    Data Produk
                                </strong>

                                <span>
                                    Kelola seluruh menu
                                </span>

                            </div>

                            <div class="quick-action-arrow">
                                ›
                            </div>

                        </a>

                    </div>

                </div>

            </section>

        </main>

    </div>

</div>

<!-- POPUP KONFIRMASI LOGOUT -->
<div class="logout-modal" id="logoutModal">
    <div class="logout-dialog" role="dialog"
         aria-modal="true" aria-labelledby="logoutTitle">

        <div class="logout-modal-icon">
            <i class="bi bi-box-arrow-right"></i>
        </div>

        <h3 id="logoutTitle">Keluar dari Akun?</h3>

        <p>
            Apakah kamu yakin ingin keluar dari dashboard admin PizzaMozza?
        </p>

        <div class="logout-modal-actions">
            <button type="button"
                    class="cancel-logout"
                    onclick="closeLogoutModal()">
                Batal
            </button>

            <button type="button"
                    class="confirm-logout"
                    onclick="confirmLogout()">
                Ya, Keluar
            </button>
        </div>
    </div>
</div>

<script>
    function openLogoutModal() {
        document.getElementById('logoutModal').classList.add('show');
    }

    function closeLogoutModal() {
        document.getElementById('logoutModal').classList.remove('show');
    }

    function confirmLogout() {
        document.querySelector('.sidebar-bottom form').submit();
    }

    document.getElementById('logoutModal').addEventListener('click', function (event) {
        if (event.target === this) {
            closeLogoutModal();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeLogoutModal();
        }
    });
</script>

</body>

</html>