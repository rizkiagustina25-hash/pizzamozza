<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan - PizzaMozza</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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

        .sidebar-brand {
            height: 88px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #ffffff25;
            flex-shrink: 0;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #b52d2d;
            display: grid;
            place-items: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 21px;
            font-weight: 700;
            line-height: 1.1;
        }

        .brand-subtitle {
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
            font-weight: 700;
            letter-spacing: 1px;
        }

        .menu-list {
            list-style: none;
        }

        .menu-item {
            margin-bottom: 6px;
        }

        .menu-link {
            min-height: 46px;
            padding: 0 14px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            gap: 13px;
            color: white;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
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
            font-size: 17px;
        }

        /* PROFIL ADMIN */
        .sidebar-bottom {
            margin-top: auto;
            padding: 17px;
            border-top: 1px solid #ffffff25;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
            padding: 5px 4px;
        }

        .admin-avatar {
            width: 39px;
            height: 39px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #b52d2d;
            display: grid;
            place-items: center;
            font-size: 17px;
        }

        .admin-info {
            min-width: 0;
        }

        .admin-info strong {
            display: block;
            max-width: 155px;
            font-size: 12px;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
            border: none;
            border-radius: 8px;
            background: white;
            color: #941919;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: .2s;
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
            height: 70px;
            padding: 0 32px;
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
        }

        .topbar-admin-info {
            text-align: right;
        }

        .topbar-admin-info strong {
            display: block;
            font-size: 13px;
            color: #333;
        }

        .topbar-admin-info span {
            display: block;
            margin-top: 3px;
            font-size: 10px;
            color: #999;
        }

        .topbar-avatar {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            background: #fff0f4;
            display: grid;
            place-items: center;
            color: #941919;
            font-size: 16px;
        }

        /* CONTENT */
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

        .heading-label {
            margin-bottom: 8px;
            color: #941919;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .page-heading h1 {
            font-size: 29px;
            font-weight: bold;
            color: #292929;
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
            padding: 12px 18px;
            border-radius: 9px;
            background: #ed1c24;
            color: white;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            transition: .2s;
        }

        .primary-button:hover {
            background: #c9181f;
            color: white;
        }

        /* ALERT */
        .success-alert {
            margin-bottom: 22px;
            padding: 15px 20px;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            background: #dcfce7;
            color: #15803d;
        }

        /* TABLE */
        .table-card {
            overflow: hidden;
            background: white;
            border: 1px solid #eee;
            border-radius: 14px;
            box-shadow: 0 2px 8px #00000008;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .employee-table {
            width: 100%;
            min-width: 700px;
            border-collapse: collapse;
        }

        .employee-table thead {
            background: #faf1f1;
        }

        .employee-table th {
            padding: 17px 22px;
            text-align: left;
            font-size: 13px;
            font-weight: bold;
            color: #555;
        }

        .employee-table td {
            padding: 17px 22px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
            color: #555;
        }

        .employee-table tbody tr:hover {
            background: #fffafa;
        }

        .employee-table tbody tr:last-child td {
            border-bottom: none;
        }

        .employee-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8e8e8;
            color: #941919;
            display: grid;
            place-items: center;
            font-size: 18px;
        }

        .role-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            background: #dbeafe;
            color: #2563eb;
            font-size: 12px;
            font-weight: 600;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 13px;
            border: none;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
        }

        .edit-button {
            background: #dbeafe;
            color: #2563eb;
        }

        .edit-button:hover {
            background: #bfdbfe;
        }

        .delete-button {
            background: #fee2e2;
            color: #dc2626;
        }

        .delete-button:hover {
            background: #fecaca;
        }

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

        /* LOGOUT MODAL */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #00000080;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-box {
            width: 100%;
            max-width: 380px;
            padding: 28px;
            border-radius: 15px;
            background: white;
            text-align: center;
            box-shadow: 0 10px 35px #00000026;
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
            margin: 0 auto 16px;
            border-radius: 50%;
            background: #fce8e8;
            color: #941919;
            display: grid;
            place-items: center;
            font-size: 25px;
        }

        .modal-box h3 {
            margin-bottom: 8px;
            color: #333;
            font-size: 19px;
        }

        .modal-box p {
            margin-bottom: 23px;
            color: #888;
            font-size: 13px;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
        }

        .modal-actions button {
            flex: 1;
            padding: 11px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        .cancel-button {
            background: #f3f4f6;
            color: #555;
        }

        .confirm-button {
            background: #941919;
            color: white;
        }

        .confirm-button:hover {
            background: #b52d2d;
        }

        /* RESPONSIVE */
        @media (max-width: 1050px) {
            .content {
                padding: 25px;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 72px;
            }

            .sidebar-brand {
                justify-content: center;
                padding: 18px 5px;
            }

            .brand-text,
            .menu-title,
            .menu-link > span:last-child,
            .admin-info,
            .logout-button span {
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
            .page-heading h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <div class="admin-layout">

        {{-- SIDEBAR --}}
        <aside class="sidebar">

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
                        <a href="{{ url('/admin/laporan-penjualan') }}"
                            class="menu-link {{ request()->is('admin/laporan-penjualan*') ? 'active' : '' }}">
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
                        <strong>{{ auth()->user()->name ?? 'Admin PizzaMozza' }}</strong>
                        <span>Administrator</span>
                    </div>
                </div>

                <button type="button" class="logout-button" onclick="openLogoutModal()">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Keluar</span>
                </button>

            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <div class="main-wrapper">

            <header class="topbar">
                <div class="topbar-admin">

                    <div class="topbar-admin-info">
                        <strong>{{ auth()->user()->name ?? 'Admin PizzaMozza' }}</strong>
                        <span>
                            {{ auth()->user()->role === 'admin' ? 'Administrator' : 'Karyawan' }}
                        </span>
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
                        <div class="heading-label">Management</div>
                        <h1>Data Karyawan</h1>
                        <p>Kelola data karyawan PizzaMozza.</p>
                    </div>

                    <a href="{{ route('admin.employees.create') }}" class="primary-button">
                        <i class="bi bi-plus-lg"></i>
                        Tambah Karyawan
                    </a>
                </div>

                {{-- PESAN SUKSES --}}
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
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($employees as $employee)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            <div class="flex items-center gap-3">
                                                <div class="employee-avatar">
                                                    <i class="bi bi-person"></i>
                                                </div>

                                                <div>
                                                    <p class="font-semibold text-gray-800">
                                                        {{ $employee->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td>{{ $employee->email }}</td>

                                        <td>
                                            <span class="role-badge">
                                                Karyawan
                                            </span>
                                        </td>

                                        <td>
                                            <div class="flex items-center gap-2">

                                                <a href="{{ route('admin.employees.edit', $employee) }}"
                                                    class="action-button edit-button">
                                                    <i class="bi bi-pencil-square"></i>
                                                    Edit
                                                </a>

                                                <form action="{{ route('admin.employees.destroy', $employee) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="action-button delete-button">
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

                                            <p class="font-bold text-gray-700">
                                                Belum ada karyawan
                                            </p>

                                            <p class="text-gray-400 text-sm mt-1">
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
    </div>

    {{-- POPUP LOGOUT --}}
    <div id="logoutModal" class="modal-overlay">

        <div class="modal-box" role="dialog" aria-modal="true">

            <div class="modal-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>

            <h3>Konfirmasi Keluar</h3>

            <p>
                Apakah Anda yakin ingin keluar dari akun?
            </p>

            <div class="modal-actions">

                <button type="button" class="cancel-button" onclick="closeLogoutModal()">
                    Tidak
                </button>

                <form action="{{ route('logout') }}" method="POST" style="flex: 1;">
                    @csrf

                    <button type="submit" class="confirm-button" style="width: 100%;">
                        Ya, Keluar
                    </button>
                </form>

            </div>
        </div>
    </div>

    {{-- JAVASCRIPT --}}
    <script>
        function openLogoutModal() {
            document.getElementById('logoutModal').classList.add('show');
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.remove('show');
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