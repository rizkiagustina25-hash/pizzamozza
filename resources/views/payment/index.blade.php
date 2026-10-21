<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Pembayaran - PizzaMozza</title>

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
            font-size: 25px;
            font-weight: bold;
            text-decoration: none;
        }

        .header-right {
            color: #555;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 45px 25px 80px;
        }

        .page-title {
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .payment-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 25px;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 8px 25px rgba(0,0,0,.06);
            margin-bottom: 20px;
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 22px;
        }

        .payment-option {
            display: block;
            position: relative;
            margin-bottom: 15px;
        }

        .payment-option input {
            position: absolute;
            opacity: 0;
        }

        .payment-box {
            border: 2px solid #e5e5e5;
            border-radius: 12px;
            padding: 18px;

            display: flex;
            align-items: center;
            gap: 15px;

            cursor: pointer;

            transition: .2s;
        }

        .payment-box:hover {
            border-color: #d62828;
        }

        .payment-option input:checked + .payment-box {
            border-color: #d62828;
            background: #fff5f5;
        }

        .payment-icon {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f7f7f7;
            border-radius: 10px;

            font-size: 24px;
        }

        .payment-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .payment-description {
            color: #777;
            font-size: 13px;
        }

        .check {
            margin-left: auto;
            color: #c62828;
            font-size: 20px;
            display: none;
        }

        .payment-option input:checked
        + .payment-box
        .check {
            display: block;
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
            margin-top: 5px;
            color: #777;
            font-size: 14px;
        }

        .item-price {
            margin-top: 8px;
            color: #c62828;
            font-weight: bold;
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

        .pay-button {
            width: 100%;

            border: none;
            border-radius: 10px;

            background: #c62828;
            color: white;

            padding: 16px;

            margin-top: 25px;

            font-size: 16px;
            font-weight: bold;

            cursor: pointer;
        }

        .pay-button:hover {
            background: #a91f1f;
        }

        .security {
            margin-top: 15px;
            padding: 13px;

            background: #f5f5f5;

            border-radius: 9px;

            color: #777;
            font-size: 13px;

            text-align: center;
        }

        .customer {
            line-height: 1.7;
            color: #555;
        }

        .customer strong {
            color: #222;
        }

        @media (max-width: 800px) {

            .header {
                padding: 0 20px;
            }

            .payment-grid {
                grid-template-columns: 1fr;
            }

        }

        .header-actions {
    display: flex;
    align-items: center;
    gap: 25px;
}

.header-title {
    color: #555;
}

.back-checkout {
    display: inline-block;

    padding: 9px 16px;

    border: 1px solid #c62828;
    border-radius: 8px;

    color: #c62828;
    background: white;

    text-decoration: none;

    font-size: 14px;
    font-weight: bold;

    transition: .2s;
}

.back-checkout:hover {
    background: #c62828;
    color: white;
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

    <div class="header-actions">

        <a
            href="{{ route('checkout.index') }}"
            class="back-checkout"
        >
            ← Kembali ke Checkout
        </a>

        <span class="header-title">
            💳 Pembayaran
        </span>

    </div>

</header>



<main class="container">

    <h1 class="page-title">
        Pembayaran
    </h1>

    <p class="subtitle">
        Pilih metode pembayaran yang ingin kamu gunakan.
    </p>



    <div class="payment-grid">


        {{-- KOLOM KIRI --}}

        <div>


            {{-- INFORMASI PELANGGAN --}}

            <div class="card">

                <h2>
                    📍 Informasi Pelanggan
                </h2>

                <div class="customer">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <br>

                    {{ auth()->user()->email }}

                    <br>

                    {{ auth()->user()->address }}

                </div>

            </div>



            {{-- METODE PEMBAYARAN --}}

            <div class="card">

                <h2>
                    💳 Metode Pembayaran
                </h2>


                <form
                    action="{{ route('payment.process') }}"
                    method="POST"
                >

                    @csrf


                    {{-- QRIS --}}

                    <label class="payment-option">

                        <input
                            type="radio"
                            name="payment_method"
                            value="qris"
                            {{ $payment_method === 'qris' ? 'checked' : '' }}
                        >

                        <div class="payment-box">

                            <div class="payment-icon">
                                📱
                            </div>

                            <div>

                                <div class="payment-name">
                                    QRIS
                                </div>

                                <div class="payment-description">
                                    Bayar menggunakan QRIS
                                </div>

                            </div>

                            <div class="check">
                                ✓
                            </div>

                        </div>

                    </label>



                    {{-- BANK TRANSFER --}}

                    <label class="payment-option">

                        <input
                            type="radio"
                            name="payment_method"
                            value="bank_transfer"
                            {{ $payment_method === 'bank_transfer' ? 'checked' : '' }}
                        >

                        <div class="payment-box">

                            <div class="payment-icon">
                                🏦
                            </div>

                            <div>

                                <div class="payment-name">
                                    Transfer Bank
                                </div>

                                <div class="payment-description">
                                    BCA, BRI, BNI, Mandiri
                                </div>

                            </div>

                            <div class="check">
                                ✓
                            </div>

                        </div>

                    </label>



                    {{-- E-WALLET --}}

                    <label class="payment-option">

                        <input
                            type="radio"
                            name="payment_method"
                            value="ewallet"
                            {{ $payment_method === 'ewallet' ? 'checked' : '' }}
                        >

                        <div class="payment-box">

                            <div class="payment-icon">
                                📲
                            </div>

                            <div>

                                <div class="payment-name">
                                    E-Wallet
                                </div>

                                <div class="payment-description">
                                    GoPay, OVO, DANA, ShopeePay
                                </div>

                            </div>

                            <div class="check">
                                ✓
                            </div>

                        </div>

                    </label>



                    {{-- COD --}}

                    <label class="payment-option">

                        <input
                            type="radio"
                            name="payment_method"
                            value="cod"
                            {{ $payment_method === 'cod' ? 'checked' : '' }}
                        >

                        <div class="payment-box">

                            <div class="payment-icon">
                                🏠
                            </div>

                            <div>

                                <div class="payment-name">
                                    Cash on Delivery
                                </div>

                                <div class="payment-description">
                                    Bayar saat pesanan diterima
                                </div>

                            </div>

                            <div class="check">
                                ✓
                            </div>

                        </div>

                    </label>



                    <button
                        type="submit"
                        class="pay-button"
                    >
                        🔒 Bayar Sekarang
                    </button>


                    <div class="security">

                        🔐 Transaksi kamu aman dan terlindungi.

                    </div>

                </form>

            </div>

        </div>



        {{-- KOLOM KANAN --}}

        <div>

            <div class="card">

    <h2>
        🛒 Ringkasan Pesanan
    </h2>

    @foreach ($order->items as $item)

        <div class="item">

            <div class="item-name">
                {{ $item->product->name }}
            </div>

            <div class="item-detail">

                @if ($item->variant)
                    {{ $item->variant->name }}
                @endif

                ×

                {{ $item->quantity }}

            </div>

            <div class="item-price">

                Rp{{ number_format(
                    $item->subtotal,
                    0,
                    ',',
                    '.'
                ) }}

            </div>

        </div>

    @endforeach


    <div style="margin-top: 20px;">

        <div class="summary-row">

            <span>
                Subtotal
            </span>

            <span>
                Rp{{ number_format(
                    $order->total_price,
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
                Rp0
            </span>

        </div>


        <div class="total">

            <span>
                Total
            </span>

            <span>
                Rp{{ number_format(
                    $order->total_price,
                    0,
                    ',',
                    '.'
                ) }}
            </span>

        </div>

    </div>

</div>

        </div>


    </div>

</main>


</body>

</html>