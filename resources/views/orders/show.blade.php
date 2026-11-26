<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - PizzaMozza</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --dashboard-red: #941919;
            --dashboard-red-hover: #b52d2d;
        }

        body {
            font-family: Calibri, 'Segoe UI', sans-serif;
            font-size: 15px;
            background: #fffaf3;
            color: #34241f;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
            cursor: pointer;
        }

        .app {
            min-height: 100vh;
        }

        /* ================= SIDEBAR PELANGGAN (SERAGAM DENGAN DASHBOARD) ================= */

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 265px;
            height: 100vh;
            background: var(--dashboard-red);
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform .25s ease;
        }

        .brand {
            height: 88px;
            min-height: 88px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #ffffff25;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--dashboard-red-hover);
            color: white;
            font-size: 21px;
        }

        .brand-icon i {
            color: white;
        }

        .brand-text {
            color: white;
            font-size: 26px;
            font-weight: 600;
            letter-spacing: -.3px;
        }

        .brand-text span {
            color: #ffffff;
        }

        .brand-subtitle {
            margin-top: 2px;
            color: #f2caca;
            font-size: 13px;
            font-weight: 400;
        }

        .sidebar-section {
            padding: 24px 15px;
        }

        .sidebar-title {
            padding: 0 12px 13px;
            color: #e9bdbd;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-link {
            min-height: 45px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 9px;
            color: #f8eaea;
            font-size: 15.5px;
            font-weight: 500;
            transition: .2s ease;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: var(--dashboard-red-hover);
            color: white;
        }

        .sidebar-icon {
            width: 20px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px 16px;
            border-top: 1px solid #ffffff25;
        }

        .user-mini {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 13px;
            padding: 0;
            background: transparent;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 50%;
            background: #ffe0e0;
            color: var(--dashboard-red);
            font-size: 17px;
            font-weight: 600;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            min-width: 0;
            flex: 1;
        }

        .user-name {
            color: white;
            font-size: 14.5px;
            font-weight: 600;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-role {
            margin-top: 2px;
            color: #e9bdbd;
            font-size: 13px;
        }

        .sidebar-logout {
            width: 100%;
            min-height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: white;
            color: var(--dashboard-red);
            font-size: 14.5px;
            font-weight: 600;
            transition: .2s ease;
        }

        .sidebar-logout:hover {
            background: #fbe9e9;
        }

        /* ================= MAIN WRAPPER & TOPBAR ================= */

        .main-wrapper {
            min-height: 100vh;
            margin-left: 265px;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            height: 88px;
            min-height: 88px;
            position: sticky;
            top: 0;
            z-index: 50;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            gap: 20px;
            background: #fffdf9;
            border-bottom: 1px solid #f0e1d5;
        }

        .topbar-heading {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-width: 150px;
        }

        .topbar-title {
            margin: 0;
            font-size: 25px;
            font-weight: 600;
            color: #3b2925;
        }

        .topbar-description {
            margin-top: 3px;
            color: #907d73;
            font-size: 14px;
        }

        .topbar-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }

        .mobile-menu {
            display: none;
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 8px;
            background: #fbe9e4;
            color: var(--dashboard-red);
            font-size: 21px;
        }

        .cart-button {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            position: relative;
            display: grid;
            place-items: center;
            background: #fbe9e4;
            color: var(--dashboard-red);
            font-size: 19px;
        }

        .cart-badge {
            position: absolute;
            top: -3px;
            right: -3px;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            border-radius: 10px;
            background: #c52c2c;
            color: white;
            display: grid;
            place-items: center;
            font-size: 11.5px;
        }

        .btn-saya {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            border: none;
            border-radius: 8px;
            background: #c52c2c;
            color: white;
            font-size: 15px;
            font-weight: 600;
        }

        .btn-saya:hover {
            background: #a82020;
            color: white;
        }

        .btn-saya i {
            font-size: 17px;
        }

        /* ================= KONTEN DETAIL PESANAN ================= */

        .content {
            padding: 32px 30px;
            flex: 1;
        }

        .container {
            max-width: 1150px;
            margin: 0 auto;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--dashboard-red);
            font-size: 14.5px;
            font-weight: 600;
            margin-bottom: 22px;
            transition: .2s;
        }

        .back:hover {
            color: var(--dashboard-red-hover);
            transform: translateX(-2px);
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .heading-label {
            color: var(--dashboard-red);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.2px;
            margin-bottom: 6px;
        }

        .heading h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #34241f;
        }

        .heading p {
            margin: 6px 0 0;
            color: #907d73;
            font-size: 14.5px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 330px;
            gap: 22px;
            align-items: start;
        }

        .card {
            background: white;
            border: 1px solid #f0e1d5;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(72, 44, 26, 0.04);
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 11px;
            font-size: 17px;
            font-weight: 700;
            color: #34241f;
            margin: 0 0 20px;
        }

        .card-title i {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: #fff0ed;
            color: var(--dashboard-red);
            font-size: 17px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .info-label {
            color: #907d73;
            font-size: 12.5px;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 15px;
            font-weight: 600;
            color: #34241f;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 8px;
            font-size: 12.5px;
            font-weight: 700;
        }

        .pending,
        .unpaid {
            background: #fff1c9;
            color: #9b6b00;
        }

        .processing {
            background: #e6f2ff;
            color: #2773ad;
        }

        .shipped {
            background: #fff0d7;
            color: #a96500;
        }

        .completed,
        .paid {
            background: #dcfce7;
            color: #15803d;
        }

        .cancelled {
            background: #fee2e2;
            color: #b42318;
        }

        .cancel-reason {
            display: flex;
            gap: 13px;
            padding: 18px;
            margin-bottom: 20px;
            border: 1px solid #fecaca;
            border-left: 5px solid #dc3545;
            background: #fff1f1;
            border-radius: 12px;
        }

        .cancel-icon {
            color: #dc3545;
            font-size: 23px;
        }

        .cancel-reason h3 {
            color: #b42318;
            font-size: 15.5px;
            margin: 0 0 6px;
        }

        .cancel-reason p {
            color: #7f1d1d;
            font-size: 14px;
            line-height: 1.65;
            margin: 0;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f2e8e0;
        }

        .order-item:first-of-type {
            padding-top: 0;
        }

        .order-item:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .item-image,
        .item-placeholder {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            object-fit: cover;
            flex-shrink: 0;
            background: #f8e8e2;
        }

        .item-placeholder {
            display: grid;
            place-items: center;
            color: var(--dashboard-red);
            font-size: 26px;
        }

        .item-info {
            flex: 1;
            min-width: 0;
        }

        .item-name {
            font-size: 15.5px;
            font-weight: 700;
            color: #34241f;
            margin-bottom: 6px;
        }

        .item-detail {
            color: #8b776d;
            font-size: 13.5px;
            line-height: 1.65;
        }

        .item-price {
            color: var(--dashboard-red);
            font-size: 15.5px;
            font-weight: 700;
            white-space: nowrap;
        }

        .address {
            padding: 16px;
            border-radius: 11px;
            background: #fffaf5;
            border: 1px solid #f2e4d8;
            color: #4f3d36;
            font-size: 14.5px;
            line-height: 1.75;
            overflow-wrap: anywhere;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
            color: #8b776d;
            font-size: 14.5px;
        }

        .summary-row strong {
            color: #34241f;
        }

        .total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            border-top: 1px dashed #e2d1c5;
            padding-top: 18px;
            margin-top: 18px;
            font-size: 15.5px;
            font-weight: 700;
            color: #34241f;
        }

        .total-price {
            color: var(--dashboard-red);
            font-size: 21px;
            white-space: nowrap;
        }

        .help-text {
            font-size: 14px;
            color: #8b776d;
            line-height: 1.7;
            margin: 0;
        }

        .empty-items {
            color: #8b776d;
            font-size: 14.5px;
        }

        .alert {
            padding: 13px 16px;
            margin-bottom: 18px;
            border-radius: 10px;
            font-size: 14.5px;
        }

        .success-alert {
            background: #dcfce7;
            color: #15803d;
        }

        .error-alert {
            background: #fff0ef;
            color: #9b2424;
        }

        .footer {
            padding: 22px;
            text-align: center;
            color: #99877e;
            font-size: 13.5px;
        }

        /* ================= MODAL LOGOUT PELANGGAN ================= */

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
            color: var(--dashboard-red);
            font-size: 28px;
        }

        .logout-dialog h3 {
            margin-bottom: 10px;
            color: #34241f;
            font-size: 23px;
            font-weight: 600;
        }

        .logout-dialog p {
            margin-bottom: 24px;
            color: #81716a;
            font-size: 15px;
            line-height: 1.55;
        }

        .logout-modal-actions {
            display: flex;
            gap: 10px;
        }

        .logout-modal-actions button {
            flex: 1;
            min-height: 42px;
            border-radius: 9px;
            font-size: 15px;
            font-weight: 600;
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
            background: var(--dashboard-red);
            color: #ffffff;
        }

        .confirm-logout:hover {
            background: var(--dashboard-red-hover);
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

        /* ================= RESPONSIVE ================= */

        @media (max-width: 980px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .mobile-menu {
                display: inline-flex;
            }

            .content {
                padding: 25px 18px;
            }
        }

        @media (max-width: 550px) {
            .topbar {
                padding: 12px 15px;
                gap: 10px;
            }

            .topbar-title {
                font-size: 20px;
            }

            .topbar-description {
                font-size: 12.5px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .card {
                padding: 18px;
            }

            .heading h1 {
                font-size: 23px;
            }

            .item-image,
            .item-placeholder {
                width: 64px;
                height: 64px;
            }
        }
    </style>
</head>

<body>

    @php
        $userFotoUrl = null;
        if (auth()->check() && auth()->user()->foto_profile) {
            $rawFoto = ltrim(auth()->user()->foto_profile, '/');
            foreach (['profile/' . $rawFoto, 'storage/' . $rawFoto, $rawFoto] as $fotoPath) {
                if (file_exists(public_path($fotoPath))) {
                    $userFotoUrl = asset($fotoPath);
                    break;
                }
            }
            $userFotoUrl ??= asset('profile/' . $rawFoto);
        }
    @endphp

    <div class="app">

        <!-- ================= SIDEBAR PELANGGAN ================= -->

        <aside class="sidebar" id="sidebar">

            <div class="brand">
                <div class="brand-icon">
                    <i class="fa-solid fa-pizza-slice"></i>
                </div>

                <div>
                    <div class="brand-text">Pizza<span>Mozza</span></div>
                    <div class="brand-subtitle">Fresh, Tasty, Happiness!</div>
                </div>
            </div>

            <div class="sidebar-section">

                <div class="sidebar-title">Main Menu</div>

                <ul class="sidebar-menu">

                    <li>
                        <a href="{{ route('dashboard') }}" class="sidebar-link">
                            <span class="sidebar-icon">
                                <i class="bi bi-grid-1x2-fill"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}" class="sidebar-link">
                            <span class="sidebar-icon">
                                <i class="bi bi-box-seam"></i>
                            </span>
                            <span>Produk</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard') }}?menu=orders" class="sidebar-link active">
                            <span class="sidebar-icon">
                                <i class="bi bi-bag-check"></i>
                            </span>
                            <span>Pesanan Saya</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard') }}?menu=profile" class="sidebar-link">
                            <span class="sidebar-icon">
                                <i class="bi bi-person-circle"></i>
                            </span>
                            <span>Akun Saya</span>
                        </a>
                    </li>

                </ul>
            </div>

            <!-- Bagian profil dan logout di bawah sidebar -->
            <div class="sidebar-bottom">

                <div class="user-mini">

                    <div class="user-avatar">
                        @if ($userFotoUrl)
                            <img src="{{ $userFotoUrl }}" alt="Foto profil"
                                onerror="this.style.display='none'; this.parentElement.textContent='{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}';">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>

                    <div class="user-info">
                        <div class="user-name">
                            {{ auth()->user()->name }}
                        </div>

                        <div class="user-role">
                            Pelanggan
                        </div>
                    </div>

                </div>

                <button type="button" class="sidebar-logout" onclick="openCustomerLogoutModal()">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </button>

            </div>

        </aside>

        <!-- ================= MAIN WRAPPER ================= -->

        <div class="main-wrapper">

            <!-- ================= TOPBAR ================= -->

            <header class="topbar">

                <button type="button" class="mobile-menu" onclick="toggleSidebar()" aria-label="Buka menu">
                    <i class="bi bi-list"></i>
                </button>

                <div class="topbar-heading">
                    <div class="topbar-title">Detail Pesanan</div>
                    <div class="topbar-description">Rincian transaksi dan status pesanan kamu.</div>
                </div>

                <div class="topbar-actions">

                    <a href="{{ route('cart.index') }}" class="cart-button" aria-label="Keranjang">
                        <i class="bi bi-cart3"></i>

                        @php
                            $cartCount = session('cart') ? collect(session('cart'))->sum('quantity') : 0;
                        @endphp

                        @if ($cartCount > 0)
                            <span class="cart-badge">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('dashboard', ['menu' => 'profile']) }}" class="btn-saya">
                        <i class="bi bi-person-circle"></i>
                        <span>Saya</span>
                    </a>

                </div>

            </header>

            <!-- ================= CONTENT ================= -->

            <main class="content">
                <div class="container">

                    <a href="{{ route('dashboard') }}?menu=orders" class="back">
                        <i class="bi bi-arrow-left"></i> Kembali ke Pesanan Saya
                    </a>

                    <div class="heading">
                        <div>
                            <div class="heading-label">RIWAYAT TRANSAKSI</div>
                            
                            <p>Nomor pesanan #PM{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                        </div>

                        @php
                            $status = strtolower((string) $order->status);

                            $statusLabel = match ($status) {
                                'pending' => 'Menunggu',
                                'processing' => 'Diproses',
                                'shipped' => 'Dikirim',
                                'completed' => 'Selesai',
                                'cancelled' => 'Dibatalkan',
                                default => ucfirst($status),
                            };

                            $statusClass = match ($status) {
                                'pending' => 'pending',
                                'processing' => 'processing',
                                'shipped' => 'shipped',
                                'completed' => 'completed',
                                'cancelled' => 'cancelled',
                                default => 'pending',
                            };
                        @endphp

                        <span class="status {{ $statusClass }}">{{ $statusLabel }}</span>
                    </div>

                    @if (session('success'))
                        <div class="alert success-alert">
                            <i class="bi bi-check-circle-fill"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert error-alert">{{ session('error') }}</div>
                    @endif

                    @if ($status === 'cancelled' && $order->cancellation_reason)
                        <div class="cancel-reason">
                            <div class="cancel-icon">
                                <i class="bi bi-exclamation-circle-fill"></i>
                            </div>
                            <div>
                                <h3>Pesanan Dibatalkan</h3>
                                <p>
                                    <strong>Alasan pembatalan:</strong><br>
                                    {{ $order->cancellation_reason }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <div class="detail-grid">

                        <div>
                            <section class="card">
                                <h2 class="card-title">
                                    <i class="bi bi-receipt"></i> Informasi Pesanan
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
                                            {{ $order->created_at?->format('d M Y, H:i') ?? '-' }}
                                        </div>
                                    </div>

                                    <div>
                                        <div class="info-label">Status Pesanan</div>
                                        <span class="status {{ $statusClass }}">{{ $statusLabel }}</span>
                                    </div>

                                    <div>
                                        <div class="info-label">Status Pembayaran</div>
                                        @if ($order->payment_status === 'paid')
                                            <span class="status paid">Lunas</span>
                                        @else
                                            <span class="status unpaid">Belum Dibayar</span>
                                        @endif
                                    </div>
                                </div>
                            </section>

                            <section class="card">
                                <h2 class="card-title">
                                    <i class="bi bi-basket"></i> Produk Pesanan
                                </h2>

                                @forelse ($order->items as $item)
                                    @php
                                        $itemProduct = $item->product;
                                        $rawImg = $itemProduct ? ($itemProduct->image ?? ($itemProduct->gambar ?? ($itemProduct->foto ?? null))) : null;
                                        $rawImg = $rawImg ? ltrim($rawImg, '/') : null;
                                        $resolvedImg = null;

                                        if ($rawImg) {
                                            foreach (['image/' . $rawImg, 'images/' . $rawImg, 'storage/' . $rawImg, $rawImg] as $p) {
                                                if (file_exists(public_path($p))) {
                                                    $resolvedImg = asset($p);
                                                    break;
                                                }
                                            }
                                            $resolvedImg ??= asset('image/' . $rawImg);
                                        }
                                    @endphp

                                    <div class="order-item">
                                        @if ($resolvedImg)
                                            <img
                                                src="{{ $resolvedImg }}"
                                                alt="{{ $itemProduct->name }}"
                                                class="item-image"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';">
                                            <div class="item-placeholder" style="display: none;">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @else
                                            <div class="item-placeholder">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endif

                                        <div class="item-info">
                                            <div class="item-name">
                                                {{ $itemProduct->name ?? 'Produk tidak ditemukan' }}
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
                                    <p class="empty-items">Belum ada produk dalam pesanan ini.</p>
                                @endforelse
                            </section>

                            <section class="card">
                                <h2 class="card-title">
                                    <i class="bi bi-geo-alt"></i> Informasi Pengambilan / Pengiriman
                                </h2>

                                <div class="address">
                                    {{ $order->address ?: 'Informasi alamat belum tersedia.' }}
                                </div>
                            </section>
                        </div>

                        <div>
                            <section class="card">
                                <h2 class="card-title">
                                    <i class="bi bi-wallet2"></i> Ringkasan Pembayaran
                                </h2>

                                <div class="summary-row">
                                    <span>Ongkos Kirim</span>
                                    <strong>
                                        Rp{{ number_format($order->shipping_cost ?? 0, 0, ',', '.') }}
                                    </strong>
                                </div>

                                <div class="total">
                                    <span>Total Pesanan</span>
                                    <span class="total-price">
                                        Rp{{ number_format($order->total_price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </section>

                            <section class="card">
                                <h2 class="card-title">
                                    <i class="bi bi-info-circle"></i> Informasi
                                </h2>

                                <p class="help-text">
                                    Terima kasih telah melakukan pemesanan di PizzaMozza.
                                    Kamu dapat memantau perkembangan pesanan melalui
                                    halaman Pesanan Saya.
                                </p>
                            </section>
                        </div>

                    </div>
                </div>
            </main>

            <footer class="footer">
                © {{ date('Y') }} PizzaMozza. All Rights Reserved.
            </footer>

        </div>

    </div>

    <!-- ================= FORM & POPUP LOGOUT PELANGGAN ================= -->

    <form action="{{ route('logout') }}" method="POST" id="customerLogoutForm">
        @csrf
    </form>

    <div class="logout-modal" id="customerLogoutModal">
        <div class="logout-dialog" role="dialog" aria-modal="true" aria-labelledby="customerLogoutTitle">
            <div class="logout-modal-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>

            <h3 id="customerLogoutTitle">Keluar dari Akun?</h3>
            <p>Apakah kamu yakin ingin keluar dari akun PizzaMozza?</p>

            <div class="logout-modal-actions">
                <button type="button" class="cancel-logout" onclick="closeCustomerLogoutModal()">
                    Batal
                </button>

                <button type="button" class="confirm-logout" onclick="confirmCustomerLogout()">
                    Ya, Keluar
                </button>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar) {
                sidebar.classList.toggle('open');
            }
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuButton = document.querySelector('.mobile-menu');

            if (
                window.innerWidth <= 800 &&
                sidebar &&
                menuButton &&
                sidebar.classList.contains('open') &&
                !sidebar.contains(event.target) &&
                !menuButton.contains(event.target)
            ) {
                sidebar.classList.remove('open');
            }
        });

        function openCustomerLogoutModal() {
            document.getElementById('customerLogoutModal').classList.add('show');
        }

        function closeCustomerLogoutModal() {
            document.getElementById('customerLogoutModal').classList.remove('show');
        }

        function confirmCustomerLogout() {
            const logoutForm = document.getElementById('customerLogoutForm');
            if (logoutForm) {
                logoutForm.submit();
            }
        }

        const logoutModal = document.getElementById('customerLogoutModal');
        if (logoutModal) {
            logoutModal.addEventListener('click', function(event) {
                if (event.target === this) {
                    closeCustomerLogoutModal();
                }
            });
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeCustomerLogoutModal();
            }
        });
    </script>

</body>

</html>