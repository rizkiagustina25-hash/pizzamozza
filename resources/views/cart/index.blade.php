
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - PizzaMozza</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f7f7;
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

        /* LAYOUT */
        .app {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            background: #fff;
            border-right: 1px solid #eee;
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform .25s ease;
        }

        .main-wrapper {
            width: calc(100% - 240px);
            margin-left: 240px;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .brand {
            height: 80px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid #f0f0f0;
            flex-shrink: 0;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e63946;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .brand-text {
            font-size: 20px;
            font-weight: 700;
            color: #222;
        }

        .brand-text span {
            color: #e63946;
        }

        .sidebar-section {
            padding: 25px 15px 10px;
        }

        .sidebar-title {
            padding: 0 12px 10px;
            font-size: 10px;
            font-weight: 700;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-link {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 9px;
            color: #555;
            font-size: 14px;
            transition: .2s ease;
        }

        .sidebar-link:hover {
            background: #fff1f1;
            color: #e63946;
        }

        .sidebar-link.active {
            background: #e63946;
            color: #fff;
            font-weight: 600;
        }

        .sidebar-icon {
            width: 24px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 15px;
            border-top: 1px solid #eee;
        }

        .user-mini {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 10px;
            background: #fafafa;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #ffe0e0;
            color: #e63946;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            overflow: hidden;
            flex-shrink: 0;
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
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            margin-top: 3px;
            font-size: 10px;
            color: #999;
        }

        /* HEADER */
        .topbar {
            min-height: 80px;
            background: #fff;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            padding: 15px 30px;
            gap: 20px;
            position: sticky;
            top: 0;
            z-index: 50;
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
            border-color: #e63946;
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
        }

        .cart-badge {
            position: absolute;
            top: -3px;
            right: -3px;
            min-width: 17px;
            height: 17px;
            padding: 0 4px;
            border-radius: 10px;
            background: #e63946;
            color: #fff;
            font-size: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-button {
            padding: 10px 18px;
            background: #e63946;
            color: #fff;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .login-button:hover {
            background: #c92e3a;
        }

        .mobile-menu {
            display: none;
            width: 40px;
            height: 40px;
            border: 0;
            border-radius: 8px;
            background: #fff3f3;
            color: #e63946;
            font-size: 18px;
        }

        /* CONTENT */
        .content {
            padding: 30px;
        }

        .page-title {
            margin-bottom: 6px;
            font-size: 26px;
            font-weight: 700;
            color: #222;
        }

        .page-subtitle {
            margin-bottom: 25px;
            font-size: 13px;
            color: #888;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 18px;
            color: #e63946;
            font-size: 13px;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* ALERT */
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

        /* CART */
        .cart-box {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e5e5e5;
            overflow: hidden;
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
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
            font-size: 28px;
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
        }

        .product-info p {
            margin: 3px 0;
            font-size: 12px;
            color: #888;
        }

        .price {
            margin-top: 8px;
            font-weight: 700;
            color: #e63946;
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
            color: #e63946;
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
            background: #e63946;
            color: #fff;
        }

        .btn-primary:hover {
            background: #c92e3a;
        }

        .btn-secondary {
            border: 1px solid #ddd;
            background: #eee;
            color: #333;
        }

        .btn-secondary:hover {
            background: #ddd;
        }

        .empty {
            padding: 70px 20px;
            text-align: center;
            color: #888;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .empty h3 {
            margin-bottom: 8px;
            color: #333;
        }

        .empty p {
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* FOOTER */
        .footer {
            padding: 25px 30px;
            text-align: center;
            color: #999;
            font-size: 11px;
        }

        /* RESPONSIVE */
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
        }

        @media (max-width: 800px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
                box-shadow: 5px 0 20px rgba(0, 0, 0, .1);
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
                padding: 15px;
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

    {{-- SIDEBAR --}}
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
                       class="sidebar-link">
                        <span class="sidebar-icon">🏠</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('products.index') }}"
                       class="sidebar-link">
                        <span class="sidebar-icon">🍕</span>
                        <span>Produk</span>
                    </a>
                </li>

                @auth
                    <li>
                        <a href="{{ route('dashboard') }}?menu=orders"
                           class="sidebar-link">
                            <span class="sidebar-icon">🛒</span>
                            <span>Pesanan Saya</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard') }}?menu=profile"
                           class="sidebar-link">
                            <span class="sidebar-icon">👤</span>
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
                        @if(auth()->user()->foto_profile)
                            <img
                                src="{{ asset('storage/' . auth()->user()->foto_profile) }}"
                                alt="Foto {{ auth()->user()->name }}"
                            >
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>

                    <div class="user-info">
                        <div class="user-name">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="user-role">Pelanggan</div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                   class="btn-primary"
                   style="width:100%;">
                    Login
                </a>
            @endauth
        </div>
    </aside>

    {{-- MAIN WRAPPER --}}
    <div class="main-wrapper">

        {{-- HEADER --}}
        <header class="topbar">
            <button
                type="button"
                class="mobile-menu"
                onclick="toggleSidebar()"
                aria-label="Buka menu"
                aria-controls="sidebar"
                aria-expanded="false"
                id="mobileMenuButton"
            >
                ☰
            </button>

            <form
                action="{{ route('products.index') }}"
                method="GET"
                class="search-box"
            >
                <span class="search-icon">🔍</span>
                <input
                    type="text"
                    name="search"
                    placeholder="Cari pizza favorit kamu..."
                    value="{{ request('search') }}"
                >
            </form>

            <div class="topbar-actions">
                <a
                    href="{{ route('cart.index') }}"
                    class="cart-button"
                    aria-label="Buka keranjang"
                >
                    🛒

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

                @guest
                    <a href="{{ route('login') }}" class="login-button">
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
                            style="border:0;"
                        >
                            Logout
                        </button>
                    </form>
                @endguest
            </div>
        </header>

        {{-- CONTENT --}}
        <main class="content">
            <a href="{{ route('products.index') }}" class="back-link">
                &larr; Kembali ke Menu
            </a>

            <h1 class="page-title">🛒 Keranjang Saya</h1>
            <p class="page-subtitle">
                Periksa kembali pesanan kamu sebelum checkout.
            </p>

            {{-- SUCCESS --}}
            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ERROR --}}
            @if(session('error'))
                <div class="alert error">
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
                                    🍕
                                @endif
                            </div>

                            {{-- PRODUCT INFO --}}
                            <div class="product-info">
                                <h3>{{ $item['name'] }}</h3>

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

                                <button type="submit" class="btn btn-update">
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

                                <button type="submit" class="btn btn-delete">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    @endforeach

                    {{-- CART FOOTER --}}
                    <div class="cart-footer">
                        <div>
                            <span class="total-text">Total Keranjang</span>

                            <strong class="total-price">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </strong>
                        </div>

                        <div class="actions">
                            <form
                                action="{{ route('cart.clear') }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-secondary">
                                    Kosongkan
                                </button>
                            </form>

                            <a
                                href="{{ route('checkout.index') }}"
                                class="btn-primary"
                            >
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="cart-box">
                    <div class="empty">
                        <div class="empty-icon">🛒</div>

                        <h3>Keranjang masih kosong</h3>

                        <p>
                            Yuk pilih produk PizzaMozza terlebih dahulu.
                        </p>

                        <a
                            href="{{ route('products.index') }}"
                            class="btn-primary"
                        >
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

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const button = document.getElementById('mobileMenuButton');

        if (sidebar) {
            const isOpen = sidebar.classList.toggle('open');

            if (button) {
                button.setAttribute('aria-expanded', String(isOpen));
                button.setAttribute(
                    'aria-label',
                    isOpen ? 'Tutup menu' : 'Buka menu'
                );
            }
        }
    }
</script>
</body>
</html>
