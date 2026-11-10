<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Karyawan - PizzaMozza</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        /* =========================================
           PENGATURAN GLOBAL
        ========================================= */

        :root {
            --sidebar-width: 265px;
            --primary: #941919;
            --primary-hover: #b52d2d;
            --background: #f7f8fa;
            --border: #e5e0dd;
            --text: #292323;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
            cursor: pointer;
        }

        /* =========================================
           SIDEBAR - LEBAR DIKUNCI 265PX
        ========================================= */

        .sidebar {
            position: fixed !important;
            top: 0;
            left: 0;
            bottom: 0;

            width: 265px !important;
            min-width: 265px !important;
            max-width: 265px !important;

            height: 100vh;

            display: flex;
            flex-direction: column;
            flex-shrink: 0;

            background: var(--primary);
            color: #ffffff;

            overflow-x: hidden;
            overflow-y: auto;

            z-index: 1000;
        }

        /* LOGO */

        .sidebar-brand {
            width: 100%;
            height: 88px;
            min-height: 88px;

            padding: 18px 20px;

            display: flex;
            align-items: center;
            gap: 12px;

            border-bottom: 1px solid #ffffff25;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;
            background: var(--primary-hover);

            font-size: 18px;
        }

        .brand-name {
            font-size: 23px;
            font-weight: 700;
            line-height: 1.2;
        }

        .brand-subtitle {
            margin-top: 3px;
            font-size: 11px;
            color: #f5dede;
        }

        /* MENU SIDEBAR */

        .sidebar-menu {
            width: 100%;
            flex: 1;
            padding: 22px 8px;
        }

        .menu-title {
            margin: 0 10px 15px;

            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;

            color: #f5dede;
        }

        .menu-list {
            list-style: none;
        }

        .menu-item {
            width: 100%;
            margin-bottom: 5px;
        }

        .menu-link {
            width: 100%;
            min-height: 45px;

            padding: 0 14px;

            display: flex;
            align-items: center;
            gap: 12px;

            border-radius: 9px;

            color: #ffffff;
            font-size: 13px;
            font-weight: 600;

            white-space: nowrap;
            transition: .2s ease;
        }

        .menu-link:hover,
        .menu-link.active {
            background: var(--primary-hover);
            color: #ffffff;
        }

        .menu-icon {
            width: 21px;
            min-width: 21px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 17px;
        }

        /* PROFIL ADMIN */

        .sidebar-bottom {
            width: 100%;
            margin-top: auto;
            padding: 15px 10px;

            border-top: 1px solid #ffffff25;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 5px 10px;
            margin-bottom: 13px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            min-width: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;
            background: var(--primary-hover);

            font-size: 15px;
        }

        .admin-info strong {
            display: block;
            font-size: 12px;
            font-weight: 700;
        }

        .admin-info span {
            display: block;
            margin-top: 3px;

            font-size: 10px;
            color: #f5dede;
        }

        /* TOMBOL KELUAR */

        .logout-button {
            width: 100%;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            border: none;
            border-radius: 8px;

            background: #ffffff;
            color: var(--primary);

            font-size: 12px;
            font-weight: 600;
        }

        .logout-button:hover {
            background: #f5dede;
        }

        /* =========================================
           MAIN CONTENT
        ========================================= */

        .main-wrapper {
            width: calc(100% - 265px);
            min-height: 100vh;

            margin-left: 265px;
        }

        /* TOPBAR */

        .topbar {
            width: 100%;
            height: 70px;

            padding: 0 32px;

            display: flex;
            align-items: center;
            justify-content: flex-end;

            background: #ffffff;
            border-bottom: 1px solid #e9e9e9;
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
        }

        .topbar-admin-info span {
            display: block;
            margin-top: 3px;

            font-size: 10px;
            color: #999999;
        }

        .topbar-avatar {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;
            background: #fff0f0;

            color: var(--primary);
        }

        /* =========================================
           KONTEN DATA KARYAWAN
        ========================================= */

        .content {
            width: 100%;
            max-width: 1500px;

            margin: 0 auto;
            padding: 30px 32px 45px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;

            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-size: 27px;
            font-weight: 700;
            color: #292323;
        }

        .page-heading p {
            margin-top: 6px;
            color: #777777;
            font-size: 13px;
        }

        /* TOMBOL TAMBAH */

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 12px 18px;

            border: none;
            border-radius: 9px;

            background: var(--primary);
            color: #ffffff;

            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;

            transition: .2s;
        }

        .primary-button:hover {
            background: var(--primary-hover);
            color: #ffffff;
        }

        /* NOTIFIKASI */

        .success-alert {
            margin-bottom: 22px;
            padding: 15px 20px;

            border: 1px solid #bbf7d0;
            border-radius: 10px;

            background: #dcfce7;
            color: #15803d;

            font-size: 13px;
        }

        /* =========================================
           TABEL KARYAWAN
        ========================================= */

        .table-card {
            width: 100%;
            overflow: hidden;

            background: #ffffff;
            border: 1px solid #ded8d4;
            border-radius: 12px;

            box-shadow: 0 2px 8px #00000008;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .employee-table {
            width: 100%;
            min-width: 700px;

            border-collapse: collapse;
            border-spacing: 0;
        }

        .employee-table thead {
            background: #faf1f1;
        }

        .employee-table th {
            padding: 16px 20px;

            text-align: left;

            font-size: 12px;
            font-weight: 700;
            color: #59433d;

            border: 1px solid #e5dcd8;
            white-space: nowrap;
        }

        .employee-table td {
            padding: 16px 20px;

            border: 1px solid #e9e2de;

            font-size: 13px;
            color: #4b403c;

            vertical-align: middle;
        }

        .employee-table tbody tr:nth-child(even) {
            background: #fcf9f8;
        }

        .employee-table tbody tr:hover {
            background: #fff1ef;
        }

        /* IDENTITAS KARYAWAN */

        .employee-avatar {
            width: 40px;
            height: 40px;
            min-width: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;
            background: #f8e8e8;
            color: var(--primary);

            font-size: 18px;
        }

        .employee-name {
            font-size: 13px;
            font-weight: 600;
            color: #292323;
        }

        .employee-email {
            font-size: 13px;
            color: #594f4b;
        }

        /* ROLE */

        .role-badge {
            display: inline-block;

            padding: 6px 12px;

            border-radius: 20px;

            background: #e8efff;
            color: #315da8;

            font-size: 11px;
            font-weight: 600;
        }

        /* TOMBOL AKSI */

        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;

            padding: 8px 13px;

            border: none;
            border-radius: 7px;

            font-size: 12px;
            font-weight: 600;

            transition: .2s;
        }

        .edit-button {
            background: #e5efff;
            color: #2563a8;
        }

        .edit-button:hover {
            background: #cbdfff;
        }

        .delete-button {
            background: #fee2e2;
            color: #b42323;
        }

        .delete-button:hover {
            background: #fecaca;
        }

        /* DATA KOSONG */

        .empty-state {
            padding: 55px 20px !important;
            text-align: center;
        }

        .empty-state i {
            display: block;
            margin-bottom: 12px;

            color: #c9a0a0;
            font-size: 42px;
        }

        /* =========================================
           RESPONSIVE
           SIDEBAR TETAP 265PX
        ========================================= */

        @media (max-width: 700px) {

            .sidebar {
                width: 265px !important;
                min-width: 265px !important;
                max-width: 265px !important;
            }

            .main-wrapper {
                width: calc(100% - 265px) !important;
                margin-left: 265px !important;
            }

            .sidebar-brand {
                justify-content: flex-start;
                padding: 18px 20px;
            }

            .brand-text,
            .menu-title,
            .menu-link > span:last-child,
            .admin-info,
            .logout-button span {
                display: block;
            }

            .sidebar-menu {
                padding: 22px 8px;
            }

            .menu-link {
                justify-content: flex-start;
                padding: 0 14px;
            }

            .sidebar-bottom {
                padding: 15px 10px;
            }

            .admin-profile {
                justify-content: flex-start;
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
    </style>
</head>

<body>

    {{-- =========================================
         SIDEBAR
    ========================================= --}}

    <aside class="sidebar">

        {{-- LOGO --}}

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

        <nav class="sidebar-menu">

            <div class="menu-title">MAIN MENU</div>

            <ul class="menu-list">

                <li class="menu-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                        <span class="menu-icon">
                            <i class="bi bi-grid-1x2"></i>
                        </span>

                        <span>Dashboard</span>

                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.employees.index') }}"
                       class="menu-link {{ request()->routeIs('admin.employees.*') ? 'active' : '' }}">

                        <span class="menu-icon">
                            <i class="bi bi-people"></i>
                        </span>

                        <span>Data Karyawan</span>

                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.customers.index') }}"
                       class="menu-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">

                        <span class="menu-icon">
                            <i class="bi bi-person-vcard"></i>
                        </span>

                        <span>Data Pelanggan</span>

                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.products.index') }}"
                       class="menu-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">

                        <span class="menu-icon">
                            <i class="bi bi-box-seam"></i>
                        </span>

                        <span>Data Produk</span>

                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.orders.index') }}"
                       class="menu-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">

                        <span class="menu-icon">
                            <i class="bi bi-receipt"></i>
                        </span>

                        <span>Pesanan</span>

                    </a>
                </li>

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

                <div class="admin-avatar">
                    <i class="bi bi-person"></i>
                </div>

                <div class="admin-info">

                    <strong>
                        {{ auth()->user()->name ?? 'Admin PizzaMozza' }}
                    </strong>

                    <span>Administrator</span>

                </div>

            </div>

            {{-- LOGOUT --}}

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit" class="logout-button">

                    <i class="bi bi-box-arrow-right"></i>

                    <span>Keluar</span>

                </button>

            </form>

        </div>

    </aside>


    {{-- =========================================
         MAIN CONTENT
    ========================================= --}}

    <div class="main-wrapper">

        {{-- TOPBAR --}}

        <header class="topbar">

            <div class="topbar-admin">

                <div class="topbar-admin-info">

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


        {{-- =====================================
             KONTEN DATA KARYAWAN
        ====================================== --}}

        <main class="content">

            {{-- JUDUL HALAMAN --}}

            <div class="page-heading">

                <div>

                    <h1>Data Karyawan</h1>

                    <p>Kelola data karyawan PizzaMozza.</p>

                </div>

                <a href="{{ route('admin.employees.create') }}"
                   class="primary-button">

                    <i class="bi bi-plus-lg"></i>

                    Tambah Karyawan

                </a>

            </div>


            {{-- NOTIFIKASI --}}

            @if (session('success'))

                <div class="success-alert">

                    <i class="bi bi-check-circle-fill"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- TABEL KARYAWAN --}}

            <div class="table-card">

                <div class="table-wrapper">

                    <table class="employee-table">

                        <thead>

                            <tr>
                                <th style="width: 65px;">No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th style="width: 190px;">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($employees as $employee)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>

                                        <div style="display: flex; align-items: center; gap: 12px;">

                                            <div class="employee-avatar">
                                                <i class="bi bi-person"></i>
                                            </div>

                                            <div class="employee-name">
                                                {{ $employee->name }}
                                            </div>

                                        </div>

                                    </td>

                                    <td>

                                        <span class="employee-email">
                                            {{ $employee->email }}
                                        </span>

                                    </td>

                                    <td>

                                        <span class="role-badge">
                                            Karyawan
                                        </span>

                                    </td>

                                    <td>

                                        <div style="display: flex; align-items: center; gap: 7px;">

                                            {{-- EDIT --}}

                                            <a href="{{ route('admin.employees.edit', $employee) }}"
                                               class="action-button edit-button">

                                                <i class="bi bi-pencil-square"></i>

                                                Edit

                                            </a>

                                            {{-- HAPUS --}}

                                            <form action="{{ route('admin.employees.destroy', $employee) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="action-button delete-button">

                                                    <i class="bi bi-trash"></i>

                                                    Hapus

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="empty-state">

                                        <i class="bi bi-people"></i>

                                        <strong>Belum ada karyawan</strong>

                                        <p style="margin-top: 8px; color: #999;">
                                            Silakan tambahkan karyawan baru.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

</body>

</html>