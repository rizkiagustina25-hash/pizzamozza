<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PizzaMozza | Menu</title>
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 48 48'%3E%3Ccircle cx='24' cy='24' r='23' fill='%23941919'/%3E%3Cpath d='M20.2 14.2C26.5 14.8 33.2 21.5 33.8 27.8' stroke='%23FFFFFF' stroke-width='3.6' stroke-linecap='round' fill='none'/%3E%3Cpath d='M19.2 18.8C23.5 19.6 28.4 24.5 29.2 28.8L15.4 33.5C14.3 33.9 13.7 33.3 14.1 32.2L19.2 18.8Z' fill='%23FFFFFF'/%3E%3Ccircle cx='20.2' cy='22.8' r='1.45' fill='%23941919'/%3E%3Ccircle cx='25.0' cy='27.4' r='1.45' fill='%23941919'/%3E%3Ccircle cx='18.4' cy='29.2' r='1.45' fill='%23941919'/%3E%3C/svg%3E">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .hero {
            position: relative;
        }

        .hero-register-overlay {
            position: absolute;

            /* Posisi tombol di atas tulisan Daftar Sekarang */
            left: 6%;
            top: 76%;

            width: 20%;
            height: 17%;

            display: block;
            z-index: 10;

            cursor: pointer;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --red: #941919;
            --red-hover: #b52d2d;
            --cream: #fffaf3;
            --soft: #f8f0e9;
            --brown: #34241f;
            --muted: #907d73;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--cream);
            color: var(--brown);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input {
            font: inherit;
        }

        /* HEADER */

        .navbar {
            height: 82px;
            padding: 0 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fffdf9;
            border-bottom: 1px solid #f0e1d5;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: var(--red);
            color: white;
            flex-shrink: 0;
            overflow: hidden;
        }

        .brand-icon svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .brand-name {
            color: var(--red);
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .brand-name span {
            color: #e58b7d;
        }

        .brand-subtitle {
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .login-button,
        .profile-button {
            padding: 12px 19px;
            border: 0;
            border-radius: 9px;
            background: var(--red);
            color: white;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        .login-button:hover,
        .profile-button:hover {
            background: var(--red-hover);
        }

        /* HERO BANNER */

        .hero {
            position: relative;
            width: 100%;
            height: 500px;
            min-height: 500px;

            background-image: url('/storage/images/pizzamozza-hero-banner.png');
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;

            overflow: hidden;
        }

        /* Tombol daftar yang berada di dalam gambar */
        .hero-register-overlay {
            position: absolute;
            left: 6%;
            top: 76%;
            width: 20%;
            height: 17%;
            z-index: 2;
            cursor: pointer;
        }

        /* Tampilan laptop kecil dan tablet */
        @media (max-width: 992px) {
            .hero {
                height: 380px;
                min-height: 380px;
            }
        }

        /* Tampilan HP */
        @media (max-width: 600px) {
            .hero {
                height: 260px;
                min-height: 260px;
                background-size: cover;
                background-position: center;
            }
        }

        /* Tombol HTML transparan berada tepat di atas tombol pada gambar banner. */
        .hero-register-overlay {
            position: absolute;
            left: 6%;
            top: 75%;
            width: 19%;
            height: 16%;
            display: block;
            z-index: 2;
            border-radius: 999px;
            outline-offset: 4px;
        }

        .hero-register-overlay:focus-visible {
            outline: 3px solid #fff;
        }

        /* BENEFIT STRIP */
        .benefits {
            position: relative;
            z-index: 3;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            align-items: center;
            gap: 12px;
            margin: -1px 2.5% 0;
            padding: 20px 3%;
            background: #fffaf3;
            border: 1px solid #f3dfcc;
            border-radius: 24px;
            box-shadow: 0 8px 22px #713c2910;
        }

        .benefit-item {
            min-height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            color: #64231b;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.45;
        }

        .benefit-item+.benefit-item {
            border-left: 1px solid #dfb9a5;
        }

        .benefit-item i {
            color: var(--red);
            font-size: 38px;
            flex-shrink: 0;
        }

        .pizza-logo {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pizza-logo svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        /* MENU SECTION */

        .menu-section {
            padding: 55px 5% 30px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 25px;
        }

        .section-label {
            color: var(--red);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 9px;
        }

        .section-title {
            color: #4b2018;
            font-size: 32px;
            font-weight: 800;
        }

        .section-subtitle {
            margin-top: 9px;
            color: var(--muted);
            font-size: 13px;
        }

        /* PRODUCT */

        .product-page {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 28px;
            align-items: stretch;
            padding: 15px 0 45px;
        }

        .product-card {
            position: relative;
            min-width: 0;
            height: 380px;
            overflow: hidden;
            background: #141414;
            border: 5px solid #141414;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(20, 14, 12, 0.14);
            cursor: pointer;
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
        }

        .product-card:hover {
            transform: translateY(-6px) rotate(-1deg);
            border-color: var(--red);
            box-shadow: 0 18px 36px rgba(148, 25, 25, 0.25);
        }

        .product-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: var(--soft);
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .4s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.07);
        }

        .image-placeholder {
            color: var(--red);
            font-size: 80px;
        }

        .product-content {
            position: absolute;
            inset: 0;
            padding: 26px 28px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            background: linear-gradient(to top,
                    rgba(18, 10, 8, 0.92) 0%,
                    rgba(18, 10, 8, 0.62) 55%,
                    rgba(18, 10, 8, 0.12) 100%);
            opacity: 0;
            visibility: hidden;
            transition: opacity .3s ease, visibility .3s ease;
        }

        .product-card:hover .product-content,
        .product-card:focus-within .product-content {
            opacity: 1;
            visibility: visible;
        }

        .product-category {
            align-self: flex-start;
            margin-bottom: 8px;
            padding: 4px 10px;
            border-radius: 6px;
            background: var(--red);
            color: #ffffff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .product-content h3 {
            margin-bottom: 8px;
            color: #ffffff;
            font-size: 28px;
            font-weight: 900;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.45);
            transform: translateY(10px);
            transition: transform .3s ease;
        }

        .product-card:hover .product-content h3 {
            transform: translateY(0);
        }

        .product-description {
            margin-bottom: 14px;
            color: rgba(255, 250, 243, 0.88);
            font-size: 13px;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .variant-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .variant-item {
            flex: 1 1 110px;
            padding: 9px 12px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.14);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        .variant-name {
            display: block;
            margin-bottom: 3px;
            color: rgba(255, 250, 243, 0.85);
            font-size: 11px;
        }

        .variant-price {
            color: #ffd166;
            font-size: 14px;
            font-weight: 800;
        }

        /* EMPTY STATE */

        .empty-products {
            grid-column: 1 / -1;
            padding: 65px 20px;
            text-align: center;
            background: white;
            border: 1px dashed #e4c9b7;
            border-radius: 15px;
        }

        .empty-products i {
            color: var(--red);
            font-size: 45px;
        }

        .empty-products h3 {
            margin: 15px 0 8px;
        }

        .empty-products p {
            color: var(--muted);
            font-size: 13px;
        }

        .empty-products a {
            display: inline-block;
            margin-top: 18px;
            padding: 11px 18px;
            border-radius: 8px;
            background: var(--red);
            color: white;
            font-size: 12px;
            font-weight: 700;
        }

        /* CTA REGISTER BANNER */

        .cta-register-banner {
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 44px 48px;
            background: #6c1414;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 32px;
            box-shadow: 0 12px 30px rgba(108, 20, 20, 0.16);
        }

        .cta-register-text {
            max-width: 660px;
        }

        .cta-register-text h2 {
            color: #ffffff;
            font-size: 31px;
            font-weight: 800;
            line-height: 1.28;
            margin-bottom: 14px;
        }

        .cta-register-text p {
            color: rgba(255, 250, 243, 0.88);
            font-size: 15px;
            line-height: 1.65;
        }

        .cta-register-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 18px 30px;
            border-radius: 14px;
            background: #f3dfc1;
            color: #7d1717;
            font-size: 15px;
            font-weight: 800;
            white-space: nowrap;
            flex-shrink: 0;
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
        }

        .cta-register-button:hover {
            background: #faebd4;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* PROMO SECTION */

        .promo-section {
            padding: 65px 5.2%;
            background: #fffaf5;
        }

        .promo-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 55px;
            margin-bottom: 70px;
        }

        .promo-item:last-child {
            margin-bottom: 0;
        }

        .promo-item.reverse {
            flex-direction: row-reverse;
        }

        .promo-text {
            flex: 1;
            max-width: 850px;
        }

        .promo-text h2 {
            color: #421d16;
            font-size: 32px;
            margin-bottom: 18px;
        }

        .promo-text p {
            color: #49332d;
            font-size: 17px;
            line-height: 1.8;
        }

        .promo-image {
            width: 300px;
            height: 300px;
            flex-shrink: 0;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 10px 25px #50231418;
        }

        /* FOOTER */

        .footer {
            background: #641b17;
            color: white;
            padding: 40px 5.2% 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 40px;
            margin-bottom: 30px;
        }

        .footer h3 {
            font-size: 20px;
            margin-bottom: 18px;
        }

        .footer p {
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            color: #ffc9b8;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 18px;
            display: flex;
            justify-content: space-between;
            gap: 15px;
            font-size: 13px;
        }

        /* LOGOUT MODAL */

        .logout-modal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #230f0f99;
        }

        .logout-modal.show {
            display: flex;
        }

        .logout-dialog {
            width: 100%;
            max-width: 380px;
            padding: 30px 25px;
            text-align: center;
            background: var(--cream);
            border-radius: 18px;
            box-shadow: 0 15px 45px #0003;
        }

        .logout-modal-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 17px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #f8e5e2;
            color: var(--red);
            font-size: 25px;
        }

        .logout-dialog h3 {
            margin-bottom: 10px;
        }

        .logout-dialog p {
            margin-bottom: 22px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .logout-modal-actions {
            display: flex;
            gap: 10px;
        }

        .logout-modal-actions button {
            flex: 1;
            min-height: 42px;
            border-radius: 9px;
            font-weight: 700;
            cursor: pointer;
        }

        .cancel-logout {
            border: 1px solid #e5d4c9;
            background: white;
            color: var(--brown);
        }

        .confirm-logout {
            border: none;
            background: var(--red);
            color: white;
        }

        /* RESPONSIVE */

        @media (max-width: 850px) {
            .product-card {
                height: 310px;
            }

            .product-content {
                padding: 20px;
            }

            .cta-register-banner {
                flex-direction: column;
                align-items: flex-start;
                padding: 34px 28px;
                gap: 22px;
            }

            .cta-register-text h2 {
                font-size: 26px;
            }

            .promo-item {
                gap: 30px;
            }

            .promo-image {
                width: 260px;
                height: 260px;
            }
        }

        @media (max-width: 700px) {
            .navbar {
                height: auto;
                min-height: 75px;
                padding: 13px 17px;
                gap: 12px;
            }

            .brand-name {
                font-size: 21px;
            }

            .hero {
                aspect-ratio: auto;
                min-height: 300px;
                height: 300px;
                background-size: auto 100%;
                background-position: left center;
            }

            .hero-register-overlay {
                left: 14%;
                top: 75%;
                width: 47%;
                height: 17%;
            }

            .benefits {
                grid-template-columns: 1fr;
                gap: 0;
                margin: 0 14px;
                padding: 8px 18px;
                border-radius: 18px;
            }

            .benefit-item {
                justify-content: flex-start;
                min-height: 64px;
                padding: 8px 12px;
                font-size: 14px;
            }

            .benefit-item+.benefit-item {
                border-left: 0;
                border-top: 1px solid #ead3c4;
            }

            .benefit-item i {
                width: 42px;
                text-align: center;
                font-size: 30px;
            }

            .pizza-logo {
                width: 42px;
                height: 34px;
            }

            .menu-section {
                padding: 38px 17px 20px;
            }

            .section-title {
                font-size: 26px;
            }

            .product-page {
                grid-template-columns: 1fr;
                gap: 20px;
                padding-bottom: 30px;
            }

            .product-card {
                height: 290px;
            }

            .product-content h3 {
                font-size: 22px;
            }

            .cta-register-banner {
                padding: 28px 22px;
                border-radius: 18px;
            }

            .cta-register-text h2 {
                font-size: 22px;
            }

            .cta-register-text p {
                font-size: 14px;
            }

            .cta-register-button {
                width: 100%;
                padding: 15px 22px;
            }

            .promo-item,
            .promo-item.reverse {
                flex-direction: column;
                text-align: center;
                gap: 25px;
            }

            .promo-image {
                width: 230px;
                height: 230px;
            }

            .promo-text h2 {
                font-size: 25px;
            }

            .promo-text p {
                font-size: 14px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 380px) {

            .login-button,
            .profile-button {
                padding: 10px 12px;
            }

            .brand-icon {
                width: 37px;
                height: 37px;
            }

            .promo-image {
                width: 200px;
                height: 200px;
            }

            .hero-register-overlay {
                position: absolute;
                left: 6%;
                top: 75%;
                width: 19%;
                height: 16%;

                display: block;
                z-index: 10;
                cursor: pointer;
                border-radius: 999px;

                transition: transform 0.2s ease;
            }

            /* Animasi mantul saat kursor menyentuh tombol */
            .hero-register-overlay:hover {
                animation: bounceButton 0.6s ease infinite;
            }

            /* Animasi saat diklik */
            .hero-register-overlay:active {
                transform: scale(0.9);
            }

            /* Keyframes animasi */
            @keyframes bounceButton {

                0%,
                100% {
                    transform: translateY(0);
                }

                25% {
                    transform: translateY(-10px);
                }

                50% {
                    transform: translateY(0);
                }

                75% {
                    transform: translateY(-5px);
                }
            }
        }
    </style>
</head>

<body>

    @php
        $resolveAsset = function (?string $file, array $folders = ['images/', 'storage/images/', 'storage/', 'image/', 'uploads/']) {
            if (!$file) {
                return null;
            }
            $clean = ltrim($file, '/');
            if (str_starts_with($clean, 'http')) {
                return $clean;
            }
            if (file_exists(public_path($clean))) {
                return asset($clean);
            }
            foreach ($folders as $folder) {
                if (file_exists(public_path($folder . $clean))) {
                    return asset($folder . $clean);
                }
            }
            return null;
        };

        $heroBannerUrl = $resolveAsset('pizzamozza-hero-banner.png')
            ?? $resolveAsset('pizza-banner.jpeg')
            ?? asset('storage/images/pizzamozza-hero-banner.png');
    @endphp

    <!-- HEADER -->

    <header class="navbar" id="home">

        <a href="{{ route('home') }}" class="brand">
            <div class="brand-icon" aria-hidden="true">
                <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="24" cy="24" r="24" fill="#941919" />
                    <path d="M20.2 14.2C26.5 14.8 33.2 21.5 33.8 27.8" stroke="#FFFFFF" stroke-width="3.6"
                        stroke-linecap="round" fill="none" />
                    <path
                        d="M19.2 18.8C23.5 19.6 28.4 24.5 29.2 28.8L15.4 33.5C14.3 33.9 13.7 33.3 14.1 32.2L19.2 18.8Z"
                        fill="#FFFFFF" />
                    <circle cx="20.2" cy="22.8" r="1.45" fill="#941919" />
                    <circle cx="25.0" cy="27.4" r="1.45" fill="#941919" />
                    <circle cx="18.4" cy="29.2" r="1.45" fill="#941919" />
                </svg>
            </div>

            <div>
                <div class="brand-name">Pizza<span>Mozza</span></div>
                <div class="brand-subtitle">Fresh, Tasty, Happiness!</div>
            </div>
        </a>

        <div class="nav-actions">
            @guest
                <a href="{{ route('login') }}" class="login-button">
                    Login
                </a>
            @else
                <a href="{{ route('dashboard', ['menu' => 'profile']) }}" class="profile-button">
                    <i class="bi bi-person-circle"></i>
                    Saya
                </a>
            @endguest
        </div>

    </header>

    <!-- HERO BANNER -->
    <section class="hero" style="background-image: url('{{ $heroBannerUrl }}');">

        <a href="{{ route('register') }}" class="hero-register-overlay" aria-label="Daftar Sekarang">
        </a>

    </section>

    <!-- KEUNGGULAN PIZZAMOZZA -->
    <section class="benefits" aria-label="Keunggulan PizzaMozza">
        <div class="benefit-item">
            <i class="bi bi-scooter" aria-hidden="true"></i>
            <span>Pengantaran<br>Cepat</span>
        </div>

        <div class="benefit-item">
            <i class="bi bi-shield-fill-check" aria-hidden="true"></i>
            <span>Pesanan Aman<br>dan Terpercaya</span>
        </div>

        <div class="benefit-item">
            <div class="pizza-logo" aria-hidden="true">
                <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="24" cy="24" r="22" fill="#941919" />
                    <path d="M20.2 14.2C26.5 14.8 33.2 21.5 33.8 27.8" stroke="#FFFFFF" stroke-width="3.6"
                        stroke-linecap="round" fill="none" />
                    <path
                        d="M19.2 18.8C23.5 19.6 28.4 24.5 29.2 28.8L15.4 33.5C14.3 33.9 13.7 33.3 14.1 32.2L19.2 18.8Z"
                        fill="#FFFFFF" />
                    <circle cx="20.2" cy="22.8" r="1.45" fill="#941919" />
                    <circle cx="25.0" cy="27.4" r="1.45" fill="#941919" />
                    <circle cx="18.4" cy="29.2" r="1.45" fill="#941919" />
                </svg>
            </div>

            <span>Rasa Lezat<br>Berkualitas</span>
        </div>

    </section>

    <!-- MENU PRODUK -->

    <main class="menu-section" id="menu">

        <div class="section-heading">
            <div>
                <div class="section-label">OUR MENU</div>

                <h2 class="section-title">
                    Menu Pizza Kami
                </h2>

                <p class="section-subtitle">
                    Pilih menu favoritmu dan temukan rasa kesukaanmu.
                </p>
            </div>
        </div>

        <!-- DAFTAR PRODUK -->

        @if ($products->isNotEmpty())

            @foreach ($products->chunk(2) as $productPair)
                <section class="product-page">

                    @foreach ($productPair as $product)
                        @php
                            $rawImg = $product->image ?? $product->gambar ?? $product->foto ?? null;
                            $resolvedProductImage = $resolveAsset($rawImg, ['images/', 'storage/', 'image/', 'uploads/']);
                        @endphp

                        <article class="product-card" tabindex="0">

                            <div class="product-image">

                                @if ($resolvedProductImage)
                                    <img src="{{ $resolvedProductImage }}" alt="{{ $product->name }}"
                                        onerror="this.style.display='none'; this.insertAdjacentHTML('afterend', '<span style=\'font-size:80px\'>🍕</span>');">
                                @else
                                    <span style="font-size: 80px;">🍕</span>
                                @endif

                            </div>

                            <div class="product-content">

                                <div class="product-category">
                                    {{ $product->category }}
                                </div>

                                <h3>
                                    {{ $product->name }}
                                </h3>

                                @if ($product->description)
                                    <p class="product-description">
                                        {{ $product->description }}
                                    </p>
                                @endif

                                <!-- HARGA VARIAN -->

                                <div class="variant-list">

                                    @if ($product->variants->isNotEmpty())
                                        @foreach ($product->variants->sortBy('sort_order') as $variant)
                                            <div class="variant-item">

                                                <span class="variant-name">
                                                    {{ $variant->name }}
                                                </span>

                                                <span class="variant-price">
                                                    Rp {{ number_format($variant->price, 0, ',', '.') }}
                                                </span>

                                            </div>
                                        @endforeach
                                    @else
                                        <div class="variant-item">
                                            <span class="variant-name">Harga</span>
                                            <span class="variant-price">
                                                Harga belum tersedia
                                            </span>
                                        </div>
                                    @endif

                                </div>

                            </div>

                        </article>
                    @endforeach

                </section>
            @endforeach
        @else
            <div class="empty-products">

                <i class="bi bi-emoji-frown"></i>

                <h3>Produk belum ditemukan</h3>

                <p>
                    Produk PizzaMozza belum tersedia saat ini.
                </p>

            </div>

        @endif

        <!-- CTA BANNER SETELAH SEMUA MENU -->

        <section class="cta-register-banner" aria-label="Ajakan Daftar Akun">
            <div class="cta-register-text">
                <h2>Sudah Nemu Menu Favoritmu? Daftar Sekarang Biar Bisa Checkout!</h2>
                <p>
                    Pendaftaran gratis dan cepat. Simpan alamat pengantaran di Pelaihari & Tanah Laut
                    serta nikmati kemudahan pemesanan langsung dari website.
                </p>
            </div>

            <a href="{{ route('register') }}" class="cta-register-button">
                Daftar Akun Gratis →
            </a>
        </section>

    </main>

    <!-- PROMO SECTION -->

    <section class="promo-section">

        <div class="promo-item">

            <div class="promo-text">
                <h2>Adonan Homemade yang Lezat</h2>

                <p>
                    Nikmati pizza dengan adonan homemade yang lembut
                    dan diproses langsung di tempat kami untuk
                    menghasilkan cita rasa yang istimewa.
                </p>
            </div>

            <img src="{{ $resolveAsset('adonan-pizza.jpg') ?? asset('images/adonan-pizza.jpg') }}" class="promo-image"
                alt="Proses pembuatan adonan pizza">

        </div>

        <div class="promo-item reverse">

            <div class="promo-text">
                <h2>Bahan Berkualitas dan Segar</h2>

                <p>
                    PizzaMozza menggunakan bahan-bahan pilihan yang
                    segar dan berkualitas, mulai dari saus, keju,
                    hingga topping untuk menghadirkan kelezatan
                    di setiap gigitan.
                </p>
            </div>

            <img src="{{ $resolveAsset('bahan-segar.jpg') ?? asset('images/bahan-segar.jpg') }}" class="promo-image"
                alt="Bahan-bahan segar untuk pizza">

        </div>

    </section>

    <!-- FOOTER -->

    <footer class="footer">

        <div class="footer-content">

            <div>
                <h3>PizzaMozza</h3>

                <p>
                    Fresh, Tasty, Happiness!<br>
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
                    <a href="https://wa.me/6283143290888" target="_blank" rel="noopener">
                        083143290888
                    </a>
                </p>

                <p>
                    <strong>Email:</strong><br>
                    <a href="mailto:pizzamozza@gmail.com">
                        pizzamozza@gmail.com
                    </a>
                </p>
            </div>

        </div>

        <div class="footer-bottom">
            <span>© 2026 PizzaMozza. All Rights Reserved.</span>
            <span>Fresh, Tasty, Happiness!</span>
        </div>

    </footer>

    <!-- LOGOUT FORM -->

    @auth
        <form action="{{ route('logout') }}" method="POST" id="customerLogoutForm">
            @csrf
        </form>
    @endauth

    <!-- LOGOUT MODAL -->

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

    <!-- JAVASCRIPT -->

    <script>
        function openCustomerLogoutModal() {
            document.getElementById('customerLogoutModal').classList.add('show');
        }

        function closeCustomerLogoutModal() {
            document.getElementById('customerLogoutModal').classList.remove('show');
        }

        function confirmCustomerLogout() {
            const form = document.getElementById('customerLogoutForm');

            if (form) {
                form.submit();
            }
        }

        const logoutModal = document.getElementById('customerLogoutModal');

        if (logoutModal) {
            logoutModal.addEventListener('click', function(event) {
                if (event.target === this) {
                    closeCustomerLogoutModal();
                }
            });
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeCustomerLogoutModal();
            }
        });
    </script>

</body>

</html>