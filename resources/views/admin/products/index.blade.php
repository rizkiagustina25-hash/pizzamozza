
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Produk - PizzaMozza</title>

    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f8f8;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 265px;
            background: #941919;
            display: flex;
            flex-direction: column;
            z-index: 100;
            color: white;
            padding: 0;
        }

        .sidebar-brand {
            height: 88px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 11px;
            border-bottom: 1px solid rgba(255,255,255,.15);
            flex-shrink: 0;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #b52d2d;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 23px;
            font-weight: 700;
            line-height: 1.1;
            color: white;
        }

        .brand-subtitle {
            margin-top: 4px;
            font-size: 11px;
            color: #f5dede;
        }

        .sidebar nav {
            padding: 24px 15px;
        }

        .menu-title {
            margin: 0 12px 12px;
            font-size: 10px;
            font-weight: 700;
            color: #f5dede;
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
            color: white;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #b52d2d;
            color: white;
        }

        .menu-icon {
            width: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        /* SIDEBAR BOTTOM */
.sidebar-bottom {
    margin-top: auto;
    padding: 18px 16px;
    border-top: 1px solid rgba(255, 255, 255, .15);
    flex-shrink: 0;
}

.admin-profile {
    display: flex;
    align-items: center;
    gap: 11px;
    margin-bottom: 15px;
    padding: 5px 6px;
}

.sidebar-bottom .admin-avatar {
    width: 40px;
    height: 40px;
    min-width: 40px;
    max-width: 40px;
    flex-shrink: 0;
    border-radius: 50%;
    background: #b52d2d;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 17px;
}

.admin-info {
    min-width: 0;
    display: block;
}

.admin-info strong {
    display: block;
    font-size: 12px;
    color: white;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 155px;
}

.admin-info span {
    display: block;
    margin-top: 4px;
    font-size: 10px;
    color: #f5dede;
}

.logout-button {
    width: 100%;
    height: 38px;
    border: 1px solid rgba(255, 255, 255, .4);
    border-radius: 8px;
    background: white;
    color: #941919;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: .2s ease;
}

.logout-button:hover {
    background: #f5dede;
    color: #941919;
}

        /* MAIN */
        .main-wrapper {
            margin-left: 265px;
            min-height: 100vh;
        }

        /* TOPBAR - SAMA DENGAN HALAMAN LAIN */
.topbar {
    min-height: 72px;
    padding: 12px 34px;
    background: #ffffff;
    border-bottom: 1px solid #e8e8e8;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
}

.topbar-title {
    font-size: 13px;
    color: #777;
}

.topbar-admin {
    display: flex;
    align-items: center;
    gap: 10px;
}

.topbar-admin-info {
    text-align: right;
}

.topbar-admin-info strong {
    display: block;
    font-size: 13px;
    font-weight: 700;
    color: #333;
}

.topbar-admin-info span {
    display: block;
    margin-top: 3px;
    font-size: 10px;
    color: #999;
}

.topbar-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #fff0f4;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #941919;
    font-size: 16px;
}

        /* CONTENT */
        .content {
            padding: 35px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .heading-label {
            color: #941919;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .page-heading h1 {
            font-size: 28px;
            font-weight: bold;
            color: #292929;
        }

        .page-heading p {
            color: #888;
            font-size: 14px;
            margin-top: 6px;
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #941919;
            color: white;
            padding: 12px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
            white-space: nowrap;
        }

        .primary-button:hover {
            background: #b52d2d;
            color: white;
        }

        /* ALERT */
        .success-alert {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #15803d;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        .error-alert {
            background: #fff0ef;
            border: 1px solid #efc5c2;
            color: #9b2424;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        /* TABLE */
        .table-card {
            background: white;
            border: 1px solid #eee;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,.03);
        }

        .table-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid #eee;
        }

        .table-card-header h2 {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .table-card-header p {
            font-size: 13px;
            color: #888;
            margin-top: 5px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        .product-table thead {
            background: #faf1f1;
        }

        .product-table th {
            padding: 17px 22px;
            text-align: left;
            font-size: 13px;
            font-weight: bold;
            color: #555;
        }

        .product-table td {
            padding: 17px 22px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
            color: #555;
        }

        .product-table tbody tr:hover {
            background: #fffafa;
        }

        .product-table tbody tr:last-child td {
            border-bottom: none;
        }

        .category-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            background: #fce8e8;
            color: #941919;
            font-size: 12px;
            font-weight: 600;
        }

        .stock-available {
            color: #15803d;
            font-weight: 600;
        }

        .stock-empty {
            display: inline-block;
            padding: 6px 12px;
            background: #fee2e2;
            color: #dc2626;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 12px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: .2s;
            white-space: nowrap;
        }

        .detail-button {
            background: #dbeafe;
            color: #2563eb;
        }

        .detail-button:hover {
            background: #bfdbfe;
            color: #2563eb;
        }

        .edit-button {
            background: #fef3c7;
            color: #b45309;
        }

        .edit-button:hover {
            background: #fde68a;
            color: #92400e;
        }

        .delete-button {
            background: #fee2e2;
            color: #dc2626;
        }

        .delete-button:hover {
            background: #fecaca;
            color: #dc2626;
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px !important;
        }

        .empty-state i {
            font-size: 42px;
            color: #c9a0a0;
            display: block;
            margin-bottom: 12px;
        }

        /* MODAL HAPUS DAN LOGOUT */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.5);
            z-index: 999;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-box {
            background: white;
            width: 100%;
            max-width: 420px;
            border-radius: 15px;
            padding: 28px;
            text-align: center;
            box-shadow: 0 10px 35px rgba(0,0,0,.15);
            animation: modalFade .2s ease;
        }

        @keyframes modalFade {
            from {
                opacity: 0;
                transform: translateY(-10px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-icon {
            width: 58px;
            height: 58px;
            background: #fce8e8;
            color: #941919;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            margin: 0 auto 16px;
        }

        .modal-box h3 {
            font-size: 19px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        .modal-box p {
            color: #888;
            font-size: 13px;
            margin-bottom: 23px;
            line-height: 1.6;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
        }

        .modal-actions button {
            flex: 1;
            padding: 11px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .cancel-button {
            background: #f3f4f6;
            color: #555;
            border: none;
        }

        .cancel-button:hover {
            background: #e5e7eb;
        }

        .confirm-button {
            background: #941919;
            color: white;
            border: none;
        }

        .confirm-button:hover {
            background: #b52d2d;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            color: #888;
            font-size: 12px;
            margin-top: 30px;
        }

        /* RESPONSIVE */
        @media (max-width: 1150px) {
            .content {
                padding: 25px;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 220px;
            }

            .main-wrapper {
                margin-left: 220px;
            }

            .content {
                padding: 20px;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                bottom: auto;
            }

            .sidebar-brand {
                height: 75px;
            }

            .sidebar nav {
                padding: 15px;
            }

            .sidebar-bottom {
                margin-top: 0;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .topbar {
                padding: 12px 16px;
            }

            .content {
                padding: 20px 12px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-heading h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        {{-- BRAND --}}
        <div class="sidebar-brand">
            <div class="brand-icon">
                <i class="fa-solid fa-pizza-slice"></i>
            </div>

            <div class="brand-text">
                <div class="brand-name">PizzaMozza</div>
                <div class="brand-subtitle">Admin Dashboard</div>
            </div>
        </div>

        {{-- MENU --}}
        <nav>
            <div class="menu-title">Main Menu</div>

            <ul class="menu-list">

                <li class="menu-item">
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-grid-1x2"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.employees.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-people"></i>
                        </span>
                        <span>Data Karyawan</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.customers.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-people"></i>
                        </span>
                        <span>Data Pelanggan</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.products.index') }}" class="menu-link active">
                        <span class="menu-icon">
                            <i class="bi bi-box-seam"></i>
                        </span>
                        <span>Data Produk</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.orders.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-receipt"></i>
                        </span>
                        <span>Pesanan</span>
                    </a>
                </li>

            </ul>
        </nav>

        {{-- SIDEBAR BOTTOM --}}
        <div class="sidebar-bottom">

            <div class="admin-profile">
                <div class="admin-avatar">
                    <i class="bi bi-person"></i>
                </div>

                <div class="admin-info">
                    <strong>
                        {{ auth()->user()->name ?? 'Admin PizzaMozza' }}
                    </strong>
                    <span>PizzaMozza</span>
                </div>
            </div>

            <button type="button"
                    class="logout-button"
                    onclick="openLogoutModal()">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
            </button>

        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <div class="main-wrapper">

        {{-- TOPBAR --}}
<header class="topbar">

    <div class="topbar-title">
       
    </div>

    <div class="topbar-admin">

        <div class="topbar-admin-info">
            <strong>
                {{ auth()->user()->name ?? 'Pengguna PizzaMozza' }}
            </strong>

            <span>
                {{ auth()->user()->role === 'admin' ? 'Administrator' : 'Karyawan' }}
            </span>
        </div>

        <div class="topbar-avatar">
            <i class="bi bi-person"></i>
        </div>

    </div>

</header>

        {{-- CONTENT --}}
        <main class="content">

            {{-- PAGE HEADING --}}
            <div class="page-heading">

                <div>
                    <div class="heading-label">
                        Management
                    </div>

                    <h1>Data Produk</h1>

                    <p>
                        Kelola produk dan varian PizzaMozza.
                    </p>
                </div>

                <a href="{{ route('admin.products.create') }}"
                   class="primary-button">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Produk
                </a>

            </div>

            {{-- NOTIFIKASI BERHASIL --}}
            @if (session('success'))
                <div class="success-alert" role="status">
                    <i class="bi bi-check-circle-fill mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- NOTIFIKASI ERROR --}}
            @if (session('error'))
                <div class="error-alert" role="alert">
                    <i class="bi bi-exclamation-circle-fill mr-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            {{-- VALIDASI ERROR --}}
            @if ($errors->any())
                <div class="error-alert" role="alert">
                    <p class="font-semibold mb-2">
                        Terdapat kesalahan:
                    </p>

                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- TABEL PRODUK --}}
            <div class="table-card">

                <div class="table-card-header">
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
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($products as $product)

                                <tr>

                                    {{-- NAMA PRODUK --}}
                                    <td>
                                        <div>
                                            <p class="font-bold text-gray-800">
                                                {{ $product->name }}
                                            </p>

                                            <p class="text-sm text-gray-500 mt-1">
                                                ID Produk: {{ $product->id }}
                                            </p>
                                        </div>
                                    </td>

                                    {{-- KATEGORI --}}
                                    <td>
                                        <span class="category-badge">
                                            {{ ucfirst($product->category) }}
                                        </span>
                                    </td>

                                    {{-- HARGA --}}
                                    <td class="font-semibold whitespace-nowrap">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>

                                    {{-- STOK --}}
                                    <td>
                                        @if ($product->stock > 0)
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
                                        @if ($product->variants->count() > 0)
                                            <div class="space-y-2">
                                                @foreach ($product->variants as $variant)
                                                    <div class="text-sm text-gray-600">
                                                        <span class="font-medium">
                                                            {{ $variant->name }}
                                                        </span>

                                                        <span class="text-gray-400 mx-1">
                                                            &mdash;
                                                        </span>

                                                        <span>
                                                            Rp {{ number_format($variant->price, 0, ',', '.') }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-gray-400 text-sm">
                                                Tidak ada varian
                                            </span>
                                        @endif
                                    </td>

                                    {{-- AKSI --}}
                                    <td>
                                        <div class="flex flex-wrap justify-center gap-2">

                                            {{-- DETAIL --}}
                                            <a href="{{ route('admin.products.show', $product) }}"
                                               class="action-button detail-button">
                                                <i class="bi bi-eye"></i>
                                                Lihat
                                            </a>

                                            {{-- EDIT --}}
                                            <a href="{{ route('admin.products.edit', $product) }}"
                                               class="action-button edit-button">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </a>

                                            {{-- HAPUS --}}
                                            <button
                                                type="button"
                                                data-action="{{ route('admin.products.destroy', $product) }}"
                                                onclick="bukaModalHapus(
                                                    this,
                                                    {{ Illuminate\Support\Js::from($product->name) }}
                                                )"
                                                class="action-button delete-button">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="empty-state">

                                        <i class="bi bi-box-seam"></i>

                                        <p class="font-bold text-gray-700">
                                            Belum ada produk.
                                        </p>

                                        <p class="text-gray-400 text-sm mt-1">
                                            Tambahkan produk pertama PizzaMozza.
                                        </p>

                                        <a href="{{ route('admin.products.create') }}"
                                           class="inline-flex items-center gap-2 mt-5 primary-button">
                                            <i class="bi bi-plus-lg"></i>
                                            Tambah Produk
                                        </a>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>

            {{-- FOOTER --}}
            <footer class="footer">
                &copy; {{ date('Y') }} PizzaMozza. All rights reserved.
            </footer>

        </main>
    </div>

    {{-- MODAL KONFIRMASI HAPUS --}}
    <div id="modalHapus" class="modal-overlay">

        <div class="modal-box" onclick="event.stopPropagation()">

            <div class="modal-icon">
                <i class="bi bi-trash"></i>
            </div>

            <h3>Konfirmasi Hapus Produk</h3>

            <p id="pesanModalHapus">
                Apakah Anda yakin ingin menghapus produk ini?
            </p>

            <p class="text-red-500 text-xs mb-5">
                Produk yang dihapus tidak dapat dipulihkan.
            </p>

            <div class="modal-actions">

                <button type="button"
                        class="cancel-button"
                        id="tombolBatalHapus"
                        onclick="tutupModalHapus()">
                    Tidak, Batal
                </button>

                <form id="formHapusProduk"
                      action=""
                      method="POST"
                      style="flex: 1;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="confirm-button"
                            style="width: 100%;">
                        Ya, Hapus
                    </button>

                </form>

            </div>
        </div>
    </div>

    {{-- MODAL KONFIRMASI LOGOUT --}}
    <div id="logoutModal" class="modal-overlay">

        <div class="modal-box" onclick="event.stopPropagation()">

            <div class="modal-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>

            <h3>Konfirmasi Keluar</h3>

            <p>
                Apakah Anda yakin ingin keluar dari akun?
            </p>

            <div class="modal-actions">

                <button type="button"
                        class="cancel-button"
                        onclick="closeLogoutModal()">
                    Tidak
                </button>

                <form action="{{ route('logout') }}"
                      method="POST"
                      style="flex: 1;">

                    @csrf

                    <button type="submit"
                            class="confirm-button"
                            style="width: 100%;">
                        Ya, Keluar
                    </button>

                </form>

            </div>
        </div>
    </div>

    {{-- JAVASCRIPT --}}
    <script>
        const modalHapus = document.getElementById('modalHapus');
        const formHapusProduk = document.getElementById('formHapusProduk');
        const pesanModalHapus = document.getElementById('pesanModalHapus');
        const tombolBatalHapus = document.getElementById('tombolBatalHapus');
        const logoutModal = document.getElementById('logoutModal');

        let tombolPemicuHapus = null;

        // BUKA MODAL HAPUS
        function bukaModalHapus(tombol, namaProduk) {
            tombolPemicuHapus = tombol;

            formHapusProduk.action = tombol.dataset.action;

            pesanModalHapus.textContent =
                'Apakah Anda yakin ingin menghapus produk "' +
                namaProduk +
                '"?';

            modalHapus.classList.add('show');
            document.body.style.overflow = 'hidden';

            tombolBatalHapus.focus();
        }

        // TUTUP MODAL HAPUS
        function tutupModalHapus() {
            modalHapus.classList.remove('show');
            document.body.style.overflow = '';

            if (tombolPemicuHapus) {
                tombolPemicuHapus.focus();
            }

            tombolPemicuHapus = null;
        }

        // BUKA MODAL LOGOUT
        function openLogoutModal() {
            logoutModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        // TUTUP MODAL LOGOUT
        function closeLogoutModal() {
            logoutModal.classList.remove('show');
            document.body.style.overflow = '';
        }

        // KLIK AREA LUAR MODAL HAPUS
        modalHapus.addEventListener('click', function(event) {
            if (event.target === modalHapus) {
                tutupModalHapus();
            }
        });

        // KLIK AREA LUAR MODAL LOGOUT
        logoutModal.addEventListener('click', function(event) {
            if (event.target === logoutModal) {
                closeLogoutModal();
            }
        });

        // TOMBOL ESCAPE
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                if (modalHapus.classList.contains('show')) {
                    tutupModalHapus();
                }

                if (logoutModal.classList.contains('show')) {
                    closeLogoutModal();
                }
            }
        });
    </script>

</body>
</html>
