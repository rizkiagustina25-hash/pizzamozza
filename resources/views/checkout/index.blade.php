<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

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

        .header {
            height: 75px;
            background: white;
            border-bottom: 1px solid #eee;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 70px;
        }

        .logo {
            color: #c62828;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 45px 25px 80px;
        }

        h1 {
            margin-bottom: 10px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 25px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,.05);
            margin-bottom: 20px;
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .user-info {
            line-height: 1.8;
        }

        .user-name {
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

        .item:last-child {
            border-bottom: none;
        }

        .item-name {
            font-weight: bold;
        }

        .item-detail {
            color: #777;
            font-size: 14px;
            margin-top: 5px;
        }

        .item-total {
            color: #c62828;
            font-weight: bold;
            margin-top: 8px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            color: #666;
        }

        .total {
            border-top: 1px solid #eee;
            padding-top: 18px;

            display: flex;
            justify-content: space-between;

            font-size: 21px;
            font-weight: bold;
        }

        .total span:last-child {
            color: #c62828;
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
            cursor: pointer;
        }

        .note {
            margin-top: 15px;
            padding: 12px;
            background: #fff5e6;
            border-radius: 8px;
            color: #777;
            font-size: 13px;
        }

        @media (max-width: 800px) {

            .header {
                padding: 0 20px;
            }

            .checkout-grid {
                grid-template-columns: 1fr;
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

</header>



<main class="container">

    <h1>
        Checkout
    </h1>

    <p class="subtitle">
        Periksa informasi pengiriman dan pesanan kamu.
    </p>



    <div class="checkout-grid">


        <div>


            {{-- INFORMASI PELANGGAN --}}

            <div class="card">

                <h2>
                    📍 Informasi Pengiriman
                </h2>

                <div class="user-info">

                    <div class="user-name">
                        {{ auth()->user()->name }}
                    </div>

                    <div>
                        {{ auth()->user()->email }}
                    </div>

                    <div class="address">
                        {{ auth()->user()->address }}
                    </div>

                </div>

            </div>



            {{-- PESANAN --}}

            <div class="card">

                <h2>
                    🛒 Pesanan Kamu
                </h2>


                @foreach ($cart as $item)

                    <div class="item">

                        <div class="item-name">

                            {{ $item['product_name'] }}

                        </div>


                        <div class="item-detail">

                            Ukuran:
                            {{ $item['variant_name'] }}

                            <br>

                            Jumlah:
                            {{ $item['quantity'] }}

                        </div>


                        @if (count($item['toppings']) > 0)

                            <div class="item-detail">

                                Topping:

                                @foreach ($item['toppings'] as $topping)

                                    {{ $topping['name'] }}@if (!$loop->last), @endif

                                @endforeach

                            </div>

                        @endif


                        <div class="item-total">

                            Rp{{ number_format(
                                $item['subtotal'],
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>

                    </div>

                @endforeach

            </div>

        </div>



        {{-- RINGKASAN --}}

        <div>

            <div class="card">

                <h2>
                    Ringkasan Pembayaran
                </h2>


                <div class="summary-row">

                    <span>
                        Total Produk
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


                <div class="summary-row">

                    <span>
                        Ongkos Kirim
                    </span>

                    <span>
                        Akan dihitung
                    </span>

                </div>


                <div class="total">

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


                <button
                    class="payment-button"
                    type="button"
                    onclick="alert('Payment Gateway akan kita pasang pada tahap berikutnya.')"
                >
                    💳 Lanjut ke Pembayaran
                </button>


                <div class="note">

                    💡 Pembayaran online akan tersedia setelah
                    Payment Gateway terhubung.

                </div>

            </div>

        </div>


    </div>

</main>

</body>

</html>