<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Karyawan - PizzaMozza</title>

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
        textarea,
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
            max-width: 1050px;
            margin: auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
            color: var(--primary);
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .back-link:hover {
            color: var(--primary-dark);
            transform: translateX(-3px);
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 24px;
            animation: fadeDown .45s ease;
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
            font-size: 26px;
            font-weight: 700;
        }

        .page-heading p {
            margin-top: 5px;
            font-size: 13px;
            color: #777;
        }

        /* ================= ALERT ================= */

        .error-alert {
            padding: 15px 18px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #fecaca;
            background: #fee2e2;
            color: #b42323;
            font-size: 13px;
            animation: fadeDown .4s ease;
        }

        .error-alert-header {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .error-alert ul {
            margin-left: 22px;
            line-height: 1.6;
        }

        /* ================= FORM CARD ================= */

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 4px 16px #00000006;
            overflow: hidden;
            animation: fadeUp .55s ease;
        }

        .form-card-header {
            padding: 20px 26px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 11px;
            background: #fffafa;
        }

        .form-card-header i {
            font-size: 20px;
            color: var(--primary);
        }

        .form-card-header h2 {
            font-size: 17px;
            font-weight: 700;
        }

        .form-body {
            padding: 26px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #3f3535;
        }

        .form-label .required {
            color: #dc2626;
            margin-left: 2px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            color: #888;
            font-size: 15px;
            pointer-events: none;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            border: 1px solid #dcd6d6;
            border-radius: 10px;
            background: white;
            color: var(--text);
            font-size: 13px;
            outline: none;
            transition: .2s ease;
        }

        .form-input {
            height: 44px;
            padding: 0 14px 0 40px;
        }

        .form-input.has-toggle {
            padding-right: 42px;
        }

        .form-textarea {
            min-height: 95px;
            padding: 12px 14px 12px 40px;
            resize: vertical;
            line-height: 1.55;
        }

        .textarea-icon {
            position: absolute;
            top: 13px;
            left: 14px;
            color: #888;
            font-size: 15px;
            pointer-events: none;
        }

        .form-input:focus,
        .form-textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px #94191914;
        }

        .form-input.is-invalid,
        .form-textarea.is-invalid {
            border-color: #dc2626;
            background: #fffafa;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            background: transparent;
            border: none;
            color: #777;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toggle-password:hover {
            color: var(--primary);
        }

        .field-error {
            font-size: 11.5px;
            color: #dc2626;
            font-weight: 600;
        }

        .field-hint {
            font-size: 11px;
            color: var(--muted);
        }

        .role-info-box {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 13px 16px;
            border-radius: 10px;
            background: #eef4ff;
            border: 1px solid #d5e3ff;
            color: #2c559c;
            font-size: 12.5px;
        }

        .role-info-box i {
            font-size: 18px;
            flex-shrink: 0;
        }

        .form-actions {
            margin-top: 26px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }

        .secondary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 44px;
            padding: 0 20px;
            border-radius: 9px;
            border: 1px solid #dcd6d6;
            background: white;
            color: #555;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .secondary-button:hover {
            background: #f5f5f5;
            color: var(--text);
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 44px;
            padding: 0 22px;
            border: none;
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
            transform: translateY(-2px);
            box-shadow: 0 7px 15px #94191935;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 820px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .content {
                padding: 20px 15px;
            }

            .topbar {
                padding: 0 15px;
            }

            .form-body {
                padding: 20px 16px;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
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

            <a href="{{ route('admin.employees.index') }}" class="menu-link active">
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

            <a href="{{ route('admin.employees.index') }}" class="back-link">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Data Karyawan
            </a>

            <div class="page-heading">
                <div class="heading-left">
                    <div class="heading-icon">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>

                    <div>
                        <h1>Tambah Karyawan Baru</h1>
                        <p>Buat akun baru untuk staf atau karyawan operasional PizzaMozza.</p>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="error-alert">
                    <div class="error-alert-header">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        <span>Terjadi kesalahan pada pengisian data:</span>
                    </div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <section class="form-card">

                <div class="form-card-header">
                    <i class="bi bi-person-badge"></i>
                    <h2>Formulir Data Karyawan</h2>
                </div>

                <form action="{{ route('admin.employees.store') }}" method="POST" class="form-body">
                    @csrf

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="name" class="form-label">
                                Nama Lengkap <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="bi bi-person input-icon"></i>
                                <input type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-input @error('name') is-invalid @enderror"
                                    placeholder="Masukkan nama lengkap karyawan"
                                    required>
                            </div>
                            @error('name')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">
                                Alamat Email <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="bi bi-envelope input-icon"></i>
                                <input type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-input @error('email') is-invalid @enderror"
                                    placeholder="karyawan@pizzamozza.com"
                                    required>
                            </div>
                            @error('email')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">
                                Kata Sandi <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="bi bi-lock input-icon"></i>
                                <input type="password"
                                    id="password"
                                    name="password"
                                    class="form-input has-toggle @error('password') is-invalid @enderror"
                                    placeholder="Minimal 8 karakter"
                                    required>
                                <button type="button" class="toggle-password" onclick="togglePass('password', this)" aria-label="Tampilkan sandi">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <span class="field-hint">Gunakan minimal 8 karakter kombinasi huruf dan angka.</span>
                            @error('password')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">
                                Konfirmasi Kata Sandi <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="bi bi-shield-lock input-icon"></i>
                                <input type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-input has-toggle"
                                    placeholder="Ulangi kata sandi"
                                    required>
                                <button type="button" class="toggle-password" onclick="togglePass('password_confirmation', this)" aria-label="Tampilkan konfirmasi sandi">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label for="no_hp" class="form-label">
                                Nomor HP / WhatsApp
                            </label>
                            <div class="input-wrapper">
                                <i class="bi bi-telephone input-icon"></i>
                                <input type="text"
                                    id="no_hp"
                                    name="no_hp"
                                    value="{{ old('no_hp') }}"
                                    class="form-input @error('no_hp') is-invalid @enderror"
                                    placeholder="Contoh: 081234567890">
                            </div>
                            @error('no_hp')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="address" class="form-label">
                                Alamat Lengkap
                            </label>
                            <div class="input-wrapper">
                                <i class="bi bi-geo-alt textarea-icon"></i>
                                <textarea id="address"
                                    name="address"
                                    class="form-textarea @error('address') is-invalid @enderror"
                                    placeholder="Masukkan alamat tempat tinggal karyawan (opsional)">{{ old('address') }}</textarea>
                            </div>
                            @error('address')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <div class="role-info-box">
                                <i class="bi bi-info-circle-fill"></i>
                                <span>Akun yang ditambahkan melalui halaman ini akan otomatis memiliki hak akses sebagai <strong>Karyawan</strong>.</span>
                            </div>
                        </div>

                    </div>

                    <div class="form-actions">
                        <a href="{{ route('admin.employees.index') }}" class="secondary-button">
                            <i class="bi bi-x-circle"></i>
                            Batal
                        </a>

                        <button type="submit" class="primary-button">
                            <i class="bi bi-check-lg"></i>
                            Simpan Karyawan
                        </button>
                    </div>

                </form>

            </section>

        </main>

    </div>

    <script>
        function togglePass(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>

</body>
</html>