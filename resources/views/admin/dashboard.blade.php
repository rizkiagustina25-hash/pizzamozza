<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PizzaMozza</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f8fa;
            color: #292323;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
            cursor: pointer;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            background: #941919;
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 22px;
            border-bottom: 1px solid #ffffff25;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #b52d2d;
            display: grid;
            place-items: center;
            font-size: 21px;
        }

        .brand-content h1 {
            font-size: 21px;
            color: white;
        }

        .brand-content p {
            margin-top: 4px;
            font-size: 11px;
            color: #f5dede;
        }

        .sidebar-menu {
            flex: 1;
            padding: 24px 14px;
            overflow-y: auto;
        }

        .menu-title {
            margin: 0 12px 13px;
            color: #f5dede;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .menu-list {
            list-style: none;
        }

        .menu-item {
            margin-bottom: 6px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            border-radius: 9px;
            color: white;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .menu-link i {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #b52d2d;
        }

        /* PROFIL ADMIN */
        .sidebar-bottom {
            padding: 17px;
            border-top: 1px solid #ffffff25;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .admin-avatar,
        .topbar-avatar {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #b52d2d;
            flex-shrink: 0;
        }

        .admin-info {
            min-width: 0;
        }

        .admin-info strong {
            display: block;
            font-size: 12px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .admin-info span {
            display: block;
            margin-top: 4px;
            color: #f5dede;
            font-size: 10px;
        }

        .logout-button {
            width: 100%;
            padding: 10px;
            border: 0;
            border-radius: 8px;
            background: white;
            color: #941919;
            font-size: 12px;
            font-weight: bold;
        }

        .logout-button:hover {
            background: #f5dede;
        }

        /* MAIN CONTENT */
        .main-wrapper {
            min-height: 100vh;
            margin-left: 250px;
        }

        .topbar {
            min-height: 70px;
            padding: 12px 32px;
            background: white;
            border-bottom: 1px solid #e9e9e9;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .topbar-admin {
            display: flex;
            align-items: center;
            gap: 10px;
            text-align: right;
        }

        .topbar-admin strong {
            display: block;
            font-size: 13px;
        }

        .topbar-admin span {
            display: block;
            margin-top: 3px;
            color: #999;
            font-size: 10px;
        }

        .topbar-avatar {
            background: #fff0f1;
            color: #941919;
        }

        .content {
            width: 100%;
            max-width: 1300px;
            margin: auto;
            padding: 30px 32px 45px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
        }

        .page-heading h2 {
            font-size: 29px;
        }

        .page-heading p {
            margin-top: 6px;
            color: #888;
            font-size: 13px;
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 17px;
            border-radius: 8px;
            background: #ed1c24;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .primary-button:hover {
            background: #c9181f;
        }

        /* STATISTIK */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 25px;
        }

        .stat-card {
            position: relative;
            min-height: 145px;
            padding: 19px;
            background: white;
            border: 1px solid #e8e8e8;
            border-radius: 13px;
        }

        .stat-card.red {
            border-color: #ffc9cb;
        }

        .stat-card.blue {
            border-color: #cfe0ff;
        }

        .stat-card.orange {
            border-color: #f3dfc9;
        }

        .stat-card.green {
            border-color: #cdebd9;
        }

        .stat-title {
            color: #777;
            font-size: 12px;
        }

        .stat-icon {
            position: absolute;
            top: 17px;
            right: 17px;
            width: 39px;
            height: 39px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 17px;
        }

        .red .stat-icon {
            background: #fff0f1;
            color: #b52d2d;
        }

        .blue .stat-icon {
            background: #edf4ff;
            color: #3974c6;
        }

        .orange .stat-icon {
            background: #fff3e7;
            color: #bd7935;
        }

        .green .stat-icon {
            background: #eaf8f0;
            color: #1c9b55;
        }

        .stat-number {
            margin-top: 28px;
            font-size: 28px;
            font-weight: bold;
        }

        .stat-description {
            margin-top: 6px;
            color: #999;
            font-size: 10px;
        }

        /* DASHBOARD GRID */
        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(280px, .9fr);
            gap: 20px;
            align-items: start;
        }

        .panel {
            overflow: hidden;
            background: white;
            border: 1px solid #e8e8e8;
            border-radius: 13px;
        }

        .panel-header {
            padding: 18px 22px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .panel-header h3 {
            font-size: 15px;
        }

        .panel-header p {
            margin-top: 5px;
            color: #999;
            font-size: 11px;
        }

        .panel-link {
            color: #ed1c24;
            font-size: 11px;
            font-weight: bold;
        }

        /* PRODUK TERBARU */
        .product-list {
            padding: 0 22px;
        }

        .product-row {
            min-height: 76px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #eee;
        }

        .product-row:last-child {
            border: 0;
        }

        .product-thumbnail {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 9px;
            background: #f3f3f3;
            display: grid;
            place-items: center;
        }

        .product-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-data {
            flex: 1;
            min-width: 0;
        }

        .product-data strong,
        .product-price strong {
            display: block;
            font-size: 12px;
        }

        .product-data span,
        .product-price span {
            display: block;
            margin-top: 4px;
            color: #999;
            font-size: 10px;
        }

        .product-price {
            text-align: right;
        }

        .product-price span {
            color: #ed1c24;
        }

        .empty-product {
            padding: 30px;
            color: #999;
            font-size: 12px;
            text-align: center;
        }

        /* AKSES CEPAT */
        .quick-actions {
            padding: 7px 18px 12px;
        }

        .quick-action {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px 8px;
            border-bottom: 1px solid #eee;
        }

        .quick-action:last-child {
            border: 0;
        }

        .quick-action:hover {
            background: #fffafa;
        }

        .quick-action-icon {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #fff0f1;
            color: #ed1c24;
            display: grid;
            place-items: center;
        }

        .quick-action-content {
            flex: 1;
        }

        .quick-action-content strong {
            display: block;
            font-size: 12px;
        }

        .quick-action-content span {
            display: block;
            margin-top: 4px;
            color: #999;
            font-size: 10px;
        }

        .quick-action-arrow {
            color: #aaa;
        }

        /* POPUP LOGOUT */
        .logout-modal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(35, 15, 15, .55);
        }

        .logout-modal.show {
            display: flex;
        }

        .logout-dialog {
            width: 100%;
            max-width: 380px;
            padding: 30px 25px;
            border-radius: 18px;
            background: #fffaf3;
            text-align: center;
            box-shadow: 0 15px 45px #0003;
        }

        .logout-modal-icon {
            margin-bottom: 18px;
            color: #941919;
            font-size: 28px;
        }

        .logout-dialog h3 {
            margin-bottom: 10px;
            font-size: 21px;
        }

        .logout-dialog p {
            margin-bottom: 24px;
            color: #81716a;
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
            border: 0;
            border-radius: 9px;
            font-size: 13px;
            font-weight: bold;
        }

        .cancel-logout {
            background: #eee;
            color: #59453d;
        }

        .confirm-logout {
            background: #941919;
            color: white;
        }

        /* RESPONSIVE */
        @media (max-width: 1050px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 72px;
            }

            .brand {
                justify-content: center;
                padding: 18px 5px;
            }

            .brand-content,
            .menu-title,
            .menu-link span,
            .admin-info {
                display: none;
            }

            .sidebar-menu {
                padding: 18px 8px;
            }

            .menu-link {
                justify-content: center;
                padding: 14px 5px;
            }

            .sidebar-bottom {
                padding: 12px 8px;
            }

            .admin-profile {
                justify-content: center;
            }

            .main-wrapper {
                margin-left: 72px;
            }

            .topbar {
                padding: 0 15px;
            }

            .content {
                padding: 22px 15px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .page-heading h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <div class="admin-layout">

        {{-- SIDEBAR --}}
        <aside class="sidebar">

            <div class="brand">
                <div class="brand-icon">
                    <i class="bi bi-pizza"></i>
                </div>

                <div class="brand-content">
                    <h1>PizzaMozza</h1>
                    <p>Admin Dashboard</p>
                </div>
            </div>

            <nav class="sidebar-menu">
                <p class="menu-title">MAIN MENU</p>

                <ul class="menu-list">

                    <li class="menu-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="bi bi-grid-1x2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.employees.index') }}"
                            class="menu-link {{ request()->routeIs('admin.employees.*') ? 'active' : '' }}">
                            <i class="bi bi-people"></i>
                            <span>Data Karyawan</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.customers.index') }}"
                            class="menu-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                            <i class="bi bi-person-vcard"></i>
                            <span>Data Pelanggan</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.products.index') }}"
                            class="menu-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                            <i class="bi bi-box-seam"></i>
                            <span>Data Produk</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.orders.index') }}"
                            class="menu-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                            <i class="bi bi-receipt"></i>
                            <span>Pesanan</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ url('/admin/laporan-penjualan') }}"
                            class="menu-link {{ request()->is('admin/laporan-penjualan*') ? 'active' : '' }}">
                            <i class="bi bi-bar-chart-line"></i>
                            <span>Laporan Penjualan</span>
                        </a>
                    </li>

                </ul>
            </nav>

            <div class="sidebar-bottom">

                <div class="admin-profile">
                    <div class="admin-avatar">
                        <i class="bi bi-person"></i>
                    </div>

                    <div class="admin-info">
                        <strong>{{ auth()->user()->name ?? 'Admin PizzaMozza' }}</strong>
                        <span>Administrator</span>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="button" class="logout-button" onclick="openLogoutModal()">
                        <i class="bi bi-box-arrow-right"></i>
                        Keluar
                    </button>
                </form>

            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <div class="main-wrapper">

            <header class="topbar">
                <div class="topbar-admin">
                    <div>
                        <strong>{{ auth()->user()->name ?? 'Admin PizzaMozza' }}</strong>
                        <span>Administrator</span>
                    </div>

                    <div class="topbar-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
            </header>

            <main class="content">

                {{-- JUDUL HALAMAN --}}
                <div class="page-heading">
                    <div>
                        <h2>Dashboard</h2>
                        <p>Kelola operasional PizzaMozza dari satu tempat.</p>
                    </div>

                    <a href="{{ route('admin.products.create') }}" class="primary-button">
                        <i class="bi bi-plus-lg"></i>
                        Tambah Produk
                    </a>
                </div>

                {{-- STATISTIK --}}
                <section class="stats-grid">

                    <div class="stat-card red">
                        <span class="stat-title">Total Admin</span>
                        <div class="stat-icon"><i class="bi bi-person"></i></div>
                        <div class="stat-number">{{ $totalAdmin }}</div>
                        <p class="stat-description">Administrator sistem</p>
                    </div>

                    <div class="stat-card blue">
                        <span class="stat-title">Total Karyawan</span>
                        <div class="stat-icon"><i class="bi bi-people"></i></div>
                        <div class="stat-number">{{ $totalKaryawan }}</div>
                        <p class="stat-description">Data karyawan aktif</p>
                    </div>

                    <div class="stat-card orange">
                        <span class="stat-title">Total Produk</span>
                        <div class="stat-icon"><i class="bi bi-box-seam"></i></div>
                        <div class="stat-number">{{ $totalProduk }}</div>
                        <p class="stat-description">Menu yang tersedia</p>
                    </div>

                    <div class="stat-card green">
                        <span class="stat-title">Ready Stock</span>
                        <div class="stat-icon"><i class="bi bi-check-lg"></i></div>
                        <div class="stat-number">{{ $readyStock }}</div>
                        <p class="stat-description">Produk siap dijual</p>
                    </div>

                </section>

                {{-- DASHBOARD --}}
                <section class="dashboard-grid">

                    {{-- PRODUK TERBARU --}}
                    <div class="panel">

                        <div class="panel-header">
                            <div>
                                <h3>Produk Terbaru</h3>
                                <p>Menu yang terakhir ditambahkan</p>
                            </div>

                            <a href="{{ route('admin.products.index') }}" class="panel-link">
                                Lihat semua
                            </a>
                        </div>

                        <div class="product-list">

                            @forelse($produkTerbaru as $product)

                                @php
                                    $variant = $product->variants->first() ?? null;
                                    $price = $variant?->price ?? $product->price ?? 0;
                                @endphp

                                <div class="product-row">

                                    <div class="product-thumbnail">
                                        @if($product->image)
                                            <img src="{{ asset('image/' . $product->image) }}"
                                                alt="{{ $product->name }}">
                                        @else
                                            🍕
                                        @endif
                                    </div>

                                    <div class="product-data">
                                        <strong>{{ $product->name }}</strong>
                                        <span>Pizza</span>
                                    </div>

                                    <div class="product-price">
                                        <strong>Rp {{ number_format($price, 0, ',', '.') }}</strong>
                                        <span>Pre-order</span>
                                    </div>

                                </div>

                            @empty

                                <div class="empty-product">
                                    Belum ada produk.
                                </div>

                            @endforelse

                        </div>
                    </div>

                    {{-- AKSES CEPAT --}}
                    <div class="panel">

                        <div class="panel-header">
                            <div>
                                <h3>Akses Cepat</h3>
                                <p>Pengelolaan data PizzaMozza</p>
                            </div>
                        </div>

                        <div class="quick-actions">

                            <a href="{{ route('admin.products.create') }}" class="quick-action">
                                <div class="quick-action-icon">
                                    <i class="bi bi-plus-lg"></i>
                                </div>

                                <div class="quick-action-content">
                                    <strong>Tambah Produk</strong>
                                    <span>Tambahkan menu baru</span>
                                </div>

                                <i class="bi bi-chevron-right quick-action-arrow"></i>
                            </a>

                            <a href="{{ route('admin.employees.index') }}" class="quick-action">
                                <div class="quick-action-icon">
                                    <i class="bi bi-people"></i>
                                </div>

                                <div class="quick-action-content">
                                    <strong>Kelola Karyawan</strong>
                                    <span>Data karyawan PizzaMozza</span>
                                </div>

                                <i class="bi bi-chevron-right quick-action-arrow"></i>
                            </a>

                            <a href="{{ route('admin.customers.index') }}" class="quick-action">
                                <div class="quick-action-icon">
                                    <i class="bi bi-person-vcard"></i>
                                </div>

                                <div class="quick-action-content">
                                    <strong>Kelola Pelanggan</strong>
                                    <span>Master data pelanggan</span>
                                </div>

                                <i class="bi bi-chevron-right quick-action-arrow"></i>
                            </a>

                            <a href="{{ route('admin.orders.index') }}" class="quick-action">
                                <div class="quick-action-icon">
                                    <i class="bi bi-receipt"></i>
                                </div>

                                <div class="quick-action-content">
                                    <strong>Kelola Pesanan</strong>
                                    <span>Lihat dan proses pesanan</span>
                                </div>

                                <i class="bi bi-chevron-right quick-action-arrow"></i>
                            </a>

                            <a href="{{ route('admin.products.index') }}" class="quick-action">
                                <div class="quick-action-icon">
                                    <i class="bi bi-box-seam"></i>
                                </div>

                                <div class="quick-action-content">
                                    <strong>Data Produk</strong>
                                    <span>Kelola seluruh menu</span>
                                </div>

                                <i class="bi bi-chevron-right quick-action-arrow"></i>
                            </a>

                            <a href="{{ url('/admin/laporan-penjualan') }}" class="quick-action">
                                <div class="quick-action-icon">
                                    <i class="bi bi-bar-chart-line"></i>
                                </div>

                                <div class="quick-action-content">
                                    <strong>Laporan Penjualan</strong>
                                    <span>Lihat laporan transaksi</span>
                                </div>

                                <i class="bi bi-chevron-right quick-action-arrow"></i>
                            </a>

                        </div>
                    </div>

                </section>
            </main>
        </div>
    </div>

    {{-- POPUP LOGOUT --}}
    <div class="logout-modal" id="logoutModal">
        <div class="logout-dialog" role="dialog" aria-modal="true">

            <div class="logout-modal-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>

            <h3>Keluar dari Akun?</h3>

            <p>
                Apakah kamu yakin ingin keluar dari dashboard admin PizzaMozza?
            </p>

            <div class="logout-modal-actions">
                <button type="button" class="cancel-logout" onclick="closeLogoutModal()">
                    Batal
                </button>

                <button type="button" class="confirm-logout" onclick="confirmLogout()">
                    Ya, Keluar
                </button>
            </div>

        </div>
    </div>

    <script>
        function openLogoutModal() {
            document.getElementById('logoutModal').classList.add('show');
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.remove('show');
        }

        function confirmLogout() {
            document.querySelector('.sidebar-bottom form').submit();
        }

        document.getElementById('logoutModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeLogoutModal();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeLogoutModal();
            }
        });
    </script>

</body>

</html>