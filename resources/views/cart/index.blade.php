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

    $cartCount = session('cart') ? collect(session('cart'))->sum('quantity') : 0;
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang | PizzaMozza</title>

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

        button,
        input {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        .app {
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

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

        .brand-text {
            color: white;
            font-size: 26px;
            font-weight: 600;
            letter-spacing: -.3px;
        }

        .brand-text span {
            color: #ffb4a9;
        }

        .brand-subtitle {
            margin-top: 2px;
            color: #f2caca;
            font-size: 13px;
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

        .sidebar-logout,
        .sidebar-login {
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

        .sidebar-logout:hover,
        .sidebar-login:hover {
            background: #fbe9e9;
        }

        /* ================= MAIN WRAPPER & TOPBAR ================= */

        .main-wrapper {
            min-height: 100vh;
            margin-left: 265px;
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
            flex-shrink: 0;
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
            flex-shrink: 0;
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
            transition: .2s ease;
        }

        .cart-button.active {
            background: var(--dashboard-red);
            color: white;
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
            font-weight: 600;
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

        .login-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 18px;
            border-radius: 8px;
            background: var(--dashboard-red);
            color: white;
            font-size: 15px;
            font-weight: 600;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 30px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 18px;
            color: var(--dashboard-red);
            font-size: 14.5px;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .page-title {
            margin-bottom: 6px;
            font-size: 30px;
            font-weight: 600;
        }

        .page-subtitle {
            margin-bottom: 25px;
            color: #907d73;
            font-size: 15.5px;
        }

        /* ================= ALERTS ================= */

        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 18px;
            margin-bottom: 20px;
            border-radius: 12px;
            background: #eaf8ef;
            border: 1px solid #bfe6cd;
            color: #16794c;
            font-size: 14.5px;
            font-weight: 500;
        }

        .alert.error {
            background: #fff0f0;
            border-color: #f5c2c2;
            color: #a81c1c;
        }

        /* ================= CART BOX ================= */

        .cart-box {
            background: white;
            border: 1px solid #f0e1d5;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(72, 44, 26, 0.04);
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 20px 24px;
            border-bottom: 1px solid #f2e8e0;
        }

        .cart-item:last-child {
            border-bottom: 0;
        }

        .product-image {
            width: 82px;
            height: 82px;
            border-radius: 12px;
            background: #f8f0e9;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
            font-size: 30px;
            color: var(--dashboard-red);
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            flex: 1;
            min-width: 0;
        }

        .product-info h3 {
            margin-bottom: 5px;
            font-size: 17.5px;
            font-weight: 600;
            color: #34241f;
            overflow-wrap: anywhere;
        }

        .product-info p {
            margin: 3px 0;
            font-size: 13.5px;
            color: #8b776d;
        }

        .price {
            margin-top: 7px;
            font-size: 16px;
            font-weight: 600;
            color: var(--dashboard-red);
        }

        .quantity-form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quantity-form input {
            width: 64px;
            height: 38px;
            text-align: center;
            border: 1px solid #eadbd0;
            border-radius: 8px;
            background: #fffaf5;
            font-size: 14.5px;
            font-weight: 600;
        }

        .btn {
            border: 0;
            height: 38px;
            padding: 0 14px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
            transition: .2s ease;
        }

        .btn-update {
            background: #f5ebe3;
            color: #4b3832;
        }

        .btn-update:hover {
            background: #ead9cc;
        }

        .btn-delete {
            background: #ffe8e8;
            color: #d12d2d;
        }

        .btn-delete:hover {
            background: #ffd6d6;
        }

        /* ================= CART FOOTER ================= */

        .cart-footer {
            padding: 22px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: #fffdf9;
            border-top: 1px solid #f0e1d5;
        }

        .total-text {
            font-size: 14.5px;
            color: #8b776d;
        }

        .total-price {
            display: block;
            margin-top: 4px;
            font-size: 24px;
            font-weight: 700;
            color: var(--dashboard-red);
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 20px;
            border-radius: 9px;
            font-size: 14.5px;
            font-weight: 600;
            white-space: nowrap;
            transition: .2s ease;
        }

        .btn-primary {
            border: 0;
            background: var(--dashboard-red);
            color: white;
        }

        .btn-primary:hover {
            background: var(--dashboard-red-hover);
        }

        .btn-secondary {
            border: 1px solid #e5d4c9;
            background: white;
            color: #59453d;
        }

        .btn-secondary:hover {
            background: #f5ebe3;
        }

        /* ================= EMPTY CART ================= */

        .empty {
            padding: 65px 20px;
            text-align: center;
            color: #907d73;
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 14px;
            color: var(--dashboard-red);
        }

        .empty h3 {
            margin-bottom: 8px;
            font-size: 20px;
            font-weight: 600;
            color: #34241f;
        }

        .empty p {
            margin-bottom: 22px;
            font-size: 15px;
        }

        .footer {
            padding: 25px;
            text-align: center;
            color: #99877e;
            font-size: 13.5px;
        }

        /* ================= MODAL LOGOUT ================= */

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
            color: var(--dashboard-red);
            font-size: 28px;
        }

        .logout-dialog h3 {
            margin-bottom: 10px;
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
        }

        .cancel-logout {
            border: 1px solid #e5d4c9;
            background: white;
            color: #59453d;
        }

        .confirm-logout {
            border: none;
            background: var(--dashboard-red);
            color: white;
        }

        @keyframes popupFadeIn {
            from { opacity: 0; transform: translateY(10px) scale(.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* ================= RESPONSIVE ================= */

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
                padding: 22px 18px;
            }

            .cart-item {
                flex-wrap: wrap;
            }

            .cart-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .actions {
                width: 100%;
            }

            .actions form,
            .actions > a {
                flex: 1;
            }

            .actions button {
                width: 100%;
            }
        }

        @media (max-width: 550px) {
            .topbar {
                padding: 12px 15px;
                gap: 10px;
            }

            .topbar-heading {
                min-width: 0;
                flex: 1;
            }

            .topbar-title {
                font-size: 20px;
            }

            .topbar-description {
                font-size: 12.5px;
            }

            .btn-saya,
            .login-button {
                padding: 10px 12px;
            }
        }
    </style>
</head>

<body>

    <div class="app">

        <!-- ================= SIDEBAR ================= -->
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
                            <span class="sidebar-icon"><i class="bi bi-grid-1x2-fill"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}" class="sidebar-link">
                            <span class="sidebar-icon"><i class="bi bi-box-seam"></i></span>
                            <span>Produk</span>
                        </a>
                    </li>

                    @auth
                        <li>
                            <a href="{{ route('dashboard', ['menu' => 'orders']) }}" class="sidebar-link">
                                <span class="sidebar-icon"><i class="bi bi-bag-check"></i></span>
                                <span>Pesanan Saya</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard', ['menu' => 'profile']) }}" class="sidebar-link">
                                <span class="sidebar-icon"><i class="bi bi-person-circle"></i></span>
                                <span>Akun Saya</span>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>

            <div class="sidebar-bottom">
                @auth
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
                            <div class="user-name">{{ auth()->user()->name }}</div>
                            <div class="user-role">Pelanggan</div>
                        </div>
                    </div>

                    <button type="button" class="sidebar-logout" onclick="openCustomerLogoutModal()">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                @else
                    <a href="{{ route('login') }}" class="sidebar-login">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login
                    </a>
                @endauth
            </div>
        </aside>

        <!-- ================= MAIN WRAPPER ================= -->
        <div class="main-wrapper">

            <!-- TOPBAR -->
            <header class="topbar">
                <button type="button" class="mobile-menu" onclick="toggleSidebar()" aria-label="Buka menu">
                    <i class="bi bi-list"></i>
                </button>

                <div class="topbar-heading">
                    <div class="topbar-title">Keranjang</div>
                    <div class="topbar-description">Periksa kembali pesanan kamu sebelum checkout.</div>
                </div>

                <div class="topbar-actions">
                    <a href="{{ route('cart.index') }}" class="cart-button active" aria-label="Keranjang">
                        <i class="bi bi-cart3"></i>
                        @if ($cartCount > 0)
                            <span class="cart-badge">{{ $cartCount }}</span>
                        @endif
                    </a>

                    @guest
                        <a href="{{ route('login') }}" class="login-button">Login</a>
                    @else
                        <a href="{{ route('dashboard', ['menu' => 'profile']) }}" class="btn-saya">
                            <i class="bi bi-person-circle"></i>
                            <span>Saya</span>
                        </a>
                    @endguest
                </div>
            </header>

            <!-- CONTENT -->
            <main class="content">
                <a href="{{ route('products.index') }}" class="back-link">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>



                @if (session('success'))
                    <div class="alert">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert error">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert error">
                        <ul style="padding-left:18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (count($cart) > 0)
                    <div class="cart-box">
                        @foreach ($cart as $key => $item)
                            @php
                                $rawCartImg = !empty($item['image']) ? ltrim($item['image'], '/') : null;
                                $cartImgUrl = null;
                                if ($rawCartImg) {
                                    if (str_starts_with($rawCartImg, 'http')) {
                                        $cartImgUrl = $rawCartImg;
                                    } else {
                                        foreach (['image/' . $rawCartImg, 'images/' . $rawCartImg, 'storage/' . $rawCartImg, $rawCartImg] as $imgPath) {
                                            if (file_exists(public_path($imgPath))) {
                                                $cartImgUrl = asset($imgPath);
                                                break;
                                            }
                                        }
                                    }
                                }
                            @endphp

                            <div class="cart-item">
                                <div class="product-image">
                                    @if ($cartImgUrl)
                                        <img src="{{ $cartImgUrl }}" alt="{{ $item['name'] }}"
                                            onerror="this.style.display='none'; this.parentElement.innerHTML='<i class=\'fa-solid fa-pizza-slice\'></i>';">
                                    @else
                                        <i class="fa-solid fa-pizza-slice"></i>
                                    @endif
                                </div>

                                <div class="product-info">
                                    <h3>{{ $item['name'] }}</h3>
                                    @if (!empty($item['variant_name']))
                                        <p>Ukuran: {{ $item['variant_name'] }}</p>
                                    @endif
                                    <div class="price">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                                </div>

                                <form action="{{ route('cart.update', $key) }}" method="POST" class="quantity-form">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" required>
                                    <button type="submit" class="btn btn-update">
                                        <i class="bi bi-arrow-repeat"></i> Update
                                    </button>
                                </form>

                                <form action="{{ route('cart.remove', $key) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        @endforeach

                        <div class="cart-footer">
                            <div>
                                <span class="total-text">Total Keranjang</span>
                                <strong class="total-price">Rp {{ number_format($total, 0, ',', '.') }}</strong>
                            </div>

                            <div class="actions">
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-secondary">
                                        <i class="bi bi-trash"></i> Kosongkan
                                    </button>
                                </form>

                                <a href="{{ route('checkout.index') }}" class="btn-primary">
                                    <i class="bi bi-credit-card"></i> Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="cart-box">
                        <div class="empty">
                            <div class="empty-icon"><i class="bi bi-cart-x"></i></div>
                            <h3>Keranjang masih kosong</h3>
                            <p>Yuk pilih produk PizzaMozza terlebih dahulu.</p>
                            <a href="{{ route('products.index') }}" class="btn-primary">
                                <i class="bi bi-bag"></i> Lihat Produk
                            </a>
                        </div>
                    </div>
                @endif
            </main>

            <footer class="footer">
                © {{ date('Y') }} PizzaMozza. All Rights Reserved.
            </footer>

        </div>

    </div>

    <!-- ================= MODAL LOGOUT ================= -->
    @auth
        <form action="{{ route('logout') }}" method="POST" id="customerLogoutForm" style="display:none;">
            @csrf
        </form>
    @endauth

    <div class="logout-modal" id="customerLogoutModal">
        <div class="logout-dialog" role="dialog" aria-modal="true" aria-labelledby="customerLogoutTitle">
            <div class="logout-modal-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>
            <h3 id="customerLogoutTitle">Keluar dari Akun?</h3>
            <p>Apakah kamu yakin ingin keluar dari akun PizzaMozza?</p>
            <div class="logout-modal-actions">
                <button type="button" class="cancel-logout" onclick="closeCustomerLogoutModal()">Batal</button>
                <button type="button" class="confirm-logout" onclick="confirmCustomerLogout()">Ya, Keluar</button>
            </div>
        </div>
    </div>

    <!-- ================= JAVASCRIPT ================= -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar) sidebar.classList.toggle('open');
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.mobile-menu');
            if (window.innerWidth <= 800 && sidebar && toggleBtn && sidebar.classList.contains('open') &&
                !sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('open');
            }
        });

        function openCustomerLogoutModal() {
            const modal = document.getElementById('customerLogoutModal');
            if (modal) modal.classList.add('show');
        }

        function closeCustomerLogoutModal() {
            const modal = document.getElementById('customerLogoutModal');
            if (modal) modal.classList.remove('show');
        }

        function confirmCustomerLogout() {
            const form = document.getElementById('customerLogoutForm');
            if (form) form.submit();
        }

        const logoutModal = document.getElementById('customerLogoutModal');
        if (logoutModal) {
            logoutModal.addEventListener('click', function(event) {
                if (event.target === this) closeCustomerLogoutModal();
            });
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') closeCustomerLogoutModal();
        });
    </script>

</body>

</html>