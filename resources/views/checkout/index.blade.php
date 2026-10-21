```blade
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout - PizzaMozza</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #faf7f2;
            color: #222;
        }

        a {
            text-decoration: none;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #fff;
            border-right: 1px solid #eee;
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .brand {
            height: 80px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 25px;
            border-bottom: 1px solid #f1f1f1;
            color: #222;
            font-size: 21px;
            font-weight: bold;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e63946;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .menu-title {
            padding: 25px 25px 10px;
            color: #999;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .menu {
            padding: 0 15px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 15px;
            margin-bottom: 5px;
            border-radius: 10px;
            color: #666;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #e63946;
            color: white;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 20px;
            border-top: 1px solid #eee;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #ffe5e5;
            color: #e63946;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
            overflow: hidden;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-name {
            font-size: 13px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .user-role {
            margin-top: 4px;
            color: #999;
            font-size: 11px;
        }

        /* MAIN */
        .main-wrapper {
            margin-left: 240px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* HEADER */
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
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .cart-link {
            position: relative;
            color: #333;
            font-size: 23px;
        }

        .cart-badge {
            position: absolute;
            top: -7px;
            right: -10px;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            border-radius: 20px;
            background: #e63946;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
        }

        .auth-button {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            background: #e63946;
            color: white;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .auth-button:hover {
            background: #c62828;
        }

        /* CHECKOUT CONTENT */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 35px;
            flex: 1;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 18px;
            background: white;
            color: #c62828;
            border: 1px solid #c62828;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .back-button:hover {
            background: #c62828;
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
            margin: 0 0 20px;
            font-size: 19px;
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
            color: #c62828;
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
            border-color: #e63946;
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
            color: #c62828;
            text-align: right;
        }

        .payment-button {
            width: 100%;
            border: none;
            background: #c62828;
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
            background: #a91f1f;
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

        /* FOOTER */
        .footer {
            padding: 22px 35px;
            background: white;
            border-top: 1px solid #eee;
            color: #888;
            text-align: center;
            font-size: 12px;
        }

        /* MOBILE */
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
                background: rgba(0, 0, 0, 0.35);
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
                gap: 14px;
            }

            .auth-button {
                padding: 9px 11px;
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
                gap: 10px;
            }

            .auth-button {
                padding: 8px;
                font-size: 12px;
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
        <a href="{{ route('dashboard') }}" class="brand">
            <span class="brand-icon">🍕</span>
            <span>PizzaMozza</span>
        </a>

        <div class="menu-title">MAIN MENU</div>

        <nav class="menu">
            <a href="{{ route('dashboard') }}">
                <span>🏠</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('products.index') }}">
                <span>🍕</span>
                <span>Produk</span>
            </a>

            <a href="{{ route('dashboard') }}">
                <span>📦</span>
                <span>Pesanan Saya</span>
            </a>

            <a href="{{ route('dashboard') }}">
                <span>👤</span>
                <span>Akun Saya</span>
            </a>
        </nav>

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

                    <div>
                        <div class="user-name">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="user-role">Pelanggan</div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="auth-button">
                    Login
                </a>
            @endauth
        </div>
    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- MAIN WRAPPER --}}
    <div class="main-wrapper">

        {{-- HEADER --}}
        <header class="topbar">
            <div class="topbar-left">
                <button
                    type="button"
                    class="mobile-menu-btn"
                    id="mobileMenuBtn"
                    aria-label="Buka menu"
                    aria-expanded="false"
                >
                    ☰
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

                    <button type="submit" aria-label="Cari">🔍</button>
                </form>
            </div>

            <div class="topbar-right">
                <a
                    href="{{ route('cart.index') }}"
                    class="cart-link"
                    aria-label="Keranjang belanja"
                >
                    🛒

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

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="auth-button">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="auth-button">
                        Login
                    </a>
                @endauth
            </div>
        </header>

        {{-- CHECKOUT CONTENT --}}
        <main class="container">

            <a href="{{ route('cart.index') }}" class="back-button">
                ← Kembali ke Keranjang
            </a>

            <h1>Checkout</h1>

            <p class="subtitle">
                Periksa informasi pengiriman dan pesanan kamu.
            </p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Periksa kembali data yang kamu masukkan:</strong>
                    <ul style="margin-bottom: 0;">
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
                        <h2>📍 Informasi Pelanggan</h2>

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
                        <h2>🛒 Pesanan Kamu</h2>

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
                                Lihat Produk
                            </a>
                        @endforelse
                    </section>

                </div>

                {{-- KOLOM KANAN: RINGKASAN --}}
                <div>
                    <section class="card">
                        <h2>Ringkasan Pembayaran</h2>

                        <form
                            action="{{ route('checkout.store') }}"
                            method="POST"
                        >
                            @csrf

                            <div class="form-group">
                                <label for="address">
                                    📍 Alamat Pengiriman
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

                            <div class="summary-row">
                                <span>Total Produk</span>

                                <span>
                                    Rp{{ number_format($total, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="summary-row">
                                <span>Ongkos Kirim</span>
                                <span>Akan dihitung</span>
                            </div>

                            <div class="total">
                                <span>Total</span>

                                <span>
                                    Rp{{ number_format($total, 0, ',', '.') }}
                                </span>
                            </div>

                            <button
                                type="submit"
                                class="payment-button"
                                @disabled(empty($cart))
                            >
                                💳 Lanjut ke Pembayaran
                            </button>

                            <div class="note">
                                💡 Setelah checkout dikonfirmasi, pesanan
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
```