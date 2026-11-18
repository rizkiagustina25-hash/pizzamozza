@php
    $user = auth()->user();
    $cartCount = collect(session('cart', []))->sum('quantity');
    $selectedMethod = old('delivery_method', 'delivery');
    $baseShipping = (float) ($shippingCost ?? 10000);
    $activeShipping = $selectedMethod === 'take_away' ? 0 : $baseShipping;

    // Resolusi foto profil pelanggan agar tidak pecah
    $userFotoUrl = null;
    if ($user && $user->foto_profile) {
        $rawFoto = ltrim($user->foto_profile, '/');
        foreach (['storage/' . $rawFoto, 'profile/' . $rawFoto, $rawFoto] as $fotoPath) {
            if (file_exists(public_path($fotoPath))) {
                $userFotoUrl = asset($fotoPath);
                break;
            }
        }
        $userFotoUrl ??= asset('storage/' . $rawFoto);
    }
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - PizzaMozza</title>

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
           INTERACTIVE DELIVERY OPTION CARDS
        ========================================= */

        .delivery-radio:checked + .delivery-card {
            border-color: #941919;
            background: linear-gradient(135deg, #fff5f4 0%, #ffeceb 100%);
            box-shadow: 0 8px 20px rgba(148, 25, 25, 0.11);
        }

        .delivery-radio:checked + .delivery-card .delivery-icon {
            background: #941919;
            color: #ffffff;
        }

        .delivery-radio:checked + .delivery-card .delivery-title {
            color: #941919;
        }

        .delivery-radio:checked + .delivery-card .delivery-check {
            opacity: 1;
            transform: scale(1);
        }

        .delivery-check {
            opacity: 0;
            transform: scale(0.75);
            transition: all .2s ease;
        }

        /* =========================================
           LOGOUT MODAL
        ========================================= */

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

            <a href="{{ route('dashboard') }}" class="app-menu-link">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('products.index') }}" class="app-menu-link">
                <i class="bi bi-box-seam"></i>
                <span>Produk</span>
            </a>

            <a href="{{ route('dashboard') }}?menu=orders" class="app-menu-link">
                <i class="bi bi-bag-check"></i>
                <span>Pesanan Saya</span>
            </a>

            <a href="{{ route('dashboard') }}?menu=profile" class="app-menu-link">
                <i class="bi bi-person-circle"></i>
                <span>Akun Saya</span>
            </a>
        </nav>

        {{-- PROFIL & LOGOUT --}}
        <div class="app-profile">
            @auth
                <div class="app-profile-info">
                    <div class="app-profile-avatar">
                        @if ($userFotoUrl)
                            <img src="{{ $userFotoUrl }}" alt="Foto profil"
                                 onerror="this.style.display='none'; this.parentElement.textContent='{{ strtoupper(substr($user->name, 0, 1)) }}';">
                        @else
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        @endif
                    </div>

                    <div class="app-profile-name">
                        <strong>{{ $user->name }}</strong>
                        <span>Pelanggan</span>
                    </div>
                </div>

                <button type="button" class="app-logout-button" onclick="openCustomerLogoutModal()">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
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
                    Checkout Pesanan
                </h2>
                <p class="text-xs sm:text-sm text-[#907d73] hidden sm:block">
                    Periksa informasi pengiriman dan ringkasan pesanan kamu.
                </p>
            </div>

            <div class="ml-auto flex items-center gap-3">
                <a href="{{ route('cart.index') }}"
                   class="topbar-cart-button"
                   aria-label="Keranjang belanja"
                   title="Keranjang belanja">
                    <i class="bi bi-cart3"></i>
                    @if ($cartCount > 0)
                        <span class="cart-badge">{{ $cartCount }}</span>
                    @endif
                </a>

                @auth
                    <a href="{{ route('dashboard') }}?menu=profile"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#941919] hover:bg-[#b52d2d] text-white text-sm font-semibold transition">
                        <i class="bi bi-person-circle text-base"></i>
                        <span>Saya</span>
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
                    <a href="{{ route('cart.index') }}" class="hover:text-[#941919] transition">
                        Keranjang
                    </a>
                    <i class="bi bi-chevron-right text-[11px]"></i>
                    <span class="text-[#941919] font-semibold">
                        Checkout
                    </span>
                </nav>

                <a href="{{ route('cart.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-[#e5d4c8] hover:border-[#941919] text-sm font-semibold text-[#34241f] hover:text-[#941919] transition">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali ke Keranjang</span>
                </a>
            </div>

            {{-- PROGRESS STEPPER --}}
            <div class="mb-7 bg-white rounded-2xl border border-[#ecdcd0] px-5 py-4 shadow-xs">
                <div class="flex items-center justify-between gap-2 sm:gap-4 overflow-x-auto">
                    <div class="flex items-center gap-2.5 text-sm font-semibold text-[#16794c] shrink-0">
                        <span class="w-7 h-7 rounded-full bg-[#eaf8ef] border border-[#bfe6cd] flex items-center justify-center text-xs">
                            <i class="bi bi-check-lg"></i>
                        </span>
                        <span>1. Keranjang</span>
                    </div>

                    <div class="h-0.5 flex-1 min-w-[24px] bg-[#bfe6cd]"></div>

                    <div class="flex items-center gap-2.5 text-sm font-bold text-[#941919] shrink-0">
                        <span class="w-7 h-7 rounded-full bg-[#941919] text-white flex items-center justify-center text-xs shadow-xs">
                            2
                        </span>
                        <span>2. Checkout & Pengiriman</span>
                    </div>

                    <div class="h-0.5 flex-1 min-w-[24px] bg-[#efe2d7]"></div>

                    <div class="flex items-center gap-2.5 text-sm font-semibold text-[#9a877d] shrink-0">
                        <span class="w-7 h-7 rounded-full bg-[#f5ebe3] text-[#8b776d] flex items-center justify-center text-xs">
                            3
                        </span>
                        <span>3. Pembayaran</span>
                    </div>
                </div>
            </div>

            {{-- NOTIFIKASI SUCCESS --}}
            @if (session('success'))
                <div class="mb-6 flex items-center gap-3 rounded-2xl bg-[#eaf8ef] border border-[#bfe6cd] px-4 py-3.5 text-sm font-medium text-[#16794c]">
                    <i class="bi bi-check-circle-fill text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- NOTIFIKASI ERROR --}}
            @if (session('error'))
                <div class="mb-6 flex items-center gap-3 rounded-2xl bg-[#fff0f0] border border-[#f5c2c2] px-4 py-3.5 text-sm font-medium text-[#a81c1c]">
                    <i class="bi bi-exclamation-circle-fill text-lg"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            {{-- VALIDASI ERROR --}}
            @if ($errors->any())
                <div class="mb-6 rounded-2xl bg-[#fff0f0] border border-[#f5c2c2] px-4 py-3.5 text-sm text-[#a81c1c]">
                    <p class="font-bold mb-1 flex items-center gap-2">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <span>Periksa kembali data yang kamu masukkan:</span>
                    </p>
                    <ul class="list-disc pl-6 space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- =========================================
                 CHECKOUT GRID
            ========================================= --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                {{-- KOLOM KIRI: INFORMASI PELANGGAN & DAFTAR PESANAN --}}
                <div class="lg:col-span-7 space-y-6">

                    {{-- INFORMASI PELANGGAN --}}
                    <section class="bg-white rounded-3xl border border-[#ecdcd0] p-6 sm:p-7 shadow-xs">
                        <div class="flex items-center justify-between gap-3 pb-4 mb-5 border-b border-[#f3e7de]">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-[#fdf2f2] border border-[#f4d4d4] text-[#941919] flex items-center justify-center text-lg">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-[#34241f]">Informasi Pelanggan</h2>
                                    <p class="text-xs text-[#8b776d]">Data pemesan sesuai akun aktif kamu</p>
                                </div>
                            </div>

                            <a href="{{ route('dashboard') }}?menu=profile"
                               class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-[#941919] hover:text-[#b52d2d] bg-[#fdf2f2] px-3 py-1.5 rounded-lg transition">
                                <i class="bi bi-pencil-square"></i>
                                <span>Ubah Profil</span>
                            </a>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                            <div class="rounded-2xl bg-[#fffaf5] border border-[#f1e4d8] p-3.5">
                                <span class="block text-[11px] font-bold uppercase tracking-wider text-[#8b776d]">
                                    Nama Pemesan
                                </span>
                                <p class="text-sm sm:text-base font-bold text-[#34241f] mt-1 truncate">
                                    {{ $user->name }}
                                </p>
                            </div>

                            <div class="rounded-2xl bg-[#fffaf5] border border-[#f1e4d8] p-3.5">
                                <span class="block text-[11px] font-bold uppercase tracking-wider text-[#8b776d]">
                                    Email
                                </span>
                                <p class="text-sm sm:text-base font-semibold text-[#34241f] mt-1 truncate">
                                    {{ $user->email }}
                                </p>
                            </div>

                            <div class="sm:col-span-2 rounded-2xl bg-[#fffaf5] border border-[#f1e4d8] p-3.5">
                                <span class="block text-[11px] font-bold uppercase tracking-wider text-[#8b776d]">
                                    Alamat Tersimpan
                                </span>
                                <p class="text-sm text-[#5c4a41] mt-1 leading-relaxed">
                                    {{ $user->address ?: 'Alamat belum diisi pada profil.' }}
                                </p>
                            </div>
                        </div>
                    </section>

                    {{-- PESANAN KAMU --}}
                    <section class="bg-white rounded-3xl border border-[#ecdcd0] p-6 sm:p-7 shadow-xs">
                        <div class="flex items-center justify-between gap-3 pb-4 mb-5 border-b border-[#f3e7de]">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-[#fdf2f2] border border-[#f4d4d4] text-[#941919] flex items-center justify-center text-lg">
                                    <i class="bi bi-cart-check-fill"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-[#34241f]">
                                        Pesanan Kamu ({{ $cartCount }} Item)
                                    </h2>
                                    <p class="text-xs text-[#8b776d]">Detail produk, ukuran, dan tambahan topping</p>
                                </div>
                            </div>

                            <a href="{{ route('cart.index') }}"
                               class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-[#941919] hover:text-[#b52d2d] bg-[#fdf2f2] px-3 py-1.5 rounded-lg transition">
                                <i class="bi bi-pencil"></i>
                                <span>Ubah Item</span>
                            </a>
                        </div>

                        <div class="space-y-3.5">
                            @forelse ($cart as $item)
                                @php
                                    $itemName = $item['product_name'] ?? ($item['name'] ?? 'Produk');
                                    $variantName = $item['variant_name'] ?? 'Reguler';
                                    $qty = (int) ($item['quantity'] ?? 1);
                                    $itemSubtotal = (float) ($item['subtotal'] ?? 0);

                                    $rawImg = $item['image'] ?? null;
                                    $rawImg = $rawImg ? ltrim($rawImg, '/') : null;
                                    $itemImgUrl = null;
                                    if ($rawImg) {
                                        if (str_starts_with($rawImg, 'http')) {
                                            $itemImgUrl = $rawImg;
                                        } else {
                                            foreach (['images/' . $rawImg, 'storage/' . $rawImg, 'image/' . $rawImg, 'uploads/' . $rawImg, $rawImg] as $p) {
                                                if (file_exists(public_path($p))) {
                                                    $itemImgUrl = asset($p);
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                @endphp

                                <div class="flex items-start gap-4 p-4 rounded-2xl bg-[#fffdfb] border border-[#f1e3d8] hover:border-[#e2cfc1] transition">
                                    {{-- Thumbnail --}}
                                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-br from-[#fff5ec] to-[#fde8dc] border border-[#f0e0d3] shrink-0 overflow-hidden flex items-center justify-center text-3xl">
                                        @if ($itemImgUrl)
                                            <img src="{{ $itemImgUrl }}" alt="{{ $itemName }}"
                                                 class="w-full h-full object-cover"
                                                 onerror="this.style.display='none'; this.parentElement.textContent='🍕';">
                                        @else
                                            🍕
                                        @endif
                                    </div>

                                    {{-- Info Item --}}
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-bold text-[#34241f] text-base sm:text-lg leading-snug">
                                            {{ $itemName }}
                                        </h3>

                                        <div class="flex flex-wrap items-center gap-2 mt-1.5 text-xs text-[#7a675d]">
                                            <span class="px-2.5 py-0.5 rounded-full bg-[#f6ece4] text-[#5e4a41] font-semibold">
                                                Ukuran: {{ $variantName }}
                                            </span>
                                            <span class="px-2.5 py-0.5 rounded-full bg-[#fff3ec] text-[#941919] font-bold">
                                                Jumlah: {{ $qty }}
                                            </span>
                                        </div>

                                        @if (!empty($item['toppings']) && count($item['toppings']) > 0)
                                            <div class="flex flex-wrap gap-1.5 mt-2">
                                                @foreach ($item['toppings'] as $topping)
                                                    <span class="inline-flex items-center text-[11.5px] font-semibold px-2 py-0.5 rounded-md bg-[#fdf2f2] text-[#941919] border border-[#f3d5d5]">
                                                        + {{ $topping['name'] }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Subtotal --}}
                                    <div class="text-right shrink-0">
                                        <p class="font-bold text-[#941919] text-base sm:text-lg">
                                            Rp{{ number_format($itemSubtotal, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <p class="text-sm text-[#8b776d] mb-4">Keranjang kamu masih kosong.</p>
                                    <a href="{{ route('products.index') }}"
                                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#941919] text-white text-sm font-semibold">
                                        <i class="bi bi-shop"></i>
                                        <span>Lihat Produk</span>
                                    </a>
                                </div>
                            @endforelse
                        </div>
                    </section>

                </div>

                {{-- KOLOM KANAN: RINGKASAN PEMBAYARAN --}}
                <aside class="lg:col-span-5 lg:sticky lg:top-28 bg-white rounded-3xl border border-[#ecdcd0] p-6 sm:p-7 shadow-sm">
                    <div class="flex items-center gap-3 pb-4 mb-5 border-b border-[#f3e7de]">
                        <div class="w-10 h-10 rounded-xl bg-[#fdf2f2] border border-[#f4d4d4] text-[#941919] flex items-center justify-center text-lg">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-[#34241f]">Ringkasan Pembayaran</h2>
                            <p class="text-xs text-[#8b776d]">Pilih metode pesanan & alamat tujuan</p>
                        </div>
                    </div>

                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf

                        {{-- PILIH METODE PENGAMBILAN --}}
                        <div class="mb-5">
                            <label class="block text-sm font-bold text-[#34241f] mb-2.5">
                                Metode Pesanan
                            </label>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                {{-- DELIVERY --}}
                                <label class="cursor-pointer block">
                                    <input type="radio"
                                           name="delivery_method"
                                           value="delivery"
                                           class="hidden delivery-radio"
                                           {{ $selectedMethod === 'delivery' ? 'checked' : '' }}>

                                    <div class="delivery-card h-full rounded-2xl border-2 border-[#e6d6ca] bg-[#fffdfb] p-4 hover:border-[#cf9696] transition flex flex-col">
                                        <div class="flex items-center justify-between mb-2.5">
                                            <span class="delivery-icon w-9 h-9 rounded-xl bg-[#f5ebe3] text-[#34241f] flex items-center justify-center text-base transition">
                                                <i class="bi bi-truck"></i>
                                            </span>
                                            <i class="bi bi-check-circle-fill text-[#941919] text-lg delivery-check"></i>
                                        </div>

                                        <strong class="delivery-title text-base font-bold text-[#34241f]">
                                            Delivery
                                        </strong>
                                        <small class="text-xs text-[#8b776d] mt-1 leading-relaxed">
                                            Pesanan diantar ke alamat kamu.
                                        </small>
                                        <span class="mt-auto pt-3 text-xs font-bold text-[#941919]">
                                            Ongkir Rp{{ number_format($baseShipping, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </label>

                                {{-- TAKE AWAY --}}
                                <label class="cursor-pointer block">
                                    <input type="radio"
                                           name="delivery_method"
                                           value="take_away"
                                           class="hidden delivery-radio"
                                           {{ $selectedMethod === 'take_away' ? 'checked' : '' }}>

                                    <div class="delivery-card h-full rounded-2xl border-2 border-[#e6d6ca] bg-[#fffdfb] p-4 hover:border-[#cf9696] transition flex flex-col">
                                        <div class="flex items-center justify-between mb-2.5">
                                            <span class="delivery-icon w-9 h-9 rounded-xl bg-[#f5ebe3] text-[#34241f] flex items-center justify-center text-base transition">
                                                <i class="bi bi-shop"></i>
                                            </span>
                                            <i class="bi bi-check-circle-fill text-[#941919] text-lg delivery-check"></i>
                                        </div>

                                        <strong class="delivery-title text-base font-bold text-[#34241f]">
                                            Take Away
                                        </strong>
                                        <small class="text-xs text-[#8b776d] mt-1 leading-relaxed">
                                            Ambil pesanan langsung di toko.
                                        </small>
                                        <span class="mt-auto pt-3 text-xs font-bold text-[#16794c]">
                                            Gratis ongkir
                                        </span>
                                    </div>
                                </label>
                            </div>

                            @error('delivery_method')
                                <p class="mt-1.5 text-xs font-semibold text-[#c62828]">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- ALAMAT PENGIRIMAN --}}
                        <div class="mb-5" id="addressGroup" style="{{ $selectedMethod === 'take_away' ? 'display:none;' : '' }}">
                            <label for="address" class="flex items-center gap-1.5 text-sm font-bold text-[#34241f] mb-2">
                                <i class="bi bi-geo-alt-fill text-[#941919]"></i>
                                <span>Alamat Pengiriman</span>
                            </label>

                            <textarea
                                name="address"
                                id="address"
                                rows="3"
                                placeholder="Masukkan alamat lengkap pengiriman..."
                                class="w-full rounded-2xl border border-[#e2d1c5] bg-[#fffdfb] px-4 py-3 text-sm text-[#34241f] leading-relaxed focus:outline-none focus:border-[#941919] focus:bg-white focus:ring-3 focus:ring-[#941919]/10 transition"
                            >{{ old('address', $user->address) }}</textarea>

                            @error('address')
                                <p class="mt-1.5 text-xs font-semibold text-[#c62828]">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- INFO TAKE AWAY --}}
                        <div id="takeAwayInfo"
                             style="{{ $selectedMethod === 'take_away' ? 'display:flex;' : 'display:none;' }}"
                             class="mb-5 rounded-2xl bg-[#eefaf3] border border-[#bfe6cd] p-4 text-xs sm:text-sm text-[#16653c] leading-relaxed gap-3 items-start">
                            <i class="bi bi-shop-window text-lg mt-0.5 shrink-0"></i>
                            <div>
                                <p class="font-bold text-[#135331]">Ambil Langsung di Toko PizzaMozza</p>
                                <p class="mt-0.5 text-[#227649]">
                                    Pesanan akan segera dibuat setelah pembayaran dikonfirmasi.
                                </p>
                            </div>
                        </div>

                        {{-- RINCIAN TOTAL --}}
                        <div class="rounded-2xl bg-gradient-to-br from-[#fff7f0] to-[#ffede0] border border-[#f1dccb] p-5 mb-5">
                            <div class="space-y-2.5 text-sm">
                                <div class="flex items-center justify-between text-[#6b584f]">
                                    <span>Total Produk</span>
                                    <span class="font-semibold text-[#34241f]">
                                        Rp{{ number_format($total, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-between text-[#6b584f]">
                                    <span>Ongkos Kirim</span>
                                    <span id="shippingCost" class="font-semibold {{ $selectedMethod === 'take_away' ? 'text-[#16794c]' : 'text-[#34241f]' }}">
                                        {{ $selectedMethod === 'take_away' ? 'Gratis' : 'Rp' . number_format($baseShipping, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            <div class="mt-3.5 pt-3.5 border-t border-dashed border-[#dec8b7] flex items-center justify-between">
                                <span class="text-base font-bold text-[#34241f]">Total</span>
                                <span id="grandTotal" class="text-2xl sm:text-3xl font-bold text-[#941919]">
                                    Rp{{ number_format($total + $activeShipping, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        {{-- TOMBOL PEMBAYARAN --}}
                        <button type="submit"
                                @disabled(empty($cart))
                                class="w-full py-4 px-6 rounded-2xl bg-[#941919] hover:bg-[#b52d2d] disabled:bg-gray-400 disabled:cursor-not-allowed text-white font-bold text-base shadow-md hover:shadow-lg transition flex items-center justify-center gap-2.5">
                            <i class="bi bi-credit-card-fill text-lg"></i>
                            <span>Lanjut ke Pembayaran</span>
                        </button>

                        {{-- CATATAN --}}
                        <div class="mt-4 rounded-xl bg-[#fff8ed] border border-[#f1e1c8] p-3.5 text-xs text-[#776459] leading-relaxed flex items-start gap-2.5">
                            <i class="bi bi-info-circle-fill text-[#941919] text-sm mt-0.5 shrink-0"></i>
                            <span>
                                Setelah checkout dikonfirmasi, pesanan akan dibuat dan kamu akan diarahkan ke halaman pembayaran.
                            </span>
                        </div>

                    </form>
                </aside>

            </div>

        </main>

        {{-- FOOTER --}}
        <footer class="mt-auto py-6 text-center">
            <p class="text-xs sm:text-sm text-[#8b776d]">
                © {{ date('Y') }} PizzaMozza. All Rights Reserved.
            </p>
        </footer>

    </div>

    {{-- FORM & POPUP LOGOUT --}}
    @auth
        <form action="{{ route('logout') }}" method="POST" id="customerLogoutForm">
            @csrf
        </form>
    @endauth

    <div class="logout-modal" id="customerLogoutModal">
        <div class="w-full max-w-sm rounded-2xl bg-[#fffaf3] border border-[#f0e1d5] p-7 text-center shadow-2xl"
             role="dialog" aria-modal="true" aria-labelledby="customerLogoutTitle">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-[#f8e5e2] text-[#941919] flex items-center justify-center text-2xl">
                <i class="bi bi-box-arrow-right"></i>
            </div>
            <h3 id="customerLogoutTitle" class="text-xl font-bold text-[#34241f] mb-2">
                Keluar dari Akun?
            </h3>
            <p class="text-sm text-[#81716a] mb-6 leading-relaxed">
                Apakah kamu yakin ingin keluar dari akun PizzaMozza?
            </p>
            <div class="flex gap-3">
                <button type="button"
                        onclick="closeCustomerLogoutModal()"
                        class="flex-1 py-2.5 rounded-xl border border-[#e5d4c9] bg-white hover:bg-[#f5ebe3] text-sm font-semibold text-[#59453d] transition">
                    Batal
                </button>
                <button type="button"
                        onclick="confirmCustomerLogout()"
                        class="flex-1 py-2.5 rounded-xl bg-[#941919] hover:bg-[#b52d2d] text-sm font-semibold text-white transition">
                    Ya, Keluar
                </button>
            </div>
        </div>
    </div>

    {{-- JAVASCRIPT --}}
    <script>
        const productSubtotal = Number(@json((float) $total));
        const defaultShippingFee = Number(@json((float) $baseShipping));

        const deliveryRadios = document.querySelectorAll('input[name="delivery_method"]');
        const addressGroup = document.getElementById('addressGroup');
        const addressInput = document.getElementById('address');
        const takeAwayInfo = document.getElementById('takeAwayInfo');
        const shippingCostElement = document.getElementById('shippingCost');
        const grandTotalElement = document.getElementById('grandTotal');

        function formatRupiah(number) {
            return 'Rp' + new Intl.NumberFormat('id-ID').format(number);
        }

        function syncDeliveryMethod() {
            const checkedRadio = document.querySelector('input[name="delivery_method"]:checked');
            const isTakeAway = checkedRadio && checkedRadio.value === 'take_away';
            const shipping = isTakeAway ? 0 : defaultShippingFee;

            if (addressGroup) {
                addressGroup.style.display = isTakeAway ? 'none' : 'block';
            }

            if (takeAwayInfo) {
                takeAwayInfo.style.display = isTakeAway ? 'flex' : 'none';
            }

            if (addressInput) {
                addressInput.required = !isTakeAway;
            }

            if (shippingCostElement) {
                shippingCostElement.textContent = isTakeAway ? 'Gratis' : formatRupiah(shipping);
                shippingCostElement.style.color = isTakeAway ? '#16794c' : '#34241f';
            }

            if (grandTotalElement) {
                grandTotalElement.textContent = formatRupiah(productSubtotal + shipping);
            }
        }

        deliveryRadios.forEach(function (radio) {
            radio.addEventListener('change', syncDeliveryMethod);
        });

        document.addEventListener('DOMContentLoaded', syncDeliveryMethod);

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

        // Modal Logout
        function openCustomerLogoutModal() {
            document.getElementById('customerLogoutModal').classList.add('show');
        }

        function closeCustomerLogoutModal() {
            document.getElementById('customerLogoutModal').classList.remove('show');
        }

        function confirmCustomerLogout() {
            const form = document.getElementById('customerLogoutForm');
            if (form) form.submit();
        }

        const logoutModal = document.getElementById('customerLogoutModal');
        if (logoutModal) {
            logoutModal.addEventListener('click', function (event) {
                if (event.target === this) closeCustomerLogoutModal();
            });
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeCustomerLogoutModal();
        });
    </script>

</body>

</html>