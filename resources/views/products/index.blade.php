<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .user-avatar,
        .profile-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 50%;
            background: #ffe0e0;
            color: var(--dashboard-red);
            font-weight: 600;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            font-size: 17px;
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
            padding: 30px;
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
            padding: 18px 19px 20px;
        }

        .product-content h3 {
            margin-bottom: 8px;
            color: #34241f;
            font-size: 18px;
            font-weight: 600;
        }

        .product-description {
            display: none;
        }

        .product-price {
            margin-bottom: 15px;
            color: #941919;
            font-size: 17.5px;
            font-weight: 600;
        }

        .product-button {
            display: block;
            width: 100%;
            padding: 12px 10px;
            border-radius: 9px;
            background: #941919;
            color: white;
            text-align: center;
            font-size: 15px;
            font-weight: 600;
            transition: .2s ease;
        }

        .product-button:hover {
            background: #b52d2d;
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

        @media(max-width: 1200px) {
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
                padding: 22px 18px;
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
                padding: 20px 14px;
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
                            <span class="sidebar-icon">
                                <i class="bi bi-grid-1x2-fill"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}"
                            class="sidebar-link {{ request()->routeIs('products.index') ? 'active' : '' }}">
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
                            @if (auth()->user()->foto_profile)
                                <img src="{{ asset('storage/' . auth()->user()->foto_profile) }}" alt="Foto profil">
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

                        @auth
                            @php
                                $cartCount = session('cart') ? collect(session('cart'))->sum('quantity') : 0;
                            @endphp

                            @if ($cartCount > 0)
                                <span class="cart-badge">{{ $cartCount }}</span>
                            @endif
                        @endauth
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

                <h1 class="page-title">Menu Pizza Kami 🍕</h1>

                <p class="page-subtitle">
                    Pilih pizza favoritmu dan nikmati kelezatannya bersama PizzaMozza.
                </p>

                <!-- PENCARIAN PRODUK -->

                <form action="{{ route('products.index') }}" method="GET" class="search-form">

                    <div class="search-input-wrapper">
                        <i class="bi bi-search"></i>

                        <input type="search" name="search" placeholder="Cari nama produk..."
                            value="{{ request('search') }}" aria-label="Cari produk">
                    </div>

                    <button type="submit">
                        <i class="bi bi-search"></i>
                        Cari
                    </button>

                </form>

                @if (request('search'))
                    <div class="result-info">
                        Hasil pencarian untuk:
                        <strong>{{ request('search') }}</strong>
                    </div>
                @endif

                <!-- DAFTAR PRODUK -->

                <section class="product-grid">

                    @forelse ($products as $product)
                        @php
                            $imgFile = $product->image ?? ($product->gambar ?? ($product->foto ?? null));
                            $imgFile = $imgFile ? ltrim($imgFile, '/') : null;

                            $candidates = $imgFile
                                ? [
                                    'storage/' . $imgFile,
                                    'image/' . $imgFile,
                                    'images/' . $imgFile,
                                    'uploads/' . $imgFile,
                                    $imgFile,
                                ]
                                : [];

                            $resolvedImage = null;
                            foreach ($candidates as $path) {
                                if (file_exists(public_path($path))) {
                                    $resolvedImage = asset($path);
                                    break;
                                }
                            }

                            if (!$resolvedImage && $imgFile) {
                                $resolvedImage = str_starts_with($imgFile, 'http')
                                    ? $imgFile
                                    : asset('image/' . $imgFile);
                            }

                            $startingPrice = $product->variants->min('price') ?? $product->price;
                        @endphp

                        <article class="product-card">

                            <div class="product-image">
                                @if ($resolvedImage)
                                    <img src="{{ $resolvedImage }}" alt="{{ $product->name }}"
                                        onerror="this.style.display='none'; this.parentElement.textContent='🍕';">
                                @else
                                    🍕
                                @endif
                            </div>

                            <div class="product-content">

                                <h3>{{ $product->name }}</h3>

                                <div class="product-price">
                                    @if ($startingPrice !== null)
                                        Rp {{ number_format($startingPrice, 0, ',', '.') }}
                                    @else
                                        Harga belum tersedia
                                    @endif
                                </div>

                                <a href="{{ route('products.show', $product->id) }}" class="product-button">
                                    Lihat Produk
                                </a>

                            </div>

                        </article>

                    @empty

                        <div class="empty-products">
                            <i class="bi bi-emoji-frown"></i>

                            <h3>Produk belum ditemukan</h3>

                            <p>
                                @if (request('search'))
                                    Coba gunakan kata pencarian yang berbeda.
                                @else
                                    Produk PizzaMozza belum tersedia saat ini.
                                @endif
                            </p>

                            @if (request('search'))
                                <a href="{{ route('products.index') }}">
                                    Lihat Semua Produk
                                </a>
                            @endif
                        </div>
                    @endforelse

                </section>

            </main>

            <footer class="footer">
                © {{ date('Y') }} PizzaMozza. All Rights Reserved.
            </footer>

        </div>

    </div>

    <!-- ================= FORM LOGOUT ================= -->

    @auth
        <form action="{{ route('logout') }}" method="POST" id="customerLogoutForm">
            @csrf
        </form>
    @endauth

    <!-- ================= POPUP LOGOUT ================= -->

    <div class="logout-modal" id="customerLogoutModal">

        <div class="logout-dialog" role="dialog" aria-modal="true" aria-labelledby="customerLogoutTitle">

            <div class="logout-modal-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>

            <h3 id="customerLogoutTitle">
                Keluar dari Akun?
            </h3>

            <p>
                Apakah kamu yakin ingin keluar dari akun PizzaMozza?
            </p>

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

        document.getElementById('customerLogoutModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeCustomerLogoutModal();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeCustomerLogoutModal();
            }
        });
    </script>

</body>

</html>