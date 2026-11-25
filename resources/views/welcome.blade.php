<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PizzaMozza - Fresh, Tasty, Happiness!</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --red: #b51e20;
            --dark-red: #741416;
            --orange: #f36d42;
            --cream: #fff8f2;
            --white: #ffffff;
            --text: #351b18;
            --muted: #806b64;
            --shadow: 0 8px 25px rgba(100, 35, 20, .10);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--cream);
            color: var(--text);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
            cursor: pointer;
        }

        /* NAVBAR */

        .navbar {
            width: 100%;
            min-height: 82px;
            padding: 12px 7%;
            background: rgba(255, 250, 246, .97);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 3px 15px rgba(80, 20, 10, .06);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: var(--red);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 23px;
        }

        .logo-text h2 {
            color: var(--red);
            font-size: 25px;
            font-weight: 800;
            line-height: 1.2;
        }

        .logo-text p {
            color: var(--muted);
            font-size: 10px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 600;
            transition: .3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--red);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid #e6d3c9;
            background: white;
            padding: 10px 15px;
            border-radius: 30px;
            width: 230px;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            font-family: inherit;
            font-size: 12px;
            background: transparent;
        }

        .login-btn {
            padding: 11px 23px;
            background: var(--red);
            color: white;
            border-radius: 13px;
            font-weight: 600;
            font-size: 14px;
            transition: .3s;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .login-btn:hover {
            background: var(--dark-red);
            transform: translateY(-2px);
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--red);
            font-size: 24px;
        }

        /* HERO */

        .hero-wrapper {
            position: relative;
            padding: 12px 7% 0;
        }

        .hero-slider {
            position: relative;
            height: 310px;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity .7s ease;
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
        }

        .hero-slide.active {
            opacity: 1;
            visibility: visible;
        }

        .hero-slide::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                90deg,
                rgba(91, 8, 10, .98) 0%,
                rgba(135, 16, 18, .92) 42%,
                rgba(0, 0, 0, .03) 100%
            );
        }

        .slide-content {
            position: relative;
            z-index: 2;
            color: white;
            padding: 35px 7%;
            max-width: 550px;
        }

        .promo-label {
            display: inline-block;
            background: #ffb45e;
            color: #741416;
            border-radius: 30px;
            padding: 7px 17px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 13px;
        }

        .slide-content h1 {
            font-size: clamp(28px, 3.5vw, 43px);
            line-height: 1.15;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .slide-content p {
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 20px;
            max-width: 350px;
        }

        .promo-btn {
            display: inline-block;
            padding: 12px 24px;
            background: var(--orange);
            color: white;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            transition: .3s;
        }

        .promo-btn:hover {
            background: white;
            color: var(--red);
            transform: translateY(-3px);
        }

        .hero-arrow {
            position: absolute;
            z-index: 5;
            top: 50%;
            transform: translateY(-50%);
            width: 42px;
            height: 42px;
            border: none;
            border-radius: 50%;
            background: white;
            color: var(--red);
            font-size: 18px;
            box-shadow: var(--shadow);
        }

        .hero-arrow:hover {
            background: var(--red);
            color: white;
        }

        .hero-prev {
            left: 20px;
        }

        .hero-next {
            right: 20px;
        }

        .hero-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            padding: 13px;
        }

        .hero-dot {
            width: 10px;
            height: 10px;
            background: #edb3a5;
            border-radius: 50%;
            border: none;
        }

        .hero-dot.active {
            background: var(--red);
            width: 25px;
            border-radius: 20px;
        }

        /* FEATURES */

        .features {
            margin: 7px 7% 30px;
            padding: 17px 20px;
            background: rgba(255, 255, 255, .85);
            border: 1px solid white;
            border-radius: 22px;
            box-shadow: var(--shadow);
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .feature-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 13px;
            padding: 5px 10px;
            border-right: 1px solid #f1d6ca;
        }

        .feature-item:last-child {
            border: none;
        }

        .feature-item i {
            color: var(--orange);
            font-size: 29px;
        }

        .feature-item h4 {
            font-size: 13px;
            line-height: 1.5;
        }

        /* SECTION */

        .section {
            padding: 5px 7% 25px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .section-heading h2 {
            font-size: 23px;
            font-weight: 800;
        }

        .section-heading a {
            color: var(--red);
            font-size: 13px;
            font-weight: 700;
        }

        /* CATEGORY */

        .categories {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        .category-btn {
            min-width: 155px;
            padding: 12px 22px;
            background: white;
            border: 1px solid #f5e5dc;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(80, 20, 10, .06);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-size: 13px;
            font-weight: 600;
            transition: .3s;
        }

        .category-btn i {
            color: var(--orange);
            font-size: 19px;
        }

        .category-btn:hover,
        .category-btn.active {
            background: var(--red);
            color: white;
            transform: translateY(-3px);
        }

        .category-btn.active i,
        .category-btn:hover i {
            color: white;
        }

        /* PRODUCT */

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .product-card {
            position: relative;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #f4e6df;
            box-shadow: var(--shadow);
            transition: .35s;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 30px rgba(100, 20, 10, .15);
        }

        /* GAMBAR MENU */

        .product-image {
            height: 220px;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fffaf6;
            overflow: hidden;
        }

        .product-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 14px;
            transition: transform .4s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.08);
        }

        .product-info {
            padding: 12px 14px 15px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-info h3 {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .product-rating-mini {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .product-rating-mini i {
            color: #f59e0b;
            font-size: 11px;
        }

        .product-rating-mini strong {
            color: var(--text);
            font-weight: 700;
        }

        .product-info p {
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .product-bottom {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 5px;
        }

        .product-price {
            color: var(--red);
            font-weight: 800;
            font-size: 14px;
        }

        .detail-btn {
            background: var(--red);
            color: white;
            padding: 7px 12px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .detail-btn:hover {
            background: var(--dark-red);
        }

        .empty-products {
            text-align: center;
            padding: 50px 15px;
            color: var(--muted);
            grid-column: 1 / -1;
        }

        /* REGISTER BANNER */

        .register-section {
            margin: 20px 5% 55px;
            padding: 25px 35px;
            background: linear-gradient(110deg, #fff0e8, #fffaf6);
            border: 1px solid white;
            border-radius: 25px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            position: relative;
            overflow: hidden;
        }

        .register-section::before {
            content: "🍕";
            position: absolute;
            right: -10px;
            bottom: -35px;
            font-size: 130px;
            opacity: .08;
        }

        .register-title {
            position: relative;
            z-index: 1;
            max-width: 280px;
        }

        .register-title h2 {
            color: var(--dark-red);
            font-size: 22px;
            line-height: 1.4;
        }

        .register-title p {
            font-size: 11px;
            color: var(--muted);
            margin-top: 7px;
        }

        .register-benefits {
            display: flex;
            gap: 25px;
        }

        .benefit {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 11px;
            font-weight: 600;
        }

        .benefit i {
            color: var(--red);
            font-size: 25px;
        }

        .register-btn {
            position: relative;
            z-index: 1;
            background: var(--red);
            color: white;
            padding: 13px 25px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
            transition: .3s;
        }

        .register-btn:hover {
            background: var(--dark-red);
            transform: translateY(-3px);
        }

        /* ABOUT */

        .about-section {
            padding: 50px 7%;
            background: white;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 45px;
        }

        .about-section img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 22px;
        }

        .about-content h2 {
            color: var(--dark-red);
            font-size: 25px;
            margin-bottom: 15px;
        }

        .about-content p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.9;
        }

        /* FOOTER */

        footer {
            background: #681a19;
            color: white;
            padding: 40px 7% 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 50px;
        }

        .footer-content h3 {
            margin-bottom: 15px;
            font-size: 18px;
        }

        .footer-content p {
            font-size: 12px;
            line-height: 2;
            color: #f5dcd4;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.2);
            margin-top: 25px;
            padding-top: 18px;
            display: flex;
            justify-content: space-between;
            font-size: 11px;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {
            .navbar {
                padding: 12px 4%;
            }

            .nav-links {
                gap: 15px;
            }

            .search-box {
                width: 180px;
            }

            .product-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .features {
                margin-left: 4%;
                margin-right: 4%;
            }

            .register-benefits {
                gap: 12px;
            }
        }

        @media (max-width: 700px) {
            .navbar {
                flex-wrap: wrap;
                min-height: 70px;
                padding: 10px 5%;
            }

            .logo-icon {
                width: 43px;
                height: 43px;
            }

            .logo-text h2 {
                font-size: 20px;
            }

            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
                padding: 15px 0;
                gap: 18px;
            }

            .nav-links.show {
                display: flex;
            }

            .nav-actions {
                width: 100%;
                justify-content: space-between;
                padding-top: 10px;
            }

            .search-box {
                width: 65%;
            }

            .hero-wrapper {
                padding: 10px 4% 0;
            }

            .hero-slider {
                height: 330px;
            }

            .slide-content {
                padding: 25px 8%;
            }

            .slide-content h1 {
                font-size: 30px;
            }

            .slide-content p {
                font-size: 12px;
            }

            .features {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                padding: 15px 5px;
            }

            .feature-item {
                border: none;
                justify-content: flex-start;
            }

            .feature-item h4 {
                font-size: 11px;
            }

            .feature-item i {
                font-size: 23px;
            }

            .section {
                padding-left: 5%;
                padding-right: 5%;
            }

            .section-heading h2 {
                font-size: 19px;
            }

            .categories {
                justify-content: flex-start;
                gap: 9px;
            }

            .category-btn {
                min-width: 0;
                padding: 10px 14px;
                font-size: 11px;
            }

            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .product-image {
                height: 150px;
            }

            .product-info h3 {
                font-size: 12px;
            }

            .product-price {
                font-size: 12px;
            }

            .register-section {
                margin: 20px 4%;
                padding: 22px;
                flex-direction: column;
                align-items: flex-start;
            }

            .register-benefits {
                flex-wrap: wrap;
            }

            .about-section {
                grid-template-columns: 1fr;
                padding: 35px 5%;
                gap: 20px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->

    <header class="navbar">
        <a href="{{ route('home') }}" class="logo">
            <div class="logo-icon">
                <i class="fa-solid fa-pizza-slice"></i>
            </div>

            <div class="logo-text">
                <h2>PizzaMozza</h2>
                <p>Fresh, Tasty, Happiness!</p>
            </div>
        </a>

        <button class="menu-toggle" id="menuToggle" type="button" aria-label="Menu">
            <i class="fa-solid fa-bars"></i>
        </button>

        <nav class="nav-links" id="navLinks">
            <a href="#beranda" class="active">Beranda</a>
            <a href="#menu">Menu</a>
            <a href="#tentang">Tentang Kami</a>
            <a href="#kontak">Kontak</a>
        </nav>

        <div class="nav-actions">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Cari menu favorit...">
            </div>

            @auth
                <a href="{{ route('dashboard') }}" class="login-btn">
                    <i class="fa-regular fa-user"></i>
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="login-btn">
                    <i class="fa-regular fa-user"></i>
                    Login
                </a>
            @endauth
        </div>
    </header>

    <!-- HERO CAROUSEL -->

    <section class="hero-wrapper" id="beranda">

        <div class="hero-slider">

            <div class="hero-slide active"
                style="background-image: url('https://images.unsplash.com/photo-1579751626657-72bc17010498?auto=format&fit=crop&w=1800&q=85');">

                <div class="slide-content">
                    <span class="promo-label">
                        <i class="fa-solid fa-crown"></i>
                        Promo Spesial
                    </span>

                    <h1>Paket Pizza<br>Hemat & Lezat!</h1>

                    <p>
                        Nikmati pizza favoritmu dengan harga lebih hemat
                        hanya di PizzaMozza.
                    </p>

                    <a href="#menu" class="promo-btn">
                        Lihat Menu
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="hero-slide"
                style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=1800&q=85');">

                <div class="slide-content">
                    <span class="promo-label">
                        <i class="fa-solid fa-fire"></i>
                        Menu Favorit
                    </span>

                    <h1>Pizza Hangat<br>Setiap Gigitan!</h1>

                    <p>
                        Perpaduan keju, saus, dan topping pilihan
                        untuk menemani harimu.
                    </p>

                    <a href="#menu" class="promo-btn">
                        Jelajahi Menu
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="hero-slide"
                style="background-image: url('https://images.unsplash.com/photo-1593560708920-61dd98c46a4e?auto=format&fit=crop&w=1800&q=85');">

                <div class="slide-content">
                    <span class="promo-label">
                        <i class="fa-solid fa-heart"></i>
                        Fresh & Delicious
                    </span>

                    <h1>Rasa Istimewa<br>Untuk Semua!</h1>

                    <p>
                        Temukan berbagai pilihan pizza dan camilan
                        lezat dari PizzaMozza.
                    </p>

                    <a href="{{ route('register') }}" class="promo-btn">
                        Daftar Sekarang
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <button class="hero-arrow hero-prev" id="heroPrev" type="button" aria-label="Slide Sebelumnya">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <button class="hero-arrow hero-next" id="heroNext" type="button" aria-label="Slide Berikutnya">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

        </div>

        <div class="hero-dots" id="heroDots">
            <button class="hero-dot active" type="button" aria-label="Slide 1"></button>
            <button class="hero-dot" type="button" aria-label="Slide 2"></button>
            <button class="hero-dot" type="button" aria-label="Slide 3"></button>
        </div>

    </section>

    <!-- FEATURES -->

    <section class="features">

        <div class="feature-item">
            <i class="fa-solid fa-truck-fast"></i>
            <h4>Pengantaran<br>Cepat</h4>
        </div>

        <div class="feature-item">
            <i class="fa-solid fa-shield-halved"></i>
            <h4>Pesanan Aman<br>dan Terpercaya</h4>
        </div>

        <div class="feature-item">
            <i class="fa-solid fa-leaf"></i>
            <h4>Bahan Berkualitas<br>dan Segar</h4>
        </div>

        <div class="feature-item">
            <i class="fa-solid fa-pizza-slice"></i>
            <h4>Rasa Lezat<br>Berkualitas</h4>
        </div>

    </section>

    <!-- MENU -->

    <section class="section" id="menu">

        <div class="section-heading">
            <h2>Pilih Kategori Menu</h2>

            <a href="{{ route('products.index') }}">
                Lihat Semua
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <!-- CATEGORY -->

        <div class="categories">

            <button class="category-btn active" data-category="all" type="button">
                <i class="fa-solid fa-utensils"></i>
                Semua
            </button>

            <button class="category-btn" data-category="pizza" type="button">
                <i class="fa-solid fa-pizza-slice"></i>
                Pizza
            </button>

            <button class="category-btn" data-category="snack" type="button">
                <i class="fa-solid fa-burger"></i>
                Snack
            </button>

            <button class="category-btn" data-category="paket" type="button">
                <i class="fa-solid fa-box"></i>
                Paket Hemat
            </button>

        </div>

        <!-- PRODUCT LIST -->

        <div class="product-grid" id="productGrid">

            @forelse($products as $product)

                @php
                    $firstVariant = $product->variants->first();

                    $productName = $product->name ?? 'Produk PizzaMozza';

                    $productDescription = $product->description ?? '';

                    $productPrice = $product->price
                        ?? ($firstVariant->price ?? 0);

                    // Rating produk
                    $ratingsCollection = $product->ratings ?? collect();
                    $avgRating = round((float) ($ratingsCollection->avg('rating') ?? 0), 1);
                    $totalReviews = $ratingsCollection->count();

                    // Kategori berbentuk string maupun relasi
                    $categoryValue = $product->category;

                    $categoryName = strtolower(
                        is_object($categoryValue)
                            ? ($categoryValue->name ?? '')
                            : ($categoryValue ?? '')
                    );

                    // SAMBUNGKAN KE FOLDER PUBLIC/IMAGES & PUBLIC/IMAGE (OTOMATIS COCOKKAN NAMA & EKSTENSI)
                    $rawImage = $product->image ?? $product->gambar ?? $product->foto ?? null;
                    $rawImage = $rawImage ? ltrim($rawImage, '/') : null;
                    $imageUrl = null;

                    if ($rawImage && (str_starts_with($rawImage, 'http://') || str_starts_with($rawImage, 'https://'))) {
                        $imageUrl = $rawImage;
                    } else {
                        $baseFile = $rawImage ? basename($rawImage) : '';
                        $candidates = [];

                        if ($baseFile !== '') {
                            $candidates = [
                                'images/' . $baseFile,
                                'images/' . $rawImage,
                                'image/' . $baseFile,
                                'image/' . $rawImage,
                                'storage/' . $rawImage,
                                'storage/products/' . $baseFile,
                                $rawImage,
                            ];
                        }

                        foreach ($candidates as $candidatePath) {
                            if (file_exists(public_path($candidatePath))) {
                                $imageUrl = asset($candidatePath);
                                break;
                            }
                        }

                        if (!$imageUrl) {
                            $targetKeys = array_filter([
                                $baseFile !== '' ? preg_replace('/[^a-z0-9]/', '', strtolower(pathinfo($baseFile, PATHINFO_FILENAME))) : null,
                                preg_replace('/[^a-z0-9]/', '', strtolower($productName)),
                            ]);

                            foreach (['images', 'image'] as $dir) {
                                $fullDir = public_path($dir);
                                if (!is_dir($fullDir)) {
                                    continue;
                                }
                                foreach (scandir($fullDir) as $file) {
                                    if ($file === '.' || $file === '..' || is_dir($fullDir . DIRECTORY_SEPARATOR . $file)) {
                                        continue;
                                    }
                                    $normalizedFile = preg_replace('/[^a-z0-9]/', '', strtolower(pathinfo($file, PATHINFO_FILENAME)));
                                    if (in_array($normalizedFile, $targetKeys, true)) {
                                        $imageUrl = asset($dir . '/' . $file);
                                        break 2;
                                    }
                                }
                            }
                        }
                    }

                    if (!$imageUrl) {
                        $imageUrl = 'https://placehold.co/500x350/fff1e7/b51e20?text=' . urlencode($productName);
                    }
                @endphp

                <article class="product-card"
                    data-category="{{ $categoryName }}"
                    data-name="{{ strtolower($productName) }}">

                    <a href="{{ route('products.show', $product->id) }}">
                        <div class="product-image">
                            <img
                                src="{{ $imageUrl }}"
                                alt="{{ $productName }}"
                                loading="lazy"
                                onerror="this.onerror=null; this.src='https://placehold.co/500x350/fff1e7/b51e20?text=PizzaMozza';">
                        </div>
                    </a>

                    <div class="product-info">

                        <h3>{{ $productName }}</h3>

                        <div class="product-rating-mini">
                            <i class="fa-solid fa-star"></i>
                            <strong>{{ $totalReviews > 0 ? number_format($avgRating, 1) : 'Baru' }}</strong>
                            @if ($totalReviews > 0)
                                <span>({{ $totalReviews }})</span>
                            @endif
                        </div>

                        <p>
                            {{ \Illuminate\Support\Str::limit($productDescription, 55) }}
                        </p>

                        <div class="product-bottom">

                            <span class="product-price">
                                Rp {{ number_format((float) $productPrice, 0, ',', '.') }}
                            </span>

                            <a href="{{ route('products.show', $product->id) }}"
                                class="detail-btn">

                                Detail
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>
                    </div>
                </article>

            @empty

                <div class="empty-products">
                    <i class="fa-solid fa-pizza-slice"
                        style="font-size:40px;color:#b51e20"></i>

                    <h3>Belum Ada Produk</h3>
                    <p>Produk PizzaMozza akan segera tersedia.</p>
                </div>

            @endforelse

        </div>

    </section>

    <!-- REGISTER BANNER -->

    <section class="register-section">

        <div class="register-title">
            <h2>Daftar Sekarang & Nikmati Berbagai Kemudahan!</h2>

            <p>
                Buat akun gratis dan nikmati pengalaman
                pemesanan yang lebih mudah.
            </p>
        </div>

        <div class="register-benefits">

            <div class="benefit">
                <i class="fa-solid fa-percent"></i>
                <span>Promo Khusus<br>Member</span>
            </div>

            <div class="benefit">
                <i class="fa-regular fa-bookmark"></i>
                <span>Simpan Menu<br>Favorit</span>
            </div>

            <div class="benefit">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>Riwayat<br>Pesanan</span>
            </div>

        </div>

        <a href="{{ route('register') }}" class="register-btn">
            Daftar Gratis
            <i class="fa-solid fa-arrow-right"></i>
        </a>

    </section>

    <!-- ABOUT -->

    <section class="about-section" id="tentang">

        <div>
            <img
                src="https://images.unsplash.com/photo-1604382355076-af4b0eb60143?auto=format&fit=crop&w=1000&q=85"
                alt="PizzaMozza">
        </div>

        <div class="about-content">

            <h2>Kenapa Harus PizzaMozza?</h2>

            <p>
                PizzaMozza menghadirkan berbagai pilihan pizza
                dan makanan lezat dengan bahan berkualitas.
                Kami berkomitmen memberikan pengalaman menikmati
                makanan yang menyenangkan untuk setiap pelanggan.
            </p>

            <br>

            <p>
                Fresh, Tasty, Happiness!
            </p>

        </div>

    </section>

    <!-- FOOTER -->

    <footer id="kontak">

        <div class="footer-content">

            <div>

                <h3>
                    <i class="fa-solid fa-pizza-slice"></i>
                    PizzaMozza
                </h3>

                <p>
                    Fresh, Tasty, Happiness!
                </p>

                <p>
                    Nikmati pizza lezat dengan berbagai pilihan
                    rasa dan ukuran hanya di PizzaMozza.
                </p>

            </div>

            <div>

                <h3>Informasi Toko</h3>

                <p>
                    <strong>Alamat:</strong><br>
                    Jl. A. Yani KM. 6, Desa Panggung,
                    Kecamatan Pelaihari, Kabupaten Tanah Laut,
                    Kalimantan Selatan 70815.
                </p>

                <p>
                    <strong>WhatsApp Admin:</strong><br>
                    083143290888
                </p>

                <p>
                    <strong>Email:</strong><br>
                    pizzamozza@gmail.com
                </p>

            </div>

        </div>

        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} PizzaMozza. All Rights Reserved.
            </p>

            <p>
                Fresh, Tasty, Happiness!
            </p>

        </div>

    </footer>

    <!-- JAVASCRIPT -->

    <script>
        // MOBILE NAVBAR
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        if (menuToggle && navLinks) {
            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('show');
            });
        }

        // HERO CAROUSEL
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.hero-dot');
        const prevBtn = document.getElementById('heroPrev');
        const nextBtn = document.getElementById('heroNext');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(index) {
            if (!slides.length) return;
            currentSlide = (index + slides.length) % slides.length;
            slides.forEach((slide, idx) => {
                slide.classList.toggle('active', idx === currentSlide);
            });
            dots.forEach((dot, idx) => {
                dot.classList.toggle('active', idx === currentSlide);
            });
        }

        function startSlider() {
            if (slides.length <= 1) return;
            clearInterval(slideInterval);
            slideInterval = setInterval(() => showSlide(currentSlide + 1), 5000);
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                showSlide(currentSlide - 1);
                startSlider();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                showSlide(currentSlide + 1);
                startSlider();
            });
        }

        dots.forEach((dot, idx) => {
            dot.addEventListener('click', () => {
                showSlide(idx);
                startSlider();
            });
        });

        startSlider();

        // FILTER KATEGORI & PENCARIAN LIVE
        const categoryButtons = document.querySelectorAll('.category-btn');
        const productCards = document.querySelectorAll('.product-card');
        const searchInput = document.getElementById('searchInput');
        let activeCategory = 'all';

        function filterProducts() {
            const keyword = (searchInput?.value || '').trim().toLowerCase();

            productCards.forEach((card) => {
                const cardCategory = (card.dataset.category || '').toLowerCase();
                const cardName = (card.dataset.name || '').toLowerCase();

                const matchCategory = activeCategory === 'all' || cardCategory.includes(activeCategory);
                const matchSearch = keyword === '' || cardName.includes(keyword);

                card.style.display = (matchCategory && matchSearch) ? '' : 'none';
            });
        }

        categoryButtons.forEach((btn) => {
            btn.addEventListener('click', () => {
                categoryButtons.forEach((b) => b.classList.remove('active'));
                btn.classList.add('active');
                activeCategory = (btn.dataset.category || 'all').toLowerCase();
                filterProducts();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', filterProducts);
        }
    </script>

</body>
</html>