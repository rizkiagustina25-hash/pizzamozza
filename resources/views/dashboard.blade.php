<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>PizzaMozza</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, Helvetica, sans-serif;

            background: #faf7f2;

            color: #222;
        }


        /* =================================
           HEADER
        ================================= */

        .header {
            height: 76px;

            background: #ffffff;

            border-bottom: 1px solid #eeeeee;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 70px;

            position: sticky;

            top: 0;

            z-index: 100;
        }


        .logo {
            font-size: 25px;

            font-weight: bold;

            color: #c62828;
        }


        .logo span {
            color: #222;
        }


        .header-right {
            display: flex;

            align-items: center;

            gap: 28px;
        }


        .search {
            width: 230px;

            border: 1px solid #dddddd;

            border-radius: 20px;

            padding: 9px 15px;

            outline: none;

            font-size: 13px;
        }


        .header-link {
            color: #333;

            text-decoration: none;

            font-size: 14px;

            transition: 0.2s;
        }


        .header-link:hover {
            color: #c62828;
        }


        .cart {
            position: relative;

            font-size: 20px;
        }


        /* =================================
           MAIN
        ================================= */

        .container {
            max-width: 1200px;

            margin: auto;

            padding: 40px 50px 80px;
        }


        /* =================================
           HERO
        ================================= */

        .hero {
            background: #cf2929;

            color: white;

            border-radius: 18px;

            padding: 42px 50px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            min-height: 190px;

            margin-bottom: 22px;

            overflow: hidden;
        }


        .hero-content {
            max-width: 600px;
        }


        .hero h1 {
            font-size: 31px;

            margin-bottom: 10px;
        }


        .hero p {
            font-size: 15px;

            color: #ffe9e9;

            margin-bottom: 20px;
        }


        .hero-button {
            display: inline-block;

            background: #ffbd17;

            color: #222;

            padding: 11px 20px;

            border-radius: 7px;

            text-decoration: none;

            font-size: 13px;

            font-weight: bold;
        }


        .hero-pizza {
            font-size: 110px;

            opacity: 0.95;
        }


        /* =================================
           PROMO
        ================================= */

        .promo {
            background: white;

            border: 1px solid #ef6b6b;

            border-radius: 15px;

            padding: 22px 28px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 35px;
        }


        .promo h3 {
            color: #c62828;

            font-size: 16px;

            margin-bottom: 7px;
        }


        .promo p {
            color: #777;

            font-size: 13px;
        }


        .promo-button {
            color: #c62828;

            border: 1px solid #c62828;

            padding: 9px 16px;

            border-radius: 7px;

            text-decoration: none;

            font-size: 12px;

            font-weight: bold;
        }


        /* =================================
           CATEGORY
        ================================= */

        .section-title {
            font-size: 21px;

            margin-bottom: 18px;
        }


        .categories {
            display: flex;

            gap: 45px;

            margin-bottom: 40px;

            border-bottom: 1px solid #eeeeee;
        }


        .category {
            padding-bottom: 12px;

            color: #777;

            text-decoration: none;

            font-size: 14px;

            border-bottom: 2px solid transparent;
        }


        .category:hover,
        .category.active {
            color: #c62828;

            border-color: #c62828;
        }


        /* =================================
           PRODUCTS
        ================================= */

        .product-grid {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 22px;
        }


        .product-card {
            background: white;

            border-radius: 14px;

            overflow: hidden;

            border: 1px solid #eeeeee;

            transition: 0.2s;
        }


        .product-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 10px 25px rgba(0,0,0,0.08);
        }


        .product-image {
            width: 100%;

            height: 190px;

            object-fit: cover;

            background: #f5c0b3;

            display: block;
        }


        .no-image {
            width: 100%;

            height: 190px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #f5c0b3;

            font-size: 65px;
        }


        .product-content {
            padding: 18px;
        }


        .product-name {
            font-size: 16px;

            font-weight: bold;

            margin-bottom: 8px;
        }


        .product-description {
            font-size: 12px;

            color: #777;

            line-height: 1.5;

            height: 36px;

            overflow: hidden;

            margin-bottom: 13px;
        }


        .product-bottom {
            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .price {
            font-size: 16px;

            color: #c62828;

            font-weight: bold;
        }


        .stock {
            display: inline-block;

            background: #e9f5df;

            color: #56802f;

            font-size: 10px;

            padding: 5px 8px;

            border-radius: 5px;
        }


        .detail-button {
            display: block;

            background: #c62828;

            color: white;

            text-align: center;

            text-decoration: none;

            padding: 10px;

            border-radius: 7px;

            margin-top: 14px;

            font-size: 12px;
        }


        .detail-button:hover {
            background: #a91f1f;
        }


        /* =================================
           FOOTER
        ================================= */

        .footer {
            margin-top: 70px;

            border-top: 1px solid #eeeeee;

            padding-top: 25px;

            text-align: center;

            color: #999;

            font-size: 12px;
        }


        /* =================================
           RESPONSIVE
        ================================= */

        @media (max-width: 1000px) {

            .product-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .header {
                padding: 0 30px;
            }

            .container {
                padding: 30px;
            }

        }


        @media (max-width: 650px) {

            .header {
                padding: 0 20px;
            }

            .search {
                display: none;
            }

            .container {
                padding: 20px;
            }

            .hero {
                padding: 30px;
            }

            .hero-pizza {
                display: none;
            }

            .promo {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<!-- =====================================
     HEADER
====================================== -->

<header class="header">


    <div class="logo">

        🍕 <span>PizzaMozza</span>

    </div>


    <div class="header-right">


        <input
            type="text"
            class="search"
            placeholder="Cari pizza..."
        >


        <a
            href="{{ route('cart.index') }}" class="header-link">
            🛒 Keranjang
        </a>


        <a
            href="#"
            class="header-link"
        >
            Login
        </a>


    </div>


</header>



<!-- =====================================
     MAIN
====================================== -->

<main class="container">


    <!-- HERO -->

    <section class="hero">


        <div class="hero-content">

            <h1>
                Pizza favorit, siap temani harimu!
            </h1>


            <p>
                Nikmati pizza dan camilan favorit
                dengan mudah.
            </p>


            <a
                href="#produk"
                class="hero-button"
            >
                Pesan sekarang
            </a>

        </div>


        <div class="hero-pizza">
            🍕
        </div>


    </section>



    <!-- PROMO -->

    <section class="promo">


        <div>

            <h3>
                PO Nastar Lebaran
            </h3>


            <p>
                Pesan lebih awal, nikmati saat hari raya.
            </p>

        </div>


        <a
            href="#"
            class="promo-button"
        >
            Pre-order sekarang
        </a>


    </section>



    <!-- CATEGORY -->

    <h2 class="section-title">
        Menu pilihan
    </h2>


    <div class="categories">

    <a
        href="{{ route('dashboard') }}?category=pizza"
        class="category {{ request('category', 'pizza') == 'pizza' ? 'active' : '' }}"
    >
        Pizza
    </a>

    <a
        href="{{ route('dashboard') }}?category=snack"
        class="category {{ request('category') == 'snack' ? 'active' : '' }}"
    >
        Snack
    </a>

    <a
        href="{{ route('dashboard') }}"
        class="category"
    >
        Pre-order
    </a>

</div>



    <!-- PRODUCTS -->

    <h2
        class="section-title"
        id="produk"
    >
        Best seller
    </h2>


    <div class="product-grid">


        @forelse ($products as $product)


            <div class="product-card">


                @if ($product->image)

                    <img
                        src="{{ asset('image/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="product-image"
                    >

                @else

                    <div class="no-image">
                        🍕
                    </div>

                @endif


                <div class="product-content">


                    <div class="product-name">

                        {{ $product->name }}

                    </div>


                    <div class="product-description">

                        {{ $product->description }}

                    </div>


                    <div class="product-bottom">


                        <div class="price">

                            Rp
                            {{ number_format(
                                $product->price,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>


                        @if ($product->stock > 0)

                            <span class="stock">
                                Ready stock
                            </span>

                        @else

                            <span
                                class="stock"
                                style="
                                    background:#ffe7d8;
                                    color:#a95b2b;
                                "
                            >
                                Pre-order
                            </span>

                        @endif


                    </div>


                    <a
                        href="{{ route(
                            'product.detail',
                            $product->id
                        ) }}"
                        class="detail-button"
                    >
                        Lihat produk
                    </a>


                </div>


            </div>


        @empty


            <p>
                Belum ada produk.
            </p>


        @endforelse


    </div>



    <!-- FOOTER -->

    <footer class="footer">

        © {{ date('Y') }} PizzaMozza.
        Semua hak dilindungi.

    </footer>


</main>


</body>

</html>