<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Produk - PizzaMozza</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            background: #f7f5f2;
            color: #3d3029;
        }

        /* =====================================
           SIDEBAR
        ===================================== */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 265px;
            background: #941919;
            color: #fff;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .brand {
            height: 88px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, .15);
            flex-shrink: 0;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #b52d2d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 23px;
            font-weight: 700;
            line-height: 1.1;
        }

        .brand-subtitle {
            margin-top: 4px;
            font-size: 11px;
            color: #f5dede;
        }

        .sidebar-menu {
            padding: 24px 15px;
        }

        .menu-title {
            margin: 0 12px 12px;
            color: #f5dede;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .8px;
            text-transform: uppercase;
        }

        .menu-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-item {
            margin-bottom: 5px;
        }

        .menu-link {
            min-height: 45px;
            padding: 0 14px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #b52d2d;
            color: #fff;
        }

        .menu-icon {
            width: 22px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px 16px;
            border-top: 1px solid rgba(255, 255, 255, .15);
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 15px;
            padding: 5px 6px;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #b52d2d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .profile-info strong {
            display: block;
            color: #fff;
            font-size: 12px;
        }

        .profile-info span {
            display: block;
            margin-top: 4px;
            color: #f5dede;
            font-size: 10px;
        }

        .logout-button {
            width: 100%;
            height: 38px;
            border: none;
            border-radius: 8px;
            background: #fff;
            color: #941919;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
        }

        .logout-button:hover {
            background: #f5dede;
        }

        /* =====================================
           MAIN CONTENT
        ===================================== */

        .main {
            margin-left: 265px;
            width: calc(100% - 265px);
            min-height: 100vh;
        }

        .topbar {
            min-height: 72px;
            padding: 12px 34px;
            background: #fff;
            border-bottom: 1px solid #e8e8e8;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .topbar-admin {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-info {
            text-align: right;
        }

        .topbar-info strong {
            display: block;
            font-size: 13px;
            color: #333;
        }

        .topbar-info span {
            display: block;
            margin-top: 4px;
            font-size: 10px;
            color: #999;
        }

        .topbar-avatar {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            background: #fff0f0;
            color: #941919;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        /* =====================================
           PAGE CONTENT
        ===================================== */

        .content {
            padding: 30px 32px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 28px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 700;
            color: #342820;
        }

        .page-description {
            margin-top: 8px;
            font-size: 13px;
            color: #8a7d75;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 8px;
            background: #941919;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
            white-space: nowrap;
        }

        .btn-add:hover {
            background: #b52d2d;
        }

        /* =====================================
           ALERT
        ===================================== */

        .alert-success {
            padding: 14px 18px;
            margin-bottom: 20px;
            border: 1px solid #b9e5c5;
            border-radius: 9px;
            background: #e8f7ed;
            color: #23733a;
            font-size: 13px;
        }

        .alert-error {
            padding: 14px 18px;
            margin-bottom: 20px;
            border: 1px solid #f1c7c3;
            border-radius: 9px;
            background: #fff0ef;
            color: #a92820;
            font-size: 13px;
        }

        /* =====================================
           TABLE CARD
        ===================================== */

        .table-card {
            background: #fff;
            border: 1px solid #e5ded9;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(61, 48, 41, .05);
        }

        .table-heading {
            padding: 20px 22px;
            border-bottom: 1px solid #e5ded9;
        }

        .table-heading h2 {
            font-size: 17px;
            font-weight: 700;
            color: #342820;
        }

        .table-heading p {
            margin-top: 6px;
            font-size: 12px;
            color: #8a7d75;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .product-table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
            background: #fff;
        }

        .product-table thead {
            background: #f8efed;
        }

        .product-table th {
            padding: 15px 18px;
            border: 1px solid #e5d8d3;
            color: #5b4038;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .product-table td {
            padding: 16px 18px;
            border: 1px solid #e8e1dc;
            color: #51443d;
            font-size: 13px;
            vertical-align: middle;
        }

        .product-table tbody tr:nth-child(even) {
            background: #fffdfc;
        }

        .product-table tbody tr:hover {
            background: #fff2ee;
        }

        .product-name {
            color: #342820;
            font-size: 13px;
            font-weight: 700;
        }

        .product-id {
            margin-top: 5px;
            color: #8a7d75;
            font-size: 12px;
        }

        .product-image {
            width: 58px;
            height: 58px;
            border-radius: 9px;
            border: 1px solid #eee3dd;
            object-fit: cover;
            flex-shrink: 0;
        }

        .product-placeholder {
            width: 58px;
            height: 58px;
            border-radius: 9px;
            background: #f8e9e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            flex-shrink: 0;
        }

        /* =====================================
           CATEGORY
        ===================================== */

        .category-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            background: #fbe8e7;
            color: #a92820;
            font-size: 11px;
            font-weight: 700;
        }

        /* =====================================
           STOCK
        ===================================== */

        .stock-available {
            color: #198754;
            font-weight: 700;
        }

        .stock-empty {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #fde5e5;
            color: #b42318;
            font-size: 11px;
            font-weight: 700;
        }

        /* =====================================
           VARIANTS
        ===================================== */

        .variant-list {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .variant-item {
            color: #62544d;
            font-size: 12px;
            line-height: 1.5;
        }

        .variant-name {
            font-weight: 600;
            color: #45362e;
        }

        .no-variant {
            color: #999;
            font-size: 12px;
        }

        /* =====================================
           ACTION BUTTONS
        ===================================== */

        .action-group {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            white-space: nowrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 9px 12px;
            border-radius: 7px;
            border: none;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .action-btn:hover {
            opacity: .8;
            transform: translateY(-1px);
        }

        .btn-view {
            background: #e2edff;
            color: #2458a6;
        }

        .btn-edit {
            background: #fff1d6;
            color: #a76516;
        }

        .btn-delete {
            background: #fde5e5;
            color: #a92820;
        }

        /* =====================================
           EMPTY DATA
        ===================================== */

        .empty-state {
            padding: 55px 20px;
            text-align: center;
        }

        .empty-state .icon {
            margin-bottom: 14px;
            color: #a92820;
            font-size: 42px;
        }

        .empty-state h3 {
            color: #45362e;
            font-size: 16px;
            font-weight: 700;
        }

        .empty-state p {
            margin-top: 7px;
            color: #8a7d75;
            font-size: 13px;
        }

        /* =====================================
           FOOTER
        ===================================== */

        .footer {
            padding: 22px 0;
            text-align: center;
            color: #95877f;
            font-size: 11px;
        }

        /* =====================================
           RESPONSIVE
        ===================================== */

        @media (max-width: 900px) {
            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
                width: calc(100% - 220px);
            }

            .content {
                padding: 22px 18px;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .sidebar-bottom {
                margin-top: 0;
            }

            .main {
                margin-left: 0;
                width: 100%;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .topbar {
                padding: 12px 18px;
            }

            .content {
                padding: 20px 14px;
            }
        }
    </style>
</head>

<body>

    <div class="min-h-screen">

        {{-- =====================================
             SIDEBAR ADMIN
        ====================================== --}}

        <aside class="sidebar">

            <div class="brand">

                <div class="brand-icon">
                    <i class="fa-solid fa-pizza-slice"></i>
                </div>

                <div>
                    <div class="brand-name">PizzaMozza</div>
                    <div class="brand-subtitle">Admin Dashboard</div>
                </div>

            </div>


            <nav class="sidebar-menu">

                <div class="menu-title">
                    Main Menu
                </div>

                <ul class="menu-list">

                    {{-- DASHBOARD --}}
                    <li class="menu-item">

                        <a href="{{ route('admin.dashboard') }}"
                            class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                            <span class="menu-icon">
                                <i class="bi bi-grid-1x2"></i>
                            </span>

                            <span>Dashboard</span>

                        </a>

                    </li>


                    {{-- DATA KARYAWAN --}}
                    <li class="menu-item">

                        <a href="{{ route('admin.employees.index') }}"
                            class="menu-link {{ request()->routeIs('admin.employees.*') ? 'active' : '' }}">

                            <span class="menu-icon">
                                <i class="bi bi-people"></i>
                            </span>

                            <span>Data Karyawan</span>

                        </a>

                    </li>


                    {{-- DATA PELANGGAN --}}
                    <li class="menu-item">

                        <a href="{{ route('admin.customers.index') }}"
                            class="menu-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">

                            <span class="menu-icon">
                                <i class="bi bi-person-vcard"></i>
                            </span>

                            <span>Data Pelanggan</span>

                        </a>

                    </li>


                    {{-- DATA PRODUK --}}
                    <li class="menu-item">

                        <a href="{{ route('admin.products.index') }}"
                            class="menu-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">

                            <span class="menu-icon">
                                <i class="bi bi-box-seam"></i>
                            </span>

                            <span>Data Produk</span>

                        </a>

                    </li>


                    {{-- PESANAN --}}
                    <li class="menu-item">

                        <a href="{{ route('admin.orders.index') }}"
                            class="menu-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">

                            <span class="menu-icon">
                                <i class="bi bi-receipt"></i>
                            </span>

                            <span>Pesanan</span>

                        </a>

                    </li>


                    {{-- LAPORAN PENJUALAN --}}
                    <li class="menu-item">

                        <a href="{{ route('admin.sales-report.index') }}"
                            class="menu-link {{ request()->routeIs('admin.sales-report.*') ? 'active' : '' }}">

                            <span class="menu-icon">
                                <i class="bi bi-bar-chart-line"></i>
                            </span>

                            <span>Laporan Penjualan</span>

                        </a>

                    </li>

                </ul>

            </nav>


            {{-- PROFIL ADMIN --}}
            <div class="sidebar-bottom">

                <div class="admin-profile">

                    <div class="profile-avatar">
                        <i class="bi bi-person"></i>
                    </div>

                    <div class="profile-info">

                        <strong>
                            {{ auth()->user()->name ?? 'Admin PizzaMozza' }}
                        </strong>

                        <span>PizzaMozza</span>

                    </div>

                </div>


                <form id="logoutForm"
                    action="{{ route('logout') }}"
                    method="POST">

                    @csrf

                    <button type="button"
                        class="logout-button"
                        onclick="openLogoutModal()">

                        <i class="bi bi-box-arrow-right"></i>
                        Keluar

                    </button>

                </form>

            </div>

        </aside>


        {{-- =====================================
             MAIN CONTENT
        ====================================== --}}

        <main class="main">

            {{-- TOPBAR --}}
            <header class="topbar">

                <div class="topbar-admin">

                    <div class="topbar-info">

                        <strong>
                            {{ auth()->user()->name ?? 'Admin PizzaMozza' }}
                        </strong>

                        <span>Administrator</span>

                    </div>

                    <div class="topbar-avatar">
                        <i class="bi bi-person"></i>
                    </div>

                </div>

            </header>


            <section class="content">

                {{-- PAGE HEADER --}}
                <div class="page-header">

                    <div>

                        <h1 class="page-title">
                            Data Produk
                        </h1>

                        <p class="page-description">
                            Kelola produk dan varian PizzaMozza.
                        </p>

                    </div>


                    <a href="{{ route('admin.products.create') }}"
                        class="btn-add">

                        <i class="bi bi-plus-lg"></i>
                        Tambah Produk

                    </a>

                </div>


                {{-- PESAN SUKSES --}}
                @if(session('success'))

                    <div class="alert-success">
                        <i class="bi bi-check-circle"></i>
                        {{ session('success') }}
                    </div>

                @endif


                {{-- PESAN ERROR --}}
                @if(session('error'))

                    <div class="alert-error">
                        <i class="bi bi-exclamation-circle"></i>
                        {{ session('error') }}
                    </div>

                @endif


                {{-- =====================================
                     TABEL PRODUK
                ====================================== --}}

                <div class="table-card">

                    <div class="table-heading">

                        <h2>Daftar Produk</h2>

                        <p>
                            Berikut daftar produk yang tersedia di PizzaMozza.
                        </p>

                    </div>


                    <div class="table-wrapper">

                        <table class="product-table">

                            <thead>

                                <tr>

                                    <th>Produk</th>

                                    <th>Kategori</th>

                                    <th>Harga</th>

                                    <th>Stok</th>

                                    <th>Varian</th>

                                    <th style="text-align: center;">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($products as $product)

                                    <tr>

                                        {{-- PRODUK --}}
                                        <td>

                                            <div class="flex items-center gap-4">

                                                @if($product->image)

                                                    <img
                                                        src="{{ asset('image/' . $product->image) }}"
                                                        alt="{{ $product->name }}"
                                                        class="product-image"
                                                    >

                                                @else

                                                    <div class="product-placeholder">
                                                        <i class="fa-solid fa-pizza-slice"></i>
                                                    </div>

                                                @endif


                                                <div>

                                                    <p class="product-name">
                                                        {{ $product->name }}
                                                    </p>

                                                    <p class="product-id">
                                                        ID Produk: {{ $product->id }}
                                                    </p>

                                                </div>

                                            </div>

                                        </td>


                                        {{-- KATEGORI --}}
                                        <td>

                                            <span class="category-badge">
                                                {{ ucfirst($product->category) }}
                                            </span>

                                        </td>


                                        {{-- HARGA --}}
                                        <td>

                                            <span class="font-semibold text-gray-700">

                                                Rp {{ number_format($product->price, 0, ',', '.') }}

                                            </span>

                                        </td>


                                        {{-- STOK --}}
                                        <td>

                                            @if($product->stock > 0)

                                                <span class="stock-available">
                                                    {{ $product->stock }}
                                                </span>

                                            @else

                                                <span class="stock-empty">
                                                    Habis
                                                </span>

                                            @endif

                                        </td>


                                        {{-- VARIAN --}}
                                        <td>

                                            @if($product->variants->count() > 0)

                                                <div class="variant-list">

                                                    @foreach($product->variants as $variant)

                                                        <div class="variant-item">

                                                            <span class="variant-name">
                                                                {{ $variant->name }}
                                                            </span>

                                                            <span class="text-gray-400">
                                                                —
                                                            </span>

                                                            Rp {{ number_format($variant->price, 0, ',', '.') }}

                                                        </div>

                                                    @endforeach

                                                </div>

                                            @else

                                                <span class="no-variant">
                                                    Tidak ada varian
                                                </span>

                                            @endif

                                        </td>


                                        {{-- AKSI --}}
                                        <td>

                                            <div class="action-group">

                                                {{-- LIHAT --}}
                                                <a
                                                    href="{{ route('admin.products.show', $product) }}"
                                                    class="action-btn btn-view">

                                                    <i class="bi bi-eye"></i>
                                                    Lihat

                                                </a>


                                                {{-- EDIT --}}
                                                <a
                                                    href="{{ route('admin.products.edit', $product) }}"
                                                    class="action-btn btn-edit">

                                                    <i class="bi bi-pencil-square"></i>
                                                    Edit

                                                </a>


                                                {{-- HAPUS --}}
                                                <form
                                                    action="{{ route('admin.products.destroy', $product) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="action-btn btn-delete">

                                                        <i class="bi bi-trash"></i>
                                                        Hapus

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6">

                                            <div class="empty-state">

                                                <div class="icon">
                                                    <i class="fa-solid fa-pizza-slice"></i>
                                                </div>

                                                <h3>Belum Ada Produk</h3>

                                                <p>
                                                    Silakan tambahkan produk baru ke PizzaMozza.
                                                </p>

                                                <a href="{{ route('admin.products.create') }}"
                                                    class="btn-add mt-5">

                                                    <i class="bi bi-plus-lg"></i>
                                                    Tambah Produk

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- FOOTER --}}
                <footer class="footer">

                    © {{ date('Y') }} PizzaMozza.
                    All rights reserved.

                </footer>

            </section>

        </main>

    </div>


    {{-- =====================================
         MODAL LOGOUT
    ====================================== --}}

    <div id="logoutModal"
        class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/50 p-5">

        <div class="w-full max-w-sm rounded-2xl bg-white p-7 text-center shadow-2xl">

            <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-red-100 text-2xl text-red-800">

                <i class="bi bi-box-arrow-right"></i>

            </div>

            <h3 class="text-xl font-bold text-gray-800">
                Keluar dari Akun?
            </h3>

            <p class="mt-3 text-sm leading-relaxed text-gray-500">
                Apakah kamu yakin ingin keluar dari dashboard admin PizzaMozza?
            </p>

            <div class="mt-6 flex gap-3">

                <button type="button"
                    onclick="closeLogoutModal()"
                    class="flex-1 rounded-lg border border-gray-300 px-4 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-100">

                    Batal

                </button>

                <button type="button"
                    onclick="confirmLogout()"
                    class="flex-1 rounded-lg bg-[#941919] px-4 py-3 text-sm font-semibold text-white hover:bg-[#b52d2d]">

                    Ya, Keluar

                </button>

            </div>

        </div>

    </div>


    {{-- =====================================
         JAVASCRIPT
    ====================================== --}}

    <script>

        function openLogoutModal() {

            const modal = document.getElementById('logoutModal');

            modal.classList.remove('hidden');
            modal.classList.add('flex');

        }


        function closeLogoutModal() {

            const modal = document.getElementById('logoutModal');

            modal.classList.add('hidden');
            modal.classList.remove('flex');

        }


        function confirmLogout() {

            document.getElementById('logoutForm').submit();

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