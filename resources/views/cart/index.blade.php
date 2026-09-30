<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Keranjang - PizzaMozza</title>


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


        /* HEADER */

        .header {
            height: 75px;

            background: white;

            border-bottom: 1px solid #eee;

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 0 70px;
        }


        .logo {
            color: #c62828;

            font-size: 24px;

            font-weight: bold;

            text-decoration: none;
        }


        .nav {
            display: flex;

            gap: 25px;
        }


        .nav a {
            text-decoration: none;

            color: #333;

            font-size: 14px;
        }


        .nav a:hover {
            color: #c62828;
        }


        /* CONTAINER */

        .container {
            max-width: 1100px;

            margin: auto;

            padding: 45px 25px 80px;
        }


        h1 {
            font-size: 32px;

            margin-bottom: 10px;
        }


        .subtitle {
            color: #777;

            margin-bottom: 30px;
        }


        /* ALERT */

        .alert {
            background: #eaf8ee;

            color: #26733b;

            padding: 14px 18px;

            border-radius: 10px;

            margin-bottom: 20px;
        }


        /* EMPTY */

        .empty {
            background: white;

            border-radius: 18px;

            padding: 70px 30px;

            text-align: center;

            box-shadow:
                0 8px 25px rgba(0,0,0,.05);
        }


        .empty-icon {
            font-size: 70px;

            margin-bottom: 20px;
        }


        .empty h2 {
            margin-bottom: 10px;
        }


        .empty p {
            color: #777;

            margin-bottom: 25px;
        }


        /* CART */

        .cart-wrapper {
            display: grid;

            grid-template-columns: 1fr 330px;

            gap: 25px;
        }


        .cart-items {
            display: flex;

            flex-direction: column;

            gap: 15px;
        }


        .cart-item {
            background: white;

            border-radius: 16px;

            padding: 20px;

            display: flex;

            gap: 20px;

            box-shadow:
                0 8px 25px rgba(0,0,0,.05);
        }


        .item-image {
            width: 120px;

            height: 120px;

            border-radius: 12px;

            object-fit: cover;

            background: #f3c0b4;
        }


        .item-info {
            flex: 1;
        }


        .item-name {
            font-size: 19px;

            font-weight: bold;

            margin-bottom: 7px;
        }


        .item-variant {
            color: #c62828;

            font-size: 14px;

            font-weight: bold;

            margin-bottom: 8px;
        }


        .toppings {
            color: #777;

            font-size: 13px;

            margin-bottom: 12px;

            line-height: 1.6;
        }


        .item-price {
            font-size: 15px;

            font-weight: bold;

            color: #c62828;
        }


        /* ACTION */

        .item-action {
            display: flex;

            flex-direction: column;

            justify-content: space-between;

            align-items: flex-end;
        }


        .quantity-form {
            display: flex;

            align-items: center;

            gap: 8px;
        }


        .quantity-input {
            width: 55px;

            padding: 8px;

            border: 1px solid #ddd;

            border-radius: 7px;

            text-align: center;
        }


        .update-button {
            border: none;

            background: #fff0f0;

            color: #c62828;

            padding: 8px 12px;

            border-radius: 7px;

            cursor: pointer;
        }


        .remove-button {
            border: none;

            background: none;

            color: #c62828;

            cursor: pointer;

            font-size: 13px;
        }


        /* SUMMARY */

        .summary {
            background: white;

            border-radius: 16px;

            padding: 25px;

            height: fit-content;

            box-shadow:
                0 8px 25px rgba(0,0,0,.05);

            position: sticky;

            top: 100px;
        }


        .summary h2 {
            font-size: 20px;

            margin-bottom: 25px;
        }


        .summary-row {
            display: flex;

            justify-content: space-between;

            color: #666;

            font-size: 14px;

            margin-bottom: 15px;
        }


        .summary-total {
            border-top: 1px solid #eee;

            padding-top: 18px;

            margin-top: 10px;

            display: flex;

            justify-content: space-between;

            font-size: 20px;

            font-weight: bold;
        }


        .summary-total span:last-child {
            color: #c62828;
        }


        .checkout-button {
            display: block;

            width: 100%;

            border: none;

            background: #c62828;

            color: white;

            padding: 14px;

            border-radius: 10px;

            text-align: center;

            text-decoration: none;

            margin-top: 25px;

            font-weight: bold;
        }


        .checkout-button:hover {
            background: #a91f1f;
        }


        .clear-button {
            width: 100%;

            border: 1px solid #ddd;

            background: white;

            color: #777;

            padding: 12px;

            border-radius: 10px;

            cursor: pointer;

            margin-top: 10px;
        }


        /* MOBILE */

        @media (max-width: 800px) {

            .header {
                padding: 0 20px;
            }


            .cart-wrapper {
                grid-template-columns: 1fr;
            }


            .summary {
                position: static;
            }

        }


        @media (max-width: 550px) {

            .cart-item {
                flex-direction: column;
            }


            .item-action {
                align-items: flex-start;

                gap: 15px;
            }


            .item-image {
                width: 100%;

                height: 200px;
            }

        }

    </style>

</head>


<body>


<header class="header">

    <a
        href="{{ route('dashboard') }}"
        class="logo"
    >
        🍕 PizzaMozza
    </a>


    <nav class="nav">

        <a href="{{ route('dashboard') }}">
            🏠 Home
        </a>

        <a href="{{ route('cart.index') }}">
            🛒 Keranjang
        </a>

    </nav>

</header>



<main class="container">


    <h1>
        🛒 Keranjang Saya
    </h1>


    <p class="subtitle">
        Periksa kembali pesanan kamu sebelum checkout.
    </p>


    @if (session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif



    @if (count($cart) === 0)

        <div class="empty">

            <div class="empty-icon">
                🛒
            </div>

            <h2>
                Keranjang masih kosong
            </h2>

            <p>
                Yuk pilih pizza atau snack favoritmu!
            </p>

            <a
                href="{{ route('dashboard') }}"
                class="checkout-button"
            >
                Lihat Menu
            </a>

        </div>

    @else


        <div class="cart-wrapper">


            {{-- ITEM --}}

            <div class="cart-items">


                @foreach ($cart as $key => $item)

                    <div class="cart-item">


                        {{-- IMAGE --}}

                        @if ($item['image'])

                            <img
                                src="{{ asset('image/' . $item['image']) }}"
                                alt="{{ $item['product_name'] }}"
                                class="item-image"
                            >

                        @else

                            <div class="item-image"
                                 style="
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-size:50px;
                                 "
                            >
                                🍕
                            </div>

                        @endif



                        {{-- INFO --}}

                        <div class="item-info">


                            <div class="item-name">

                                {{ $item['product_name'] }}

                            </div>


                            <div class="item-variant">

                                {{ $item['variant_name'] }}

                            </div>


                            @if (count($item['toppings']) > 0)

                                <div class="toppings">

                                    <strong>
                                        Topping:
                                    </strong>

                                    @foreach ($item['toppings'] as $topping)

                                        <div>
                                            • {{ $topping['name'] }}
                                            (+Rp{{ number_format(
                                                $topping['price'],
                                                0,
                                                ',',
                                                '.'
                                            ) }})
                                        </div>

                                    @endforeach

                                </div>

                            @endif


                            <div class="item-price">

                                Rp{{ number_format(
                                    $item['unit_price'],
                                    0,
                                    ',',
                                    '.'
                                ) }}

                                / item

                            </div>


                        </div>



                        {{-- ACTION --}}

                        <div class="item-action">


                            <form
                                action="{{ route(
                                    'cart.update',
                                    $key
                                ) }}"
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
                                    class="quantity-input"
                                >


                                <button
                                    type="submit"
                                    class="update-button"
                                >
                                    Update
                                </button>

                            </form>


                            <strong>

                                Rp{{ number_format(
                                    $item['subtotal'],
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </strong>


                            <form
                                action="{{ route(
                                    'cart.remove',
                                    $key
                                ) }}"
                                method="POST"
                            >

                                @csrf

                                @method('DELETE')


                                <button
                                    type="submit"
                                    class="remove-button"
                                >
                                    🗑 Hapus
                                </button>

                            </form>


                        </div>


                    </div>

                @endforeach


            </div>



            {{-- SUMMARY --}}

            <aside class="summary">


                <h2>
                    Ringkasan Pesanan
                </h2>


                <div class="summary-row">

                    <span>
                        Jumlah item
                    </span>

                    <span>
                        {{ count($cart) }}
                    </span>

                </div>


                <div class="summary-total">

                    <span>
                        Total
                    </span>

                    <span>
                        Rp{{ number_format(
                            $total,
                            0,
                            ',',
                            '.'
                        ) }}
                    </span>

                </div>


                <a
                    href="{{ route('checkout.index') }}"
                    class="checkout-button"
                >
                    ⚡ Checkout
                </a>


                <form
                    action="{{ route('cart.clear') }}"
                    method="POST"
                >

                    @csrf

                    @method('DELETE')


                    <button
                        type="submit"
                        class="clear-button"
                    >
                        Kosongkan Keranjang
                    </button>

                </form>


            </aside>


        </div>

    @endif


</main>

</body>

</html>