<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Detail Pesanan - PizzaMozza
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f6f7f9;
            color: #222;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .header {
            height: 75px;
            background: white;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            padding: 0 30px;
        }

        .logo {
            font-size: 23px;
            font-weight: 800;
        }

        .logo span {
            color: #ef432f;
        }

        .user {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            font-weight: 600;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .layout {
            display: flex;
            min-height: calc(100vh - 75px);
        }

        .sidebar {
            width: 235px;
            background: white;
            border-right: 1px solid #eee;
            padding: 25px 15px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu a {
            padding: 13px 15px;
            border-radius: 9px;
            font-size: 13px;
        }

        .menu a:hover,
        .menu .active {
            background: #fff0ed;
            color: #ef432f;
            font-weight: 600;
        }

        .content {
            flex: 1;
            padding: 30px;
            min-width: 0;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .back {
            display: inline-block;
            color: #ef432f;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 18px;
        }

        .title {
            font-size: 27px;
            margin-bottom: 7px;
        }

        .subtitle {
            color: #777;
            font-size: 13px;
            margin-bottom: 25px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            background: #e8f8ee;
            color: #237642;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 330px;
            gap: 20px;
        }

        .card {
            background: white;
            border: 1px solid #eee;
            border-radius: 11px;
            padding: 22px;
        }

        .card + .card {
            margin-top: 20px;
        }

        .card-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .info-label {
            color: #888;
            font-size: 11px;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 13px;
            font-weight: 600;
        }

        .item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 75px;
            height: 75px;
            border-radius: 9px;
            object-fit: cover;
            background: #eee;
            flex-shrink: 0;
        }

        .item-placeholder {
            width: 75px;
            height: 75px;
            border-radius: 9px;
            background: #f5e6df;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            flex-shrink: 0;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .item-variant {
            color: #777;
            font-size: 11px;
            margin-bottom: 5px;
        }

        .item-quantity {
            color: #777;
            font-size: 11px;
        }

        .item-price {
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-pending {
            background: #fff2ca;
            color: #b77b00;
        }

        .status-processing {
            background: #e6f2ff;
            color: #2773ad;
        }

        .status-shipped {
            background: #fff0d7;
            color: #c47a00;
        }

        .status-completed {
            background: #e4f7eb;
            color: #27814c;
        }

        .status-cancelled {
            background: #eee;
            color: #666;
        }

        .payment-paid {
            background: #e4f7eb;
            color: #27814c;
        }

        .payment-pending {
            background: #fff2ca;
            color: #b77b00;
        }

        .address {
            background: #f7f7f7;
            border-radius: 8px;
            padding: 14px;
            font-size: 12px;
            line-height: 1.6;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 13px;
        }

        .total {
            border-top: 1px solid #eee;
            padding-top: 16px;
            margin-top: 16px;
            display: flex;
            justify-content: space-between;
            font-size: 17px;
            font-weight: 800;
        }

        .total-price {
            color: #ef432f;
        }

        .status-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .status-select {
            height: 43px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 7px;
            padding: 0 12px;
            font-size: 12px;
            background: white;
        }

        .update-button {
            height: 43px;
            border: none;
            border-radius: 7px;
            background: #ef432f;
            color: white;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700;
        }

        .update-button:hover {
            background: #d93827;
        }

        .payment-method {
            margin-top: 18px;
        }

        @media(max-width: 850px) {

            .grid {
                grid-template-columns: 1fr;
            }

        }

        @media(max-width: 600px) {

            .sidebar {
                width: 70px;
            }

            .menu a {
                font-size: 0;
                text-align: center;
            }

            .content {
                padding: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<header class="header">

    <a
        href="{{ auth()->user()->role === 'admin'
            ? route('admin.dashboard')
            : route('karyawan.dashboard') }}"
        class="logo"
    >

        🍕 Pizza<span>Mozza</span>

    </a>


    <div class="user">

        <div class="avatar">
            👤
        </div>

        {{ auth()->user()->name }}

    </div>

</header>


<div class="layout">


    <aside class="sidebar">

        <nav class="menu">


            @if(auth()->user()->role === 'admin')

                <a href="{{ route('admin.dashboard') }}">
                    🏠 Dashboard
                </a>

                <a href="{{ route('admin.products.index') }}">
                    🍕 Kelola Produk
                </a>

            @else

                <a href="{{ route('karyawan.dashboard') }}">
                    🏠 Dashboard
                </a>

                <a href="{{ route('admin.products.index') }}">
                    🍕 Kelola Produk
                </a>

            @endif


            <a
                href="{{ route('admin.orders.index') }}"
                class="active"
            >
                📦 Kelola Pesanan
            </a>


            @if(auth()->user()->role === 'admin')

                <a href="#">
                    👥 Kelola Karyawan
                </a>

                <a href="#">
                    📊 Laporan & Omzet
                </a>

            @endif


        </nav>

    </aside>


    <main class="content">

        <div class="container">


            <a
                href="{{ route('admin.orders.index') }}"
                class="back"
            >
                ← Kembali ke Kelola Pesanan
            </a>


            <h1 class="title">
                Detail Pesanan
            </h1>


            <p class="subtitle">

                Pesanan
                #PM{{ str_pad(
                    $order->id,
                    6,
                    '0',
                    STR_PAD_LEFT
                ) }}

            </p>


            @if(session('success'))

                <div class="alert">

                    ✅ {{ session('success') }}

                </div>

            @endif


            <div class="grid">


                {{-- KOLOM KIRI --}}

                <div>


                    {{-- INFORMASI PESANAN --}}

                    <div class="card">

                        <div class="card-title">
                            📦 Informasi Pesanan
                        </div>


                        <div class="info-grid">


                            <div>

                                <div class="info-label">
                                    Nomor Pesanan
                                </div>

                                <div class="info-value">

                                    #PM{{ str_pad(
                                        $order->id,
                                        6,
                                        '0',
                                        STR_PAD_LEFT
                                    ) }}

                                </div>

                            </div>


                            <div>

                                <div class="info-label">
                                    Tanggal Pesanan
                                </div>

                                <div class="info-value">

                                    {{ $order->created_at->format(
                                        'd F Y, H:i'
                                    ) }}

                                </div>

                            </div>


                            <div>

                                <div class="info-label">
                                    Nama Pelanggan
                                </div>

                                <div class="info-value">

                                    {{ $order->user->name
                                        ?? 'Pelanggan' }}

                                </div>

                            </div>


                            <div>

                                <div class="info-label">
                                    Email
                                </div>

                                <div class="info-value">

                                    {{ $order->user->email
                                        ?? '-' }}

                                </div>

                            </div>


                        </div>

                    </div>


                    {{-- PRODUK --}}

                    <div class="card">

                        <div class="card-title">
                            🛒 Produk Pesanan
                        </div>


                        @forelse(
                            $order->items
                            as $item
                        )


                            <div class="item">


                                @if(
                                    $item->product &&
                                    $item->product->image
                                )

                                    <img
                                        src="{{ asset(
                                            'image/' .
                                            $item->product->image
                                        ) }}"
                                        alt="{{ $item->product->name }}"
                                        class="item-image"
                                    >

                                @else

                                    <div class="item-placeholder">
                                        🍕
                                    </div>

                                @endif


                                <div class="item-info">


                                    <div class="item-name">

                                        {{ $item->product->name
                                            ?? 'Produk' }}

                                    </div>


                                    <div class="item-variant">

                                        Ukuran:

                                        {{ $item->variant->name
                                            ?? '-' }}

                                    </div>


                                    <div class="item-quantity">

                                        Jumlah:
                                        {{ $item->quantity }}

                                    </div>


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


                        @empty


                            <p style="
                                color:#777;
                                font-size:13px;
                            ">
                                Belum ada produk dalam pesanan ini.
                            </p>


                        @endforelse


                    </div>


                    {{-- ALAMAT --}}

                    <div class="card">

                        <div class="card-title">
                            📍 Alamat Pengiriman
                        </div>


                        <div class="address">

                            {{ $order->address }}

                        </div>

                    </div>


                </div>


                {{-- KOLOM KANAN --}}

                <div>


                    {{-- STATUS PESANAN --}}

                    <div class="card">

                        <div class="card-title">
                            🔄 Status Pesanan
                        </div>


                        <form
                            action="{{ route(
                                'admin.orders.updateStatus',
                                $order->id
                            ) }}"
                            method="POST"
                            class="status-form"
                        >

                            @csrf

                            @method('PUT')


                            <select
                                name="status"
                                class="status-select"
                            >

                                <option
                                    value="pending"
                                    {{ $order->status === 'pending'
                                        ? 'selected'
                                        : '' }}
                                >
                                    Menunggu
                                </option>

                                <option
                                    value="processing"
                                    {{ $order->status === 'processing'
                                        ? 'selected'
                                        : '' }}
                                >
                                    Diproses
                                </option>

                                <option
                                    value="shipped"
                                    {{ $order->status === 'shipped'
                                        ? 'selected'
                                        : '' }}
                                >
                                    Dikirim
                                </option>

                                <option
                                    value="completed"
                                    {{ $order->status === 'completed'
                                        ? 'selected'
                                        : '' }}
                                >
                                    Selesai
                                </option>

                                <option
                                    value="cancelled"
                                    {{ $order->status === 'cancelled'
                                        ? 'selected'
                                        : '' }}
                                >
                                    Dibatalkan
                                </option>

                            </select>


                            <button
                                type="submit"
                                class="update-button"
                            >
                                💾 Simpan Status
                            </button>

                        </form>


                    </div>


                    {{-- PEMBAYARAN --}}

                    <div class="card">

                        <div class="card-title">
                            💳 Pembayaran
                        </div>


                        <div class="summary-row">

                            <span>
                                Status
                            </span>

                            @if(
                                $order->payment_status === 'paid'
                            )

                                <span class="
                                    status
                                    payment-paid
                                ">
                                    ✓ Dibayar
                                </span>

                            @else

                                <span class="
                                    status
                                    payment-pending
                                ">
                                    Menunggu Pembayaran
                                </span>

                            @endif

                        </div>


                    </div>


                    {{-- TOTAL --}}

                    <div class="card">

                        <div class="card-title">
                            💰 Ringkasan Pembayaran
                        </div>


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

                            <span class="total-price">

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

</div>


</body>

</html>