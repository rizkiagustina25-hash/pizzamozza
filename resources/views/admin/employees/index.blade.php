<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Karyawan - PizzaMozza</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #941919;
            --primary-dark: #790f0f;
            --primary-light: #bd3030;
            --background: #f5f6fb;
            --text: #292323;
            --muted: #858585;
            --border: #e9e5e5;
            --green: #159447;
            --blue: #3266c0;
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

        button,
        input,
        select {
            font-family: inherit;
        }

        button {
            cursor: pointer;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 265px;
            display: flex;
            flex-direction: column;
            background: var(--primary);
            color: white;
            z-index: 100;
        }

        .sidebar-brand {
            height: 88px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #ffffff25;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--primary-light);
            font-size: 21px;
        }

        .brand-name {
            font-size: 23px;
            font-weight: 700;
        }

        .brand-subtitle {
            margin-top: 3px;
            font-size: 11px;
            color: #f5dede;
        }

        .sidebar-menu {
            flex: 1;
            padding: 22px 10px;
        }

        .menu-title {
            margin: 0 10px 15px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #f5dede;
        }

        .menu-link {
            min-height: 45px;
            padding: 0 14px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 9px;
            color: white;
            font-size: 13px;
            font-weight: 600;
            transition: .25s ease;
        }

        .menu-link:hover {
            background: #b52d2d;
            padding-left: 19px;
        }

        .menu-link.active {
            background: #b52d2d;
            box-shadow: 0 4px 12px #60000025;
        }

        .menu-icon {
            width: 21px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-bottom {
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
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #bd3030;
        }

        .admin-info strong {
            display: block;
            font-size: 12px;
        }

        .admin-info span {
            display: block;
            margin-top: 3px;
            font-size: 10px;
            color: #f5dede;
        }

        .logout-button {
            width: 100%;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            border-radius: 8px;
            background: white;
            color: var(--primary);
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .logout-button:hover {
            background: #ffeaea;
            transform: translateY(-2px);
        }

        /* ================= MAIN ================= */

        .main-wrapper {
            width: calc(100% - 265px);
            min-height: 100vh;
            margin-left: 265px;
        }

        .topbar {
            height: 70px;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .topbar-admin {
            display: flex;
            align-items: center;
            gap: 12px;
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
            color: #999;
        }

        .topbar-avatar {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #fff0f0;
            color: var(--primary);
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 30px 32px 45px;
            max-width: 1600px;
            margin: auto;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
            animation: fadeDown .5s ease;
        }

        .heading-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .heading-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #fce8e8;
            color: var(--primary);
            font-size: 25px;
        }

        .page-heading h1 {
            font-size: 27px;
            font-weight: 700;
        }

        .page-heading p {
            margin-top: 6px;
            font-size: 13px;
            color: #777;
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 19px;
            border-radius: 9px;
            background: var(--primary);
            color: white;
            font-size: 13px;
            font-weight: 600;
            transition: .25s;
            box-shadow: 0 4px 10px #94191920;
        }

        .primary-button:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 7px 15px #94191935;
        }

        .primary-button:active {
            transform: scale(.97);
        }

        /* ================= STATISTICS ================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            position: relative;
            min-height: 125px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 17px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: 0 3px 10px #00000005;
            overflow: hidden;
            transition: .3s ease;
            animation: fadeUp .6s ease both;
        }

        .stat-card:nth-child(2) {
            animation-delay: .1s;
        }

        .stat-card:nth-child(3) {
            animation-delay: .2s;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px #00000012;
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            right: -35px;
            bottom: -65px;
            border-radius: 50%;
            background: #94191908;
            transition: .3s;
        }

        .stat-card:hover::after {
            transform: scale(2);
        }

        .stat-icon {
            width: 62px;
            height: 62px;
            min-width: 62px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            font-size: 26px;
            transition: .3s;
        }

        .stat-card:hover .stat-icon {
            transform: rotate(-8deg) scale(1.08);
        }

        .stat-icon.red {
            background: #fde8e8;
            color: #b42323;
        }

        .stat-icon.green {
            background: #e4f7e9;
            color: #159447;
        }

        .stat-icon.blue {
            background: #e8efff;
            color: #3266c0;
        }

        .stat-label {
            font-size: 13px;
            color: #666;
        }

        .stat-number {
            margin-top: 7px;
            font-size: 30px;
            font-weight: 700;
        }

        .stat-number small {
            font-size: 13px;
            font-weight: 400;
            color: #777;
        }

        /* ================= ALERT ================= */

        .success-alert,
        .error-alert {
            padding: 14px 17px;
            margin-bottom: 20px;
            border-radius: 9px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: fadeDown .4s ease;
        }

        .success-alert {
            border: 1px solid #bbf7d0;
            background: #dcfce7;
            color: #15803d;
        }

        .error-alert {
            border: 1px solid #fecaca;
            background: #fee2e2;
            color: #b42323;
        }

        /* ================= TABLE ================= */

        .table-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: 0 3px 12px #00000005;
            overflow: hidden;
            animation: fadeUp .7s ease;
        }

        .table-header {
            padding: 20px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .table-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .table-title i {
            font-size: 23px;
            color: var(--primary);
        }

        .table-title h2 {
            font-size: 19px;
        }

        .table-tools {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            top: 50%;
            left: 13px;
            transform: translateY(-50%);
            color: #777;
            pointer-events: none;
        }

        .search-box input {
            width: 270px;
            height: 42px;
            padding: 0 13px 0 38px;
            border: 1px solid #ddd;
            border-radius: 9px;
            outline: none;
            font-size: 12px;
            transition: .25s;
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px #94191912;
            width: 290px;
        }

        .filter-select {
            height: 42px;
            padding: 0 13px;
            border: 1px solid #ddd;
            border-radius: 9px;
            background: white;
            outline: none;
            font-size: 12px;
            cursor: pointer;
            transition: .2s;
        }

        .filter-select:focus {
            border-color: var(--primary);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            padding: 0 20px;
        }

        .employee-table {
            width: 100%;
            min-width: 750px;
            border-collapse: collapse;
        }

        .employee-table thead {
            background: #fceaea;
        }

        .employee-table th {
            padding: 16px;
            text-align: left;
            font-size: 12px;
            color: #59433d;
            border-bottom: 1px solid #eadada;
        }

        .employee-table td {
            padding: 13px 16px;
            border-bottom: 1px solid #eee;
            font-size: 13px;
            vertical-align: middle;
        }

        .employee-table tbody tr {
            transition: .2s;
        }

        .employee-table tbody tr:hover {
            background: #fff3f3;
        }

        .employee-table tbody tr:last-child td {
            border-bottom: none;
        }

        .employee-avatar {
            width: 43px;
            height: 43px;
            min-width: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #fce8e8;
            color: var(--primary);
            font-size: 17px;
            font-weight: 700;
        }

        .employee-identity {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .employee-name {
            font-weight: 600;
            color: #292323;
        }

        .employee-email {
            color: #666;
        }

        .role-badge {
            display: inline-block;
            padding: 6px 13px;
            border-radius: 20px;
            background: #e8efff;
            color: #315da8;
            font-size: 11px;
            font-weight: 600;
        }

        /* ================= ACTION BUTTON ================= */

        .action-group {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .action-button {
            position: relative;
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            border: 1px solid;
            font-size: 16px;
            cursor: pointer;
            transition: .25s;
        }

        .edit-button {
            background: #fff7ed;
            border-color: #fed7aa;
            color: #ea580c;
        }

        .delete-button {
            background: #fff1f2;
            border-color: #fecdd3;
            color: #e11d48;
        }

        .action-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 12px #00000012;
        }

        .edit-button:hover {
            background: #ffedd5;
        }

        .delete-button:hover {
            background: #ffe0e4;
        }

        .empty-state {
            padding: 55px 20px !important;
            text-align: center;
            color: #999;
        }

        .empty-state i {
            display: block;
            margin-bottom: 12px;
            font-size: 42px;
            color: #c9a0a0;
        }

        .table-footer {
            padding: 18px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #777;
        }

        /* ================= MODAL ================= */

        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #00000065;
            backdrop-filter: blur(4px);
        }

        .modal-overlay.show {
            display: flex;
            animation: fadeIn .2s ease;
        }

        .modal-box {
            width: 100%;
            max-width: 390px;
            padding: 30px;
            position: relative;
            background: white;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 20px 60px #00000030;
            animation: modalUp .3s ease;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 17px;
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 50%;
            background: #f5f5f5;
            color: #666;
            font-size: 17px;
        }

        .modal-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #ffe4e6;
            color: #dc2626;
            font-size: 27px;
        }

        .modal-box h3 {
            margin-bottom: 10px;
            font-size: 21px;
        }

        .modal-box p {
            margin-bottom: 25px;
            color: #777;
            font-size: 13px;
            line-height: 1.6;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
        }

        .modal-actions button {
            flex: 1;
            height: 44px;
            border: none;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .cancel-modal {
            background: #f1f2f5;
            color: #555;
        }

        .confirm-delete {
            background: #dc2626;
            color: white;
        }

        .cancel-modal:hover {
            background: #e5e7eb;
        }

        .confirm-delete:hover {
            background: #b91c1c;
        }

        /* ================= TOAST ================= */

        .toast-container {
            position: fixed;
            top: 20px;
            right: 25px;
            z-index: 3000;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast {
            min-width: 300px;
            max-width: 400px;
            padding: 16px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px #00000018;
            animation: toastIn .35s ease;
        }

        .toast i {
            font-size: 23px;
        }

        .toast.success i {
            color: var(--green);
        }

        .toast.error i {
            color: #dc2626;
        }

        .toast-content strong {
            display: block;
            font-size: 13px;
        }

        .toast-content span {
            display: block;
            margin-top: 4px;
            color: #777;
            font-size: 11px;
        }

        .toast-close {
            margin-left: auto;
            border: none;
            background: transparent;
            color: #888;
            font-size: 17px;
        }

        /* ================= ANIMATIONS ================= */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes modalUp {
            from {
                opacity: 0;
                transform: translateY(20px) scale(.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes toastIn {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .table-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .table-tools {
                width: 100%;
            }

            .search-box {
                flex: 1;
            }

            .search-box input {
                width: 100%;
            }

            .search-box input:focus {
                width: 100%;
            }
        }

        @media(max-width: 700px) {
            .sidebar {
                width: 265px;
            }

            .main-wrapper {
                width: calc(100% - 265px);
                margin-left: 265px;
            }

            .content {
                padding: 20px 15px;
            }

            .topbar {
                padding: 0 15px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .table-tools {
                align-items: stretch;
                flex-direction: column;
            }

            .filter-select {
                width: 100%;
            }

            .table-footer {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media(prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    {{-- ================= SIDEBAR ================= --}}

    <aside class="sidebar">

        <div class="sidebar-brand">

            <div class="brand-icon">
                <i class="bi bi-pizza"></i>
            </div>

            <div>
                <div class="brand-name">PizzaMozza</div>
                <div class="brand-subtitle">Admin Dashboard</div>
            </div>

        </div>

        <nav class="sidebar-menu">

            <div class="menu-title">MAIN MENU</div>

            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <span class="menu-icon"><i class="bi bi-grid-1x2"></i></span>
                Dashboard
            </a>

            <a href="{{ route('admin.employees.index') }}"
                class="menu-link active">
                <span class="menu-icon"><i class="bi bi-people"></i></span>
                Data Karyawan
            </a>

            <a href="{{ route('admin.customers.index') }}" class="menu-link">
                <span class="menu-icon"><i class="bi bi-person-vcard"></i></span>
                Data Pelanggan
            </a>

            <a href="{{ route('admin.products.index') }}" class="menu-link">
                <span class="menu-icon"><i class="bi bi-box-seam"></i></span>
                Data Produk
            </a>

            <a href="{{ route('admin.orders.index') }}" class="menu-link">
                <span class="menu-icon"><i class="bi bi-receipt"></i></span>
                Pesanan
            </a>

            <a href="{{ route('admin.sales-report.index') }}" class="menu-link">
                <span class="menu-icon"><i class="bi bi-bar-chart-line"></i></span>
                Laporan Penjualan
            </a>

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

                <button type="submit" class="logout-button">
                    <i class="bi bi-box-arrow-right"></i>
                    Keluar
                </button>
            </form>

        </div>

    </aside>


    {{-- ================= MAIN CONTENT ================= --}}

    <div class="main-wrapper">

        <header class="topbar">

            <div class="topbar-admin">

                <div class="topbar-admin-info">
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

                <div class="heading-left">

                    <div class="heading-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div>
                        <h1>Data Karyawan</h1>
                        <p>Kelola informasi dan akun karyawan PizzaMozza.</p>
                    </div>

                </div>

                <a href="{{ route('admin.employees.create') }}"
                    class="primary-button">

                    <i class="bi bi-plus-lg"></i>
                    Tambah Karyawan

                </a>

            </div>


            {{-- NOTIFIKASI LARAVEL --}}

            @if (session('success'))
                <div class="success-alert">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="error-alert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ session('error') }}
                </div>
            @endif


            {{-- STATISTIK --}}

            <section class="stats-grid">

                <div class="stat-card">

                    <div class="stat-icon red">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div>
                        <div class="stat-label">Total Karyawan</div>

                        <div class="stat-number">
                            {{ $employees->count() }}
                            <small>orang</small>
                        </div>
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon green">
                        <i class="bi bi-person-check-fill"></i>
                    </div>

                    <div>
                        <div class="stat-label">Akun Karyawan</div>

                        <div class="stat-number">
                            {{ $employees->count() }}
                            <small>terdaftar</small>
                        </div>
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon blue">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <div>
                        <div class="stat-label">Pengelolaan Akun</div>

                        <div class="stat-number" style="font-size:20px;">
                            Aktif
                        </div>
                    </div>

                </div>

            </section>


            {{-- DAFTAR KARYAWAN --}}

            <section class="table-card">

                <div class="table-header">

                    <div class="table-title">
                        <i class="bi bi-card-list"></i>
                        <h2>Daftar Karyawan</h2>
                    </div>

                    <div class="table-tools">

                        <div class="search-box">

                            <i class="bi bi-search"></i>

                            <input type="text"
                                id="searchEmployee"
                                placeholder="Cari nama atau email..."
                                autocomplete="off">

                        </div>

                        <select id="filterRole" class="filter-select">

                            <option value="">Semua Role</option>
                            <option value="karyawan">Karyawan</option>

                        </select>

                    </div>

                </div>


                {{-- TABEL --}}

                <div class="table-wrapper">

                    <table class="employee-table">

                        <thead>

                            <tr>
                                <th width="65">No.</th>
                                <th>Karyawan</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th width="120">Aksi</th>
                            </tr>

                        </thead>

                        <tbody id="employeeTableBody">

                            @forelse ($employees as $employee)

                                <tr class="employee-row">

                                    <td>{{ $loop->iteration }}</td>

                                    <td>

                                        <div class="employee-identity">

                                            <div class="employee-avatar">

                                                {{ strtoupper(substr($employee->name ?? 'K', 0, 1)) }}

                                            </div>

                                            <span class="employee-name">
                                                {{ $employee->name }}
                                            </span>

                                        </div>

                                    </td>

                                    <td class="employee-email">
                                        {{ $employee->email }}
                                    </td>

                                    <td>

                                        <span class="role-badge">
                                            Karyawan
                                        </span>

                                    </td>

                                    <td>

                                        <div class="action-group">

                                            {{-- EDIT --}}

                                            <a href="{{ route('admin.employees.edit', $employee) }}"
                                                class="action-button edit-button"
                                                title="Edit Karyawan">

                                                <i class="bi bi-pencil"></i>

                                            </a>


                                            {{-- HAPUS --}}

                                            <form action="{{ route('admin.employees.destroy', $employee) }}"
                                                method="POST"
                                                class="delete-form">

                                                @csrf
                                                @method('DELETE')

                                                <button type="button"
                                                    class="action-button delete-button open-delete-modal"
                                                    title="Hapus Karyawan"
                                                    data-name="{{ $employee->name }}">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="empty-state">

                                        <i class="bi bi-people"></i>

                                        <strong>Belum ada data karyawan</strong>

                                        <p style="margin-top:8px;">
                                            Silakan tambahkan karyawan baru.
                                        </p>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>


                    {{-- HASIL PENCARIAN KOSONG --}}

                    <div id="noSearchResult"
                        class="empty-state"
                        style="display:none;">

                        <i class="bi bi-search"></i>

                        <strong>Data tidak ditemukan</strong>

                        <p style="margin-top:8px;">
                            Coba gunakan kata kunci lain.
                        </p>

                    </div>

                </div>


                <div class="table-footer">

                    <span id="employeeCount">
                        Menampilkan {{ $employees->count() }} data karyawan
                    </span>

                    <span>
                        <i class="bi bi-check-circle-fill"
                            style="color:var(--green);"></i>
                        Data karyawan PizzaMozza
                    </span>

                </div>

            </section>

        </main>

    </div>


    {{-- ================= MODAL HAPUS ================= --}}

    <div class="modal-overlay" id="deleteModal">

        <div class="modal-box">

            <button type="button"
                class="modal-close"
                id="closeModal">

                <i class="bi bi-x-lg"></i>

            </button>

            <div class="modal-icon">
                <i class="bi bi-trash3"></i>
            </div>

            <h3>Hapus Karyawan?</h3>

            <p>
                Apakah kamu yakin ingin menghapus karyawan
                <strong id="employeeDeleteName"></strong>?
                Data yang dihapus tidak dapat dikembalikan.
            </p>

            <div class="modal-actions">

                <button type="button"
                    class="cancel-modal"
                    id="cancelDelete">

                    Batal

                </button>

                <button type="button"
                    class="confirm-delete"
                    id="confirmDelete">

                    <i class="bi bi-trash"></i>
                    Hapus

                </button>

            </div>

        </div>

    </div>


    {{-- ================= TOAST ================= --}}

    <div class="toast-container" id="toastContainer"></div>


    {{-- ================= JAVASCRIPT ================= --}}

    <script>

        /* PENCARIAN KARYAWAN */

        const searchInput = document.getElementById('searchEmployee');
        const filterRole = document.getElementById('filterRole');
        const rows = document.querySelectorAll('.employee-row');
        const noResult = document.getElementById('noSearchResult');
        const employeeCount = document.getElementById('employeeCount');

        function filterEmployees() {

            const keyword = searchInput.value.toLowerCase().trim();
            const role = filterRole.value.toLowerCase();

            let visibleCount = 0;

            rows.forEach(row => {

                const name = row.querySelector('.employee-name')
                    ?.textContent.toLowerCase() || '';

                const email = row.querySelector('.employee-email')
                    ?.textContent.toLowerCase() || '';

                const rowRole = row.querySelector('.role-badge')
                    ?.textContent.toLowerCase() || '';

                const matchesSearch =
                    name.includes(keyword) || email.includes(keyword);

                const matchesRole =
                    role === '' || rowRole.includes(role);

                if (matchesSearch && matchesRole) {

                    row.style.display = '';
                    visibleCount++;

                } else {

                    row.style.display = 'none';

                }

            });

            noResult.style.display =
                visibleCount === 0 && rows.length > 0 ? 'block' : 'none';

            employeeCount.textContent =
                `Menampilkan ${visibleCount} data karyawan`;
        }

        searchInput.addEventListener('input', filterEmployees);
        filterRole.addEventListener('change', filterEmployees);


        /* MODAL HAPUS */

        const deleteModal = document.getElementById('deleteModal');
        const closeModal = document.getElementById('closeModal');
        const cancelDelete = document.getElementById('cancelDelete');
        const confirmDelete = document.getElementById('confirmDelete');
        const employeeDeleteName = document.getElementById('employeeDeleteName');

        let selectedDeleteForm = null;

        document.querySelectorAll('.open-delete-modal').forEach(button => {

            button.addEventListener('click', function () {

                selectedDeleteForm = this.closest('form');

                employeeDeleteName.textContent =
                    this.dataset.name || 'karyawan ini';

                deleteModal.classList.add('show');

            });

        });

        function closeDeleteModal() {

            deleteModal.classList.remove('show');
            selectedDeleteForm = null;

        }

        closeModal.addEventListener('click', closeDeleteModal);
        cancelDelete.addEventListener('click', closeDeleteModal);

        deleteModal.addEventListener('click', function(event) {

            if (event.target === deleteModal) {
                closeDeleteModal();
            }

        });

        confirmDelete.addEventListener('click', function() {

            if (selectedDeleteForm) {
                selectedDeleteForm.submit();
            }

        });

        document.addEventListener('keydown', function(event) {

            if (event.key === 'Escape') {
                closeDeleteModal();
            }

        });


        /* NOTIFIKASI TOAST */

        function showToast(message, type = 'success') {

            const container = document.getElementById('toastContainer');

            const toast = document.createElement('div');

            toast.className = `toast ${type}`;

            const icon = type === 'success'
                ? 'bi-check-circle-fill'
                : 'bi-exclamation-circle-fill';

            const title = type === 'success'
                ? 'Berhasil!'
                : 'Perhatian!';

            const content = document.createElement('div');
            content.className = 'toast-content';

            const strong = document.createElement('strong');
            strong.textContent = title;

            const span = document.createElement('span');
            span.textContent = message;

            content.appendChild(strong);
            content.appendChild(span);

            const iconElement = document.createElement('i');
            iconElement.className = `bi ${icon}`;

            const closeButton = document.createElement('button');
            closeButton.className = 'toast-close';
            closeButton.type = 'button';
            closeButton.innerHTML = '&times;';

            closeButton.addEventListener('click', () => {
                toast.remove();
            });

            toast.appendChild(iconElement);
            toast.appendChild(content);
            toast.appendChild(closeButton);

            container.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 4000);

        }


        /* NOTIFIKASI DARI LARAVEL */

        @if (session('success'))
            showToast(@json(session('success')), 'success');
        @endif

        @if (session('error'))
            showToast(@json(session('error')), 'error');
        @endif

    </script>

</body>
</html>