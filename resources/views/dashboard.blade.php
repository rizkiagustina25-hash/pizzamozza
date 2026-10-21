
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PizzaMozza</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #fffaf3;
            color: #34241f;
        }
        a { color: inherit; text-decoration: none; }
        button, input { font: inherit; }
        button { cursor: pointer; }

        .app { min-height: 100vh; }
        .sidebar {
            position: fixed; inset: 0 auto 0 0;
            width: 245px; background: #861b1b; color: white;
            display: flex; flex-direction: column; z-index: 100;
            transition: transform .25s ease;
        }
        .brand {
            height: 80px; padding: 20px;
            display: flex; align-items: center; gap: 10px;
            border-bottom: 1px solid #ffffff25;
        }
        .brand-icon {
            width: 40px; height: 40px; border-radius: 50%;
            display: grid; place-items: center;
            background: white; font-size: 23px;
        }
        .brand-text { font-size: 20px; font-weight: 700; }
        .brand-text span { color: #ffb4a9; }
        .sidebar-section { padding: 25px 15px 10px; }
        .sidebar-title {
            padding: 0 12px 12px; font-size: 10px;
            color: #e9bdbd; text-transform: uppercase;
            letter-spacing: 1.3px; font-weight: 700;
        }
        .sidebar-menu { list-style: none; }
        .sidebar-menu li { margin-bottom: 5px; }
        .sidebar-link {
            display: flex; align-items: center; gap: 12px;
            padding: 13px 14px; border-radius: 9px;
            color: #f8eaea; font-size: 14px; transition: .2s;
        }
        .sidebar-link:hover { background: #a42b2b; }
        .sidebar-link.active {
            background: #fff; color: #861b1b; font-weight: 700;
        }
        .sidebar-icon { width: 24px; text-align: center; font-size: 17px; }
        .sidebar-bottom {
            margin-top: auto; padding: 15px;
            border-top: 1px solid #ffffff25;
        }
        .user-mini {
            display: flex; align-items: center; gap: 10px;
            padding: 10px; border-radius: 10px;
            background: #ffffff15;
        }
        .user-avatar, .profile-avatar {
            display: flex; align-items: center; justify-content: center;
            overflow: hidden; border-radius: 50%;
            background: #ffe0e0; color: #861b1b; font-weight: 700;
        }
        .user-avatar { width: 38px; height: 38px; flex-shrink: 0; }
        .user-avatar img, .profile-avatar img {
            width: 100%; height: 100%; object-fit: cover;
        }
        .user-info { min-width: 0; flex: 1; }
        .user-name {
            font-size: 13px; font-weight: 700;
            overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }
        .user-role { margin-top: 4px; color: #e9bdbd; font-size: 11px; }

        .main-wrapper { min-height: 100vh; margin-left: 245px; }
        .topbar {
            min-height: 80px; position: sticky; top: 0; z-index: 50;
            padding: 15px 30px; display: flex; align-items: center;
            gap: 18px; background: #fffdf9;
            border-bottom: 1px solid #f0e1d5;
        }
        .mobile-menu {
            display: none; width: 40px; height: 40px;
            border: 0; border-radius: 8px;
            background: #fbe9e4; color: #861b1b; font-size: 19px;
        }
        .search-box { flex: 1; max-width: 450px; position: relative; }
        .search-box input {
            width: 100%; height: 43px; border: 1px solid #eee0d5;
            border-radius: 24px; padding: 0 16px 0 42px;
            outline: none; background: #fff; font-size: 13px;
        }
        .search-box input:focus { border-color: #a42b2b; }
        .search-icon { position: absolute; left: 15px; top: 13px; color: #99877e; }
        .topbar-actions { margin-left: auto; display: flex; align-items: center; gap: 12px; }
        .cart-button {
            width: 42px; height: 42px; border-radius: 50%; position: relative;
            display: grid; place-items: center; background: #fbe9e4; color: #861b1b;
        }
        .cart-badge {
            position: absolute; top: -3px; right: -3px;
            min-width: 18px; height: 18px; padding: 0 4px;
            border-radius: 10px; background: #c52c2c; color: white;
            display: grid; place-items: center; font-size: 10px;
        }
        .login-button, .btn-primary {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 11px 17px; border: 0; border-radius: 8px;
            background: #861b1b; color: white; font-size: 13px; font-weight: 700;
        }
        .login-button:hover, .btn-primary:hover { background: #a42b2b; }
        .btn-secondary {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 11px 17px; border: 1px solid #861b1b;
            border-radius: 8px; background: white; color: #861b1b;
            font-size: 13px; font-weight: 700;
        }
        .content { padding: 30px; }
        .page-title { margin-bottom: 7px; font-size: 26px; font-weight: 750; }
        .page-subtitle { margin-bottom: 25px; color: #907d73; font-size: 13px; }

        .landing-preview {
            min-height: 330px; margin-bottom: 30px; padding: 40px;
            border-radius: 22px; background: linear-gradient(135deg,#fff0e8,#ffe1d1);
            display: flex; align-items: center; justify-content: space-between;
            gap: 25px; overflow: hidden;
        }
        .landing-content { max-width: 560px; }
        .landing-badge {
            display: inline-block; margin-bottom: 15px; padding: 7px 13px;
            border-radius: 20px; background: white; color: #861b1b;
            font-size: 11px; font-weight: 700;
        }
        .landing-title { margin-bottom: 15px; font-size: 40px; line-height: 1.15; }
        .landing-title span { color: #a42b2b; }
        .landing-description { margin-bottom: 23px; color: #705e54; font-size: 14px; line-height: 1.7; }
        .landing-actions { display: flex; gap: 10px; flex-wrap: wrap; }
        .landing-visual {
            width: 190px; height: 190px; flex-shrink: 0;
            display: grid; place-items: center; border-radius: 50%;
            background: white; font-size: 85px;
            box-shadow: 0 15px 35px #00000010;
        }

        .dashboard-summary {
            display: grid; grid-template-columns: repeat(4,minmax(0,1fr));
            gap: 16px; margin: 25px 0 30px;
        }
        .summary-card {
            min-height: 120px; padding: 20px; position: relative;
            display: flex; align-items: center; justify-content: space-between; gap: 10px;
            background: white; border: 1px solid #f0e1d5; border-radius: 16px;
            box-shadow: 0 4px 15px #482c1a05; overflow: hidden;
        }
        .summary-card::before {
            content: ""; position: absolute; inset: 0 auto 0 0;
            width: 5px; background: var(--accent,#8856df);
        }
        .summary-card:nth-child(2) { --accent: #ef9b35; }
        .summary-card:nth-child(3) { --accent: #18a875; }
        .summary-card:nth-child(4) { --accent: #e64b4b; }
        .summary-label { display: block; margin-bottom: 12px; color: #806d62; font-size: 12px; }
        .summary-value { font-size: 28px; font-weight: 750; }
        .summary-icon {
            width: 42px; height: 42px; flex-shrink: 0; display: grid; place-items: center;
            border-radius: 12px; background: #faf1eb; font-size: 20px;
        }

        .quick-grid {
            display: grid; grid-template-columns: repeat(4,minmax(0,1fr));
            gap: 15px; margin-bottom: 30px;
        }
        .quick-card {
            min-height: 115px; padding: 16px; display: flex; align-items: center;
            gap: 12px; border-radius: 13px; transition: .2s;
        }
        .quick-card:hover { transform: translateY(-3px); }
        .quick-card h3 { margin-bottom: 6px; font-size: 13px; }
        .quick-card p { color: #74665e; font-size: 11px; line-height: 1.5; }
        .quick-icon {
            width: 42px; height: 42px; flex-shrink: 0;
            display: grid; place-items: center; border-radius: 50%; font-size: 19px;
        }
        .quick-arrow { margin-left: auto; font-size: 21px; }
        .orange { background: #fff1df; } .orange .quick-icon { background: #ffdb9f; }
        .blue { background: #eaf3ff; } .blue .quick-icon { background: #b9d9ff; }
        .green { background: #eaf8ef; } .green .quick-icon { background: #b9e8c8; }
        .purple { background: #f1ecff; } .purple .quick-icon { background: #d0c1ff; }

        .section { margin-bottom: 30px; }
        .section-header {
            display: flex; align-items: center; justify-content: space-between;
            gap: 12px; margin-bottom: 16px;
        }
        .section-title { font-size: 19px; font-weight: 750; }
        .section-link { color: #941f1f; font-size: 12px; font-weight: 700; }

        .latest-orders-card, .orders-card, .profile-card {
            background: white; border: 1px solid #f0e1d5;
            border-radius: 16px; box-shadow: 0 4px 15px #482c1a05;
        }
        .latest-orders-card { padding: 24px; overflow-x: auto; }
        .latest-orders-card h2 { margin-bottom: 20px; font-size: 19px; }
        .latest-orders-table { width: 100%; border-collapse: collapse; }
        .latest-orders-table th, .latest-orders-table td {
            padding: 15px 12px; text-align: left;
            border-bottom: 1px solid #f2e8e0; font-size: 13px;
        }
        .latest-orders-table th { color: #907d73; font-size: 11px; white-space: nowrap; }
        .latest-orders-table tr:last-child td { border-bottom: 0; }
        .order-product { display: flex; align-items: center; gap: 10px; min-width: 155px; }
        .order-product img {
            width: 43px; height: 43px; object-fit: cover; border-radius: 9px;
        }
        .order-action {
            display: inline-block; padding: 9px 12px; border-radius: 7px;
            background: #861b1b; color: white; font-size: 11px; white-space: nowrap;
        }
        .order-action:hover { background: #a42b2b; }
        .order-empty { padding: 28px !important; text-align: center !important; color: #907d73; }

        .product-grid {
            display: grid; grid-template-columns: repeat(4,minmax(0,1fr)); gap: 18px;
        }
        .product-card {
            overflow: hidden; background: white; border: 1px solid #f0e1d5;
            border-radius: 14px; transition: .2s;
        }
        .product-card:hover { transform: translateY(-3px); box-shadow: 0 10px 25px #0000000b; }
        .product-image {
            height: 165px; display: flex; align-items: center; justify-content: center;
            background: #f8f0e9; overflow: hidden;
        }
        .product-image img { width: 100%; height: 100%; object-fit: cover; }
        .product-placeholder { font-size: 55px; }
        .product-info { padding: 15px; }
        .product-name { margin-bottom: 8px; font-size: 14px; font-weight: 700; }
        .product-price { color: #941f1f; font-size: 14px; font-weight: 700; }
        .product-button {
            display: block; margin-top: 12px; padding: 10px;
            border-radius: 7px; background: #861b1b; color: white;
            text-align: center; font-size: 11px; font-weight: 700;
        }

        .orders-card { overflow: hidden; }
        .order-row {
            display: flex; align-items: center; gap: 20px;
            padding: 17px 20px; border-bottom: 1px solid #f0e1d5;
        }
        .order-row:last-child { border-bottom: 0; }
        .order-number { font-size: 13px; font-weight: 700; }
        .order-date { margin-top: 5px; color: #99877e; font-size: 11px; }
        .order-total { margin-left: auto; font-size: 13px; font-weight: 700; }
        .status { padding: 6px 10px; border-radius: 20px; font-size: 10px; font-weight: 700; }
        .status-pending { background: #fff4d6; color: #a47700; }
        .status-processing { background: #e7f1ff; color: #2671c9; }
        .status-shipped { background: #e8f7ff; color: #1582a8; }
        .status-completed { background: #e6f7ec; color: #208447; }
        .status-cancelled { background: #ffe8e8; color: #d12d2d; }

        .profile-card { max-width: 760px; padding: 25px; }
        .profile-header { display: flex; align-items: center; gap: 15px; margin-bottom: 25px; }
        .profile-avatar { width: 70px; height: 70px; flex-shrink: 0; font-size: 27px; }
        .profile-name { font-size: 18px; font-weight: 700; }
        .profile-email { margin-top: 5px; color: #99877e; font-size: 12px; }
        .profile-grid { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 15px; }
        .profile-field { padding: 15px; border-radius: 9px; background: #fffaf5; }
        .profile-label { margin-bottom: 6px; color: #99877e; font-size: 10px; text-transform: uppercase; }
        .profile-value { font-size: 13px; line-height: 1.5; overflow-wrap: anywhere; }

        .empty-state {
            padding: 40px 20px; text-align: center;
            background: white; border: 1px solid #f0e1d5; border-radius: 14px;
        }
        .empty-icon { margin-bottom: 12px; font-size: 43px; }
        .empty-state h3 { margin-bottom: 8px; font-size: 16px; }
        .empty-state p { margin-bottom: 18px; color: #99877e; font-size: 12px; }
        .footer { padding: 25px; text-align: center; color: #99877e; font-size: 11px; }

        @media(max-width: 1200px) {
            .dashboard-summary { grid-template-columns: repeat(2,minmax(0,1fr)); }
            .quick-grid { grid-template-columns: repeat(2,minmax(0,1fr)); }
            .product-grid { grid-template-columns: repeat(3,minmax(0,1fr)); }
        }
        @media(max-width: 800px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-wrapper { margin-left: 0; }
            .mobile-menu { display: block; }
            .content { padding: 22px 18px; }
            .landing-preview { flex-direction: column; text-align: center; padding: 30px 20px; }
            .landing-actions { justify-content: center; }
            .landing-visual { width: 140px; height: 140px; font-size: 65px; }
            .product-grid { grid-template-columns: repeat(2,minmax(0,1fr)); }
        }
        @media(max-width: 550px) {
            .topbar { padding: 12px 15px; gap: 10px; }
            .mobile-menu { flex-shrink: 0; }
            .search-box { display: none; }
            .login-button { padding: 10px 12px; }
            .content { padding: 20px 14px; }
            .dashboard-summary, .quick-grid, .product-grid, .profile-grid { grid-template-columns: 1fr; }
            .landing-title { font-size: 30px; }
            .latest-orders-card { padding: 15px; }
            .latest-orders-table { min-width: 600px; }
            .order-row { flex-wrap: wrap; align-items: flex-start; }
            .order-total { margin-left: 0; }
        }

        
/* ===== POPUP LOGOUT PELANGGAN ===== */
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

/* Konsistensi ikon Bootstrap */
.brand-icon i {
    color: #861b1b;
}

.sidebar-icon i {
    font-size: 17px;
}

.summary-icon i,
.quick-icon i {
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.search-icon i {
    font-size: 15px;
}

.cart-button i {
    font-size: 19px;
}

.mobile-menu i {
    font-size: 21px;
}


    </style>
</head>
<body>
@php
    $menu = request()->query('menu', 'home');
    $allOrders = isset($orders) ? collect($orders) : collect();

    $processingCount = $allOrders->filter(
        fn($order) => strtolower((string) $order->status) === 'processing'
    )->count();

    $pendingCount = $allOrders->filter(
        fn($order) => strtolower((string) $order->status) === 'pending'
    )->count();

    $latestOrders = $allOrders->sortByDesc('created_at')->take(6);
@endphp

<div class="app">
    <aside class="sidebar" id="sidebar">
        <div class="brand">
            <div class="brand-icon">🍕</div>
            <div class="brand-text">Pizza<span>Mozza</span></div>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-title">Main Menu</div>
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('dashboard') }}"
                       class="sidebar-link {{ $menu === 'home' ? 'active' : '' }}">
                        <span class="sidebar-icon"><i class="bi bi-house-door-fill"></i></span><span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"
                       class="sidebar-link {{ request()->routeIs('products.index') ? 'active' : '' }}">
                        <span class="sidebar-icon"><i class="bi bi-egg-fried"></i></span><span>Produk</span>
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('dashboard') }}?menu=orders"
                           class="sidebar-link {{ $menu === 'orders' ? 'active' : '' }}">
                            <span class="sidebar-icon"><i class="bi bi-bag-check"></i></span><span>Pesanan Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}?menu=profile"
                           class="sidebar-link {{ $menu === 'profile' ? 'active' : '' }}">
                            <span class="sidebar-icon"><i class="bi bi-person-circle"></i></span><span>Akun Saya</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>

        <div class="sidebar-bottom">
            @auth
                <div class="user-mini">
                    <div class="user-avatar">
                        @if(auth()->user()->foto_profile)
                            <img src="{{ asset('storage/' . auth()->user()->foto_profile) }}"
                                 alt="Foto profil">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->name }}</div>
                        <div class="user-role">Pelanggan</div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn-primary" style="width:100%">Login</a>
            @endauth
        </div>
    </aside>

    <div class="main-wrapper">
        <header class="topbar">
            <button type="button" class="mobile-menu"
                    onclick="toggleSidebar()" aria-label="Buka menu">
                <i class="bi bi-list"></i>
            </button>

            <form action="{{ route('products.index') }}" method="GET" class="search-box">
                <span class="search-icon"><i class="bi bi-search"></i></span>
                <input type="text" name="search"
                       placeholder="Cari pizza favorit kamu..."
                       value="{{ request('search') }}">
            </form>

            <div class="topbar-actions">
                <a href="{{ route('cart.index') }}" class="cart-button"
                    aria-label="Keranjang">
                        <i class="bi bi-cart3"></i>
                    @auth
                        @php
                            $cartCount = session('cart')
                                ? collect(session('cart'))->sum('quantity')
                                : 0;
                        @endphp
                        @if($cartCount > 0)
                            <span class="cart-badge">{{ $cartCount }}</span>
                        @endif
                    @endauth
                </a>

                @guest
                    <a href="{{ route('login') }}" class="login-button">Login</a>
                @else
                    
<form action="{{ route('logout') }}"
      method="POST"
      id="customerLogoutForm">
    @csrf

    <button type="button"
            class="login-button"
            onclick="openCustomerLogoutModal()">
        <i class="bi bi-chevron-right" style="margin-right: 8px;"></i>
        Logout
    </button>
</form>

                @endguest
            </div>
        </header>

        <main class="content">
            @if($menu === 'home')
                @guest
                    <section class="landing-preview">
                        <div class="landing-content">
                            <div class="landing-badge">🍕 Fresh • Hot • Delicious</div>
                            <h1 class="landing-title">Selamat Datang di <span>PizzaMozza!</span></h1>
                            <p class="landing-description">
                                Nikmati pizza lezat dengan bahan berkualitas, topping melimpah,
                                dan rasa yang bikin ingin pesan lagi.
                            </p>
                            <div class="landing-actions">
                                <a href="{{ route('products.index') }}" class="btn-primary">Lihat Produk</a>
                                <a href="{{ route('register') }}" class="btn-secondary">Daftar Sekarang</a>
                            </div>
                        </div>
                        <div class="landing-visual">🍕</div>
                    </section>
                @else
                    <h1 class="page-title">Halo, {{ auth()->user()->name }} 👋</h1>
                    <p class="page-subtitle">Selamat datang kembali di PizzaMozza.</p>

                    <section class="dashboard-summary">
                        <div class="summary-card">
                            <div>
                                <span class="summary-label">Total Pesanan</span>
                                <div class="summary-value">{{ $allOrders->count() }}</div>
                            </div>
                            <div class="summary-icon"><i class="bi bi-cart-check"></i></div>
                        </div>
                        <div class="summary-card">
                            <div>
                                <span class="summary-label">Sedang Diproses</span>
                                <div class="summary-value">{{ $processingCount }}</div>
                            </div>
                            <div class="summary-icon"><i class="bi bi-clock-history"></i></div>
                        </div>
                        <div class="summary-card">
                            <div>
                                <span class="summary-label">Pesanan Berisi Produk</span>
                                <div class="summary-value">
                                    {{ $allOrders->filter(fn($order) => $order->items && $order->items->isNotEmpty())->count() }}
                                </div>
                            </div>
                            <div class="summary-icon"><i class="bi bi-bag-check"></i></div>
                        </div>
                        <div class="summary-card">
                            <div>
                                <span class="summary-label">Menunggu Pembayaran</span>
                                <div class="summary-value">{{ $pendingCount }}</div>
                            </div>
                            <div class="summary-icon"><i class="bi bi-wallet2"></i></div>
                        </div>
                    </section>

                    <section class="section">
                        <div class="section-header">
                            <h2 class="section-title">Menu Cepat</h2>
                        </div>
                        <div class="quick-grid">
                            <a href="{{ route('dashboard') }}?menu=orders" class="quick-card orange">
                                <div class="quick-icon">🛒</div>
                                <div><h3>Pesanan Saya</h3><p>Lihat pesanan yang sedang berlangsung.</p></div>
                                <span class="quick-arrow">›</span>
                            </a>
                            <a href="{{ route('dashboard') }}?menu=profile" class="quick-card blue">
                                <div class="quick-icon">👤</div>
                                <div><h3>Akun Saya</h3><p>Kelola informasi akun kamu.</p></div>
                                <span class="quick-arrow">›</span>
                            </a>
                            <a href="{{ route('dashboard') }}?menu=profile" class="quick-card green">
                                <div class="quick-icon">📍</div>
                                <div><h3>Alamat Saya</h3><p>Periksa alamat pengiriman.</p></div>
                                <span class="quick-arrow">›</span>
                            </a>
                            <a href="{{ route('dashboard') }}?menu=orders" class="quick-card purple">
                                <div class="quick-icon">🕘</div>
                                <div><h3>Riwayat Pesanan</h3><p>Lihat riwayat transaksi kamu.</p></div>
                                <span class="quick-arrow">›</span>
                            </a>
                        </div>
                    </section>

                    <section class="section">
                        <div class="section-header">
                            <h2 class="section-title">Pesanan Terbaru</h2>
                            <a href="{{ route('dashboard') }}?menu=orders" class="section-link">Lihat Semua →</a>
                        </div>
                        <div class="latest-orders-card">
                            <table class="latest-orders-table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Tanggal</th>
                                        <th>Total Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestOrders as $order)
                                        @php
                                            $firstItem = $order->items->first();
                                            $firstProduct = $firstItem?->product;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="order-product">
                                                    @if($firstProduct && $firstProduct->image)
                                                        <img src="{{ asset('image/' . $firstProduct->image) }}"
                                                             alt="{{ $firstProduct->name }}">
                                                    @else
                                                        <span style="font-size:28px">🍕</span>
                                                    @endif
                                                    <span>{{ $firstProduct?->name ?? 'Pesanan #' . $order->id }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $order->created_at?->format('d M Y') ?? '-' }}</td>
                                            <td>Rp {{ number_format($order->total_price ?? 0, 0, ',', '.') }}</td>
                                            <td>
                                                <a class="order-action"
                                                   href="{{ route('customer.orders.show', $order->id) }}">
                                                    Lihat Pesanan
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="order-empty">Belum ada pesanan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </section>
                @endguest

                <section class="section">
                    <div class="section-header">
                        <h2 class="section-title">Produk Favorit</h2>
                        <a href="{{ route('products.index') }}" class="section-link">Lihat Semua →</a>
                    </div>

                    @if(isset($products) && $products->count())
                        <div class="product-grid">
                            @foreach($products as $product)
                                @php
                                    $variant = $product->variants->first() ?? null;
                                    $price = $variant?->price ?? $product->price ?? 0;
                                @endphp
                                <div class="product-card">
                                    <div class="product-image">
                                        @if(!empty($product->image))
                                            <img src="{{ asset('image/' . $product->image) }}" alt="{{ $product->name }}">
                                        @else
                                            <div class="product-placeholder">🍕</div>
                                        @endif
                                    </div>
                                    <div class="product-info">
                                        <div class="product-name">{{ $product->name }}</div>
                                        <div class="product-price">Rp {{ number_format($price, 0, ',', '.') }}</div>
                                        <a href="{{ route('products.show', $product) }}" class="product-button">Lihat Produk</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">🍕</div>
                            <h3>Produk belum tersedia</h3>
                            <p>Silakan cek halaman produk untuk melihat menu PizzaMozza.</p>
                            <a href="{{ route('products.index') }}" class="btn-primary">Lihat Produk</a>
                        </div>
                    @endif
                </section>

            @elseif($menu === 'orders')
                @auth
                    <h1 class="page-title">Pesanan Saya</h1>
                    <p class="page-subtitle">Lihat status dan riwayat pesanan kamu.</p>

                    @if($allOrders->count())
                        <div class="orders-card">
                            @foreach($allOrders as $order)
                                @php
                                    $status = strtolower((string) $order->status);
                                    $statusClass = match($status) {
                                        'pending' => 'status-pending',
                                        'processing' => 'status-processing',
                                        'shipped' => 'status-shipped',
                                        'completed' => 'status-completed',
                                        'cancelled' => 'status-cancelled',
                                        default => 'status-pending',
                                    };
                                    $statusLabel = match($status) {
                                        'pending' => 'Menunggu',
                                        'processing' => 'Diproses',
                                        'shipped' => 'Dikirim',
                                        'completed' => 'Selesai',
                                        'cancelled' => 'Dibatalkan',
                                        default => ucfirst($status),
                                    };
                                @endphp
                                <a href="{{ route('customer.orders.show', $order->id) }}" class="order-row">
                                    <div>
                                        <div class="order-number">#{{ $order->id }}</div>
                                        <div class="order-date">{{ $order->created_at?->format('d M Y, H:i') ?? '-' }}</div>
                                    </div>
                                    <div class="order-total">Rp {{ number_format($order->total_price ?? 0, 0, ',', '.') }}</div>
                                    <span class="status {{ $statusClass }}">{{ $statusLabel }}</span>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">🛒</div>
                            <h3>Belum ada pesanan</h3>
                            <p>Kamu belum melakukan transaksi.</p>
                            <a href="{{ route('products.index') }}" class="btn-primary">Mulai Belanja</a>
                        </div>
                    @endif
                @else
                    <div class="empty-state">
                        <div class="empty-icon">🔐</div><h3>Silakan Login</h3>
                        <p>Login terlebih dahulu untuk melihat pesanan.</p>
                        <a href="{{ route('login') }}" class="btn-primary">Login</a>
                    </div>
                @endauth

            @elseif($menu === 'profile')
                @auth
                    <h1 class="page-title">Akun Saya</h1>
                    <p class="page-subtitle">Informasi akun dan alamat pengiriman kamu.</p>

                    <div class="profile-card">
                        <div class="profile-header">
                            <div class="profile-avatar">
                                @if(auth()->user()->foto_profile)
                                    <img src="{{ asset('storage/' . auth()->user()->foto_profile) }}" alt="Foto profil">
                                @else
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                @endif
                            </div>
                            <div>
                                <div class="profile-name">{{ auth()->user()->name }}</div>
                                <div class="profile-email">{{ auth()->user()->email }}</div>
                            </div>
                        </div>

                        <div class="profile-grid">
                            <div class="profile-field">
                                <div class="profile-label">Nama Lengkap</div>
                                <div class="profile-value">{{ auth()->user()->name }}</div>
                            </div>
                            <div class="profile-field">
                                <div class="profile-label">Email</div>
                                <div class="profile-value">{{ auth()->user()->email }}</div>
                            </div>
                            <div class="profile-field">
                                <div class="profile-label">Nomor Telepon</div>
                                <div class="profile-value">{{ auth()->user()->no_hp ?: '-' }}</div>
                            </div>
                            <div class="profile-field">
                                <div class="profile-label">Role</div>
                                <div class="profile-value">Pelanggan</div>
                            </div>
                            <div class="profile-field" style="grid-column:1/-1">
                                <div class="profile-label">Alamat Pengiriman</div>
                                <div class="profile-value">{{ auth()->user()->address ?: 'Alamat belum diisi.' }}</div>
                            </div>
                        </div>

                        <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:24px">
                            <a href="{{ route('profile.edit') }}" class="btn-primary"><i class="bi bi-pencil-square"style="margin-right: 8px;"></i> Edit Profile</a>
                            <a href="{{ route('password.reset.form') }}" class="btn-primary"><i class="bi bi-key"style="margin-right: 8px;"></i> Reset Password</a>
                            <a href="{{ route('dashboard') }}" class="btn-secondary"><i class="bi bi-arrow-left"style="margin-right: 8px;"></i> Kembali ke Menu</a>
                        </div>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">👤</div><h3>Belum Login</h3>
                        <p>Silakan login untuk melihat akun kamu.</p>
                        <a href="{{ route('login') }}" class="btn-primary">Login</a>
                    </div>
                @endauth
            @endif
        </main>

        <footer class="footer">© {{ date('Y') }} PizzaMozza. All Rights Reserved.</footer>
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        if (sidebar) sidebar.classList.toggle('open');
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
</script>

<!-- POPUP LOGOUT PELANGGAN -->
<div class="logout-modal" id="customerLogoutModal">
    <div class="logout-dialog" role="dialog"
         aria-modal="true" aria-labelledby="customerLogoutTitle">

        <div class="logout-modal-icon">
            <i class="bi bi-box-arrow-right"></i>
        </div>

        <h3 id="customerLogoutTitle">Keluar dari Akun?</h3>

        <p>
            Apakah kamu yakin ingin keluar dari akun PizzaMozza?
        </p>

        <div class="logout-modal-actions">
            <button type="button"
                    class="cancel-logout"
                    onclick="closeCustomerLogoutModal()">
                Batal
            </button>

            <button type="button"
                    class="confirm-logout"
                    onclick="confirmCustomerLogout()">
                Ya, Keluar
            </button>
        </div>
    </div>
</div>

<script>
    function openCustomerLogoutModal() {
        document.getElementById('customerLogoutModal')
            .classList.add('show');
    }

    function closeCustomerLogoutModal() {
        document.getElementById('customerLogoutModal')
            .classList.remove('show');
    }

    function confirmCustomerLogout() {
        document.getElementById('customerLogoutForm').submit();
    }

    document.getElementById('customerLogoutModal')
        .addEventListener('click', function (event) {
            if (event.target === this) {
                closeCustomerLogoutModal();
            }
        });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeCustomerLogoutModal();
        }
    });
</script>

</body>
</html>
