<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - PizzaMozza</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #fffaf5;
            color: #292929;
        }

        a {
            text-decoration: none;
        }

        /* SIDEBAR - DISAMAKAN DENGAN TEMPLATE DASHBOARD */
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
            color: white;
            padding: 0;
        }

        .sidebar-brand {
            height: 88px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 11px;
            border-bottom: 1px solid rgba(255,255,255,.15);
            flex-shrink: 0;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #b52d2d;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 23px;
            font-weight: 700;
            line-height: 1.1;
            color: white;
        }

        .brand-subtitle {
            margin-top: 4px;
            font-size: 11px;
            color: #f5dede;
        }

        .sidebar nav {
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
            padding: 0;
            margin: 0;
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
            color: white;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #b52d2d;
            color: white;
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
            border-top: 1px solid rgba(255,255,255,.15);
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
            background: #b52d2d;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 17px;
        }

        .admin-info {
            min-width: 0;
            display: block;
        }

        .admin-info strong {
            display: block;
            font-size: 12px;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 155px;
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
            border: 1px solid rgba(255,255,255,.4);
            border-radius: 8px;
            background: white;
            color: #941919;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: .2s ease;
        }

        .logout-button:hover {
            background: #f5dede;
            color: #941919;
        }

        /* MAIN DAN TOPBAR */
        .main-wrapper {
            margin-left: 265px;
            min-height: 100vh;
        }

        .topbar {
            min-height: 72px;
            padding: 12px 34px;
            background: #fff;
            border-bottom: 1px solid #e8e8e8;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
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
            color: #333;
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
            background: #f8e8e2;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #941919;
            font-size: 16px;
        }

        /* CONTENT */
        .content {
            padding: 35px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #941919;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .back:hover {
            color: #b52d2d;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .heading-label {
            color: #941919;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .page-heading h1 {
            font-size: 28px;
            font-weight: 800;
            color: #292929;
            margin: 0;
        }

        .page-heading p {
            color: #888;
            font-size: 13px;
            margin-top: 7px;
        }

        .success-alert {
            padding: 14px 18px;
            border-radius: 9px;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #15803d;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .error-alert {
            padding: 14px 18px;
            border-radius: 9px;
            background: #fff0ef;
            border: 1px solid #efc5c2;
            color: #9b2424;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 330px;
            gap: 22px;
            align-items: start;
        }

        .detail-column {
            min-width: 0;
        }

        .card {
            background: white;
            border: 1px solid #f0ded2;
            border-radius: 15px;
            padding: 22px;
            box-shadow: 0 2px 8px rgba(0,0,0,.025);
            margin-bottom: 20px;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 17px;
            font-weight: 700;
            color: #292929;
            margin-bottom: 22px;
        }

        .card-title i {
            color: #941919;
            font-size: 17px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px 28px;
        }

        .info-label {
            color: #888;
            font-size: 11px;
            margin-bottom: 6px;
        }

        .info-value {
            color: #292929;
            font-size: 13px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px 0;
            border-bottom: 1px solid #f0eeee;
        }

        .order-item:first-of-type {
            padding-top: 0;
        }

        .order-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .item-image,
        .item-placeholder {
            width: 75px;
            height: 75px;
            border-radius: 10px;
            flex-shrink: 0;
        }

        .item-image {
            object-fit: cover;
            background: #f5e6df;
        }

        .item-placeholder {
            background: #f8e8e2;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #941919;
            font-size: 27px;
        }

        .item-info {
            flex: 1;
            min-width: 0;
        }

        .item-name {
            font-size: 14px;
            font-weight: 700;
            color: #292929;
            margin-bottom: 6px;
        }

        .item-detail {
            color: #777;
            font-size: 11px;
            line-height: 1.7;
        }

        .item-price {
            color: #941919;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .address {
            background: #faf7f5;
            border-radius: 9px;
            padding: 14px;
            font-size: 12px;
            line-height: 1.7;
            color: #555;
            overflow-wrap: anywhere;
        }

        .status-form {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .status-select {
            height: 44px;
            width: 100%;
            border: 1px solid #ead9cf;
            border-radius: 8px;
            padding: 0 12px;
            font-size: 12px;
            background: white;
            color: #444;
            outline: none;
        }

        .status-select:focus {
            border-color: #941919;
        }

        .update-button {
            min-height: 44px;
            border: none;
            border-radius: 8px;
            background: #941919;
            color: white;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .update-button:hover {
            background: #b52d2d;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
            font-size: 12px;
            color: #555;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-pending,
        .payment-pending {
            background: #fff1c9;
            color: #9b6b00;
        }

        .status-processing {
            background: #e6f2ff;
            color: #2773ad;
        }

        .status-shipped {
            background: #fff0d7;
            color: #a96500;
        }

        .status-completed,
        .payment-paid {
            background: #dcfce7;
            color: #15803d;
        }

        .status-cancelled {
            background: #eee;
            color: #666;
        }

        .total {
            border-top: 1px solid #eee;
            padding-top: 16px;
            margin-top: 16px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            font-size: 16px;
            font-weight: 800;
        }

        .total-price {
            color: #941919;
            white-space: nowrap;
        }

        /* MODAL LOGOUT */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.5);
            z-index: 999;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-box {
            background: white;
            width: 100%;
            max-width: 380px;
            border-radius: 15px;
            padding: 28px;
            text-align: center;
            box-shadow: 0 10px 35px rgba(0,0,0,.15);
            animation: modalFade .2s ease;
        }

        @keyframes modalFade {
            from { opacity: 0; transform: translateY(-10px) scale(.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .modal-icon {
            width: 58px;
            height: 58px;
            background: #fce8e8;
            color: #941919;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            margin: 0 auto 16px;
        }

        .modal-box h3 {
            font-size: 19px;
            font-weight: bold;
            color: #333;
            margin: 0 0 8px;
        }

        .modal-box p {
            color: #888;
            font-size: 13px;
            margin: 0 0 23px;
            line-height: 1.6;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
        }

        .modal-actions button {
            width: 100%;
            padding: 11px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .cancel-button {
            background: #f3f4f6;
            color: #555;
            border: none;
        }

        .confirm-button {
            background: #941919;
            color: white;
            border: none;
        }

        .confirm-button:hover {
            background: #b52d2d;
        }

        /* RESPONSIVE */
        @media (max-width: 1050px) {
            .detail-grid {
                grid-template-columns: minmax(0, 1fr) 290px;
            }

            .content {
                padding: 25px;
            }
        }

        @media (max-width: 850px) {
            .detail-grid {
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
                padding: 20px;
            }

            .topbar {
                padding: 12px 20px;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
                bottom: auto;
            }

            .sidebar-brand {
                height: 75px;
            }

            .sidebar nav {
                padding: 15px;
            }

            .sidebar-bottom {
                margin-top: 0;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .topbar {
                padding: 12px 16px;
            }

            .content {
                padding: 20px 12px;
            }

            .page-heading h1 {
                font-size: 23px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .card {
                padding: 18px;
            }

            .order-item {
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .item-price {
                margin-left: 90px;
            }
        }
    </style>
</head>

<body>
@php
    $isAdmin = auth()->user()->role === 'admin';

    $dashboardRoute = $isAdmin
        ? 'admin.dashboard'
        : 'karyawan.dashboard';

    $productsRoute = $isAdmin
        ? 'admin.products.index'
        : 'karyawan.products.index';

    $ordersIndexRoute = $isAdmin
        ? 'admin.orders.index'
        : 'karyawan.orders.index';

    $ordersUpdateRoute = $isAdmin
        ? 'admin.orders.updateStatus'
        : 'karyawan.orders.updateStatus';

    $userRoleLabel = $isAdmin ? 'Administrator' : 'Karyawan';
@endphp

{{-- SIDEBAR --}}
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="fa-solid fa-pizza-slice"></i>
        </div>

        <div class="brand-text">
            <div class="brand-name">PizzaMozza</div>
            <div class="brand-subtitle">{{ $isAdmin ? 'Admin Dashboard' : 'Karyawan Dashboard' }}</div>
        </div>
    </div>

    <nav>
        <div class="menu-title">Main Menu</div>

        <ul class="menu-list">
            <li class="menu-item">
                <a href="{{ route($dashboardRoute) }}" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-grid-1x2"></i></span>
                    <span>Dashboard</span>
                </a>
            </li>

            @if ($isAdmin)
                <li class="menu-item">
                    <a href="{{ route('admin.employees.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="bi bi-people"></i></span>
                        <span>Data Karyawan</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.customers.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="bi bi-person-lines-fill"></i></span>
                        <span>Data Pelanggan</span>
                    </a>
                </li>
            @endif

            <li class="menu-item">
                <a href="{{ route($productsRoute) }}" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-box-seam"></i></span>
                    <span>{{ $isAdmin ? 'Data Produk' : 'Data Produk' }}</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route($ordersIndexRoute) }}" class="menu-link active">
                    <span class="menu-icon"><i class="bi bi-receipt"></i></span>
                    <span>{{ $isAdmin ? 'Pesanan' : 'Pesanan' }}</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="sidebar-bottom">
        <div class="admin-profile">
            <div class="admin-avatar">
                <i class="bi bi-person"></i>
            </div>

            <div class="admin-info">
                <strong>{{ auth()->user()->name ?? 'Pengguna PizzaMozza' }}</strong>
                <span>{{ $isAdmin ? 'Admin' : 'Karyawan' }}</span>
            </div>
        </div>

        <button type="button" class="logout-button" onclick="openLogoutModal()">
            <i class="bi bi-box-arrow-right"></i>
            <span>Keluar</span>
        </button>
    </div>
</aside>

{{-- MAIN CONTENT --}}
<div class="main-wrapper">
    <header class="topbar">
        <div class="topbar-title">
             / {{ $isAdmin ? 'Kelola Pesanan' : 'Pesanan' }} / Detail Pesanan
        </div>

        <div class="topbar-admin">
            <div class="topbar-admin-info">
                <strong>{{ auth()->user()->name ?? 'Pengguna PizzaMozza' }}</strong>
                <span>{{ $userRoleLabel }}</span>
            </div>

            <div class="topbar-avatar">
                <i class="bi bi-person"></i>
            </div>
        </div>
    </header>

    <main class="content">
        <div class="container">
            <a href="{{ route($ordersIndexRoute) }}" class="back">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Pesanan
            </a>

            <div class="page-heading">
                <div class="heading-label">Management</div>
                <h1>Detail Pesanan</h1>
                <p>
                    Pesanan #PM{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                </p>
            </div>

            @if (session('success'))
                <div class="success-alert" role="status">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="error-alert" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error-alert" role="alert">
                    <strong>Terdapat kesalahan:</strong>
                    <ul class="list-disc list-inside mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="detail-grid">
                {{-- KOLOM KIRI --}}
                <div class="detail-column">
                    <section class="card">
                        <h2 class="card-title">
                            <i class="bi bi-box"></i>
                            Informasi Pesanan
                        </h2>

                        <div class="info-grid">
                            <div>
                                <div class="info-label">Nomor Pesanan</div>
                                <div class="info-value">
                                    #PM{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                                </div>
                            </div>

                            <div>
                                <div class="info-label">Tanggal Pesanan</div>
                                <div class="info-value">
                                    {{ $order->created_at->format('d F Y, H:i') }}
                                </div>
                            </div>

                            <div>
                                <div class="info-label">Nama Pelanggan</div>
                                <div class="info-value">{{ $order->user->name ?? 'Pelanggan' }}</div>
                            </div>

                            <div>
                                <div class="info-label">Email</div>
                                <div class="info-value">{{ $order->user->email ?? '-' }}</div>
                            </div>
                        </div>
                    </section>

                    <section class="card">
                        <h2 class="card-title">
                            <i class="bi bi-cart"></i>
                            Produk Pesanan
                        </h2>

                        @forelse ($order->items as $item)
                            <div class="order-item">
                                @if ($item->product && $item->product->image)
                                    <img
                                        src="{{ asset('image/' . $item->product->image) }}"
                                        alt="{{ $item->product->name }}"
                                        class="item-image">
                                @else
                                    <div class="item-placeholder">
                                        <i class="fa-solid fa-pizza-slice"></i>
                                    </div>
                                @endif

                                <div class="item-info">
                                    <div class="item-name">
                                        {{ $item->product->name ?? 'Produk' }}
                                    </div>

                                    <div class="item-detail">
                                        Ukuran: {{ $item->variant->name ?? '-' }}<br>
                                        Jumlah: {{ $item->quantity }}
                                    </div>
                                </div>

                                <div class="item-price">
                                    Rp{{ number_format($item->subtotal, 0, ',', '.') }}
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">
                                Belum ada produk dalam pesanan ini.
                            </p>
                        @endforelse
                    </section>

                    <section class="card">
                        <h2 class="card-title">
                            <i class="bi bi-geo-alt"></i>
                            Alamat Pengiriman
                        </h2>

                        <div class="address">
                            {{ $order->address ?: 'Alamat belum tersedia.' }}
                        </div>
                    </section>
                </div>

                {{-- KOLOM KANAN --}}
                <div class="detail-column">
                    <section class="card">
                        <h2 class="card-title">
                            <i class="bi bi-arrow-repeat"></i>
                            Status Pesanan
                        </h2>

                        <form
                            action="{{ route($ordersUpdateRoute, $order->id) }}"
                            method="POST"
                            class="status-form">
                            @csrf
                            @method('PUT')

                            <select name="status" class="status-select" required>
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                                    Menunggu
                                </option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>
                                    Diproses
                                </option>
                                <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>
                                    Dikirim
                                </option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>
                                    Selesai
                                </option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                    Dibatalkan
                                </option>
                            </select>

                            <button type="submit" class="update-button">
                                <i class="bi bi-save"></i>
                                Simpan Status
                            </button>
                        </form>
                    </section>

                    <section class="card">
                        <h2 class="card-title">
                            <i class="bi bi-credit-card"></i>
                            Pembayaran
                        </h2>

                        <div class="summary-row">
                            <span>Status</span>

                            @if ($order->payment_status === 'paid')
                                <span class="status payment-paid">
                                    <i class="bi bi-check-circle"></i> Dibayar
                                </span>
                            @else
                                <span class="status payment-pending">
                                    Menunggu Pembayaran
                                </span>
                            @endif
                        </div>
                    </section>

                    <section class="card">
                        <h2 class="card-title">
                            <i class="bi bi-receipt"></i>
                            Ringkasan Pembayaran
                        </h2>

                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>

                        <div class="summary-row">
                            <span>Ongkos Kirim</span>
                            <span>Rp0</span>
                        </div>

                        <div class="total">
                            <span>Total</span>
                            <span class="total-price">
                                Rp{{ number_format($order->total_price, 0, ',', '.') }}
                            </span>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
</div>

{{-- MODAL KONFIRMASI LOGOUT --}}
<div id="logoutModal" class="modal-overlay" aria-hidden="true">
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="modal-icon">
            <i class="bi bi-box-arrow-right"></i>
        </div>

        <h3>Konfirmasi Keluar</h3>
        <p>Apakah Anda yakin ingin keluar dari akun?</p>

        <div class="modal-actions">
            <button type="button" class="cancel-button" onclick="closeLogoutModal()">
                Tidak
            </button>

            <form action="{{ route('logout') }}" method="POST" style="flex: 1;">
                @csrf
                <button type="submit" class="confirm-button">
                    Ya, Keluar
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const logoutModal = document.getElementById('logoutModal');

    function openLogoutModal() {
        logoutModal.classList.add('show');
        logoutModal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeLogoutModal() {
        logoutModal.classList.remove('show');
        logoutModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    logoutModal.addEventListener('click', function (event) {
        if (event.target === logoutModal) {
            closeLogoutModal();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && logoutModal.classList.contains('show')) {
            closeLogoutModal();
        }
    });
</script>
</body>
</html>
