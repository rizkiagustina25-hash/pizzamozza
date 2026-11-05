
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Karyawan - PizzaMozza</title>

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
            border-top: 1px solid rgba(255,255,255,.15);
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 15px;
            padding: 5px 6px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
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
            border: 1px solid rgba(255,255,255,.4);
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

        /* TOPBAR - SAMA DENGAN HALAMAN KELOLA PESANAN */
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

        /* TABLE */
        .table-card {
            background: white;
            border: 1px solid #eee;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,.03);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .employee-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
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
            display: flex;
            align-items: center;
            justify-content: center;
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
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .edit-button {
            background: #dbeafe;
            color: #2563eb;
        }

        .edit-button:hover {
            background: #bfdbfe;
            color: #2563eb;
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

        /* LOGOUT MODAL */
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
            max-width: 380px;
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
                min-height: auto;
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
                padding: 0 15px;
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
                    <a href="{{ route('admin.employees.index') }}" class="menu-link active">
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
                    <a href="{{ route('admin.products.index') }}" class="menu-link">
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
                    <div class="heading-label">Management</div>

                    <h1>Data Karyawan</h1>

                    <p>
                        Kelola data karyawan PizzaMozza.
                    </p>
                </div>

                <a href="{{ route('admin.employees.create') }}"
                   class="primary-button">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Karyawan
                </a>

            </div>

            {{-- SUCCESS MESSAGE --}}
            @if (session('success'))
                <div class="success-alert">
                    <i class="bi bi-check-circle-fill mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- TABLE CARD --}}
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

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

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

                                    <td>
                                        {{ $employee->email }}
                                    </td>

                                    <td>
                                        <span class="role-badge">
                                            Karyawan
                                        </span>
                                    </td>

                                    <td>
                                        <div class="flex items-center gap-2">

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

    {{-- LOGOUT MODAL --}}
    <div id="logoutModal" class="modal-overlay">

        <div class="modal-box">

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
