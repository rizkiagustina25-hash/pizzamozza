
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Keranjang - PizzaMozza</title>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #fffaf5;
            color: #333;
        }

        button, input {
            font-family: inherit;
        }

        button {
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ==============================
           LAYOUT
        ============================== */

        .app {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 265px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            background: #941919;
            display: flex;
            flex-direction: column;
            z-index: 100;
            color: white;
            transition: transform .25s ease;
        }

        .main-wrapper {
            width: calc(100% - 265px);
            margin-left: 265px;
            min-height: 100vh;
        }

        /* ==============================
           SIDEBAR BRAND
        ============================== */

        .brand {
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
            background: #b52d2d;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .brand-text {
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

        /* ==============================
           SIDEBAR MENU
        ============================== */

        .sidebar-section {
            padding: 24px 15px;
        }

        .sidebar-title {
            margin: 0 12px 12px;
            font-size: 10px;
            font-weight: 700;
            color: #f5dede;
            letter-spacing: .8px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-link {
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

        .sidebar-link:hover,
        .sidebar-link.active {
            background: #b52d2d;
            color: white;
        }

        .sidebar-icon {
            width: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        /* ==============================
           SIDEBAR BOTTOM
        ============================== */

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px 16px;
            border-top: 1px solid rgba(255,255,255,.15);
        }

        .user-mini {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 15px;
            padding: 5px 6px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #b52d2d;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            overflow: hidden;
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
            font-size: 12px;
            font-weight: 700;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            margin-top: 4px;
            font-size: 10px;
            color: #f5dede;
        }

        .sidebar-logout,
        .sidebar-login {
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

        .sidebar-logout:hover,
        .sidebar-login:hover {
            background: #f5dede;
            color: #941919;
        }

        /* ==============================
           TOPBAR
        ============================== */

        .topbar {
            min-height: 72px;
            padding: 12px 34px;
            background: #fff;
            border-bottom: 1px solid #e8e8e8;
            display: flex;
            align-items: center;
            gap: 15px;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .mobile-menu {
            display: none;
            width: 40px;
            height: 40px;
            border: 0;
            border-radius: 8px;
            background: #fff0f0;
            color: #941919;
            font-size: 20px;
        }

        .search-box {
            flex: 1;
            max-width: 450px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            height: 42px;
            border: 1px solid #eee;
            border-radius: 22px;
            padding: 0 18px 0 43px;
            outline: none;
            background: #fafafa;
            font-size: 13px;
        }

        .search-box input:focus {
            border-color: #941919;
            background: #fff;
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .topbar-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .cart-button {
    width: 42px;
    height: 42px;
    border: 0;
    border-radius: 50%;
    background: #fff3f3;
    color: #e63946;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    font-size: 18px;
    transition: .2s ease;
}

/* Ikon aktif ketika berada di halaman keranjang */
.cart-button.active {
    background: #e63946;
    color: #fff;
    box-shadow: 0 3px 10px rgba(230, 57, 70, .25);
}

.cart-button:hover {
    background: #c92e3a;
    color: #fff;
}

        .login-button {
            padding: 10px 18px;
            background: #941919;
            color: #fff;
            border: 0;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .login-button:hover {
            background: #b52d2d;
        }

        /* ==============================
           CONTENT
        ============================== */

        .content {
            padding: 35px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 18px;
            color: #941919;
            font-size: 13px;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .page-title {
            margin-bottom: 6px;
            font-size: 28px;
            font-weight: 700;
            color: #292929;
        }

        .page-subtitle {
            margin-bottom: 25px;
            font-size: 13px;
            color: #888;
        }

        /* ==============================
           ALERT
        ============================== */

        .alert {
            padding: 12px 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            background: #eaf8ef;
            color: #23864b;
            font-size: 13px;
        }

        .alert.error {
            background: #fff0f0;
            color: #d22;
        }

        /* ==============================
           CART
        ============================== */

        .cart-box {
            background: #fff;
            border-radius: 14px;
            border: 1px solid #f0dcd0;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,.03);
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .cart-item:last-child {
            border-bottom: 0;
        }

        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            background: #f8e8e3;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
            font-size: 28px;
            color: #941919;
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
            margin-bottom: 6px;
            font-size: 16px;
            overflow-wrap: anywhere;
            color: #292929;
        }

        .product-info p {
            margin: 3px 0;
            font-size: 12px;
            color: #888;
        }

        .price {
            margin-top: 8px;
            font-weight: 700;
            color: #941919;
        }

        .quantity-form {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .quantity-form input {
            width: 60px;
            padding: 9px 5px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .btn {
            border: 0;
            padding: 9px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            white-space: nowrap;
        }

        .btn-update {
            background: #eee;
            color: #333;
        }

        .btn-update:hover {
            background: #ddd;
        }

        .btn-delete {
            background: #fff0f0;
            color: #d22;
        }

        .btn-delete:hover {
            background: #ffe0e0;
        }

        /* ==============================
           CART FOOTER
        ============================== */

        .cart-footer {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            border-top: 1px solid #eee;
        }

        .total-text {
            font-size: 14px;
            color: #777;
        }

        .total-price {
            display: block;
            margin-top: 5px;
            font-size: 22px;
            font-weight: 700;
            color: #941919;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .actions form {
            margin: 0;
        }

        .btn-primary,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .btn-primary {
            border: 0;
            background: #941919;
            color: #fff;
        }

        .btn-primary:hover {
            background: #b52d2d;
        }

        .btn-secondary {
            border: 1px solid #ddd;
            background: #eee;
            color: #333;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background: #ddd;
        }

        /* ==============================
           EMPTY CART
        ============================== */

        .empty {
            padding: 70px 20px;
            text-align: center;
            color: #888;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
            color: #941919;
        }

        .empty h3 {
            margin-bottom: 8px;
            color: #333;
        }

        .empty p {
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* ==============================
           FOOTER
        ============================== */

        .footer {
            padding: 25px 30px;
            text-align: center;
            color: #999;
            font-size: 11px;
        }

        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 1000px) {
            .cart-item {
                flex-wrap: wrap;
            }

            .product-info {
                flex-basis: calc(100% - 100px);
            }

            .cart-footer {
                align-items: flex-start;
            }

            .content {
                padding: 25px;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
                box-shadow: 5px 0 20px rgba(0,0,0,.2);
            }

            .main-wrapper {
                width: 100%;
                margin-left: 0;
            }

            .mobile-menu {
                display: block;
                flex-shrink: 0;
            }

            .topbar {
                padding: 12px 15px;
            }

            .content {
                padding: 25px 20px;
            }

            .cart-footer {
                flex-direction: column;
            }

            .actions {
                width: 100%;
                flex-wrap: wrap;
            }

            .actions form {
                flex: 1;
            }

            .actions form button,
            .actions > a {
                width: 100%;
            }
        }

        @media (max-width: 550px) {
            .search-box {
                display: none;
            }

            .content {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 23px;
            }

            .cart-item {
                gap: 12px;
                padding: 15px;
            }

            .product-image {
                width: 65px;
                height: 65px;
            }

            .product-info {
                flex-basis: calc(100% - 80px);
            }

            .quantity-form {
                flex: 1;
            }

            .quantity-form input {
                flex: 1;
                min-width: 0;
            }

            .cart-item > form:last-child {
                margin-left: auto;
            }

            .cart-footer {
                padding: 15px;
            }

            .total-price {
                font-size: 20px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .actions form {
                width: 100%;
                flex: auto;
            }

            .footer {
                padding: 20px 15px;
            }
        }
    </style>
</head>

<body>

<div class="app">

    {{-- =================================
         SIDEBAR
    ================================== --}}

    <aside class="sidebar" id="sidebar">

        {{-- BRAND --}}
        <div class="brand">

            <div class="brand-icon">
                <i class="fa-solid fa-pizza-slice"></i>
            </div>

            <div>
                <div class="brand-text">PizzaMozza</div>

                <div class="brand-subtitle">
                    Fresh, Tasty, Happiness!
                </div>
            </div>

        </div>

        {{-- MENU --}}
        <div class="sidebar-section">

            <div class="sidebar-title">
                Main Menu
            </div>

            <ul class="sidebar-menu">

                {{-- DASHBOARD --}}
                <li>
                    <a href="{{ route('dashboard') }}"
                       class="sidebar-link {{ request()->routeIs('dashboard') && !request()->has('menu') ? 'active' : '' }}">

                        <span class="sidebar-icon">
                            <i class="bi bi-grid-1x2"></i>
                        </span>

                        <span>Dashboard</span>

                    </a>
                </li>

                {{-- PRODUK --}}
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

                    {{-- PESANAN SAYA --}}
                    <li>
                        <a href="{{ route('dashboard') }}?menu=orders"
                           class="sidebar-link {{ request('menu') === 'orders' ? 'active' : '' }}">

                            <span class="sidebar-icon">
                                <i class="bi bi-receipt"></i>
                            </span>

                            <span>Pesanan Saya</span>

                        </a>
                    </li>

                    {{-- AKUN SAYA --}}
                    <li>
                        <a href="{{ route('dashboard') }}?menu=profile"
                           class="sidebar-link {{ request('menu') === 'profile' ? 'active' : '' }}">

                            <span class="sidebar-icon">
                                <i class="bi bi-person"></i>
                            </span>

                            <span>Akun Saya</span>

                        </a>
                    </li>

                @endauth

            </ul>
        </div>

        {{-- SIDEBAR BOTTOM --}}
        <div class="sidebar-bottom">

            @auth

                <div class="user-mini">

                    <div class="user-avatar">

                        @if(auth()->user()->foto_profile)

                            <img
                                src="{{ asset('storage/' . auth()->user()->foto_profile) }}"
                                alt="Foto {{ auth()->user()->name }}"
                            >

                        @else

                            <i class="bi bi-person"></i>

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

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button type="submit" class="sidebar-logout">

                        <i class="bi bi-box-arrow-right"></i>

                        <span>Keluar</span>

                    </button>

                </form>

            @else

                <a href="{{ route('login') }}"
                   class="sidebar-login">

                    <i class="bi bi-box-arrow-in-right"></i>

                    <span>Login</span>

                </a>

            @endauth

        </div>

    </aside>


    {{-- =================================
         MAIN WRAPPER
    ================================== --}}

    <div class="main-wrapper">

        {{-- TOPBAR --}}
        <header class="topbar">

            {{-- MOBILE MENU --}}
            <button
                type="button"
                class="mobile-menu"
                onclick="toggleSidebar()"
                id="mobileMenuButton"
                aria-label="Buka menu"
                aria-controls="sidebar"
                aria-expanded="false"
            >
                <i class="bi bi-list"></i>
            </button>

            {{-- SEARCH --}}
            <form
                action="{{ route('products.index') }}"
                method="GET"
                class="search-box"
            >

                <span class="search-icon">
                    <i class="bi bi-search"></i>
                </span>

                <input
                    type="text"
                    name="search"
                    placeholder="Cari pizza favorit kamu..."
                    value="{{ request('search') }}"
                >

            </form>

            {{-- TOPBAR ACTIONS --}}
            <div class="topbar-actions">

                {{-- CART BUTTON --}}
                <a
                href="{{ route('cart.index') }}"
                    class="cart-button {{ request()->routeIs('cart.index') ? 'active' : '' }}"
                    aria-label="Buka keranjang"
                    aria-current="{{ request()->routeIs('cart.index') ? 'page' : 'false' }}"
                >
                    <i class="bi bi-cart3"></i>

                    @auth

                        @php
                            $cartCount = session('cart')
                                ? collect(session('cart'))->sum('quantity')
                                : 0;
                        @endphp

                        @if($cartCount > 0)

                            <span class="cart-badge">
                                {{ $cartCount }}
                            </span>

                        @endif

                    @endauth

                </a>

                {{-- LOGIN / LOGOUT --}}
                @guest

                    <a href="{{ route('login') }}"
                       class="login-button">
                        Login
                    </a>

                @else

                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                        style="margin:0;"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="login-button"
                        >
                            Logout
                        </button>

                    </form>

                @endguest

            </div>

        </header>


        {{-- =================================
             CONTENT
        ================================== --}}

        <main class="content">

            <a href="{{ route('products.index') }}"
               class="back-link">

                <i class="bi bi-arrow-left"></i>

                Kembali ke Menu

            </a>

            <h1 class="page-title">
                <i class="bi bi-cart3" style="color:#941919;"></i>
                Keranjang Saya
            </h1>

            <p class="page-subtitle">
                Periksa kembali pesanan kamu sebelum checkout.
            </p>


            {{-- SUCCESS --}}
            @if(session('success'))

                <div class="alert">

                    <i class="bi bi-check-circle-fill"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- ERROR --}}
            @if(session('error'))

                <div class="alert error">

                    <i class="bi bi-exclamation-circle-fill"></i>

                    {{ session('error') }}

                </div>

            @endif


            {{-- VALIDATION ERRORS --}}
            @if($errors->any())

                <div class="alert error">

                    <ul style="padding-left:18px;">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- =================================
                 CART ITEMS
            ================================== --}}

            @if(count($cart) > 0)

                <div class="cart-box">

                    @foreach($cart as $key => $item)

                        <div class="cart-item">

                            {{-- IMAGE --}}
                            <div class="product-image">

                                @if(!empty($item['image']))

                                    <img
                                        src="{{ asset('image/' . $item['image']) }}"
                                        alt="{{ $item['name'] }}"
                                    >

                                @else

                                    <i class="fa-solid fa-pizza-slice"></i>

                                @endif

                            </div>


                            {{-- PRODUCT INFO --}}
                            <div class="product-info">

                                <h3>
                                    {{ $item['name'] }}
                                </h3>

                                @if(!empty($item['variant_name']))

                                    <p>
                                        Ukuran: {{ $item['variant_name'] }}
                                    </p>

                                @endif

                                <div class="price">

                                    Rp {{ number_format($item['price'], 0, ',', '.') }}

                                </div>

                            </div>


                            {{-- UPDATE QUANTITY --}}
                            <form
                                action="{{ route('cart.update', $key) }}"
                                method="POST"
                                class="quantity-form"
                            >

                                @csrf
                                @method('PUT')

                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item['quantity'] }}"
                                    min="1"
                                    required
                                    aria-label="Jumlah {{ $item['name'] }}"
                                >

                                <button type="submit"
                                        class="btn btn-update">

                                    <i class="bi bi-arrow-repeat"></i>
                                    Update

                                </button>

                            </form>


                            {{-- REMOVE ITEM --}}
                            <form
                                action="{{ route('cart.remove', $key) }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-delete">

                                    <i class="bi bi-trash"></i>
                                    Hapus

                                </button>

                            </form>

                        </div>

                    @endforeach


                    {{-- CART FOOTER --}}
                    <div class="cart-footer">

                        <div>

                            <span class="total-text">
                                Total Keranjang
                            </span>

                            <strong class="total-price">

                                Rp {{ number_format($total, 0, ',', '.') }}

                            </strong>

                        </div>


                        <div class="actions">

                            {{-- CLEAR CART --}}
                            <form
                                action="{{ route('cart.clear') }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn-secondary">

                                    <i class="bi bi-trash"></i>
                                    Kosongkan

                                </button>

                            </form>


                            {{-- CHECKOUT --}}
                            <a
                                href="{{ route('checkout.index') }}"
                                class="btn-primary"
                            >

                                <i class="bi bi-credit-card"></i>
                                Checkout

                            </a>

                        </div>

                    </div>

                </div>

            @else

                {{-- EMPTY CART --}}
                <div class="cart-box">

                    <div class="empty">

                        <div class="empty-icon">
                            <i class="bi bi-cart-x"></i>
                        </div>

                        <h3>
                            Keranjang masih kosong
                        </h3>

                        <p>
                            Yuk pilih produk PizzaMozza terlebih dahulu.
                        </p>

                        <a
                            href="{{ route('products.index') }}"
                            class="btn-primary"
                        >

                            <i class="bi bi-bag"></i>
                            Lihat Produk

                        </a>

                    </div>

                </div>

            @endif

        </main>


        {{-- FOOTER --}}
        <footer class="footer">

            © {{ date('Y') }} PizzaMozza. All Rights Reserved.

        </footer>

    </div>

</div>


{{-- =================================
     JAVASCRIPT
================================== --}}

<script>

    function toggleSidebar() {

        const sidebar = document.getElementById('sidebar');

        const button = document.getElementById('mobileMenuButton');

        const isOpen = sidebar.classList.toggle('open');

        button.setAttribute('aria-expanded', String(isOpen));

        button.setAttribute(
            'aria-label',
            isOpen ? 'Tutup menu' : 'Buka menu'
        );

    }

    // Menutup sidebar ketika klik di luar sidebar pada tampilan mobile
    document.addEventListener('click', function(event) {

        const sidebar = document.getElementById('sidebar');

        const button = document.getElementById('mobileMenuButton');

        if (
            window.innerWidth <= 800 &&
            sidebar.classList.contains('open') &&
            !sidebar.contains(event.target) &&
            !button.contains(event.target)
        ) {

            sidebar.classList.remove('open');

            button.setAttribute('aria-expanded', 'false');

            button.setAttribute('aria-label', 'Buka menu');

        }

    });

    // Menutup sidebar dengan tombol Escape
    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            const sidebar = document.getElementById('sidebar');

            const button = document.getElementById('mobileMenuButton');

            sidebar.classList.remove('open');

            button.setAttribute('aria-expanded', 'false');

            button.setAttribute('aria-label', 'Buka menu');

        }

    });

</script>

</body>
</html>
