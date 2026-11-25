
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran - PizzaMozza</title>

    <style>

* {
    box-sizing: border-box;
}

:root {
    --maroon: #941919;
    --maroon-dark: #750f16;
    --red: #c62828;
    --cream: #fff8ef;
    --text: #292329;
    --muted: #77717a;
    --border: #eee3df;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: var(--cream);
    color: var(--text);
}

/* HEADER */
.header {
    min-height: 76px;
    background: linear-gradient(110deg, var(--maroon-dark), var(--maroon));
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 6%;
    box-shadow: 0 4px 15px rgba(90, 10, 10, .15);
}

.logo {
    color: white;
    font-size: 27px;
    font-weight: 800;
    text-decoration: none;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 22px;
}

.header-title {
    color: white;
    font-weight: bold;
}

.back-checkout {
    display: inline-block;
    padding: 10px 17px;
    border: 1px solid rgba(255,255,255,.7);
    border-radius: 9px;
    color: white;
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
    transition: .2s;
}

.back-checkout:hover {
    background: white;
    color: var(--maroon);
}

/* MAIN CONTENT */
.container {
    max-width: 1200px;
    margin: auto;
    padding: 40px 25px 75px;
}

.page-title {
    margin: 0;
    padding: 25px 28px 8px;
    border-radius: 16px 16px 0 0;
    background: var(--maroon);
    color: white;
    font-size: 29px;
}

.subtitle {
    margin: 0 0 28px;
    padding: 0 28px 24px;
    border-radius: 0 0 16px 16px;
    background: var(--maroon);
    color: #ffe9df;
    font-size: 15px;
    line-height: 1.6;
}

/* GRID */
.payment-grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 380px;
    gap: 25px;
    align-items: start;
}

/* CARD */
.card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 17px;
    padding: 27px;
    box-shadow: 0 6px 22px rgba(80, 30, 20, .07);
    margin-bottom: 22px;
}

.card h2 {
    margin: -27px -27px 24px;
    padding: 19px 25px;
    background: #fff0ec;
    color: var(--maroon);
    border-radius: 16px 16px 0 0;
    font-size: 20px;
}

/* CUSTOMER */
.customer {
    line-height: 1.9;
    color: var(--muted);
    overflow-wrap: anywhere;
}

.customer strong {
    color: var(--text);
    font-size: 17px;
}

/* PAYMENT METHOD */
.payment-box {
    border: 2px solid var(--red);
    border-radius: 13px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    background: #fff7f5;
}

.payment-icon {
    width: 52px;
    height: 52px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffe5e3;
    border-radius: 12px;
    font-size: 26px;
}

.payment-name {
    font-weight: bold;
    font-size: 18px;
    color: var(--maroon);
    margin-bottom: 6px;
}

.payment-description {
    color: var(--muted);
    font-size: 13px;
    line-height: 1.6;
}

.check {
    margin-left: auto;
    color: var(--red);
    font-size: 23px;
    font-weight: bold;
}

/* BUTTON */
.pay-button {
    width: 100%;
    border: none;
    border-radius: 11px;
    background: linear-gradient(110deg, var(--maroon), #c62828);
    color: white;
    padding: 17px;
    margin-top: 25px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 5px 13px rgba(148, 25, 25, .2);
    transition: .2s;
}

.pay-button:hover:not(:disabled) {
    background: var(--maroon-dark);
    transform: translateY(-2px);
}

.pay-button:disabled {
    background: #999;
    cursor: not-allowed;
    box-shadow: none;
}

.security {
    margin-top: 15px;
    padding: 13px;
    background: #f7f5f2;
    border-radius: 9px;
    color: var(--muted);
    font-size: 13px;
    text-align: center;
}

/* INFORMATION */
.qris-info {
    margin-top: 18px;
    padding: 17px;
    border-radius: 11px;
    background: #fff6e9;
    border: 1px solid #f3dfc2;
    color: #6f5940;
    font-size: 13px;
    line-height: 1.8;
}

/* ORDER SUMMARY */
.item {
    padding: 16px 0;
    border-bottom: 1px solid var(--border);
}

.item:last-child {
    border-bottom: none;
}

.item-name {
    font-weight: bold;
    color: var(--text);
    font-size: 15px;
}

.item-detail {
    margin-top: 6px;
    color: var(--muted);
    font-size: 14px;
}

.item-price {
    margin-top: 9px;
    color: var(--red);
    font-weight: bold;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 15px;
    color: var(--muted);
}

.summary-row span:last-child {
    text-align: right;
}

.total {
    border-top: 1px solid var(--border);
    margin: 20px -10px 0;
    padding: 19px 10px;
    display: flex;
    justify-content: space-between;
    gap: 15px;
    background: #fff0ed;
    border-radius: 10px;
    font-size: 19px;
    font-weight: bold;
}

.total span:last-child {
    color: var(--red);
}

/* ALERT */
.alert {
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: 14px;
}

.alert-error {
    background: #fff0f0;
    color: #a91f1f;
    border: 1px solid #f3caca;
}

.alert-success {
    background: #eefaf0;
    color: #24753a;
    border: 1px solid #ccebd2;
}

/* RESPONSIVE */
@media (max-width: 800px) {
    .header {
        padding: 15px 20px;
        gap: 15px;
        flex-wrap: wrap;
    }

    .header-actions {
        gap: 12px;
        flex-wrap: wrap;
    }

    .payment-grid {
        grid-template-columns: 1fr;
    }

    .container {
        padding: 25px 15px 45px;
    }

    .card {
        padding: 20px;
    }

    .card h2 {
        margin: -20px -20px 20px;
        padding: 17px 20px;
    }

    .page-title {
        font-size: 24px;
    }
}

@media (max-width: 450px) {
    .logo {
        font-size: 23px;
    }

    .header-actions {
        width: 100%;
        justify-content: space-between;
    }

    .payment-box {
        padding: 14px;
    }

    .total {
        font-size: 16px;
    }
}


.guide-heading {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 22px;
}

.guide-icon {
    width: 43px;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffe5df;
    border-radius: 12px;
    font-size: 22px;
    flex-shrink: 0;
}

.guide-heading strong {
    color: #941919;
    font-size: 16px;
}

.guide-heading p,
.guide-step p {
    margin: 5px 0 0;
    color: #77717a;
    font-size: 13px;
    line-height: 1.6;
}

.guide-step {
    display: flex;
    gap: 13px;
    margin-bottom: 19px;
    align-items: flex-start;
}

.step-number {
    width: 29px;
    height: 29px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #941919;
    color: white;
    border-radius: 50%;
    font-size: 13px;
    font-weight: bold;
}

.guide-step strong {
    font-size: 14px;
    color: #292329;
}

.guide-note {
    margin-top: 8px;
    padding: 12px;
    border-radius: 9px;
    background: #f1f8f1;
    color: #367341;
    font-size: 12px;
    text-align: center;
}

/* Ringkasan Pesanan */
.summary-card {
    overflow: hidden;
}

.summary-card h2 {
    color: var(--maroon);
    font-size: 19px;
    font-weight: 800;
    margin-bottom: 22px;
}

.item {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 14px;
    padding: 15px 0;
    border-bottom: 1px solid var(--border);
}

.item-name {
    color: var(--text);
    font-size: 14px;
    font-weight: 700;
}

.item-detail {
    display: block;
    color: var(--muted);
    font-size: 12px;
    margin-top: 5px;
}

.item-price {
    color: var(--text);
    font-size: 14px;
    font-weight: 700;
    white-space: nowrap;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    padding: 10px 0;
    color: var(--muted);
    font-size: 14px;
}

.summary-row strong {
    color: var(--text);
    font-weight: 700;
}

.total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    margin-top: 12px;
    padding: 18px;
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 12px;
}

.total span {
    color: var(--text);
    font-size: 14px;
    font-weight: 700;
}

.total strong {
    color: var(--maroon);
    font-size: 21px;
    font-weight: 800;
}

/* Informasi Pelanggan */
.customer-card {
    border: 1px solid var(--border);
}

.customer-card h2 {
    color: var(--maroon);
    font-size: 19px;
    font-weight: 800;
    margin-bottom: 18px;
}

.customer-card p {
    color: var(--muted);
    font-size: 14px;
    line-height: 1.7;
    margin: 8px 0;
}

.customer-card strong {
    color: var(--text);
}

/* Metode Pembayaran QRIS */
.payment-card h2 {
    color: var(--maroon);
    font-size: 19px;
    font-weight: 800;
    margin-bottom: 18px;
}

.payment-box {
    border: 1px solid #ead4d4;
    background: #fffafa;
    border-radius: 14px;
    padding: 20px;
    transition: 0.2s ease;
}

.payment-box:hover {
    border-color: var(--maroon);
    box-shadow: 0 5px 16px rgba(148, 25, 25, 0.08);
}

.payment-box strong {
    color: var(--maroon);
}

.payment-box p {
    color: var(--muted);
    font-size: 13px;
    line-height: 1.6;
}

.security {
    color: #477b50;
    background: #f0f8f0;
    border-radius: 10px;
    padding: 12px 14px;
    font-size: 13px;
    margin-top: 16px;
}

/* Tombol Pembayaran */
#payButton {
    width: 100%;
    border: none;
    border-radius: 12px;
    padding: 16px 20px;
    background: linear-gradient(135deg, #941919, #c62828);
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 5px 14px rgba(148, 25, 25, 0.18);
}

#payButton:hover:not(:disabled) {
    background: linear-gradient(135deg, #750f16, #a91f1f);
    transform: translateY(-2px);
    box-shadow: 0 7px 18px rgba(148, 25, 25, 0.25);
}

#payButton:disabled {
    background: #aaa;
    cursor: not-allowed;
    box-shadow: none;
    transform: none;
}
@media (max-width: 800px) {
    .payment-grid {
        grid-template-columns: 1fr;
    }

    .payment-grid > div:last-child {
        position: static;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 16px;
    }

    .item {
        gap: 8px;
    }

    .total {
        padding: 15px;
    }

    .total strong {
        font-size: 18px;
    }

    #payButton {
        padding: 14px;
    }
}
    </style>
</head>

<body>

<header class="header">

    <a href="{{ route('dashboard') }}" class="logo">
        🍕 PizzaMozza
    </a>

    <div class="header-actions">

        <a href="{{ route('checkout.index') }}" class="back-checkout">
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
        Lakukan pembayaran pesanan menggunakan QRIS melalui Midtrans.
    </p>

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="payment-grid">

        {{-- KOLOM KIRI --}}
        <div>

            {{-- INFORMASI PELANGGAN --}}
            <div class="card">

                <h2>
                    Informasi Pelanggan
                </h2>

                <div class="customer">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <br>

                    {{ auth()->user()->email }}

                    <br>

                    {{ $order->address }}

                </div>

            </div>

            {{-- METODE PEMBAYARAN --}}
            <div class="card">

                <h2>
                    Metode Pembayaran
                </h2>

                <form
                    action="{{ route('payment.process') }}"
                    method="POST"
                    id="paymentForm"
                >

                    @csrf

                    <div class="payment-box">

                        <div class="payment-icon">
                            📱
                        </div>

                        <div>

                            <div class="payment-name">
                                QRIS
                            </div>

                            <div class="payment-description">
                                Bayar menggunakan aplikasi e-wallet
                                atau mobile banking.
                            </div>

                        </div>

                        <div class="check">
                            ✓
                        </div>

                    </div>

                    <input
                        type="hidden"
                        name="payment_method"
                        value="qris"
                    >

                    <button
                        type="submit"
                        class="pay-button"
                        id="payButton"
                        @if ($order->payment_status === 'paid') disabled @endif
                    >
                        @if ($order->payment_status === 'paid')
                            ✓ Pesanan Sudah Dibayar
                        @else
                            Lanjutkan Pembayaran
                        @endif
                    </button>

                    <div class="security">
                        Selesaikan pembayaran menggunakan QRIS.
                    </div>

                </form>


<div class="qris-info">

    <div class="guide-heading">
        <span class="guide-icon">💡</span>
        <div>
            <strong>Cara Melakukan Pembayaran</strong>
            <p>Ikuti langkah mudah berikut untuk menyelesaikan pesanan.</p>
        </div>
    </div>

    <div class="guide-step">
        <span class="step-number">1</span>
        <div>
            <strong>Klik Lanjutkan Pembayaran</strong>
            <p>Tekan tombol pembayaran untuk membuka halaman Midtrans.</p>
        </div>
    </div>

    <div class="guide-step">
        <span class="step-number">2</span>
        <div>
            <strong>Pilih metode QRIS</strong>
            <p>Pilih QRIS pada halaman pembayaran Midtrans.</p>
        </div>
    </div>

    <div class="guide-step">
        <span class="step-number">3</span>
        <div>
            <strong>Scan menggunakan mobile banking</strong>
            <p>Buka BRImo atau aplikasi pembayaran lain yang mendukung QRIS, lalu pindai kode yang muncul.</p>
        </div>
    </div>

    <div class="guide-step">
        <span class="step-number">4</span>
        <div>
            <strong>Selesaikan pembayaran</strong>
            <p>Periksa nominal dan konfirmasi pembayaran pada aplikasi.</p>
        </div>
    </div>

    <div class="guide-note">
        🔒 Pembayaran diproses melalui sistem Midtrans.
    </div>

</div>


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
                            {{ $item->product->name ?? 'Produk' }}
                        </div>

                        <div class="item-detail">

                            @if ($item->variant)
                                {{ $item->variant->name }}
                            @endif

                            × {{ $item->quantity }}

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

                @php
                    $shippingCost = (float) ($order->shipping_cost ?? 0);
                    $subtotal = (float) $order->total_price - $shippingCost;
                @endphp

                <div style="margin-top: 20px;">

                    <div class="summary-row">

                        <span>
                            Subtotal
                        </span>

                        <span>
                            Rp{{ number_format(
                                $subtotal,
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
                            Rp{{ number_format(
                                $shippingCost,
                                0,
                                ',',
                                '.'
                            ) }}
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

{{-- MIDTRANS SNAP --}}
<script
    src="{{ $snapJsUrl }}"
    data-client-key="{{ $clientKey }}">
</script>

@if (!empty($snapToken))

    <script>
        window.addEventListener('load', function () {

            window.snap.pay(@json($snapToken), {

                onSuccess: function (result) {

                    window.location.href =
                        "{{ route('payment.success') }}";

                },

                onPending: function (result) {

                    alert(
                        'Pembayaran sedang menunggu konfirmasi. ' +
                        'Silakan selesaikan pembayaran QRIS.'
                    );

                },

                onError: function (result) {

                    alert(
                        'Pembayaran gagal. Silakan coba kembali.'
                    );

                },

                onClose: function () {

                    console.log(
                        'Pelanggan menutup popup pembayaran Midtrans.'
                    );

                }

            });

        });
    </script>

@endif

<script>
    document.getElementById('paymentForm')
        .addEventListener('submit', function () {

            const button = document.getElementById('payButton');

            button.disabled = true;
            button.textContent = 'Menghubungkan ke Midtrans...';

        });
</script>

</body>
</html>
