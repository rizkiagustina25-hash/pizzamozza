<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout - PizzaMozza</title>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #faf7f2;
            color: #222;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        textarea {
            font-family: inherit;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 265px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #941919;
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }

        .brand {
            height: 88px;
            min-height: 88px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            background: white;
            color: #941919;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            flex-shrink: 0;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .brand-name {
            font-size: 19px;
            font-weight: bold;
            letter-spacing: 0.3px;
        }

        .brand-subtitle {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.75);
        }

        .menu-title {
            padding: 28px 25px 12px;
            color: rgba(255, 255, 255, 0.55);
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.2px;
        }

        .menu {
            padding: 0 15px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 15px;
            margin-bottom: 6px;
            border-radius: 9px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a i {
            width: 20px;
            font-size: 17px;
            text-align: center;
        }

        .menu a:hover,
        .menu a.active {
            background: #b52d2d;
            color: white;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 18px;
            min-width: 0;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            color: #941919;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: bold;
            flex-shrink: 0;
            overflow: hidden;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            min-width: 0;
        }

        .user-name {
            color: white;
            font-size: 13px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .user-role {
            margin-top: 5px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 11px;
        }

        .logout-form {
            width: 100%;
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 11px 15px;
            border: none;
            border-radius: 8px;
            background: white;
            color: #941919;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .logout-button:hover {
            background: #f5e5e5;
        }

        .login-sidebar-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            width: 100%;
            padding: 11px 15px;
            border-radius: 8px;
            background: white;
            color: #941919;
            font-size: 13px;
            font-weight: bold;
        }

        /* ================= MAIN ================= */

        .main-wrapper {
            margin-left: 265px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ================= TOPBAR ================= */

        .topbar {
            height: 80px;
            padding: 0 35px;
            background: white;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
            flex: 1;
        }

        .mobile-menu-btn {
            display: none;
            border: none;
            background: transparent;
            font-size: 25px;
            cursor: pointer;
            color: #333;
        }

        .search-form {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 350px;
            padding: 10px 15px;
            background: #f7f7f7;
            border-radius: 10px;
        }

        .search-form input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            font-size: 13px;
        }

        .search-form button {
            border: none;
            background: transparent;
            cursor: pointer;
            font-size: 16px;
            color: #555;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .cart-link {
            position: relative;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            color: #941919;
            background: #fceaea;
            font-size: 21px;
            transition: 0.2s;
        }

        .cart-link:hover {
            background: #f5dada;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            border-radius: 20px;
            background: #941919;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: bold;
        }

        /* ================= CHECKOUT CONTENT ================= */

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 35px;
            flex: 1;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            padding: 10px 18px;
            background: white;
            color: #941919;
            border: 1px solid #941919;
            border-radius: 8px;
            font-weight: bold;
            font-size: 13px;
            transition: 0.2s;
        }

        .back-button:hover {
            background: #941919;
            color: white;
        }

        h1 {
            margin: 0 0 10px;
            font-size: 28px;
        }

        .subtitle {
            color: #777;
            margin: 0 0 30px;
            line-height: 1.6;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 380px;
            gap: 25px;
            align-items: start;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            min-width: 0;
        }

        .card h2 {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 0 0 20px;
            font-size: 19px;
        }

        .card h2 i {
            color: #941919;
        }

        .user-info {
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .customer-name {
            font-size: 18px;
            font-weight: bold;
        }

        .address {
            color: #666;
        }

        .item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .item:first-of-type {
            padding-top: 0;
        }

        .item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .item-name {
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .item-detail {
            color: #777;
            font-size: 14px;
            line-height: 1.7;
            margin-top: 5px;
            overflow-wrap: anywhere;
        }

        .item-total {
            color: #941919;
            font-weight: bold;
            margin-top: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            resize: vertical;
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-group textarea:focus {
            outline: none;
            border-color: #941919;
        }

        .error-message {
            color: #c62828;
            font-size: 13px;
            margin-top: 6px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 15px;
            color: #666;
            font-size: 14px;
        }

        .summary-row span:last-child {
            text-align: right;
            color: #333;
        }

        .total {
            border-top: 1px solid #eee;
            padding-top: 18px;
            display: flex;
            justify-content: space-between;
            gap: 15px;
            font-size: 21px;
            font-weight: bold;
        }

        .total span:last-child {
            color: #941919;
            text-align: right;
        }

        .payment-button {
            width: 100%;
            border: none;
            background: #941919;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-top: 25px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
        }

        .payment-button:hover {
            background: #b52d2d;
        }

        .payment-button:disabled {
            background: #aaa;
            cursor: not-allowed;
        }

        .note {
            margin-top: 15px;
            padding: 12px;
            background: #fff5e6;
            border-radius: 8px;
            color: #777;
            font-size: 13px;
            line-height: 1.6;
        }

        .alert {
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
            line-height: 1.6;
        }

        .alert-success {
            background: #e8f7ed;
            color: #216e39;
        }

        .alert-error {
            background: #fdecec;
            color: #a32020;
        }

        /* ================= FOOTER ================= */

        .footer {
            padding: 22px 35px;
            background: white;
            border-top: 1px solid #eee;
            color: #888;
            text-align: center;
            font-size: 12px;
        }

        /* ================= MOBILE ================= */

        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 1000px) {
            .checkout-grid {
                grid-template-columns: minmax(0, 1fr) 330px;
                gap: 18px;
            }

            .container {
                padding: 25px;
            }

            .topbar {
                padding: 0 25px;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.4);
                z-index: 90;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .topbar {
                height: 70px;
                padding: 0 18px;
                gap: 12px;
            }

            .topbar-left {
                gap: 10px;
            }

            .mobile-menu-btn {
                display: block;
            }

            .search-form {
                max-width: none;
                padding: 9px 10px;
            }

            .topbar-right {
                gap: 12px;
            }

            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 25px 18px 40px;
            }

            .card {
                padding: 20px;
            }

            .footer {
                padding: 20px 15px;
            }
        }

        @media (max-width: 420px) {
            .topbar {
                padding: 0 12px;
            }

            .topbar-right {
                gap: 8px;
            }

            .cart-link {
                width: 38px;
                height: 38px;
                font-size: 19px;
            }

            .container {
                padding-right: 13px;
                padding-left: 13px;
            }

            .card {
                padding: 17px;
            }

            h1 {
                font-size: 25px;
            }

            .total {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">

        {{-- BRAND --}}
        <a href="{{ route('dashboard') }}" class="brand">
            <span class="brand-icon">
                <i class="bi bi-pie-chart-fill"></i>
            </span>

            <span class="brand-text">
                <span class="brand-name">PizzaMozza</span>
                <span class="brand-subtitle">Pelanggan</span>
            </span>
        </a>

        {{-- MENU --}}
        <div class="menu-title">MAIN MENU</div>

        <nav class="menu">

            <a href="{{ route('dashboard') }}">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('products.index') }}">
                <i class="bi bi-shop"></i>
                <span>Produk</span>
            </a>

            <a href="{{ route('dashboard') }}?menu=orders">
                <i class="bi bi-receipt"></i>
                <span>Pesanan Saya</span>
            </a>

            <a href="{{ route('dashboard') }}?menu=profile">
                <i class="bi bi-person-circle"></i>
                <span>Akun Saya</span>
            </a>

        </nav>

        {{-- PROFILE DAN LOGOUT --}}
        <div class="sidebar-bottom">

            @auth
                <div class="user-profile">

                    <div class="user-avatar">
                        @if (auth()->user()->foto_profile)
                            <img
                                src="{{ asset('storage/' . auth()->user()->foto_profile) }}"
                                alt="Foto profil"
                            >
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

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="logout-form"
                >
                    @csrf

                    <button type="submit" class="logout-button">
                        <i class="bi bi-box-arrow-left"></i>
                        Logout
                    </button>
                </form>

            @else
                <a href="{{ route('login') }}" class="login-sidebar-button">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login
                </a>
            @endauth

        </div>
    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- MAIN WRAPPER --}}
    <div class="main-wrapper">

        {{-- TOPBAR --}}
        <header class="topbar">

            <div class="topbar-left">

                <button
                    type="button"
                    class="mobile-menu-btn"
                    id="mobileMenuBtn"
                    aria-label="Buka menu"
                    aria-expanded="false"
                >
                    <i class="bi bi-list"></i>
                </button>

                <form
                    action="{{ route('products.index') }}"
                    method="GET"
                    class="search-form"
                >
                    <input
                        type="text"
                        name="search"
                        placeholder="Cari pizza favorit..."
                        value="{{ request('search') }}"
                    >

                    <button type="submit" aria-label="Cari">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

            </div>

            <div class="topbar-right">

                {{-- IKON KERANJANG AKTIF --}}
                <a
                    href="{{ route('cart.index') }}"
                    class="cart-link"
                    aria-label="Keranjang belanja"
                    title="Keranjang belanja"
                >
                    <i class="bi bi-cart3"></i>

                    @php
                        $cartCount = collect(session('cart', []))
                            ->sum('quantity');
                    @endphp

                    @if ($cartCount > 0)
                        <span class="cart-badge">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

            </div>

        </header>

        {{-- CHECKOUT CONTENT --}}
        <main class="container">

            <a href="{{ route('cart.index') }}" class="back-button">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Keranjang
            </a>

            <h1>Checkout</h1>

            <p class="subtitle">
                Periksa informasi pengiriman dan pesanan kamu.
            </p>

            {{-- NOTIFIKASI SUCCESS --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- NOTIFIKASI ERROR --}}
            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            {{-- VALIDASI ERROR --}}
            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Periksa kembali data yang kamu masukkan:</strong>

                    <ul style="margin-bottom: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="checkout-grid">

                {{-- KOLOM KIRI --}}
                <div>

                    {{-- INFORMASI PELANGGAN --}}
                    <section class="card">

                        <h2>
                            <i class="bi bi-geo-alt-fill"></i>
                            Informasi Pelanggan
                        </h2>

                        <div class="user-info">

                            <div class="customer-name">
                                {{ auth()->user()->name }}
                            </div>

                            <div>
                                {{ auth()->user()->email }}
                            </div>

                            <div class="address">
                                {{ auth()->user()->address ?: 'Alamat belum diisi.' }}
                            </div>

                        </div>

                    </section>

                    {{-- DAFTAR PESANAN --}}
                    <section class="card">

                        <h2>
                            <i class="bi bi-cart-check-fill"></i>
                            Pesanan Kamu
                        </h2>

                        @forelse ($cart as $item)

                            <div class="item">

                                <div class="item-name">
                                    {{ $item['product_name'] }}
                                </div>

                                <div class="item-detail">
                                    Ukuran: {{ $item['variant_name'] }}
                                    <br>
                                    Jumlah: {{ $item['quantity'] }}
                                </div>

                                @if (!empty($item['toppings']) && count($item['toppings']) > 0)

                                    <div class="item-detail">
                                        Topping:

                                        @foreach ($item['toppings'] as $topping)
                                            {{ $topping['name'] }}@if (!$loop->last), @endif
                                        @endforeach

                                    </div>

                                @endif

                                <div class="item-total">
                                    Rp{{ number_format($item['subtotal'], 0, ',', '.') }}
                                </div>

                            </div>

                        @empty

                            <p class="item-detail">
                                Keranjang kamu masih kosong.
                            </p>

                            <a href="{{ route('products.index') }}" class="back-button">
                                <i class="bi bi-shop"></i>
                                Lihat Produk
                            </a>

                        @endforelse

                    </section>

                </div>

                {{-- KOLOM KANAN: RINGKASAN --}}
                <div>

                    <section class="card">

                        <h2>
                            <i class="bi bi-receipt"></i>
                            Ringkasan Pembayaran
                        </h2>

                        <form
                            action="{{ route('checkout.store') }}"
                            method="POST"
                        >
                            @csrf

                            {{-- ALAMAT PENGIRIMAN --}}
                            <div class="form-group">

                                <label for="address">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    Alamat Pengiriman
                                </label>

                                <textarea
                                    name="address"
                                    id="address"
                                    rows="4"
                                    required
                                >{{ old('address', auth()->user()->address) }}</textarea>

                                @error('address')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- TOTAL PRODUK --}}
                            <div class="summary-row">

                                <span>Total Produk</span>

                                <span>
                                    Rp{{ number_format($total, 0, ',', '.') }}
                                </span>

                            </div>

                            {{-- ONGKOS KIRIM --}}
                            <div class="summary-row">

                                <span>Ongkos Kirim</span>

                                <span>
                                    Akan dihitung
                                </span>

                            </div>

                            {{-- TOTAL PEMBAYARAN --}}
                            <div class="total">

                                <span>Total</span>

                                <span>
                                    Rp{{ number_format($total, 0, ',', '.') }}
                                </span>

                            </div>

                            {{-- TOMBOL PEMBAYARAN --}}
                            <button
                                type="submit"
                                class="payment-button"
                                @disabled(empty($cart))
                            >
                                <i class="bi bi-credit-card-fill"></i>
                                Lanjut ke Pembayaran
                            </button>

                            {{-- CATATAN --}}
                            <div class="note">
                                <i class="bi bi-info-circle-fill"></i>
                                Setelah checkout dikonfirmasi, pesanan
                                akan dibuat dan kamu akan diarahkan ke
                                halaman pembayaran.
                            </div>

                        </form>

                    </section>

                </div>

            </div>

        </main>

        {{-- FOOTER --}}
        <footer class="footer">
            © {{ date('Y') }} PizzaMozza. All Rights Reserved.
        </footer>

    </div>

    {{-- JAVASCRIPT SIDEBAR MOBILE --}}
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const menuButton = document.getElementById('mobileMenuBtn');

        function openSidebar() {
            sidebar.classList.add('open');
            overlay.classList.add('show');
            menuButton.setAttribute('aria-expanded', 'true');
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
            menuButton.setAttribute('aria-expanded', 'false');
        }

        menuButton.addEventListener('click', function () {
            if (sidebar.classList.contains('open')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });

        overlay.addEventListener('click', closeSidebar);

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeSidebar();
            }
        });
    </script>

</body>
</html>