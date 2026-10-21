<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Master Data Pelanggan - Pizza Mozza</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f7f5f2;
            color: #3d3029;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 245px;
            background: #ffffff;
            color: rgb(0, 0, 0);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            border-right: 2px solid #cfcfcf;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.10);
        }

        .logo {
            height: 85px;
            display: flex;
            align-items: center;
            padding: 0 25px;
            font-size: 21px;
            font-weight: bold;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .logo-icon {
            font-size: 32px;
            margin-right: 10px;
        }

        .menu-title {
            font-size: 11px;
            color: #000000;
            padding: 25px 25px 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin: 4px 12px;
        }

        .menu a {
            text-decoration: none;
            color: #000000;
            display: flex;
            align-items: center;
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 14px;
        }

        .menu a:hover {
            background: rgba(255,255,255,.08);
        }

        .menu a.active {
            background: #a92820;
            color: rgb(255, 255, 255);
            font-weight: 600;
        }

        .menu-icon {
            width: 28px;
            font-size: 17px;
        }

        /* MAIN */
        .main {
            margin-left: 245px;
            width: calc(100% - 245px);
        }

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 35px;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .admin-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #a92820;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        .content {
            padding: 30px 35px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 700;
            color: #3b2b23;
        }

        .breadcrumb {
            font-size: 13px;
            color: #8a7d75;
            margin-bottom: 25px;
        }

        .breadcrumb span {
            color: #a92820;
        }

        .btn-primary {
            border: none;
            background: #a92820;
            color: white;
            padding: 11px 18px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
        }

        .btn-primary:hover {
            background: #8d201a;
        }

        /* FILTER */
        .filter-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,.04);
        }

        .filter-form {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .search-wrapper {
            flex: 1;
        }

        .search-wrapper input,
        .filter-form select {
            width: 100%;
            height: 42px;
            border: 1px solid #ddd3ce;
            border-radius: 7px;
            padding: 0 13px;
            outline: none;
            font-size: 13px;
            background: white;
        }

        .search-wrapper input:focus,
        .filter-form select:focus {
            border-color: #a92820;
        }

        .status-filter {
            width: 170px;
        }

        .btn-search {
            height: 42px;
            padding: 0 20px;
            border: none;
            border-radius: 7px;
            background: #a92820;
            color: white;
            cursor: pointer;
            font-weight: 600;
        }

        /* TABLE */
        .table-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,.04);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #faf7f4;
        }

        th {
            text-align: left;
            padding: 15px 14px;
            font-size: 12px;
            color: #75675f;
            font-weight: 700;
            border-bottom: 1px solid #eee6e1;
        }

        td {
            padding: 15px 14px;
            font-size: 13px;
            border-bottom: 1px solid #f0ebe7;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fffaf7;
        }

        .customer-name {
            font-weight: 600;
            color: #3b2b23;
        }

        .email {
            color: #71655e;
        }

        .address {
            max-width: 190px;
            color: #71655e;
            line-height: 1.4;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-active {
            background: #e5f6ea;
            color: #23733a;
        }

        .status-inactive {
            background: #f5e5e3;
            color: #a92820;
        }

        .actions {
            display: flex;
            gap: 6px;
        }

        .action-btn {
            width: 31px;
            height: 31px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .btn-detail {
            background: #eee9e5;
            color: #5b4b42;
        }

        .btn-edit {
            background: #fff1df;
            color: #a76516;
        }

        .btn-delete {
            background: #fae5e3;
            color: #a92820;
        }

        .action-btn:hover {
            opacity: .75;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #8d817a;
        }

        .empty-icon {
            font-size: 42px;
            margin-bottom: 10px;
        }

        /* PAGINATION */
        .pagination-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 20px;
        }

        .pagination-info {
            color: #82766f;
            font-size: 12px;
        }

        .pagination {
            display: flex;
            gap: 5px;
        }

        .pagination a,
        .pagination span {
            min-width: 32px;
            height: 32px;
            padding: 0 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd5d0;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            color: #5d514a;
            background: white;
        }

        .pagination .active {
            background: #a92820;
            color: white;
            border-color: #a92820;
        }

        .pagination .disabled {
            opacity: .45;
        }

        /* ALERT */
        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #e5f6ea;
            color: #23733a;
        }

        .alert-error {
            background: #fae5e3;
            color: #a92820;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            inset: 0;
            background: rgba(40, 25, 18, .55);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal.show {
            display: flex;
        }

        .modal-box {
            width: 100%;
            max-width: 560px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 15px 50px rgba(0,0,0,.2);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #eee6e1;
        }

        .modal-title {
            font-size: 18px;
            font-weight: 700;
            color: #3b2b23;
        }

        .close {
            border: none;
            background: none;
            font-size: 24px;
            color: #8a7d75;
            cursor: pointer;
        }

        .modal-body {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
            color: #4c3e36;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            border: 1px solid #ddd3ce;
            border-radius: 7px;
            padding: 11px 12px;
            outline: none;
            font-size: 13px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 85px;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #a92820;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .modal-footer {
            padding: 15px 24px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-secondary {
            border: 1px solid #ddd3ce;
            background: white;
            color: #5d514a;
            padding: 10px 17px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: 600;
        }

        /* DETAIL */
        .profile-detail {
            text-align: center;
            margin-bottom: 25px;
        }

        .profile-avatar {
            width: 75px;
            height: 75px;
            background: #f2e4dc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 30px;
            color: #a92820;
        }

        .profile-name {
            margin-top: 12px;
            font-size: 19px;
            font-weight: 700;
        }

        .profile-email {
            margin-top: 5px;
            color: #8a7d75;
            font-size: 13px;
        }

        .detail-list {
            border-top: 1px solid #eee6e1;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 13px 0;
            border-bottom: 1px solid #f1ece8;
            font-size: 13px;
            gap: 20px;
        }

        .detail-label {
            color: #8a7d75;
        }

        .detail-value {
            font-weight: 600;
            text-align: right;
        }

        @media(max-width: 900px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                width: calc(100% - 200px);
            }

            .content {
                padding: 20px;
            }

            .filter-form {
                flex-wrap: wrap;
            }

            .search-wrapper {
                min-width: 100%;
            }

            .status-filter {
                flex: 1;
            }

            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 950px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="logo">
            <span class="logo-icon">🍕</span>
            <span>Pizza Mozza</span>
        </div>

        <div class="menu-title">
            Main Menu
        </div>

        <ul class="menu">

            <li>
                <a href="{{ route('admin.dashboard') }}"
       class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <span class="menu-icon">🏠</span>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('admin.employees.index') }}"
       class="{{ request()->routeIs('admin.employees.*') ? 'active' : '' }}">
        <span class="menu-icon">👤</span>
        <span>Data Karyawan</span>
    </a>

    <a href="{{ route('admin.customers.index') }}"
       class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
        <span class="menu-icon">👥</span>
        <span>Data Pelanggan</span>
    </a>

    <a href="{{ route('admin.products.index') }}"
       class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
        <span class="menu-icon">📋</span>
        <span>Data Produk</span>
    </a>

    <a href="{{ route('admin.orders.index') }}"
       class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
        <span class="menu-icon">🛒</span>
        <span>Pesanan</span>
    </a>
            </li>

        </ul>

    </aside>


    {{-- MAIN --}}
    <main class="main">

        {{-- TOPBAR --}}
        <header class="topbar">

            <div class="admin-info">

                <div class="admin-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <span>
                    {{ auth()->user()->name }}
                </span>

            </div>

        </header>


        <section class="content">

            {{-- PAGE HEADER --}}
            <div class="page-header">

                <div>

                    <h1 class="page-title">
                        Master Data Pelanggan
                    </h1>

                </div>

                <button
                    type="button"
                    class="btn-primary"
                    onclick="openModal('addModal')"
                >
                    + Tambah Pelanggan
                </button>

            </div>


            {{-- BREADCRUMB --}}
            <div class="breadcrumb">
                Dashboard
                &nbsp;›&nbsp;
                Master Data
                &nbsp;›&nbsp;
                <span>Pelanggan</span>
            </div>


            {{-- ALERT SUCCESS --}}
            @if(session('success'))

                <div class="alert alert-success">
                    ✓ {{ session('success') }}
                </div>

            @endif


            {{-- ALERT ERROR --}}
            @if($errors->any())

                <div class="alert alert-error">

                    <strong>Data belum berhasil disimpan.</strong>

                    <ul style="margin-top:8px; margin-left:18px;">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- FILTER --}}
            <div class="filter-box">

                <form
                    method="GET"
                    action="{{ route('admin.customers.index') }}"
                    class="filter-form"
                >

                    <div class="search-wrapper">

                        <input
                            type="text"
                            name="search"
                            placeholder="Cari nama, email, atau no. HP..."
                            value="{{ request('search') }}"
                        >

                    </div>

                    <div class="status-filter">

                        <select name="status">

                            <option value="">
                                Semua
                            </option>

                            <option
                                value="active"
                                {{ request('status') === 'active' ? 'selected' : '' }}
                            >
                                Aktif
                            </option>

                            <option
                                value="inactive"
                                {{ request('status') === 'inactive' ? 'selected' : '' }}
                            >
                                Tidak Aktif
                            </option>

                        </select>

                    </div>

                    <button
                        type="submit"
                        class="btn-search"
                    >
                        Cari
                    </button>

                </form>

            </div>


            {{-- TABLE --}}
            <div class="table-card">

                @if($customers->count() > 0)

                    <table>

                        <thead>

                            <tr>

                                <th width="50">No</th>

                                <th>Nama</th>

                                <th>Email</th>

                                <th>No. HP</th>

                                <th>Alamat</th>

                                <th>Tanggal Daftar</th>

                                <th>Status</th>

                                <th width="120">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($customers as $customer)

                                <tr>

                                    <td>
                                        {{ $customers->firstItem() + $loop->index }}
                                    </td>

                                    <td>
                                        <div class="customer-name">
                                            {{ $customer->name }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="email">
                                            {{ $customer->email }}
                                        </div>
                                    </td>

                                    <td>
                                        {{ $customer->no_hp ?? '-' }}
                                    </td>

                                    <td>
                                        <div class="address">
                                            {{ $customer->address ?? '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        {{ $customer->created_at
                                            ? $customer->created_at->format('d-m-Y')
                                            : '-' }}
                                    </td>

                                    <td>

                                        @if($customer->status === 'active')

                                            <span class="status status-active">
                                                Aktif
                                            </span>

                                        @else

                                            <span class="status status-inactive">
                                                Tidak Aktif
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <div class="actions">

                                            {{-- DETAIL --}}
                                            <button
                                                type="button"
                                                class="action-btn btn-detail"
                                                title="Detail"
                                                onclick="openModal('detailModal{{ $customer->id }}')"
                                            >
                                                👁
                                            </button>


                                            {{-- EDIT --}}
                                            <button
                                                type="button"
                                                class="action-btn btn-edit"
                                                title="Edit"
                                                onclick="openModal('editModal{{ $customer->id }}')"
                                            >
                                                ✎
                                            </button>


                                            {{-- DELETE --}}
                                            <form
                                                method="POST"
                                                action="{{ route('admin.customers.destroy', $customer->id) }}"
                                                onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-btn btn-delete"
                                                    title="Hapus"
                                                >
                                                    🗑
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>


                    {{-- PAGINATION --}}
                    <div class="pagination-area">

                        <div class="pagination-info">

                            Menampilkan
                            {{ $customers->firstItem() }}
                            -
                            {{ $customers->lastItem() }}
                            dari
                            {{ $customers->total() }}
                            pelanggan

                        </div>

                        <div class="pagination">

                            @if($customers->onFirstPage())

                                <span class="disabled">
                                    ‹
                                </span>

                            @else

                                <a href="{{ $customers->previousPageUrl() }}">
                                    ‹
                                </a>

                            @endif


                            @for(
                                $page = 1;
                                $page <= $customers->lastPage();
                                $page++
                            )

                                @if($page == $customers->currentPage())

                                    <span class="active">
                                        {{ $page }}
                                    </span>

                                @else

                                    <a href="{{ $customers->url($page) }}">
                                        {{ $page }}
                                    </a>

                                @endif

                            @endfor


                            @if($customers->hasMorePages())

                                <a href="{{ $customers->nextPageUrl() }}">
                                    ›
                                </a>

                            @else

                                <span class="disabled">
                                    ›
                                </span>

                            @endif

                        </div>

                    </div>

                @else

                    <div class="empty">

                        <div class="empty-icon">
                            👥
                        </div>

                        <h3>
                            Belum ada data pelanggan
                        </h3>

                        <p style="margin-top:7px;">
                            Silakan tambahkan pelanggan baru.
                        </p>

                    </div>

                @endif

            </div>

        </section>

    </main>

</div>


{{-- ========================================================= --}}
{{-- MODAL TAMBAH PELANGGAN --}}
{{-- ========================================================= --}}

<div
    class="modal"
    id="addModal"
    onclick="closeOutside(event, 'addModal')"
>

    <div class="modal-box">

        <div class="modal-header">

            <div class="modal-title">
                Tambah Pelanggan
            </div>

            <button
                class="close"
                onclick="closeModal('addModal')"
            >
                ×
            </button>

        </div>


        <form
            method="POST"
            action="{{ route('admin.customers.store') }}"
        >

            @csrf

            <div class="modal-body">

                <div class="form-group">

                    <label>
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                    >

                </div>


                <div class="form-row">

                    <div class="form-group">

                        <label>
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            No. HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            value="{{ old('no_hp') }}"
                            required
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label>
                        Alamat
                    </label>

                    <textarea
                        name="address"
                        required
                    >{{ old('address') }}</textarea>

                </div>


                <div class="form-row">

                    <div class="form-group">

                        <label>
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            required
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label>
                        Status
                    </label>

                    <select name="status" required>

                        <option value="active">
                            Aktif
                        </option>

                        <option value="inactive">
                            Tidak Aktif
                        </option>

                    </select>

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-secondary"
                    onclick="closeModal('addModal')"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn-primary"
                >
                    Simpan Pelanggan
                </button>

            </div>

        </form>

    </div>

</div>


{{-- ========================================================= --}}
{{-- MODAL DETAIL + EDIT --}}
{{-- ========================================================= --}}

@foreach($customers as $customer)

    {{-- DETAIL --}}
    <div
        class="modal"
        id="detailModal{{ $customer->id }}"
        onclick="closeOutside(event, 'detailModal{{ $customer->id }}')"
    >

        <div class="modal-box">

            <div class="modal-header">

                <div class="modal-title">
                    Detail Pelanggan
                </div>

                <button
                    class="close"
                    onclick="closeModal('detailModal{{ $customer->id }}')"
                >
                    ×
                </button>

            </div>


            <div class="modal-body">

                <div class="profile-detail">

                    <div class="profile-avatar">
                        👤
                    </div>

                    <div class="profile-name">
                        {{ $customer->name }}
                    </div>

                    <div class="profile-email">
                        {{ $customer->email }}
                    </div>

                </div>


                <div class="detail-list">

                    <div class="detail-row">

                        <span class="detail-label">
                            No. HP
                        </span>

                        <span class="detail-value">
                            {{ $customer->no_hp ?? '-' }}
                        </span>

                    </div>


                    <div class="detail-row">

                        <span class="detail-label">
                            Alamat
                        </span>

                        <span class="detail-value">
                            {{ $customer->address ?? '-' }}
                        </span>

                    </div>


                    <div class="detail-row">

                        <span class="detail-label">
                            Tanggal Daftar
                        </span>

                        <span class="detail-value">
                            {{ $customer->created_at
                                ? $customer->created_at->format('d-m-Y')
                                : '-' }}
                        </span>

                    </div>


                    <div class="detail-row">

                        <span class="detail-label">
                            Status
                        </span>

                        <span class="detail-value">

                            @if($customer->status === 'active')

                                <span class="status status-active">
                                    Aktif
                                </span>

                            @else

                                <span class="status status-inactive">
                                    Tidak Aktif
                                </span>

                            @endif

                        </span>

                    </div>

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-secondary"
                    onclick="closeModal('detailModal{{ $customer->id }}')"
                >
                    Tutup
                </button>

            </div>

        </div>

    </div>


    {{-- EDIT --}}
    <div
        class="modal"
        id="editModal{{ $customer->id }}"
        onclick="closeOutside(event, 'editModal{{ $customer->id }}')"
    >

        <div class="modal-box">

            <div class="modal-header">

                <div class="modal-title">
                    Edit Pelanggan
                </div>

                <button
                    class="close"
                    onclick="closeModal('editModal{{ $customer->id }}')"
                >
                    ×
                </button>

            </div>


            <form
                method="POST"
                action="{{ route('admin.customers.update', $customer->id) }}"
            >

                @csrf

                @method('PUT')

                <div class="modal-body">

                    <div class="form-group">

                        <label>
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ $customer->name }}"
                            required
                        >

                    </div>


                    <div class="form-row">

                        <div class="form-group">

                            <label>
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ $customer->email }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                No. HP
                            </label>

                            <input
                                type="text"
                                name="no_hp"
                                value="{{ $customer->no_hp }}"
                                required
                            >

                        </div>

                    </div>


                    <div class="form-group">

                        <label>
                            Alamat
                        </label>

                        <textarea
                            name="address"
                            required
                        >{{ $customer->address }}</textarea>

                    </div>


                    <div class="form-group">

                        <label>
                            Password Baru
                            <small style="font-weight:normal;color:#999;">
                                (kosongkan jika tidak ingin mengubah)
                            </small>
                        </label>

                        <input
                            type="password"
                            name="password"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Konfirmasi Password Baru
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Status
                        </label>

                        <select name="status" required>

                            <option
                                value="active"
                                {{ $customer->status === 'active' ? 'selected' : '' }}
                            >
                                Aktif
                            </option>

                            <option
                                value="inactive"
                                {{ $customer->status === 'inactive' ? 'selected' : '' }}
                            >
                                Tidak Aktif
                            </option>

                        </select>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn-secondary"
                        onclick="closeModal('editModal{{ $customer->id }}')"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="btn-primary"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

@endforeach


<script>

    function openModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    }


    function closeModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.remove('show');
            document.body.style.overflow = '';
        }
    }


    function closeOutside(event, id) {

        if (event.target.id === id) {
            closeModal(id);
        }

    }


    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            document
                .querySelectorAll('.modal.show')
                .forEach(function(modal) {

                    modal.classList.remove('show');

                });

            document.body.style.overflow = '';

        }

    });

</script>

</body>

</html>