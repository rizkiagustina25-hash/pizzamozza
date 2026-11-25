
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - PizzaMozza</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f7f7f9;
            color: #292929;
        }

        a { text-decoration: none; }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            background: #941919;
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 10;
        }

        .brand {
            height: 85px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            border-radius: 13px;
            background: #b52d2d;
            display: grid;
            place-items: center;
            font-size: 22px;
        }

        .brand-name { font-size: 21px; font-weight: 800; }
        .brand-name span { color: #ffd2b8; }
        .brand-subtitle { margin-top: 4px; font-size: 10px; color: #f5dede; }

        .sidebar-menu { padding: 26px 15px; }

        .menu-title {
            margin: 0 12px 13px;
            font-size: 10px;
            font-weight: bold;
            color: #f5dede;
            letter-spacing: 1px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 6px;
            border-radius: 10px;
            color: white;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .menu-link:hover,
        .menu-link.active { background: #b52d2d; }

        .menu-link i { font-size: 17px; }

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px;
            border-top: 1px solid rgba(255,255,255,.15);
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #b52d2d;
            display: grid;
            place-items: center;
        }

        .profile-info strong { display: block; font-size: 12px; }
        .profile-info span { font-size: 10px; color: #f5dede; }

        .logout-button {
            width: 100%;
            padding: 11px;
            border: 0;
            border-radius: 9px;
            background: white;
            color: #941919;
            font-weight: bold;
            cursor: pointer;
        }

        .main-wrapper { margin-left: 250px; min-height: 100vh; }

        .topbar {
            height: 72px;
            padding: 0 35px;
            background: white;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-title { font-size: 13px; color: #777; }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            font-weight: bold;
        }

        .topbar-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #f8e8e2;
            color: #941919;
            display: grid;
            place-items: center;
            font-size: 17px;
        }

        .content { padding: 32px; }
        .container { max-width: 1150px; margin: auto; }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #941919;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .heading-label {
            color: #941919;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.2px;
            margin-bottom: 8px;
        }

        .heading h1 { margin: 0; font-size: 27px; }
        .heading p { margin: 8px 0 0; color: #888; font-size: 13px; }

        .detail-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 320px;
            gap: 22px;
            align-items: start;
        }

        .card {
            background: white;
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 23px;
            margin-bottom: 20px;
            box-shadow: 0 5px 18px rgba(0,0,0,.035);
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 11px;
            font-size: 15px;
            font-weight: 800;
            margin: 0 0 21px;
        }

        .card-title i {
            width: 35px;
            height: 35px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: #fff0ed;
            color: #941919;
            font-size: 17px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .info-label { color: #999; font-size: 11px; margin-bottom: 7px; }
        .info-value { font-size: 13px; font-weight: 700; overflow-wrap: anywhere; }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 800;
        }

        .pending, .unpaid { background: #fff1c9; color: #9b6b00; }
        .processing { background: #e6f2ff; color: #2773ad; }
        .shipped { background: #fff0d7; color: #a96500; }
        .completed, .paid { background: #dcfce7; color: #15803d; }
        .cancelled { background: #fee2e2; color: #b42318; }

        .cancel-reason {
            display: flex;
            gap: 13px;
            padding: 18px;
            margin-bottom: 20px;
            border: 1px solid #fecaca;
            border-left: 5px solid #dc3545;
            background: #fff1f1;
            border-radius: 12px;
        }

        .cancel-icon { color: #dc3545; font-size: 23px; }
        .cancel-reason h3 { color: #b42318; font-size: 14px; margin: 0 0 7px; }
        .cancel-reason p { color: #7f1d1d; font-size: 12px; line-height: 1.7; margin: 0; }

        .order-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f0eeee;
        }

        .order-item:first-of-type { padding-top: 0; }
        .order-item:last-child { border-bottom: 0; padding-bottom: 0; }

        .item-image, .item-placeholder {
            width: 82px;
            height: 82px;
            border-radius: 12px;
            object-fit: cover;
            flex-shrink: 0;
            background: #f8e8e2;
        }

        .item-placeholder {
            display: grid;
            place-items: center;
            color: #941919;
            font-size: 25px;
        }

        .item-info { flex: 1; min-width: 0; }
        .item-name { font-size: 13px; font-weight: 800; margin-bottom: 7px; }
        .item-detail { color: #888; font-size: 11px; line-height: 1.8; }
        .item-price { color: #941919; font-size: 13px; font-weight: 800; white-space: nowrap; }

        .address {
            padding: 16px;
            border-radius: 11px;
            background: #faf7f5;
            color: #555;
            font-size: 12px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
            color: #777;
            font-size: 12px;
        }

        .summary-row strong { color: #333; }

        .total {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            border-top: 1px dashed #ddd;
            padding-top: 18px;
            margin-top: 18px;
            font-size: 14px;
            font-weight: 800;
        }

        .total-price { color: #941919; font-size: 19px; white-space: nowrap; }

        .help-text { font-size: 12px; color: #888; line-height: 1.8; margin: 0; }
        .empty-items { color: #888; font-size: 13px; }

        .alert {
            padding: 13px 16px;
            margin-bottom: 18px;
            border-radius: 9px;
            font-size: 13px;
        }

        .success-alert { background: #dcfce7; color: #15803d; }
        .error-alert { background: #fff0ef; color: #9b2424; }

        @media(max-width: 950px) {
            .detail-grid { grid-template-columns: 1fr; }
        }

        @media(max-width: 650px) {
            .sidebar { position: relative; width: 100%; height: auto; }
            .sidebar-menu { padding: 12px; }
            .sidebar-bottom { margin-top: 0; }
            .main-wrapper { margin-left: 0; }
            .topbar { padding: 0 16px; }
            .content { padding: 22px 13px; }
            .info-grid { grid-template-columns: 1fr; gap: 16px; }
            .card { padding: 17px; }
            .heading h1 { font-size: 23px; }
            .item-image, .item-placeholder { width: 62px; height: 62px; }
            .item-price { font-size: 11px; }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon"><i class="bi bi-egg-fried"></i></div>
            <div>
                <div class="brand-name">Pizza<span>Mozza</span></div>
                <div class="brand-subtitle">Fresh, Tasty, Happiness!</div>
            </div>
        </div>

        <nav class="sidebar-menu">
            <div class="menu-title">MAIN MENU</div>

            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>

            <a href="{{ route('products.index') }}" class="menu-link">
                <i class="bi bi-box-seam"></i> Produk
            </a>

            <a href="{{ route('dashboard') }}?menu=orders" class="menu-link active">
                <i class="bi bi-bag-check"></i> Pesanan Saya
            </a>

            <a href="{{ route('dashboard') }}?menu=profile" class="menu-link">
                <i class="bi bi-person-circle"></i> Akun Saya
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="profile">
                <div class="profile-avatar"><i class="bi bi-person"></i></div>
                <div class="profile-info">
                    <strong>{{ auth()->user()->name }}</strong>
                    <span>Pelanggan</span>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <div class="main-wrapper">
        <header class="topbar">
            <div class="topbar-title">Pesanan Saya / Detail Pesanan</div>
            <div class="topbar-user">
                {{ auth()->user()->name }}
                <div class="topbar-avatar"><i class="bi bi-person"></i></div>
            </div>
        </header>

        <main class="content">
            <div class="container">

                <a href="{{ route('dashboard') }}?menu=orders" class="back">
                    <i class="bi bi-arrow-left"></i> Kembali ke Pesanan Saya
                </a>

                <div class="heading">
                    <div>
                        <div class="heading-label">RIWAYAT TRANSAKSI</div>
                        <h1>Detail Pesanan</h1>
                        <p>Nomor pesanan #PM{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    @php
                        $status = strtolower((string) $order->status);

                        $statusLabel = match ($status) {
                            'pending' => 'Menunggu',
                            'processing' => 'Diproses',
                            'shipped' => 'Dikirim',
                            'completed' => 'Selesai',
                            'cancelled' => 'Dibatalkan',
                            default => ucfirst($status),
                        };

                        $statusClass = match ($status) {
                            'pending' => 'pending',
                            'processing' => 'processing',
                            'shipped' => 'shipped',
                            'completed' => 'completed',
                            'cancelled' => 'cancelled',
                            default => 'pending',
                        };
                    @endphp

                    <span class="status {{ $statusClass }}">{{ $statusLabel }}</span>
                </div>

                @if (session('success'))
                    <div class="alert success-alert">
                        <i class="bi bi-check-circle-fill"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert error-alert">{{ session('error') }}</div>
                @endif

                @if ($status === 'cancelled' && $order->cancellation_reason)
                    <div class="cancel-reason">
                        <div class="cancel-icon">
                            <i class="bi bi-exclamation-circle-fill"></i>
                        </div>
                        <div>
                            <h3>Pesanan Dibatalkan</h3>
                            <p>
                                <strong>Alasan pembatalan:</strong><br>
                                {{ $order->cancellation_reason }}
                            </p>
                        </div>
                    </div>
                @endif

                <div class="detail-grid">

                    <div>
                        <section class="card">
                            <h2 class="card-title">
                                <i class="bi bi-receipt"></i> Informasi Pesanan
                            </h2>

                            <div class="info-grid">
                                <div>
                                    <div class="info-label">Nomor Pesanan</div>
                                    <div class="info-value">
                                        #PM{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                                    </div>
                                </div>

                                <div>
                                    <div class="info-label">Tanggal Pesanan</div>
                                    <div class="info-value">
                                        {{ $order->created_at?->format('d M Y, H:i') ?? '-' }}
                                    </div>
                                </div>

                                <div>
                                    <div class="info-label">Status Pesanan</div>
                                    <span class="status {{ $statusClass }}">{{ $statusLabel }}</span>
                                </div>

                                <div>
                                    <div class="info-label">Status Pembayaran</div>
                                    @if ($order->payment_status === 'paid')
                                        <span class="status paid">Lunas</span>
                                    @else
                                        <span class="status unpaid">Belum Dibayar</span>
                                    @endif
                                </div>
                            </div>
                        </section>

                        <section class="card">
                            <h2 class="card-title">
                                <i class="bi bi-basket"></i> Produk Pesanan
                            </h2>

                            @forelse ($order->items as $item)
                                <div class="order-item">
                                    @if ($item->product && $item->product->image)
                                        <img
                                            src="{{ asset('image/' . $item->product->image) }}"
                                            alt="{{ $item->product->name }}"
                                            class="item-image">
                                    @else
                                        <div class="item-placeholder">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif

                                    <div class="item-info">
                                        <div class="item-name">
                                            {{ $item->product->name ?? 'Produk tidak ditemukan' }}
                                        </div>

                                        <div class="item-detail">
                                            Ukuran: {{ $item->variant->name ?? '-' }}<br>
                                            Jumlah: {{ $item->quantity }}
                                        </div>
                                    </div>

                                    <div class="item-price">
                                        Rp{{ number_format($item->subtotal, 0, ',', '.') }}
                                    </div>
                                </div>
                            @empty
                                <p class="empty-items">Belum ada produk dalam pesanan ini.</p>
                            @endforelse
                        </section>

                        <section class="card">
                            <h2 class="card-title">
                                <i class="bi bi-geo-alt"></i> Informasi Pengambilan / Pengiriman
                            </h2>

                            <div class="address">
                                {{ $order->address ?: 'Informasi alamat belum tersedia.' }}
                            </div>
                        </section>
                    </div>

                    <div>
                        <section class="card">
                            <h2 class="card-title">
                                <i class="bi bi-wallet2"></i> Ringkasan Pembayaran
                            </h2>

                            <div class="summary-row">
                                <span>Ongkos Kirim</span>
                                <strong>
                                    Rp{{ number_format($order->shipping_cost ?? 0, 0, ',', '.') }}
                                </strong>
                            </div>

                            <div class="total">
                                <span>Total Pesanan</span>
                                <span class="total-price">
                                    Rp{{ number_format($order->total_price, 0, ',', '.') }}
                                </span>
                            </div>
                        </section>

                        <section class="card">
                            <h2 class="card-title">
                                <i class="bi bi-info-circle"></i> Informasi
                            </h2>

                            <p class="help-text">
                                Terima kasih telah melakukan pemesanan di PizzaMozza.
                                Kamu dapat memantau perkembangan pesanan melalui
                                halaman Pesanan Saya.
                            </p>
                        </section>
                    </div>

                </div>
            </div>
        </main>
    </div>

</body>
</html>
