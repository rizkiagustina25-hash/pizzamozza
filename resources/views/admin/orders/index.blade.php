<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Pesanan - PizzaMozza</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --red: #941919;
            --red-hover: #b52d2d;
            --accent: #941919;
            --background: #f7f8fa;
            --border: #e8e8e8;
            --text: #34241f;
            --muted: #888;
        }

        body {
            font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
            background: var(--background);
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

        /* =====================================
           LAYOUT
        ===================================== */

        .admin-layout {
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 265px;
            background: var(--red);
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .main-wrapper {
            min-height: 100vh;
            margin-left: 265px;
        }

        /* =====================================
           BRAND
        ===================================== */

        .brand {
            height: 88px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 11px;
            border-bottom: 1px solid rgba(255, 255, 255, .15);
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--red-hover);
            color: #fff;
            font-size: 20px;
            flex-shrink: 0;
        }

        .brand-content h1 {
            color: #fff;
            font-size: 23px;
            font-weight: 700;
            line-height: 1.1;
        }

        .brand-content p {
            margin-top: 4px;
            font-size: 11px;
            color: #f5dede;
        }

        /* =====================================
           SIDEBAR MENU
        ===================================== */

        .sidebar-menu {
            padding: 24px 15px;
        }

        .menu-title {
            margin: 0 12px 12px;
            font-size: 10px;
            font-weight: 700;
            color: #f5dede;
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
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .menu-link:hover,
        .menu-link.active {
            background: var(--red-hover);
            color: #fff;
        }

        .menu-icon {
            width: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        /* =====================================
           SIDEBAR PROFILE
        ===================================== */

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px 16px;
            border-top: 1px solid rgba(255, 255, 255, .15);
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
            background: var(--red-hover);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 17px;
        }

        .admin-info {
            min-width: 0;
        }

        .admin-info strong {
            display: block;
            font-size: 12px;
            color: #fff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .admin-info span {
            display: block;
            margin-top: 4px;
            font-size: 10px;
            color: #f5dede;
        }

        .logout-button {
            width: 100%;
            height: 38px;
            border: 1px solid rgba(255, 255, 255, .4);
            border-radius: 8px;
            background: #fff;
            color: var(--red);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
        }

        .logout-button:hover {
            background: #f5dede;
        }

        /* =====================================
           TOPBAR
        ===================================== */

        .topbar {
            min-height: 72px;
            padding: 12px 34px;
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .topbar-title {
            color: #777;
            font-size: 13px;
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
        }

        .topbar-admin-info span {
            display: block;
            margin-top: 3px;
            color: #999;
            font-size: 10px;
        }

        .topbar-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #fff0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--red);
            font-size: 16px;
        }

        /* =====================================
           CONTENT
        ===================================== */

        .content {
            width: 100%;
            max-width: 1500px;
            margin: 0 auto;
            padding: 32px 34px 50px;
        }

        .page-heading {
            margin-bottom: 26px;
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
            line-height: 1.6;
        }

        /* =====================================
           ALERT
        ===================================== */

        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 17px;
            margin-bottom: 22px;
            border: 1px solid #cdebd9;
            border-radius: 10px;
            background: #eaf8f0;
            color: #237642;
            font-size: 13px;
        }

        /* =====================================
           FILTER
        ===================================== */

        .panel {
            background: #fff;
            border: 1px solid #e3e3e3;
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 22px;
        }

        .panel-header {
            min-height: 76px;
            padding: 18px 24px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
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

        .filter-form {
            display: grid;
            grid-template-columns:
                minmax(180px, 1.5fr)
                minmax(145px, .8fr)
                minmax(165px, .9fr)
                auto auto;
            gap: 10px;
            padding: 20px 24px;
        }

        .input,
        .select {
            width: 100%;
            height: 42px;
            padding: 0 12px;
            border: 1px solid #dedede;
            border-radius: 8px;
            outline: none;
            background: #fff;
            color: #333;
            font-size: 12px;
            transition: .2s ease;
        }

        .input:focus,
        .select:focus {
            border-color: var(--red-hover);
            box-shadow: 0 0 0 3px rgba(181, 45, 45, .08);
        }

        .filter-button,
        .reset-button {
            min-height: 42px;
            padding: 0 16px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
            white-space: nowrap;
        }

        .filter-button {
            border: 0;
            background: var(--red);
            color: #fff;
        }

        .filter-button:hover {
            background: var(--red-hover);
        }

        .reset-button {
            border: 1px solid #e5d4c9;
            background: #fff;
            color: #59453d;
        }

        .reset-button:hover {
            background: #f5ebe3;
        }

        /* =====================================
           TABLE
        ===================================== */

        .table-panel {
            background: #fff;
            border: 1px solid #e3e3e3;
            border-radius: 14px;
            overflow: hidden;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1000px;
            border-collapse: collapse;
        }

        thead {
            background: #faf3f1;
        }

        th {
            padding: 16px 17px;
            text-align: left;
            color: #776a64;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .45px;
            white-space: nowrap;
            border: 1px solid #eee5df;
        }

        td {
            padding: 17px;
            border: 1px solid #e9e3e0;
            vertical-align: middle;
            font-size: 12px;
        }

        tbody tr {
            transition: background .15s ease;
        }

        tbody tr:nth-child(even) {
            background: #fcf9f8;
        }

        tbody tr:hover {
            background: #fff1ef;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .order-number {
            color: var(--red);
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .customer {
            max-width: 190px;
            margin-bottom: 5px;
            color: #333;
            font-size: 12px;
            font-weight: 700;
        }

        .customer-email {
            color: #999;
            font-size: 10px;
            overflow-wrap: anywhere;
        }

        .product-count {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #66564e;
            white-space: nowrap;
        }

        .product-count i {
            color: var(--red-hover);
        }

        .total {
            color: #29201d;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* =====================================
           STATUS
        ===================================== */

        .status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-pending {
            background: #fff2ca;
            color: #a66f00;
        }

        .status-processing {
            background: #e6f2ff;
            color: #2773ad;
        }

        .status-shipped {
            background: #fff0d7;
            color: #c47a00;
        }

        .status-completed {
            background: #e4f7eb;
            color: #27814c;
        }

        .status-cancelled {
            background: #eee;
            color: #666;
        }

        .payment-paid {
            color: #27814c;
            font-weight: 700;
            white-space: nowrap;
        }

        .payment-pending {
            color: #b77b00;
            font-weight: 700;
            white-space: nowrap;
        }

        .date-text {
            color: #655b56;
            font-size: 11px;
            line-height: 1.7;
            white-space: nowrap;
        }

        /* =====================================
           DETAIL BUTTON
        ===================================== */

        .detail-button {
            min-height: 35px;
            padding: 0 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            border: 1px solid var(--red);
            border-radius: 8px;
            color: var(--red);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
            transition: .2s ease;
        }

        .detail-button:hover {
            background: var(--red);
            color: #fff;
        }

        /* =====================================
           EMPTY STATE
        ===================================== */

        .empty {
            padding: 55px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 17px;
            border-radius: 50%;
            background: #fff0f0;
            color: var(--red);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        .empty strong {
            display: block;
            color: #34241f;
            font-size: 15px;
        }

        .empty p {
            margin-top: 8px;
            color: #999;
            font-size: 12px;
            line-height: 1.6;
        }

        /* =====================================
           LOGOUT MODAL
        ===================================== */

        .logout-modal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(35, 15, 15, .55);
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
            box-shadow: 0 15px 45px rgba(0, 0, 0, .2);
            animation: popupFadeIn .2s ease;
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
            color: var(--red);
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
            transition: .2s ease;
        }

        .cancel-logout {
            border: 1px solid #e5d4c9;
            background: #fff;
            color: #59453d;
        }

        .cancel-logout:hover {
            background: #f5ebe3;
        }

        .confirm-logout {
            border: none;
            background: var(--red);
            color: #fff;
        }

        .confirm-logout:hover {
            background: var(--red-hover);
        }

        @keyframes popupFadeIn {
            from {
                opacity: 0;
                transform: translateY(10px) scale(.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* =====================================
           RESPONSIVE
        ===================================== */

        @media (max-width: 1250px) {
            .filter-form {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .search-input {
                grid-column: 1 / -1;
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

            .topbar {
                padding: 12px 20px;
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

            .sidebar-menu {
                padding: 12px 15px;
            }

            .sidebar-bottom {
                margin-top: 0;
            }

            .topbar {
                padding: 12px 15px;
            }

            .topbar-title {
                font-size: 11px;
            }

            .content {
                padding: 22px 14px 35px;
            }

            .page-heading h2 {
                font-size: 25px;
            }

            .filter-form {
                grid-template-columns: 1fr;
                padding: 16px;
            }

            .search-input {
                grid-column: auto;
            }

            .panel-header {
                padding: 17px;
            }

            .table-panel {
                border-radius: 10px;
            }
        }
    </style>
</head>

<body>

<div class="admin-layout">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        {{-- BRAND --}}
        <div class="brand">

            <div class="brand-icon">
                <i class="fa-solid fa-pizza-slice"></i>
            </div>

            <div class="brand-content">
                <h1>PizzaMozza</h1>

                <p>
                    {{ auth()->user()->role === 'admin'
                        ? 'Admin Dashboard'
                        : 'Karyawan Dashboard' }}
                </p>
            </div>

        </div>

        {{-- MENU --}}
        <nav class="sidebar-menu">

            <div class="menu-title">Main Menu</div>

            <ul class="menu-list">

                @if(auth()->user()->role === 'admin')

                    <li class="menu-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="menu-link">

                            <span class="menu-icon">
                                <i class="bi bi-grid-1x2"></i>
                            </span>

                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.employees.index') }}"
                            class="menu-link">

                            <span class="menu-icon">
                                <i class="bi bi-people"></i>
                            </span>

                            <span>Data Karyawan</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.customers.index') }}"
                            class="menu-link">

                            <span class="menu-icon">
                                <i class="bi bi-people"></i>
                            </span>

                            <span>Data Pelanggan</span>
                        </a>
                    </li>

                @else

                    <li class="menu-item">
                        <a href="{{ route('karyawan.dashboard') }}"
                            class="menu-link">

                            <span class="menu-icon">
                                <i class="bi bi-grid-1x2"></i>
                            </span>

                            <span>Dashboard</span>
                        </a>
                    </li>

                @endif

                <li class="menu-item">

                    <a href="{{ auth()->user()->role === 'admin'
                        ? route('admin.products.index')
                        : route('karyawan.products.index') }}"
                        class="menu-link">

                        <span class="menu-icon">
                            <i class="bi bi-box-seam"></i>
                        </span>

                        <span>Data Produk</span>
                    </a>

                </li>

                <li class="menu-item">

                    <a href="{{ auth()->user()->role === 'admin'
                        ? route('admin.orders.index')
                        : route('karyawan.orders.index') }}"
                        class="menu-link {{ request()->routeIs('admin.orders.*', 'karyawan.orders.*') ? 'active' : '' }}">

                        <span class="menu-icon">
                            <i class="bi bi-receipt"></i>
                        </span>

                        <span>Pesanan</span>
                    </a>

                </li>

                {{-- LAPORAN PENJUALAN KHUSUS ADMIN --}}
                @if(auth()->user()->role === 'admin')

                    <li class="menu-item">

                        <a href="{{ route('admin.sales-report.index') }}"
                            class="menu-link {{ request()->routeIs('admin.sales-report.*') ? 'active' : '' }}">

                            <span class="menu-icon">
                                <i class="bi bi-bar-chart-line"></i>
                            </span>

                            <span>Laporan Penjualan</span>
                        </a>

                    </li>

                @endif

            </ul>

        </nav>

        {{-- PROFILE DAN LOGOUT --}}
        <div class="sidebar-bottom">

            <div class="admin-profile">

                <div class="admin-avatar">
                    <i class="bi bi-person"></i>
                </div>

                <div class="admin-info">

                    <strong>
                        {{ auth()->user()->name ?? 'Pengguna PizzaMozza' }}
                    </strong>

                    <span>
                        {{ auth()->user()->role === 'admin'
                            ? 'Administrator'
                            : 'Karyawan' }}
                    </span>

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

    {{-- MAIN CONTENT --}}
    <div class="main-wrapper">

        {{-- TOPBAR --}}
        <header class="topbar">

            <div class="topbar-title"></div>

            <div class="topbar-admin">

                <div class="topbar-admin-info">

                    <strong>
                        {{ auth()->user()->name ?? 'Pengguna PizzaMozza' }}
                    </strong>

                    <span>
                        {{ auth()->user()->role === 'admin'
                            ? 'Administrator'
                            : 'Karyawan' }}
                    </span>

                </div>

                <div class="topbar-avatar">
                    <i class="bi bi-person"></i>
                </div>

            </div>

        </header>

        <main class="content">

            {{-- PAGE HEADING --}}
            <div class="page-heading">

                <h2>Kelola Pesanan</h2>

                <p>
                    Lihat, cari, dan pantau pesanan pelanggan PizzaMozza.
                </p>

            </div>

            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))

                <div class="alert" role="status">

                    <i class="bi bi-check-circle-fill"></i>

                    <span>{{ session('success') }}</span>

                </div>

            @endif

            {{-- VALIDATION ERRORS --}}
            @if($errors->any())

                <div class="alert"
                    role="alert"
                    style="background:#fff0ef;border-color:#efc5c2;color:#9b2424;">

                    <i class="bi bi-exclamation-circle-fill"></i>

                    <div>

                        <strong>Terjadi kesalahan:</strong>

                        <ul style="margin:8px 0 0 18px;line-height:1.7;">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                </div>

            @endif

            {{-- FILTER PANEL --}}
            <section class="panel">

                <div class="panel-header">

                    <div>

                        <h3>
                            <i class="bi bi-funnel"></i>
                            Pencarian dan Filter
                        </h3>

                        <p>
                            Temukan pesanan berdasarkan pelanggan,
                            status, atau pembayaran.
                        </p>

                    </div>

                </div>

                <form action="{{ auth()->user()->role === 'admin'
                    ? route('admin.orders.index')
                    : route('karyawan.orders.index') }}"
                    method="GET"
                    class="filter-form">

                    <input type="text"
                        name="search"
                        class="input search-input"
                        value="{{ request('search') }}"
                        placeholder="Cari nama pelanggan / ID pesanan..."
                        aria-label="Cari pesanan">

                    <select name="status"
                        class="select"
                        aria-label="Filter status pesanan">

                        <option value="">Semua Status</option>

                        <option value="pending"
                            {{ request('status') === 'pending' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="processing"
                            {{ request('status') === 'processing' ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="shipped"
                            {{ request('status') === 'shipped' ? 'selected' : '' }}>
                            Dikirim
                        </option>

                        <option value="completed"
                            {{ request('status') === 'completed' ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="cancelled"
                            {{ request('status') === 'cancelled' ? 'selected' : '' }}>
                            Dibatalkan
                        </option>

                    </select>

                    <select name="payment_status"
                        class="select"
                        aria-label="Filter status pembayaran">

                        <option value="">Semua Pembayaran</option>

                        <option value="pending"
                            {{ request('payment_status') === 'pending' ? 'selected' : '' }}>
                            Belum Dibayar
                        </option>

                        <option value="paid"
                            {{ request('payment_status') === 'paid' ? 'selected' : '' }}>
                            Sudah Dibayar
                        </option>

                    </select>

                    <button type="submit" class="filter-button">

                        <i class="bi bi-search"></i>
                        Filter

                    </button>

                    <a href="{{ auth()->user()->role === 'admin'
                        ? route('admin.orders.index')
                        : route('karyawan.orders.index') }}"
                        class="reset-button">

                        <i class="bi bi-arrow-counterclockwise"></i>
                        Reset

                    </a>

                </form>

            </section>

            {{-- ORDERS TABLE --}}
            <section class="table-panel">

                <div class="panel-header">

                    <div>

                        <h3>
                            <i class="bi bi-receipt"></i>
                            Daftar Pesanan
                        </h3>

                        <p>
                            Informasi pesanan pelanggan yang tercatat di sistem.
                        </p>

                    </div>

                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>
                                <th>PESANAN</th>
                                <th>PELANGGAN</th>
                                <th>PRODUK</th>
                                <th>TOTAL</th>
                                <th>STATUS</th>
                                <th>PEMBAYARAN</th>
                                <th>TANGGAL</th>
                                <th>AKSI</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($orders as $order)

                                <tr>

                                    {{-- NOMOR PESANAN --}}
                                    <td>

                                        <div class="order-number">
                                            #PM{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                                        </div>

                                    </td>

                                    {{-- PELANGGAN --}}
                                    <td>

                                        <div class="customer">
                                            {{ $order->user->name ?? 'Pelanggan' }}
                                        </div>

                                        <div class="customer-email">
                                            {{ $order->user->email ?? '-' }}
                                        </div>

                                    </td>

                                    {{-- JUMLAH PRODUK --}}
                                    <td>

                                        <span class="product-count">

                                            <i class="bi bi-bag"></i>

                                            {{ $order->items->count() }} produk

                                        </span>

                                    </td>

                                    {{-- TOTAL HARGA --}}
                                    <td>

                                        <div class="total">

                                            Rp{{ number_format(
                                                $order->total_price,
                                                0,
                                                ',',
                                                '.'
                                            ) }}

                                        </div>

                                    </td>

                                    {{-- STATUS PESANAN --}}
                                    <td>

                                        @if($order->status === 'pending')

                                            <span class="status status-pending">
                                                Menunggu
                                            </span>

                                        @elseif($order->status === 'processing')

                                            <span class="status status-processing">
                                                Diproses
                                            </span>

                                        @elseif($order->status === 'shipped')

                                            <span class="status status-shipped">
                                                Dikirim
                                            </span>

                                        @elseif($order->status === 'completed')

                                            <span class="status status-completed">
                                                Selesai
                                            </span>

                                        @else

                                            <span class="status status-cancelled">
                                                Dibatalkan
                                            </span>

                                        @endif

                                    </td>

                                    {{-- STATUS PEMBAYARAN --}}
                                    <td>

                                        @if($order->payment_status === 'paid')

                                            <span class="payment-paid">

                                                <i class="bi bi-check-circle-fill"></i>
                                                Dibayar

                                            </span>

                                        @else

                                            <span class="payment-pending">

                                                <i class="bi bi-clock"></i>
                                                Menunggu

                                            </span>

                                        @endif

                                    </td>

                                    {{-- TANGGAL --}}
                                    <td>

                                        <div class="date-text">

                                            {{ $order->created_at->format('d/m/Y') }}

                                            <br>

                                            {{ $order->created_at->format('H:i') }} WIB

                                        </div>

                                    </td>

                                    {{-- AKSI --}}
                                    <td>

                                        <a href="{{ auth()->user()->role === 'admin'
                                            ? route('admin.orders.show', $order->id)
                                            : route('karyawan.orders.show', $order->id) }}"
                                            class="detail-button">

                                            <i class="bi bi-eye"></i>
                                            Detail

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8">

                                        <div class="empty">

                                            <div class="empty-icon">
                                                <i class="bi bi-inbox"></i>
                                            </div>

                                            <strong>

                                                @if(request()->hasAny([
                                                    'search',
                                                    'status',
                                                    'payment_status'
                                                ]))

                                                    Pesanan Tidak Ditemukan

                                                @else

                                                    Belum Ada Pesanan

                                                @endif

                                            </strong>

                                            <p>

                                                @if(request()->hasAny([
                                                    'search',
                                                    'status',
                                                    'payment_status'
                                                ]))

                                                    Coba ubah kata kunci atau filter pencarian.

                                                @else

                                                    Pesanan pelanggan akan muncul di halaman ini.

                                                @endif

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

</div>

{{-- POPUP KONFIRMASI LOGOUT --}}
<div class="logout-modal"
    id="logoutModal"
    aria-hidden="true">

    <div class="logout-dialog"
        role="dialog"
        aria-modal="true"
        aria-labelledby="logoutTitle">

        <div class="logout-modal-icon">
            <i class="bi bi-box-arrow-right"></i>
        </div>

        <h3 id="logoutTitle">
            Keluar dari Akun?
        </h3>

        <p>
            Apakah kamu yakin ingin keluar dari dashboard PizzaMozza?
        </p>

        <div class="logout-modal-actions">

            <button type="button"
                class="cancel-logout"
                onclick="closeLogoutModal()">

                Tidak, Kembali

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
    const logoutModal = document.getElementById('logoutModal');

    function openLogoutModal() {
        logoutModal.classList.add('show');
        logoutModal.setAttribute('aria-hidden', 'false');
    }

    function closeLogoutModal() {
        logoutModal.classList.remove('show');
        logoutModal.setAttribute('aria-hidden', 'true');
    }

    function confirmLogout() {
        document.getElementById('logoutForm').submit();
    }

    logoutModal.addEventListener('click', function (event) {
        if (event.target === logoutModal) {
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