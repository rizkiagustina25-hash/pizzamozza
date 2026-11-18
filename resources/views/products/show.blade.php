@php
    $isNastar = mb_strtolower(trim($product->name)) === 'kue nastar';

    $cartCount = array_sum(
        array_column(session()->get('cart', []), 'quantity')
    );

    // Resolusi gambar produk otomatis (images/, storage/, image/, uploads/)
    $rawProductImg = $product->image ?? $product->gambar ?? $product->foto ?? null;
    $rawProductImg = $rawProductImg ? ltrim($rawProductImg, '/') : null;
    $resolvedProductImg = null;

    if ($rawProductImg) {
        if (str_starts_with($rawProductImg, 'http')) {
            $resolvedProductImg = $rawProductImg;
        } else {
            foreach (['images/' . $rawProductImg, 'storage/' . $rawProductImg, 'image/' . $rawProductImg, 'uploads/' . $rawProductImg, $rawProductImg] as $path) {
                if (file_exists(public_path($path))) {
                    $resolvedProductImg = asset($path);
                    break;
                }
            }
        }
    }

    // Resolusi foto profil pelanggan di sidebar
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

    $isPizza = strtolower((string) $product->category) === 'pizza';
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} - PizzaMozza</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Bootstrap Icons & Font Awesome --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        :root {
            --dashboard-red: #941919;
            --dashboard-red-hover: #b52d2d;
        }

        body {
            font-family: Calibri, 'Segoe UI', Arial, sans-serif;
            background: #fffaf3;
            color: #34241f;
        }

        /* =========================================
           SIDEBAR PIZZAMOZZA
        ========================================= */

        .app-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 265px;
            background: var(--dashboard-red);
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform .25s ease;
        }

        .app-brand {
            height: 88px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, .15);
            color: #fff;
            text-decoration: none;
            flex-shrink: 0;
        }

        .app-brand-icon {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--dashboard-red-hover);
            color: #fff;
            font-size: 20px;
        }

        .app-brand-name {
            font-size: 25px;
            font-weight: 700;
            line-height: 1.1;
            color: #fff;
        }

        .app-brand-name span {
            color: #ffb4a9;
        }

        .app-brand-subtitle {
            margin-top: 3px;
            font-size: 12.5px;
            color: #f2caca;
        }

        .app-menu {
            padding: 24px 15px;
            flex: 1;
        }

        .app-menu-label {
            margin: 0 12px 12px;
            font-size: 11.5px;
            font-weight: 700;
            color: #e9bdbd;
            letter-spacing: 1.1px;
            text-transform: uppercase;
        }

        .app-menu-link {
            min-height: 45px;
            padding: 0 14px;
            margin-bottom: 5px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #f8eaea;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: .2s ease;
        }

        .app-menu-link i {
            width: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .app-menu-link:hover,
        .app-menu-link.active {
            background: var(--dashboard-red-hover);
            color: #fff;
        }

        .app-profile {
            margin-top: auto;
            padding: 18px 16px;
            border-top: 1px solid rgba(255, 255, 255, .15);
            color: #fff;
        }

        .app-profile-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 13px;
        }

        .app-profile-avatar {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #ffe0e0;
            color: var(--dashboard-red);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: 700;
            overflow: hidden;
        }

        .app-profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .app-profile-name {
            min-width: 0;
            flex: 1;
        }

        .app-profile-name strong {
            display: block;
            font-size: 14.5px;
            color: #fff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .app-profile-name span {
            display: block;
            margin-top: 2px;
            font-size: 12.5px;
            color: #e9bdbd;
        }

        .app-logout-button {
            width: 100%;
            height: 40px;
            border: none;
            border-radius: 8px;
            background: #fff;
            color: var(--dashboard-red);
            font-size: 14.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: .2s ease;
        }

        .app-logout-button:hover {
            background: #fbe9e9;
        }

        /* =========================================
           MAIN & TOPBAR
        ========================================= */

        .app-main {
            margin-left: 265px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .app-topbar {
            height: 88px;
            min-height: 88px;
            position: sticky;
            top: 0;
            z-index: 50;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            gap: 16px;
            background: #fffdf9;
            border-bottom: 1px solid #f0e1d5;
        }

        .app-menu-toggle {
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

        .topbar-cart-button {
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

        .topbar-cart-button:hover {
            background: #f7d8cf;
        }

        .cart-badge {
            position: absolute;
            top: -3px;
            right: -3px;
            min-width: 19px;
            height: 19px;
            padding: 0 5px;
            border-radius: 999px;
            background: #c52c2c;
            color: #fff;
            display: grid;
            place-items: center;
            font-size: 11px;
            font-weight: 700;
        }

        /* =========================================
           INTERACTIVE VARIANT & TOPPING CARDS
        ========================================= */

        .variant-radio:checked + .variant-card {
            border-color: #941919;
            background: #fff4f3;
            box-shadow: 0 6px 16px rgba(148, 25, 25, 0.10);
        }

        .variant-radio:checked + .variant-card .variant-title {
            color: #941919;
        }

        .variant-radio:checked + .variant-card .variant-check-icon {
            opacity: 1;
            transform: scale(1);
        }

        .variant-check-icon {
            opacity: 0;
            transform: scale(0.8);
            transition: all .2s ease;
        }

        /* Hilangkan panah default input number */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        @media (max-width: 800px) {
            .app-sidebar {
                transform: translateX(-100%);
            }

            .app-sidebar.open {
                transform: translateX(0);
            }

            .app-main {
                margin-left: 0;
            }

            .app-menu-toggle {
                display: inline-flex;
            }

            .app-topbar {
                padding: 12px 18px;
                height: 76px;
                min-height: 76px;
            }
        }
    </style>
</head>

<body class="min-h-screen">

    {{-- =========================================
         SIDEBAR
    ========================================= --}}
    <aside class="app-sidebar" id="appSidebar">

        {{-- BRAND --}}
        <a href="{{ route('dashboard') }}" class="app-brand">
            <div class="app-brand-icon">
                <i class="fa-solid fa-pizza-slice"></i>
            </div>

            <div>
                <div class="app-brand-name">
                    Pizza<span>Mozza</span>
                </div>
                <div class="app-brand-subtitle">
                    Fresh, Tasty, Happiness!
                </div>
            </div>
        </a>

        {{-- MENU --}}
        <nav class="app-menu">
            <div class="app-menu-label">
                Main Menu
            </div>

            {{-- DASHBOARD --}}
            <a href="{{ route('dashboard') }}"
               class="app-menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            {{-- PRODUK --}}
            <a href="{{ route('products.index') }}"
               class="app-menu-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i>
                <span>Produk</span>
            </a>

            @auth
                {{-- PESANAN SAYA --}}
                <a href="{{ route('dashboard', ['menu' => 'orders']) }}"
                   class="app-menu-link">
                    <i class="bi bi-bag-check"></i>
                    <span>Pesanan Saya</span>
                </a>

                {{-- AKUN SAYA --}}
                <a href="{{ route('dashboard', ['menu' => 'profile']) }}"
                   class="app-menu-link">
                    <i class="bi bi-person-circle"></i>
                    <span>Akun Saya</span>
                </a>
            @endauth
        </nav>

        {{-- PROFIL --}}
        <div class="app-profile">
            @auth
                <div class="app-profile-info">
                    <div class="app-profile-avatar">
                        @if ($userFotoUrl)
                            <img src="{{ $userFotoUrl }}" alt="Foto profil"
                                 onerror="this.style.display='none'; this.parentElement.textContent='{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}';">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>

                    <div class="app-profile-name">
                        <strong>{{ auth()->user()->name }}</strong>
                        <span>Pelanggan</span>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="app-logout-button">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="app-logout-button">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            @endauth
        </div>

    </aside>

    {{-- =========================================
         MAIN WRAPPER
    ========================================= --}}
    <div class="app-main">

        {{-- TOPBAR --}}
        <header class="app-topbar">
            <button
                type="button"
                class="app-menu-toggle"
                onclick="document.getElementById('appSidebar').classList.toggle('open')"
                aria-label="Buka menu">
                <i class="bi bi-list"></i>
            </button>

            <div class="min-w-0">
                <h2 class="text-xl sm:text-2xl font-bold text-[#3b2925] truncate">
                    Detail Produk
                </h2>
                <p class="text-xs sm:text-sm text-[#907d73] hidden sm:block">
                    Pilih ukuran, topping favorit, dan jumlah pesananmu.
                </p>
            </div>

            <div class="ml-auto flex items-center gap-3">
                <a href="{{ route('cart.index') }}"
                   class="topbar-cart-button"
                   aria-label="Keranjang">
                    <i class="bi bi-cart3"></i>
                    @if ($cartCount > 0)
                        <span class="cart-badge">{{ $cartCount }}</span>
                    @endif
                </a>

                @auth
                    <a href="{{ route('dashboard', ['menu' => 'profile']) }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#941919] hover:bg-[#b52d2d] text-white text-sm font-semibold transition">
                        <i class="bi bi-person-circle text-base"></i>
                        <span>Saya</span>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#941919] hover:bg-[#b52d2d] text-white text-sm font-semibold transition">
                        <span>Login</span>
                    </a>
                @endauth
            </div>
        </header>

        {{-- =========================================
             MAIN CONTENT
        ========================================= --}}
        <main class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-7 flex-1">

            {{-- BREADCRUMB & BACK BUTTON --}}
            <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
                <nav class="flex items-center gap-2 text-sm text-[#8b776d]" aria-label="Breadcrumb">
                    <a href="{{ route('dashboard') }}" class="hover:text-[#941919] transition">
                        Dashboard
                    </a>
                    <i class="bi bi-chevron-right text-[11px]"></i>
                    <a href="{{ route('products.index') }}" class="hover:text-[#941919] transition">
                        Produk
                    </a>
                    <i class="bi bi-chevron-right text-[11px]"></i>
                    <span class="text-[#941919] font-semibold truncate max-w-[200px] sm:max-w-xs">
                        {{ $product->name }}
                    </span>
                </nav>

                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-[#e5d4c8] hover:border-[#941919] text-sm font-semibold text-[#34241f] hover:text-[#941919] transition shadow-xs">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali ke Produk</span>
                </a>
            </div>

            {{-- FLASH MESSAGES --}}
            @if (session('success'))
                <div class="mb-6 flex items-center gap-3 rounded-2xl bg-[#eaf8ef] border border-[#bfe6cd] px-4 py-3.5 text-sm font-medium text-[#16794c]">
                    <i class="bi bi-check-circle-fill text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-2xl bg-[#fff0f0] border border-[#f5c2c2] px-4 py-3.5 text-sm text-[#a81c1c]">
                    @foreach ($errors->all() as $error)
                        <div class="flex items-center gap-2">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- =========================================
                 PRODUCT DETAIL CARD
            ========================================= --}}
            <div class="bg-white rounded-3xl shadow-sm border border-[#ecdcd0] overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12">

                    {{-- GAMBAR PRODUK --}}
                    <div class="lg:col-span-5 bg-gradient-to-br from-[#fff7ef] to-[#fdebe0] p-6 sm:p-8 flex items-center justify-center border-b lg:border-b-0 lg:border-r border-[#f2e4d8]">
                        <div class="w-full max-w-md aspect-square rounded-2xl bg-white border border-[#f0e0d3] shadow-sm overflow-hidden flex items-center justify-center group">
                            @if ($resolvedProductImg)
                                <img
                                    src="{{ $resolvedProductImg }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                                    onerror="this.style.display='none'; document.getElementById('productFallback').style.display='flex';"
                                >
                                <div id="productFallback" class="hidden flex-col items-center justify-center gap-2 text-center p-4">
                                    <span class="text-8xl">{{ $isPizza ? '🍕' : '🍠' }}</span>
                                    <span class="text-xs text-[#8b776d]">Foto produk belum tersedia</span>
                                </div>
                            @else
                                <div class="flex flex-col items-center justify-center gap-2 text-center p-4">
                                    <span class="text-8xl">{{ $isPizza ? '🍕' : '🍠' }}</span>
                                    <span class="text-xs text-[#8b776d]">Foto produk belum tersedia</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- INFORMASI PRODUK --}}
                    <div class="lg:col-span-7 p-6 sm:p-8 lg:p-10">

                        {{-- CATEGORY BADGE --}}
                        <div class="flex items-center gap-2 mb-3">
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#fdf2f2] border border-[#f3d2d2] text-[#941919] text-xs font-bold tracking-wide uppercase">
                                {{ $isPizza ? '🍕' : '🍽️' }} {{ ucfirst($product->category ?? 'Menu') }}
                            </span>
                        </div>

                        {{-- PRODUCT NAME --}}
                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#34241f] leading-tight">
                            {{ $product->name }}
                        </h1>

                        {{-- DESCRIPTION --}}
                        <p class="text-[#705e54] mt-3 text-sm sm:text-base leading-relaxed">
                            {{ $product->description ?: 'Nikmati ' . $product->name . ' dengan cita rasa khas PizzaMozza yang dibuat fresh dari bahan pilihan.' }}
                        </p>

                        <div class="border-t border-[#f3e7de] my-6"></div>

                        {{-- =========================================
                             FORM PRODUK
                        ========================================= --}}
                        <form action="{{ route('cart.add') }}" method="POST" id="productForm">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            {{-- VARIANT --}}
                            @if ($product->variants->count() > 0)
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <label class="font-bold text-[#34241f] text-base">
                                            {{ $isPizza ? 'Pilih Ukuran Pizza' : 'Pilih Ukuran / Paket' }}
                                        </label>
                                        <span class="text-xs font-medium text-[#8b776d] bg-[#faf3ed] px-2.5 py-1 rounded-full">
                                            Wajib dipilih
                                        </span>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        @foreach ($product->variants as $index => $variant)
                                            <label class="variant-option cursor-pointer block">
                                                <input
                                                    type="radio"
                                                    name="variant_id"
                                                    value="{{ $variant->id }}"
                                                    data-price="{{ $variant->price }}"
                                                    data-name="{{ $variant->name }}"
                                                    class="hidden variant-radio"
                                                    {{ $index === 0 ? 'checked' : '' }}
                                                >

                                                <div class="variant-card border-2 border-[#e6d6ca] bg-[#fffdfb] rounded-2xl p-4 hover:border-[#cf9696] transition relative">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <div>
                                                            <p class="variant-title font-bold text-[#34241f] text-base">
                                                                {{ $variant->name }}
                                                            </p>
                                                            <p class="text-xs text-[#8b776d] mt-0.5">
                                                                Pilihan ukuran
                                                            </p>
                                                        </div>

                                                        <div class="flex items-center gap-2">
                                                            <span class="text-[#941919] font-bold text-base">
                                                                Rp{{ number_format($variant->price, 0, ',', '.') }}
                                                            </span>
                                                            <i class="bi bi-check-circle-fill text-[#941919] variant-check-icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="bg-[#fff7f0] border border-[#f0dfd1] rounded-2xl p-4 sm:p-5">
                                    <p class="text-xs font-semibold uppercase tracking-wider text-[#8b776d]">
                                        Harga Produk
                                    </p>
                                    <p class="text-2xl sm:text-3xl font-bold text-[#941919] mt-1">
                                        Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}
                                    </p>
                                </div>
                            @endif

                            {{-- TOPPINGS --}}
                            @if (isset($toppings) && $toppings->count() > 0 && $isPizza)
                                <div class="mt-7">
                                    <div class="flex items-center justify-between mb-3">
                                        <label class="font-bold text-[#34241f] text-base">
                                            Tambahan Topping
                                        </label>
                                        <span class="text-xs font-medium text-[#8b776d]">
                                            Opsional
                                        </span>
                                    </div>

                                    <div class="space-y-2.5">
                                        @foreach ($toppings as $topping)
                                            <label class="topping-option flex items-center justify-between gap-3 border border-[#e6d6ca] bg-[#fffdfb] rounded-xl px-4 py-3 cursor-pointer hover:border-[#cf9696] hover:bg-[#fff8f7] has-[:checked]:border-[#941919] has-[:checked]:bg-[#fff4f3] transition">
                                                <div class="flex items-center gap-3">
                                                    <input
                                                        type="checkbox"
                                                        name="toppings[]"
                                                        value="{{ $topping->id }}"
                                                        data-medium="{{ $topping->price_medium }}"
                                                        data-large="{{ $topping->price_large }}"
                                                        class="topping-checkbox w-4 h-4 accent-[#941919] rounded"
                                                    >

                                                    <div>
                                                        <p class="font-semibold text-[#34241f] text-sm">
                                                            {{ $topping->name }}
                                                        </p>
                                                        <p class="topping-price text-xs font-semibold text-[#941919] mt-0.5">
                                                            + Rp{{ number_format($topping->price_medium, 0, ',', '.') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <i class="bi bi-plus-circle text-[#941919] text-base"></i>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            {{-- QUANTITY --}}
                            <div class="mt-7">
                                <label for="quantity" class="font-bold text-[#34241f] text-base block mb-3">
                                    Jumlah Pesanan
                                </label>

                                <div class="inline-flex items-center rounded-xl border border-[#e2d1c5] bg-white overflow-hidden">
                                    <button
                                        type="button"
                                        onclick="decreaseQty()"
                                        aria-label="Kurangi jumlah"
                                        class="w-11 h-11 bg-[#fff8f4] hover:bg-[#fde8e6] text-[#941919] font-bold text-lg transition">
                                        −
                                    </button>

                                    <input
                                        type="number"
                                        id="quantity"
                                        name="quantity"
                                        value="1"
                                        min="1"
                                        class="w-16 h-11 border-x border-[#e2d1c5] text-center font-bold text-[#34241f] focus:outline-none"
                                    >

                                    <button
                                        type="button"
                                        onclick="increaseQty()"
                                        aria-label="Tambah jumlah"
                                        class="w-11 h-11 bg-[#fff8f4] hover:bg-[#fde8e6] text-[#941919] font-bold text-lg transition">
                                        +
                                    </button>
                                </div>
                            </div>

                            {{-- PRE ORDER DATE KHUSUS NASTAR --}}
                            @if ($isNastar)
                                <div class="mt-6 rounded-2xl bg-[#fff8f1] border border-[#f0dfd1] p-4">
                                    <label for="po_date" class="block font-bold text-[#34241f] text-sm mb-2">
                                        <i class="bi bi-calendar-event text-[#941919] mr-1"></i>
                                        Tanggal Pre-Order
                                    </label>

                                    <input
                                        type="date"
                                        id="po_date"
                                        min="{{ now()->toDateString() }}"
                                        required
                                        class="w-full bg-white border border-[#e2d1c5] rounded-xl px-3.5 py-2.5 text-sm text-[#34241f] focus:outline-none focus:border-[#941919] focus:ring-2 focus:ring-[#941919]/15"
                                    >

                                    <p class="text-xs text-[#8b776d] mt-2">
                                        Pilih tanggal pengiriman/pengambilan yang kamu inginkan untuk pesanan Kue Nastar.
                                    </p>
                                </div>
                            @endif

                            {{-- TOTAL PRICE --}}
                            <div class="mt-7 bg-gradient-to-r from-[#fff6ee] to-[#ffede0] border border-[#f1dccb] rounded-2xl p-5">
                                <div class="flex flex-wrap justify-between items-center gap-3">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-wider text-[#8b776d]">
                                            Total Harga
                                        </p>
                                        <p id="totalPrice" class="text-2xl sm:text-3xl font-bold text-[#941919] mt-1">
                                            Rp0
                                        </p>
                                    </div>

                                    <div class="text-xs text-[#8b776d] sm:text-right leading-relaxed">
                                        <p>Harga otomatis menyesuaikan</p>
                                        <p>ukuran, topping & jumlah</p>
                                    </div>
                                </div>
                            </div>

                            {{-- ACTION BUTTON --}}
                            @if ($isNastar)
                                <button
                                    type="button"
                                    onclick="orderViaWhatsApp()"
                                    class="w-full mt-5 bg-[#16874b] hover:bg-[#126e3d] text-white font-bold py-4 px-6 rounded-xl transition shadow-sm flex items-center justify-center gap-2.5 text-base">
                                    <i class="bi bi-whatsapp text-xl"></i>
                                    <span>Pesan Kue Nastar via WhatsApp</span>
                                </button>
                            @else
                                <button
                                    type="submit"
                                    class="w-full mt-5 bg-[#941919] hover:bg-[#b52d2d] text-white font-bold py-4 px-6 rounded-xl transition shadow-sm flex items-center justify-center gap-2.5 text-base">
                                    <i class="bi bi-cart-plus text-lg"></i>
                                    <span>Tambah ke Keranjang</span>
                                </button>
                            @endif

                        </form>

                    </div>

                </div>
            </div>

            {{-- PRODUCT DESCRIPTION CARD --}}
            <div class="mt-6 bg-white rounded-2xl border border-[#ecdcd0] shadow-sm p-6 sm:p-7">
                <div class="flex items-center gap-2.5 text-[#34241f]">
                    <i class="bi bi-info-circle-fill text-[#941919] text-lg"></i>
                    <h2 class="text-lg font-bold">
                        Tentang Produk
                    </h2>
                </div>

                <p class="text-[#705e54] text-sm sm:text-base leading-relaxed mt-3">
                    {{ $product->description ?? 'Menu lezat dengan bahan segar pilihan dan cita rasa khas PizzaMozza. Dibuat hangat setelah pesanan diterima sehingga cocok dinikmati bersama keluarga maupun teman.' }}
                </p>
            </div>

        </main>

        {{-- FOOTER --}}
        <footer class="mt-auto py-6 text-center">
            <p class="text-xs sm:text-sm text-[#8b776d]">
                © {{ date('Y') }} PizzaMozza. All Rights Reserved.
            </p>
        </footer>

    </div>

    {{-- =========================================
         JAVASCRIPT
    ========================================= --}}
    <script>
        const variantRadios = document.querySelectorAll('.variant-radio');
        const toppingCheckboxes = document.querySelectorAll('.topping-checkbox');
        const quantityInput = document.getElementById('quantity');
        const totalPrice = document.getElementById('totalPrice');

        /* ==========================================
           SELECTED VARIANT
        ========================================== */
        function getSelectedVariant() {
            const selected = document.querySelector('.variant-radio:checked');

            if (!selected) {
                return {
                    price: Number(@json((float) ($product->price ?? 0))),
                    name: ''
                };
            }

            return {
                price: parseFloat(selected.dataset.price) || 0,
                name: selected.dataset.name || ''
            };
        }

        /* ==========================================
           FORMAT RUPIAH
        ========================================== */
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID').format(number);
        }

        /* ==========================================
           UPDATE TOPPING PRICE
        ========================================== */
        function updateToppingPrices() {
            const variant = getSelectedVariant();
            const variantName = variant.name.toLowerCase();
            const isLarge = variantName.includes('large') || variantName.includes('besar') || variantName.includes('jumbo');

            toppingCheckboxes.forEach(checkbox => {
                const medium = parseFloat(checkbox.dataset.medium) || 0;
                const large = parseFloat(checkbox.dataset.large) || 0;

                const priceElement = checkbox
                    .closest('.topping-option')
                    ?.querySelector('.topping-price');

                const price = isLarge ? large : medium;

                if (priceElement) {
                    priceElement.textContent = '+ Rp' + formatRupiah(price);
                }
            });
        }

        /* ==========================================
           CALCULATE TOTAL
        ========================================== */
        function calculateTotal() {
            const variant = getSelectedVariant();
            let price = variant.price;

            const variantName = variant.name.toLowerCase();
            const isLarge = variantName.includes('large') || variantName.includes('besar') || variantName.includes('jumbo');

            toppingCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const medium = parseFloat(checkbox.dataset.medium) || 0;
                    const large = parseFloat(checkbox.dataset.large) || 0;
                    price += isLarge ? large : medium;
                }
            });

            let quantity = parseInt(quantityInput.value, 10) || 1;
            if (quantity < 1) {
                quantity = 1;
            }

            const total = price * quantity;
            totalPrice.textContent = 'Rp' + formatRupiah(total);
        }

        /* ==========================================
           QUANTITY
        ========================================== */
        function increaseQty() {
            const current = parseInt(quantityInput.value, 10) || 1;
            quantityInput.value = current + 1;
            calculateTotal();
        }

        function decreaseQty() {
            const current = parseInt(quantityInput.value, 10) || 1;
            quantityInput.value = Math.max(1, current - 1);
            calculateTotal();
        }

        /* ==========================================
           EVENTS
        ========================================== */
        variantRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                updateToppingPrices();
                calculateTotal();
            });
        });

        toppingCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', calculateTotal);
        });

        quantityInput.addEventListener('input', calculateTotal);

        quantityInput.addEventListener('change', function () {
            if (!this.value || parseInt(this.value, 10) < 1) {
                this.value = 1;
            }
            calculateTotal();
        });

        /* ==========================================
           INITIALIZE
        ========================================== */
        document.addEventListener('DOMContentLoaded', function () {
            updateToppingPrices();
            calculateTotal();
        });

        /* ==========================================
           WHATSAPP PRE-ORDER NASTAR
        ========================================== */
        function orderViaWhatsApp() {
            const quantity = parseInt(quantityInput.value, 10);
            const dateInput = document.getElementById('po_date');
            const poDate = dateInput ? dateInput.value : '';

            if (!Number.isInteger(quantity) || quantity < 1) {
                alert('Jumlah pesanan minimal 1.');
                quantityInput.focus();
                return;
            }

            if (!poDate) {
                alert('Silakan pilih tanggal Pre-Order.');
                if (dateInput) dateInput.focus();
                return;
            }

            const today = new Date();
            today.setHours(0, 0, 0, 0);

            const selectedDate = new Date(poDate + 'T00:00:00');
            if (selectedDate < today) {
                alert('Tanggal Pre-Order tidak boleh sebelum hari ini.');
                if (dateInput) dateInput.focus();
                return;
            }

            const productName = @json($product->name);
            const variant = getSelectedVariant();
            const unitPrice = variant.price || Number(@json((float) ($product->price ?? 0)));
            const total = unitPrice * quantity;
            const rawSellerNumber = @json(config('services.whatsapp.seller_number') ?? '6283143290888');
            const sellerNumber = String(rawSellerNumber).replace(/[^0-9]/g, '');

            const formattedPrice = formatRupiah(unitPrice);
            const formattedTotal = formatRupiah(total);

            const message = [
                'Halo PizzaMozza, saya ingin memesan Pre-Order.',
                '',
                'Produk: ' + productName,
                variant.name ? 'Ukuran: ' + variant.name : null,
                'Jumlah: ' + quantity,
                'Harga satuan: Rp ' + formattedPrice,
                'Perkiraan total: Rp ' + formattedTotal,
                'Tanggal Pre-Order: ' + poDate,
                '',
                'Terima kasih!'
            ].filter(Boolean).join('\n');

            const waUrl = 'https://wa.me/' + sellerNumber + '?text=' + encodeURIComponent(message);
            window.open(waUrl, '_blank', 'noopener');
        }

        // Tutup sidebar saat klik di luar pada layar HP
        document.addEventListener('click', function (event) {
            const sidebar = document.getElementById('appSidebar');
            const toggleBtn = document.querySelector('.app-menu-toggle');
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
    </script>

</body>

</html>