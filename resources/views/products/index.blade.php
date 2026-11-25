<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Produk | PizzaMozza</title>

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

        /* ================= MAIN CONTENT ================= */

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
            cursor: pointer;
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

        .login-button:hover {
            background: var(--dashboard-red-hover);
        }

        .content {
            padding: 30px 30px 110px;
        }

        /* ================= FLASH ALERTS ================= */

        .flash-alert {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 13px 18px;
            margin-bottom: 20px;
            border-radius: 12px;
            font-size: 14.5px;
            font-weight: 500;
        }

        .flash-alert.success {
            background: #eaf8ef;
            border: 1px solid #bfe6cd;
            color: #16794c;
        }

        .flash-alert.error {
            background: #fff0f0;
            border: 1px solid #f5c2c2;
            color: #a81c1c;
        }

        .flash-alert-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ================= PRODUCT HEADING ================= */

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

        /* ================= SEARCH ================= */

        .search-form {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .search-input-wrapper {
            flex: 1;
            min-width: 0;
            position: relative;
        }

        .search-input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #99877e;
            font-size: 15px;
        }

        .search-form input {
            width: 100%;
            padding: 13px 15px 13px 42px;
            border: 1px solid #eadbd0;
            border-radius: 9px;
            background: white;
            outline: none;
            font-size: 15px;
        }

        .search-form input:focus {
            border-color: var(--dashboard-red);
        }

        .search-form button {
            min-height: 45px;
            padding: 0 20px;
            border: none;
            border-radius: 8px;
            background: var(--dashboard-red);
            color: white;
            font-size: 14.5px;
            font-weight: 600;
        }

        .search-form button:hover {
            background: var(--dashboard-red-hover);
        }

        /* ================= PRODUCT GRID ================= */

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 23px;
        }

        .product-card {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: white;
            border: 1px solid #f0dfd3;
            border-radius: 20px;
            transition: .2s ease;
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(80, 35, 20, 0.08);
        }

        .product-image {
            width: 100%;
            height: 213px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #f8f0e9;
            font-size: 55px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 18px 19px 20px;
        }

        .product-content h3 {
            margin-bottom: 6px;
            color: #34241f;
            font-size: 18px;
            font-weight: 600;
        }

        /* ================= RATING BINTANG ================= */

        .product-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
            font-size: 13px;
            color: #8b776d;
        }

        .product-rating i {
            color: #f59e0b;
            font-size: 13.5px;
        }

        .product-rating strong {
            color: #34241f;
            font-weight: 700;
        }

        .product-price {
            margin-bottom: 16px;
            color: #941919;
            font-size: 17.5px;
            font-weight: 600;
        }

        .product-price small {
            display: block;
            color: #8b776d;
            font-size: 12px;
            font-weight: 500;
            margin-top: 2px;
        }

        /* ================= CARD ACTION BUTTONS ================= */

        .product-actions {
            margin-top: auto;
            display: grid;
            grid-template-columns: 1fr 1.35fr;
            gap: 8px;
        }

        .product-actions form {
            margin: 0;
            display: flex;
        }

        .btn-detail,
        .btn-add-cart,
        .btn-preorder {
            width: 100%;
            min-height: 41px;
            padding: 9px 10px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            transition: .2s ease;
            white-space: nowrap;
        }

        .btn-detail {
            background: #fff8f7;
            color: var(--dashboard-red);
            border: 1.5px solid #e2b8b8;
        }

        .btn-detail:hover {
            background: #fdecec;
            border-color: var(--dashboard-red);
        }

        .btn-add-cart {
            border: none;
            background: var(--dashboard-red);
            color: white;
        }

        .btn-add-cart:hover {
            background: var(--dashboard-red-hover);
        }

        .btn-add-cart:disabled {
            opacity: 0.75;
            cursor: wait;
        }

        .btn-preorder {
            border: none;
            background: #16874b;
            color: white;
        }

        .btn-preorder:hover {
            background: #126e3d;
        }

        /* ================= FLOATING BOTTOM CART BAR ================= */

        .floating-cart-bar {
            position: fixed;
            bottom: 22px;
            left: calc(50% + 132.5px);
            transform: translate(-50%, 130%);
            width: min(680px, calc(100% - 310px));
            padding: 15px 22px;
            border-radius: 16px;
            background: linear-gradient(135deg, #941919 0%, #b82525 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            box-shadow: 0 14px 34px rgba(148, 25, 25, 0.36);
            border: 1px solid rgba(255, 255, 255, 0.16);
            z-index: 90;
            opacity: 0;
            pointer-events: none;
            transition: transform 0.32s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.25s ease, background 0.2s ease;
        }

        .floating-cart-bar.visible {
            transform: translate(-50%, 0);
            opacity: 1;
            pointer-events: auto;
        }

        .floating-cart-bar:hover {
            background: linear-gradient(135deg, #a61d1d 0%, #c62b2b 100%);
            transform: translate(-50%, -2px);
        }

        .floating-cart-bar.pulse {
            animation: cartBarBounce 0.35s ease;
        }

        @keyframes cartBarBounce {
            0% {
                transform: translate(-50%, 0) scale(1);
            }

            50% {
                transform: translate(-50%, -4px) scale(1.02);
            }

            100% {
                transform: translate(-50%, 0) scale(1);
            }
        }

        .floating-cart-left {
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 0;
        }

        .floating-bag-wrap {
            position: relative;
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: rgba(255, 255, 255, 0.16);
            display: grid;
            place-items: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .floating-bag-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            min-width: 19px;
            height: 19px;
            padding: 0 5px;
            border-radius: 999px;
            background: #ffffff;
            color: var(--dashboard-red);
            font-size: 11.5px;
            font-weight: 700;
            display: grid;
            place-items: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .floating-cart-text strong {
            display: block;
            font-size: 15.5px;
            font-weight: 700;
            letter-spacing: 0.1px;
        }

        .floating-cart-text span {
            display: block;
            font-size: 12.5px;
            color: #fad8d8;
            margin-top: 1px;
        }

        .floating-cart-right {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .floating-cart-total {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        .floating-checkout-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.18);
            font-size: 13px;
            font-weight: 600;
        }

        /* ================= EMPTY STATE ================= */

        .empty-products {
            grid-column: 1 / -1;
            padding: 45px 20px;
            text-align: center;
            background: white;
            border: 1px dashed #e4c9b7;
            border-radius: 14px;
        }

        .empty-products i {
            color: var(--dashboard-red);
            font-size: 43px;
        }

        .empty-products h3 {
            margin: 14px 0 8px;
            font-size: 19px;
            font-weight: 600;
        }

        .empty-products p {
            color: #907d73;
            font-size: 14.5px;
            line-height: 1.6;
        }

        .empty-products a {
            display: inline-block;
            margin-top: 17px;
            padding: 10px 17px;
            border-radius: 8px;
            background: var(--dashboard-red);
            color: white;
            font-size: 14.5px;
            font-weight: 600;
        }

        .result-info {
            margin-bottom: 17px;
            color: #907d73;
            font-size: 14.5px;
        }

        /* ================= FOOTER ================= */

        .footer {
            padding: 25px;
            text-align: center;
            color: #99877e;
            font-size: 13.5px;
        }

        /* ================= LOGOUT MODAL ================= */

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
            cursor: pointer;
        }

        .cancel-logout {
            border: 1px solid #e5d4c9;
            background: white;
            color: #59453d;
        }

        .cancel-logout:hover {
            background: #f5ebe3;
        }

        .confirm-logout {
            border: none;
            background: var(--dashboard-red);
            color: white;
        }

        .confirm-logout:hover {
            background: var(--dashboard-red-hover);
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

        /* ================= RESPONSIVE ================= */

        @media(max-width: 1280px) {
            .product-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media(max-width: 1000px) {
            .product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 800px) {
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
                padding: 22px 18px 110px;
            }

            .floating-cart-bar {
                left: 50%;
                width: calc(100% - 28px);
                bottom: 16px;
                padding: 14px 18px;
            }
        }

        @media(max-width: 550px) {
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

            .topbar-actions {
                gap: 8px;
            }

            .btn-saya,
            .login-button {
                padding: 10px 12px;
            }

            .content {
                padding: 20px 14px 110px;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

            .product-image {
                height: 220px;
            }

            .search-form {
                gap: 7px;
            }

            .search-form button {
                padding: 0 13px;
            }

            .floating-checkout-pill {
                display: none;
            }
        }
    </style>
</head>

<body>

    @php
        $cartItems = session()->get('cart', []);
        $cartCount = array_sum(array_column($cartItems, 'quantity'));
        $cartTotal = collect($cartItems)->sum(function ($item) {
            if (isset($item['subtotal'])) {
                return (float) $item['subtotal'];
            }
            $price = (float) ($item['price'] ?? 0);
            $qty = (int) ($item['quantity'] ?? 1);
            return $price * $qty;
        });

        // Tujuan saat floating cart bar diklik
        $checkoutUrl = \Illuminate\Support\Facades\Route::has('checkout.index')
            ? route('checkout.index')
            : (\Illuminate\Support\Facades\Route::has('checkout')
                ? route('checkout')
                : route('cart.index'));

        $addToCartUrl = \Illuminate\Support\Facades\Route::has('cart.add')
            ? route('cart.add')
            : (\Illuminate\Support\Facades\Route::has('cart.store')
                ? route('cart.store')
                : url('/cart/add'));

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
                            <span class="sidebar-icon">
                                <i class="bi bi-grid-1x2-fill"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}"
                            class="sidebar-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="bi bi-box-seam"></i>
                            </span>
                            <span>Produk</span>
                        </a>
                    </li>

                    @auth
                        <li>
                            <a href="{{ route('dashboard', ['menu' => 'orders']) }}" class="sidebar-link">
                                <span class="sidebar-icon">
                                    <i class="bi bi-bag-check"></i>
                                </span>
                                <span>Pesanan Saya</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard', ['menu' => 'profile']) }}" class="sidebar-link">
                                <span class="sidebar-icon">
                                    <i class="bi bi-person-circle"></i>
                                </span>
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

            <!-- ================= TOPBAR ================= -->

            <header class="topbar">

                <button type="button" class="mobile-menu" onclick="toggleSidebar()" aria-label="Buka menu">
                    <i class="bi bi-list"></i>
                </button>

                <div class="topbar-heading">
                    <div class="topbar-title">Produk</div>
                    <div class="topbar-description">
                        Temukan pizza favorit kamu.
                    </div>
                </div>

                <div class="topbar-actions">

                    <a href="{{ route('cart.index') }}" class="cart-button" aria-label="Keranjang">
                        <i class="bi bi-cart3"></i>
                        <span class="cart-badge" id="topbarCartBadge"
                            style="{{ $cartCount > 0 ? '' : 'display:none;' }}">
                            {{ $cartCount }}
                        </span>
                    </a>

                    @guest
                        <a href="{{ route('login') }}" class="login-button">
                            Login
                        </a>
                    @else
                        <a href="{{ route('dashboard', ['menu' => 'profile']) }}" class="btn-saya">
                            <i class="bi bi-person-circle"></i>
                            <span>Saya</span>
                        </a>
                    @endguest

                </div>

            </header>

            <!-- ================= CONTENT ================= -->

            <main class="content">

                @if (session('success'))
                    <div class="flash-alert success">
                        <div class="flash-alert-left">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="flash-alert error">
                        <div class="flash-alert-left">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                <div id="ajaxErrorBanner" class="flash-alert error" style="display: none;">
                    <div class="flash-alert-left">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        <span id="ajaxErrorText"></span>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="flash-alert error">
                        <div class="flash-alert-left">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <h1 class="page-title">Menu Pizza Kami 🍕</h1>

                <p class="page-subtitle">
                    Pilih pizza favoritmu dan nikmati kelezatannya bersama PizzaMozza.
                </p>

                <!-- PENCARIAN PRODUK -->

                <form action="{{ route('products.index') }}" method="GET" class="search-form">

                    <div class="search-input-wrapper">
                        <i class="bi bi-search"></i>

                        <input type="search" name="search" placeholder="Cari nama produk..."
                            value="{{ request('search') }}">
                    </div>

                    <button type="submit">Cari</button>

                </form>

                @if (request('search'))
                    <p class="result-info">
                        Menampilkan hasil pencarian untuk:
                        <strong>"{{ request('search') }}"</strong>
                    </p>
                @endif

                <!-- GRID DAFTAR PRODUK -->

                <div class="product-grid">
                    @forelse ($products as $product)
                        @php
                            $variants = $product->variants ?? collect();
                            $firstVariant = $variants->first();
                            $displayPrice =
                                $variants->count() > 0
                                    ? (float) $variants->min('price')
                                    : (float) ($product->price ?? 0);

                            // Hitung rata-rata rating dan jumlah ulasan
                            $avgRating = round((float) ($product->ratings->avg('rating') ?? 0), 1);
                            $totalReviews = $product->ratings->count();

                            // Resolusi gambar produk lintas folder (image/, images/, storage/)
                            $rawImg = $product->image ? ltrim($product->image, '/') : null;
                            $productImgUrl = null;
                            if ($rawImg) {
                                if (str_starts_with($rawImg, 'http')) {
                                    $productImgUrl = $rawImg;
                                } else {
                                    foreach (
                                        [
                                            'image/' . $rawImg,
                                            'images/' . $rawImg,
                                            'storage/' . $rawImg,
                                            'uploads/' . $rawImg,
                                            $rawImg,
                                        ]
                                        as $candidate
                                    ) {
                                        if (file_exists(public_path($candidate))) {
                                            $productImgUrl = asset($candidate);
                                            break;
                                        }
                                    }
                                }
                            }

                            $isOutOfStock = isset($product->stock) && (int) $product->stock <= 0;
                        @endphp

                        <article class="product-card">
                            <a href="{{ route('products.show', $product->id) }}" class="product-image">
                                @if ($productImgUrl)
                                    <img src="{{ $productImgUrl }}" alt="{{ $product->name }}"
                                        onerror="this.style.display='none'; this.parentElement.textContent='🍕';">
                                @else
                                    🍕
                                @endif
                            </a>

                            <div class="product-content">
                                <h3>
                                    <a href="{{ route('products.show', $product->id) }}">
                                        {{ $product->name }}
                                    </a>
                                </h3>

                                {{-- RATING BINTANG PRODUK --}}
                                <div class="product-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <strong>{{ $totalReviews > 0 ? number_format($avgRating, 1) : 'Baru' }}</strong>
                                    @if ($totalReviews > 0)
                                        <span>({{ $totalReviews }} ulasan)</span>
                                    @endif
                                </div>

                                <div class="product-price">
                                    Rp{{ number_format($displayPrice, 0, ',', '.') }}
                                    @if ($variants->count() > 1)
                                        <small>Mulai dari {{ $variants->count() }} ukuran</small>
                                    @elseif ($firstVariant)
                                        <small>Ukuran {{ $firstVariant->name }}</small>
                                    @endif
                                </div>

                                <div class="product-actions">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn-detail">
                                        <i class="bi bi-eye"></i>
                                        <span>Detail</span>
                                    </a>

                                    @if ($isOutOfStock)
                                        <a href="{{ route('products.show', $product->id) }}" class="btn-preorder">
                                            <i class="bi bi-clock-history"></i>
                                            <span>Pre-Order</span>
                                        </a>
                                    @else
                                        <form action="{{ $addToCartUrl }}" method="POST" class="js-ajax-cart-form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="variant_id"
                                                value="{{ $firstVariant?->id }}">
                                            <input type="hidden" name="quantity" value="1">

                                            <button type="submit" class="btn-add-cart">
                                                <i class="bi bi-cart-plus"></i>
                                                <span>Keranjang</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="empty-products">
                            <i class="bi bi-search"></i>
                            <h3>Produk tidak ditemukan</h3>
                            <p>
                                Maaf, menu yang kamu cari belum tersedia. Coba kata kunci lain atau lihat semua menu
                                kami.
                            </p>
                            <a href="{{ route('products.index') }}">Lihat Semua Produk</a>
                        </div>
                    @endforelse
                </div>

            </main>

            <!-- ================= FOOTER ================= -->

            <footer class="footer">
                © {{ date('Y') }} PizzaMozza. All Rights Reserved.
            </footer>

        </div>

    </div>

    <!-- ================= FLOATING BOTTOM CART BAR ================= -->

    <a href="{{ $checkoutUrl }}" id="floatingCartBar"
        class="floating-cart-bar {{ $cartCount > 0 ? 'visible' : '' }}">
        <div class="floating-cart-left">
            <div class="floating-bag-wrap">
                <i class="bi bi-bag-check-fill"></i>
                <span class="floating-bag-badge" id="floatingBagBadge">{{ $cartCount }}</span>
            </div>
            <div class="floating-cart-text">
                <strong id="floatingCartCountText">{{ $cartCount }} Item di Keranjang</strong>
                <span>Klik untuk lanjut ke pembayaran</span>
            </div>
        </div>

        <div class="floating-cart-right">
            <span class="floating-cart-total" id="floatingCartTotal">
                Rp{{ number_format($cartTotal, 0, ',', '.') }}
            </span>
            <span class="floating-checkout-pill">
                <span>Checkout</span>
                <i class="bi bi-arrow-right"></i>
            </span>
        </div>
    </a>

    <!-- ================= LOGOUT FORM & MODAL ================= -->

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
            if (sidebar) {
                sidebar.classList.toggle('open');
            }
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.mobile-menu');
            if (
                window.innerWidth <= 800 &&
                sidebar &&
                toggleBtn &&
                sidebar.classList.contains('open') &&
                !sidebar.contains(event.target) &&
                !toggleBtn.contains(event.target)
            ) {
                sidebar.classList.remove('open');
            }
        });

        // Modal Logout
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

        // AJAX Tambah ke Keranjang & Update Floating Cart Bar
        function formatRupiah(angka) {
            return 'Rp' + new Intl.NumberFormat('id-ID').format(angka);
        }

        function showAjaxError(message) {
            const banner = document.getElementById('ajaxErrorBanner');
            const text = document.getElementById('ajaxErrorText');
            if (banner && text) {
                text.textContent = message;
                banner.style.display = 'flex';
                banner.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest'
                });
            }
        }

        document.querySelectorAll('.js-ajax-cart-form').forEach(function(form) {
            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                const submitBtn = form.querySelector('button[type="submit"]');
                const originalHtml = submitBtn ? submitBtn.innerHTML : '';
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML =
                        '<i class="bi bi-hourglass-split"></i><span>Menambah...</span>';
                }

                try {
                    const formData = new FormData(form);
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                        'content');

                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            ...(csrfToken ? {
                                'X-CSRF-TOKEN': csrfToken
                            } : {})
                        },
                        body: formData
                    });

                    const contentType = response.headers.get('content-type') || '';
                    if (!contentType.includes('application/json')) {
                        form.submit();
                        return;
                    }

                    const data = await response.json();

                    if (!response.ok) {
                        showAjaxError(data.message || 'Gagal menambahkan produk ke keranjang.');
                        return;
                    }

                    const count = Number(data.cart_count ?? data.count ?? 0);
                    const total = Number(data.cart_total ?? data.total ?? 0);

                    const topBadge = document.getElementById('topbarCartBadge');
                    if (topBadge) {
                        topBadge.textContent = count;
                        topBadge.style.display = count > 0 ? 'grid' : 'none';
                    }

                    const floatingBar = document.getElementById('floatingCartBar');
                    const floatingBagBadge = document.getElementById('floatingBagBadge');
                    const floatingCountText = document.getElementById('floatingCartCountText');
                    const floatingTotal = document.getElementById('floatingCartTotal');

                    if (floatingBagBadge) floatingBagBadge.textContent = count;
                    if (floatingCountText) floatingCountText.textContent = count + ' Item di Keranjang';
                    if (floatingTotal) floatingTotal.textContent = formatRupiah(total);

                    if (floatingBar) {
                        if (count > 0) {
                            floatingBar.classList.add('visible');
                            floatingBar.classList.remove('pulse');
                            void floatingBar.offsetWidth;
                            floatingBar.classList.add('pulse');
                        } else {
                            floatingBar.classList.remove('visible');
                        }
                    }

                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="bi bi-check-lg"></i><span>Ditambah</span>';
                        setTimeout(() => {
                            submitBtn.innerHTML = originalHtml;
                        }, 900);
                    }
                } catch (error) {
                    form.submit();
                } finally {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                    }
                }
            });
        });
    </script>

</body>

</html>
