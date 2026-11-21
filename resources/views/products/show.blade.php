@php
    $isNastar = mb_strtolower(trim($product->name ?? '')) === 'kue nastar';
    $isPizza = mb_strtolower((string) ($product->category ?? '')) === 'pizza';

    $cartCount = array_sum(array_map(
        fn ($item) => (int) ($item['quantity'] ?? 0),
        session()->get('cart', [])
    ));

    $rawProductImg = $product->image ?? $product->gambar ?? $product->foto ?? null;
    $rawProductImg = $rawProductImg ? ltrim($rawProductImg, '/') : null;
    $resolvedProductImg = null;

    if ($rawProductImg) {
        if (
            str_starts_with($rawProductImg, 'http://') ||
            str_starts_with($rawProductImg, 'https://')
        ) {
            $resolvedProductImg = $rawProductImg;
        } else {
            foreach ([
                'images/' . $rawProductImg,
                'storage/' . $rawProductImg,
                'image/' . $rawProductImg,
                'uploads/' . $rawProductImg,
                $rawProductImg,
            ] as $imagePath) {
                if (file_exists(public_path($imagePath))) {
                    $resolvedProductImg = asset($imagePath);
                    break;
                }
            }
        }
    }

    $variants = $product->variants ?? collect();
    $toppings = $toppings ?? collect();

    $basePrice = (float) ($product->price ?? 0);

    $variantPrices = $variants->pluck('price')->map(
        fn ($price) => (float) $price
    );

    $minimumPrice = $variantPrices->isNotEmpty()
        ? $variantPrices->min()
        : $basePrice;

    $maximumPrice = $variantPrices->isNotEmpty()
        ? $variantPrices->max()
        : $basePrice;

    $composition = data_get($product, 'composition')
        ?? data_get($product, 'komposisi');
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $product->name }} - PizzaMozza</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        :root {
            --primary: #c51f2b;
            --primary-dark: #a71923;
            --primary-light: #fff1ef;
            --text: #29211f;
            --muted: #827773;
            --border: #eee6e1;
            --background: #fffaf7;
            --white: #ffffff;
            --green: #21945b;
            --shadow: 0 12px 35px rgba(65, 35, 24, .055);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background: var(--background);
            font-size: 14px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input {
            font-family: inherit;
        }

        /* NAVBAR FREE USER */

        .site-header {
            position: sticky;
            top: 0;
            z-index: 100;
            height: 76px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            background: rgba(255,255,255,.97);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(15px);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            flex-shrink: 0;
        }

        .brand-mark {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            color: white;
            background: var(--primary);
            border-radius: 50%;
            font-size: 19px;
            box-shadow: 0 5px 13px rgba(197,31,43,.16);
        }

        .brand-name {
            display: block;
            color: var(--primary-dark);
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -.7px;
            line-height: 1.1;
        }

        .brand-tagline {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
        }

        .main-nav {
            display: flex;
            align-items: center;
            gap: 31px;
        }

        .main-nav a {
            color: #403632;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .main-nav a:hover,
        .main-nav a.active {
            color: var(--primary);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .search-box {
            width: 225px;
            height: 42px;
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 0 14px;
            border: 1px solid var(--border);
            border-radius: 30px;
            color: var(--muted);
            background: white;
        }

        .search-box input {
            width: 100%;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            font-size: 12px;
        }

        .cart-button {
            position: relative;
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            color: var(--primary);
            background: #fff5f1;
            font-size: 18px;
            transition: .2s;
        }

        .cart-button:hover {
            background: var(--primary-light);
        }

        .cart-count {
            position: absolute;
            top: -4px;
            right: -4px;
            min-width: 17px;
            height: 17px;
            padding: 0 4px;
            display: grid;
            place-items: center;
            border-radius: 20px;
            color: white;
            background: var(--primary);
            font-size: 9px;
            font-weight: 800;
        }

        .login-button {
            height: 42px;
            min-width: 88px;
            padding: 0 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            color: white;
            background: var(--primary);
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .login-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* MAIN LAYOUT */

        .page-wrap {
            width: min(1160px, calc(100% - 48px));
            margin: 0 auto;
            padding: 27px 0 45px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
            color: #93847d;
            font-size: 12px;
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb .current {
            color: var(--primary-dark);
            font-weight: 700;
        }

        .alert-success,
        .alert-error {
            margin-bottom: 16px;
            padding: 12px 15px;
            border-radius: 10px;
            font-size: 12px;
        }

        .alert-success {
            color: #16794c;
            background: #eaf8ef;
            border: 1px solid #c7ead3;
        }

        .alert-error {
            color: #a81c1c;
            background: #fff0f0;
            border: 1px solid #f5c2c2;
        }

        /* PRODUCT CARD */

        .product-card,
        .details-card {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: white;
            box-shadow: var(--shadow);
        }

        .product-grid {
            display: grid;
            grid-template-columns: minmax(0, .94fr) minmax(0, 1.06fr);
        }

        /* PRODUCT IMAGE */

        .gallery-panel {
            min-width: 0;
            padding: 27px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fff5ed;
        }

        .main-photo {
            position: relative;
            width: 100%;
            max-width: 470px;
            aspect-ratio: 1 / .88;
            margin: auto;
            overflow: hidden;
            display: grid;
            place-items: center;
            border-radius: 17px;
            background: #f6e8dc;
        }

        .main-photo img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .main-photo:hover img {
            transform: scale(1.025);
        }

        .favorite-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            padding: 7px 11px;
            border-radius: 30px;
            color: white;
            background: var(--primary);
            font-size: 10px;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(197,31,43,.18);
        }

        .photo-fallback {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            color: #a17d6a;
            font-size: 12px;
        }

        .photo-fallback i {
            font-size: 55px;
        }

        .photo-caption {
            margin-top: 11px;
            color: #a18e83;
            text-align: center;
            font-size: 10px;
        }

        /* PRODUCT INFORMATION */

        .info-panel {
            min-width: 0;
            padding: 30px 32px;
        }

        .category-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 11px;
            border-radius: 30px;
            color: var(--primary-dark);
            background: var(--primary-light);
            font-size: 11px;
            font-weight: 700;
        }

        .product-title {
            margin: 12px 0 7px;
            color: #29201d;
            font-size: clamp(23px, 2.4vw, 30px);
            line-height: 1.2;
            letter-spacing: -.8px;
            font-weight: 800;
        }

        .product-subtitle {
            color: #82736d;
            font-size: 12px;
            line-height: 1.7;
        }

        .product-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 11px;
            margin-top: 13px;
            color: #7c6e68;
            font-size: 11px;
        }

        .product-meta .bi-check-circle-fill {
            color: var(--green);
        }

        .meta-separator {
            width: 1px;
            height: 14px;
            background: #e3d8d1;
        }

        .price-range {
            margin: 24px 0 19px;
            color: var(--primary);
            font-size: 25px;
            line-height: 1.3;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .section-label {
            display: block;
            margin-bottom: 10px;
            color: #342722;
            font-size: 12px;
            font-weight: 800;
        }

        /* VARIANTS */

        .variant-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .variant-option {
            display: block;
        }

        .variant-radio {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .variant-card {
            min-height: 72px;
            padding: 12px 13px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            border: 1px solid #e9dfd9;
            border-radius: 12px;
            background: white;
            cursor: pointer;
            transition: .2s;
        }

        .variant-card:hover {
            border-color: #d99b9b;
        }

        .variant-radio:checked + .variant-card {
            border: 1.5px solid var(--primary);
            background: #fff7f5;
            box-shadow: 0 4px 12px rgba(197,31,43,.06);
        }

        .variant-title {
            display: block;
            color: #382a25;
            font-size: 12px;
            font-weight: 700;
        }

        .variant-price {
            display: block;
            margin-top: 5px;
            color: var(--primary);
            font-size: 12px;
            font-weight: 800;
        }

        .variant-check {
            color: var(--primary);
            font-size: 16px;
            opacity: 0;
            transition: .2s;
        }

        .variant-radio:checked + .variant-card .variant-check {
            opacity: 1;
        }

        /* TOPPINGS */

        .topping-area {
            margin-top: 19px;
        }

        .topping-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 8px;
        }

        .topping-option {
            min-height: 53px;
            padding: 9px 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 7px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            cursor: pointer;
            transition: .2s;
        }

        .topping-option:has(input:checked) {
            border-color: var(--primary);
            background: #fff7f5;
        }

        .topping-option input {
            accent-color: var(--primary);
        }

        .topping-name {
            display: block;
            color: #493a34;
            font-size: 11px;
            font-weight: 700;
        }

        .topping-price {
            display: block;
            margin-top: 3px;
            color: var(--primary);
            font-size: 10px;
            font-weight: 700;
        }

        /* QUANTITY */

        .quantity-area {
            margin-top: 20px;
        }

        .quantity-control {
            height: 43px;
            display: inline-flex;
            overflow: hidden;
            border: 1px solid #e9dfd9;
            border-radius: 10px;
            background: white;
        }

        .quantity-control button {
            width: 42px;
            color: var(--primary);
            background: #fff8f5;
            border: none;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .quantity-control button:hover {
            background: #ffebe6;
        }

        .quantity-control input {
            width: 53px;
            border: 0;
            border-left: 1px solid #eee4de;
            border-right: 1px solid #eee4de;
            outline: none;
            color: #30231e;
            text-align: center;
            font-size: 13px;
            font-weight: 700;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        /* TOTAL PRICE */

        .total-box {
            margin-top: 17px;
            padding: 13px 15px;
            border: 1px solid #f0e2d8;
            border-radius: 12px;
            background: #fffaf5;
        }

        .total-box p {
            color: #99867b;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        .total-box strong {
            display: block;
            margin-top: 4px;
            color: var(--primary);
            font-size: 22px;
            font-weight: 800;
        }

        /* GUEST NOTICE */

        .guest-notice {
            margin-top: 17px;
            padding: 13px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            border: 1px solid #f8dcd6;
            border-radius: 12px;
            background: #fff3f0;
        }

        .guest-copy {
            min-width: 0;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: var(--primary-dark);
        }

        .guest-copy > i {
            margin-top: 2px;
            font-size: 15px;
        }

        .guest-copy strong {
            display: block;
            font-size: 12px;
            font-weight: 800;
        }

        .guest-copy span {
            display: block;
            margin-top: 4px;
            color: #806b63;
            font-size: 10px;
            line-height: 1.5;
        }

        .guest-login {
            flex-shrink: 0;
            padding: 10px 13px;
            border-radius: 9px;
            color: white;
            background: var(--primary);
            font-size: 10px;
            font-weight: 800;
            transition: .2s;
        }

        .guest-login:hover {
            background: var(--primary-dark);
        }

        /* BUTTONS */

        .submit-button,
        .whatsapp-button {
            width: 100%;
            min-height: 46px;
            margin-top: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            border-radius: 10px;
            color: white;
            background: var(--primary);
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 5px 13px rgba(197,31,43,.14);
            transition: .2s;
        }

        .submit-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .whatsapp-button {
            background: #16874b;
        }

        .whatsapp-button:hover {
            background: #126e3d;
        }

        /* PRE ORDER */

        .preorder-box {
            margin-top: 17px;
            padding: 14px;
            border: 1px solid #f2dfd0;
            border-radius: 12px;
            background: #fff9f3;
        }

        .preorder-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #eadbd0;
            border-radius: 8px;
            background: white;
            font-size: 12px;
            outline: none;
        }

        .preorder-box input:focus {
            border-color: var(--primary);
        }

        .preorder-box p {
            margin-top: 7px;
            color: var(--muted);
            font-size: 10px;
        }

        /* DETAILS SECTION */

        .details-card {
            margin-top: 14px;
            padding: 22px 25px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 260px;
            gap: 25px;
        }

        .tab-list {
            display: flex;
            align-items: center;
            gap: 28px;
            border-bottom: 1px solid var(--border);
        }

        .tab-button {
            position: relative;
            padding: 10px 3px 13px;
            color: #81736d;
            background: transparent;
            border: none;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .tab-button.active {
            color: var(--primary);
        }

        .tab-button.active::after {
            position: absolute;
            right: 0;
            bottom: -1px;
            left: 0;
            height: 2px;
            content: '';
            background: var(--primary);
        }

        .tab-content {
            display: none;
            padding: 17px 0 4px;
            color: #746660;
            font-size: 12px;
            line-height: 1.9;
        }

        .tab-content.active {
            display: block;
        }

        .product-facts {
            padding: 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 17px;
            border-radius: 13px;
            background: #fff9f4;
        }

        .fact-row {
            display: flex;
            align-items: flex-start;
            gap: 11px;
        }

        .fact-row i {
            width: 19px;
            margin-top: 2px;
            color: var(--primary);
            font-size: 16px;
            text-align: center;
        }

        .fact-row span {
            display: block;
            color: #95857c;
            font-size: 10px;
        }

        .fact-row strong {
            display: block;
            margin-top: 3px;
            color: #493a34;
            font-size: 11px;
            font-weight: 700;
        }

        /* FOOTER */

        .site-footer {
            padding: 23px 15px;
            color: #9b8b82;
            text-align: center;
            font-size: 11px;
        }

        /* RESPONSIVE */

        @media (min-width: 1400px) {
            .page-wrap {
                width: 1160px;
            }
        }

        @media (max-width: 1000px) {
            .site-header {
                padding: 0 25px;
                gap: 15px;
            }

            .main-nav {
                gap: 17px;
            }

            .search-box {
                width: 175px;
            }

            .info-panel {
                padding: 25px;
            }

            .gallery-panel {
                padding: 22px;
            }

            .details-card {
                grid-template-columns: minmax(0, 1fr) 220px;
            }
        }

        @media (max-width: 760px) {
            .site-header {
                height: 66px;
                padding: 0 15px;
            }

            .brand-mark {
                width: 39px;
                height: 39px;
                font-size: 16px;
            }

            .brand-name {
                font-size: 18px;
            }

            .brand-tagline {
                font-size: 9px;
            }

            .main-nav,
            .search-box {
                display: none;
            }

            .header-actions {
                margin-left: auto;
                gap: 7px;
            }

            .cart-button {
                width: 38px;
                height: 38px;
            }

            .login-button {
                height: 38px;
                min-width: 70px;
                padding: 0 13px;
                font-size: 11px;
            }

            .page-wrap {
                width: calc(100% - 26px);
                padding-top: 17px;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

            .gallery-panel {
                padding: 17px 17px 10px;
            }

            .main-photo {
                max-width: 100%;
                aspect-ratio: 1.25 / 1;
            }

            .info-panel {
                padding: 20px 19px 22px;
            }

            .product-title {
                font-size: 25px;
            }

            .price-range {
                margin: 19px 0 16px;
                font-size: 23px;
            }

            .details-card {
                grid-template-columns: 1fr;
                padding: 17px;
                gap: 15px;
            }

            .product-facts {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 430px) {
            .brand {
                gap: 8px;
            }

            .brand-name {
                font-size: 16px;
            }

            .brand-tagline {
                font-size: 8px;
            }

            .variant-grid,
            .topping-list {
                grid-template-columns: 1fr;
            }

            .variant-card {
                min-height: 65px;
            }

            .guest-notice {
                align-items: flex-start;
                flex-direction: column;
            }

            .guest-login {
                width: 100%;
                text-align: center;
            }

            .tab-list {
                gap: 19px;
            }

            .product-facts {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR FREE USER --}}
    <header class="site-header">

        <a href="{{ url('/') }}#beranda" class="brand">
            <span class="brand-mark">
                <i class="fa-solid fa-pizza-slice"></i>
            </span>

            <span>
                <span class="brand-name">PizzaMozza</span>
                <span class="brand-tagline">Fresh, Tasty, Happiness!</span>
            </span>
        </a>

        <nav class="main-nav">
            <a href="{{ url('/') }}#beranda">Beranda</a>
            <a href="{{ url('/') }}#menu">Menu</a>
            <a href="{{ url('/') }}#tentang">Tentang Kami</a>
            <a href="{{ url('/') }}#kontak">Kontak</a>
        </nav>

        <div class="header-actions">

            <form class="search-box" action="{{ url('/') }}" method="GET">
                <i class="bi bi-search"></i>

                <input
                    type="search"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari menu favorit..."
                >
            </form>

            <a href="{{ route('cart.index') }}" class="cart-button">
                <i class="bi bi-cart3"></i>

                @if ($cartCount > 0)
                    <span class="cart-count">{{ $cartCount }}</span>
                @endif
            </a>

            @auth
                <a href="{{ route('dashboard') }}" class="login-button">
                    <i class="bi bi-person-circle"></i>
                    Akun
                </a>
            @else
                <a href="{{ route('login') }}" class="login-button">
                    Login
                </a>
            @endauth

        </div>
    </header>


    {{-- MAIN --}}
    <main class="page-wrap">

        {{-- BREADCRUMB --}}
        <nav class="breadcrumb">

            <a href="{{ url('/') }}#beranda">
                Beranda
            </a>

            <i class="bi bi-chevron-right"></i>

            <a href="{{ url('/') }}#menu">
                Menu
            </a>

            <i class="bi bi-chevron-right"></i>

            <span class="current">
                {{ $product->name }}
            </span>

        </nav>


        {{-- ALERT --}}
        @if (session('success'))
            <div class="alert-success">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>
                        <i class="bi bi-exclamation-circle-fill"></i>
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif


        {{-- PRODUCT DETAIL --}}
        <section class="product-card">

            <div class="product-grid">

                {{-- IMAGE --}}
                <div class="gallery-panel">

                    <div class="main-photo">

                        @if ($resolvedProductImg)

                            <img
                                src="{{ $resolvedProductImg }}"
                                alt="{{ $product->name }}"
                                id="mainProductImage"
                                onerror="this.style.display='none'; document.getElementById('photoFallback').style.display='flex';"
                            >

                            <div
                                id="photoFallback"
                                class="photo-fallback"
                                style="display:none"
                            >
                                <i class="fa-solid {{ $isPizza ? 'fa-pizza-slice' : 'fa-utensils' }}"></i>
                                <span>Foto produk belum tersedia</span>
                            </div>

                        @else

                            <div id="photoFallback" class="photo-fallback">
                                <i class="fa-solid {{ $isPizza ? 'fa-pizza-slice' : 'fa-utensils' }}"></i>
                                <span>Foto produk belum tersedia</span>
                            </div>

                        @endif

                        <span class="favorite-badge">
                            <i class="bi bi-star-fill"></i>
                            Menu Pilihan
                        </span>

                    </div>

                    <p class="photo-caption">
                        Tampilan produk {{ $product->name }}.
                    </p>

                </div>


                {{-- INFORMATION --}}
                <div class="info-panel">

                    <span class="category-pill">
                        {{ $isPizza ? '🍕' : '🍽️' }}
                        {{ ucfirst($product->category ?? 'Menu') }}
                    </span>

                    <h1 class="product-title">
                        {{ $product->name }}
                    </h1>

                    <p class="product-subtitle">
                        {{ $product->description ?: 'Nikmati ' . $product->name . ' dengan cita rasa khas PizzaMozza dari bahan pilihan.' }}
                    </p>

                    <div class="product-meta">

                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            Dibuat dengan bahan pilihan
                        </span>

                        <span class="meta-separator"></span>

                        <span>
                            <i class="bi bi-shop"></i>
                            PizzaMozza
                        </span>

                    </div>


                    {{-- PRICE RANGE --}}
                    <div class="price-range">

                        @if ($minimumPrice !== $maximumPrice)

                            Rp{{ number_format($minimumPrice, 0, ',', '.') }}
                            – Rp{{ number_format($maximumPrice, 0, ',', '.') }}

                        @else

                            Rp{{ number_format($minimumPrice, 0, ',', '.') }}

                        @endif

                    </div>


                    {{-- FORM --}}
                    <form
                        action="{{ route('cart.add') }}"
                        method="POST"
                        id="productForm"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="product_id"
                            value="{{ $product->id }}"
                        >


                        {{-- VARIANTS --}}
                        @if ($variants->count() > 0)

                            <div>

                                <label class="section-label">
                                    {{ $isPizza ? 'Pilih Ukuran Pizza' : 'Pilih Ukuran / Paket' }}
                                </label>

                                <div class="variant-grid">

                                    @foreach ($variants as $index => $variant)

                                        <label class="variant-option">

                                            <input
                                                type="radio"
                                                name="variant_id"
                                                value="{{ $variant->id }}"
                                                data-price="{{ (float) $variant->price }}"
                                                data-name="{{ $variant->name }}"
                                                class="variant-radio"
                                                {{ $index === 0 ? 'checked' : '' }}
                                            >

                                            <span class="variant-card">

                                                <span>
                                                    <span class="variant-title">
                                                        {{ $variant->name }}
                                                    </span>

                                                    <span class="variant-price">
                                                        Rp{{ number_format($variant->price, 0, ',', '.') }}
                                                    </span>
                                                </span>

                                                <i class="bi bi-check-circle-fill variant-check"></i>

                                            </span>

                                        </label>

                                    @endforeach

                                </div>

                            </div>

                        @endif


                        {{-- TOPPINGS --}}
                        @if ($isPizza && $toppings->count() > 0)

                            <div class="topping-area">

                                <label class="section-label">
                                    Tambahan Topping

                                    <span style="font-weight:400;color:#999;">
                                        (Opsional)
                                    </span>
                                </label>

                                <div class="topping-list">

                                    @foreach ($toppings as $topping)

                                        <label class="topping-option">

                                            <span style="display:flex;align-items:center;gap:8px;">

                                                <input
                                                    type="checkbox"
                                                    name="toppings[]"
                                                    value="{{ $topping->id }}"
                                                    data-medium="{{ (float) $topping->price_medium }}"
                                                    data-large="{{ (float) $topping->price_large }}"
                                                    class="topping-checkbox"
                                                >

                                                <span>
                                                    <span class="topping-name">
                                                        {{ $topping->name }}
                                                    </span>

                                                    <span class="topping-price">
                                                        + Rp{{ number_format($topping->price_medium, 0, ',', '.') }}
                                                    </span>
                                                </span>

                                            </span>

                                            <i
                                                class="bi bi-plus-circle"
                                                style="color:var(--primary);"
                                            ></i>

                                        </label>

                                    @endforeach

                                </div>

                            </div>

                        @endif


                        {{-- QUANTITY --}}
                        <div class="quantity-area">

                            <label for="quantity" class="section-label">
                                Jumlah Pesanan
                            </label>

                            <div class="quantity-control">

                                <button type="button" onclick="decreaseQty()">
                                    −
                                </button>

                                <input
                                    type="number"
                                    id="quantity"
                                    name="quantity"
                                    value="1"
                                    min="1"
                                >

                                <button type="button" onclick="increaseQty()">
                                    +
                                </button>

                            </div>

                        </div>


                        {{-- PRE ORDER NASTAR --}}
                        @if ($isNastar)

                            <div class="preorder-box">

                                <label for="po_date" class="section-label">
                                    <i class="bi bi-calendar-event"></i>
                                    Tanggal Pre-Order
                                </label>

                                <input
                                    type="date"
                                    id="po_date"
                                    min="{{ now()->toDateString() }}"
                                    required
                                >

                                <p>
                                    Pilih tanggal pengiriman atau pengambilan Kue Nastar.
                                </p>

                            </div>

                        @endif


                        {{-- TOTAL --}}
                        <div class="total-box">

                            <p>Total Harga</p>

                            <strong id="totalPrice">
                                Rp{{ number_format($minimumPrice, 0, ',', '.') }}
                            </strong>

                        </div>


                        {{-- AUTHENTICATED USER --}}
                        @auth

                            @if ($isNastar)

                                <button
                                    type="button"
                                    onclick="orderViaWhatsApp()"
                                    class="whatsapp-button"
                                >
                                    <i class="bi bi-whatsapp"></i>
                                    Pesan Kue Nastar via WhatsApp
                                </button>

                            @else

                                <button type="submit" class="submit-button">
                                    <i class="bi bi-cart-plus"></i>
                                    Tambah ke Keranjang
                                </button>

                            @endif

                        @else

                            {{-- FREE USER --}}
                            <div class="guest-notice">

                                <div class="guest-copy">

                                    <i class="bi bi-lock-fill"></i>

                                    <div>
                                        <strong>Masuk terlebih dahulu</strong>

                                        <span>
                                            Silakan login untuk menambahkan produk ke keranjang.
                                        </span>
                                    </div>

                                </div>

                                <a href="{{ route('login') }}" class="guest-login">
                                    Login Sekarang
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        @endauth

                    </form>

                </div>

            </div>

        </section>


        {{-- PRODUCT DETAILS --}}
        <section class="details-card">

            <div>

                <div class="tab-list">

                    <button
                        type="button"
                        class="tab-button active"
                        data-tab="description"
                    >
                        Deskripsi
                    </button>

                    <button
                        type="button"
                        class="tab-button"
                        data-tab="composition"
                    >
                        Komposisi
                    </button>

                    <button
                        type="button"
                        class="tab-button"
                        data-tab="reviews"
                    >
                        Ulasan
                    </button>

                </div>


                <div id="tab-description" class="tab-content active">
                    {{ $product->description ?: 'Menu lezat dengan bahan segar pilihan dan cita rasa khas PizzaMozza. Dibuat hangat setelah pesanan diterima sehingga cocok dinikmati bersama keluarga maupun teman.' }}
                </div>

                <div id="tab-composition" class="tab-content">
                    {{ $composition ?: 'Informasi komposisi produk belum tersedia.' }}
                </div>

                <div id="tab-reviews" class="tab-content">
                    Ulasan pelanggan untuk produk ini akan ditampilkan di sini.
                </div>

            </div>


            {{-- PRODUCT FACTS --}}
            <aside class="product-facts">

                <div class="fact-row">

                    <i class="bi bi-gift"></i>

                    <div>
                        <span>Kategori</span>
                        <strong>
                            {{ ucfirst($product->category ?? 'Menu') }}
                        </strong>
                    </div>

                </div>

                <div class="fact-row">

                    <i class="bi bi-people"></i>

                    <div>
                        <span>Estimasi Sajian</span>

                        <strong>
                            {{ $isPizza ? '1–2 orang' : 'Sesuai pilihan produk' }}
                        </strong>
                    </div>

                </div>

                <div class="fact-row">

                    <i class="bi bi-patch-check"></i>

                    <div>
                        <span>Ketersediaan</span>
                        <strong>Tersedia melalui pemesanan</strong>
                    </div>

                </div>

            </aside>

        </section>

    </main>


    {{-- FOOTER --}}
    <footer class="site-footer">
        © {{ date('Y') }} PizzaMozza. All Rights Reserved.
    </footer>


    {{-- JAVASCRIPT --}}
    <script>
        const variantRadios = document.querySelectorAll('.variant-radio');
        const toppingCheckboxes = document.querySelectorAll('.topping-checkbox');
        const quantityInput = document.getElementById('quantity');
        const totalPrice = document.getElementById('totalPrice');

        const baseProductPrice = Number(@json($basePrice));

        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID').format(Number(value) || 0);
        }

        function getSelectedVariant() {
            const selected = document.querySelector('.variant-radio:checked');

            if (!selected) {
                return {
                    price: baseProductPrice,
                    name: ''
                };
            }

            return {
                price: Number(selected.dataset.price) || 0,
                name: selected.dataset.name || ''
            };
        }

        function isLargeVariant(name) {
            const normalized = String(name || '').toLowerCase();

            return normalized.includes('large')
                || normalized.includes('besar')
                || normalized.includes('jumbo');
        }

        function updateToppingPrices() {
            const large = isLargeVariant(getSelectedVariant().name);

            toppingCheckboxes.forEach((checkbox) => {

                const price = large
                    ? Number(checkbox.dataset.large) || 0
                    : Number(checkbox.dataset.medium) || 0;

                const label = checkbox
                    .closest('.topping-option')
                    ?.querySelector('.topping-price');

                if (label) {
                    label.textContent = '+ Rp' + formatRupiah(price);
                }

            });
        }

        function calculateTotal() {
            const variant = getSelectedVariant();
            const large = isLargeVariant(variant.name);

            let unitPrice = variant.price;

            toppingCheckboxes.forEach((checkbox) => {

                if (checkbox.checked) {

                    unitPrice += large
                        ? (Number(checkbox.dataset.large) || 0)
                        : (Number(checkbox.dataset.medium) || 0);

                }

            });

            let quantity = Math.max(
                1,
                parseInt(quantityInput?.value, 10) || 1
            );

            if (
                quantityInput &&
                String(quantityInput.value) !== String(quantity)
            ) {
                quantityInput.value = quantity;
            }

            const total = unitPrice * quantity;

            if (totalPrice) {
                totalPrice.textContent = 'Rp' + formatRupiah(total);
            }

            return {
                unitPrice,
                quantity,
                total,
                variant
            };
        }

        function increaseQty() {
            if (!quantityInput) return;

            quantityInput.value =
                Math.max(1, parseInt(quantityInput.value, 10) || 1) + 1;

            calculateTotal();
        }

        function decreaseQty() {
            if (!quantityInput) return;

            quantityInput.value =
                Math.max(
                    1,
                    (parseInt(quantityInput.value, 10) || 1) - 1
                );

            calculateTotal();
        }


        // VARIANT
        variantRadios.forEach((radio) => {

            radio.addEventListener('change', () => {
                updateToppingPrices();
                calculateTotal();
            });

        });


        // TOPPING
        toppingCheckboxes.forEach((checkbox) => {

            checkbox.addEventListener('change', calculateTotal);

        });


        // QUANTITY
        quantityInput?.addEventListener('input', calculateTotal);
        quantityInput?.addEventListener('change', calculateTotal);


        // TAB NAVIGATION
        document.querySelectorAll('.tab-button').forEach((button) => {

            button.addEventListener('click', () => {

                document.querySelectorAll('.tab-button').forEach((item) => {
                    item.classList.remove('active');
                });

                document.querySelectorAll('.tab-content').forEach((panel) => {
                    panel.classList.remove('active');
                });

                button.classList.add('active');

                document
                    .getElementById('tab-' + button.dataset.tab)
                    ?.classList.add('active');

            });

        });


        // WHATSAPP PRE-ORDER
        function orderViaWhatsApp() {

            const dateInput = document.getElementById('po_date');
            const poDate = dateInput?.value;
            const order = calculateTotal();

            if (!poDate) {
                alert('Silakan pilih tanggal Pre-Order.');
                dateInput?.focus();
                return;
            }

            const today = new Date();
            today.setHours(0, 0, 0, 0);

            if (new Date(poDate + 'T00:00:00') < today) {
                alert('Tanggal Pre-Order tidak boleh sebelum hari ini.');
                dateInput?.focus();
                return;
            }

            const productName = @json($product->name);

            const rawSellerNumber = @json(
                config('services.whatsapp.seller_number') ?? '6283143290888'
            );

            const sellerNumber = String(rawSellerNumber)
                .replace(/[^0-9]/g, '');

            const selectedToppings = Array.from(toppingCheckboxes)
                .filter((checkbox) => checkbox.checked)
                .map((checkbox) => {
                    return checkbox
                        .closest('.topping-option')
                        ?.querySelector('.topping-name')
                        ?.textContent.trim();
                })
                .filter(Boolean);

            const message = [
                'Halo PizzaMozza, saya ingin memesan Pre-Order.',
                '',
                'Produk: ' + productName,
                order.variant.name
                    ? 'Ukuran: ' + order.variant.name
                    : null,
                selectedToppings.length
                    ? 'Topping: ' + selectedToppings.join(', ')
                    : null,
                'Jumlah: ' + order.quantity,
                'Total: Rp' + formatRupiah(order.total),
                'Tanggal Pre-Order: ' + poDate,
                '',
                'Terima kasih!'
            ]
            .filter(Boolean)
            .join('\n');

            window.open(
                'https://wa.me/' + sellerNumber + '?text=' + encodeURIComponent(message),
                '_blank',
                'noopener'
            );
        }


        // INITIALIZATION
        updateToppingPrices();
        calculateTotal();

    </script>

</body>
</html>