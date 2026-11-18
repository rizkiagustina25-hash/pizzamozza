<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - PizzaMozza</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --red: #941919;
            --red-hover: #b52d2d;
            --red-soft: #fdf2f2;
            --cream: #fffaf3;
            --brown: #34241f;
            --muted: #8b776d;
            --border: #ecdcd0;
        }

        body {
            font-family: Calibri, 'Segoe UI', Arial, sans-serif;
            background: var(--cream);
            color: var(--brown);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ================= HEADER ================= */

        .header {
            height: 80px;
            background: #fffdf9;
            border-bottom: 1px solid #f0e1d5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--red);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .brand-text {
            font-size: 24px;
            font-weight: 700;
            color: var(--red);
            letter-spacing: -0.3px;
        }

        .brand-text span {
            color: #d97c6e;
        }

        .brand-subtitle {
            font-size: 12px;
            color: var(--muted);
            margin-top: 1px;
        }

        .header-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-links form {
            margin: 0;
        }

        .back-button,
        .logout-button {
            height: 40px;
            padding: 0 18px;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .back-button {
            background: #ffffff;
            color: var(--red);
            border: 1.5px solid var(--red);
        }

        .back-button:hover {
            background: var(--red-soft);
            transform: translateY(-1px);
        }

        .logout-button {
            background: var(--red);
            color: #ffffff;
            border: 1.5px solid var(--red);
        }

        .logout-button:hover {
            background: var(--red-hover);
            border-color: var(--red-hover);
            transform: translateY(-1px);
        }

        /* ================= MAIN CONTAINER ================= */

        .container {
            width: 100%;
            max-width: 580px;
            margin: 32px auto 50px;
            padding: 0 22px;
            flex: 1;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--muted);
            margin-bottom: 18px;
        }

        .breadcrumb a {
            color: var(--muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb a:hover {
            color: var(--red);
        }

        .breadcrumb span.current {
            color: var(--red);
            font-weight: 600;
        }

        /* ================= RESET CARD ================= */

        .reset-card {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 12px 32px rgba(72, 44, 26, 0.055);
        }

        .card-banner {
            height: 98px;
            background: linear-gradient(125deg, #941919 0%, #c43636 60%, #e06a55 100%);
            padding: 18px 32px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .banner-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 14px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.17);
            backdrop-filter: blur(4px);
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
        }

        .card-body {
            padding: 0 32px 34px;
        }

        .header-intro {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .shield-icon-box {
            width: 68px;
            height: 68px;
            margin-top: -34px;
            border-radius: 18px;
            border: 4px solid #ffffff;
            background: linear-gradient(135deg, #ffe7e2, #ffd0c6);
            color: var(--red);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 8px 20px rgba(52, 36, 31, 0.14);
            flex-shrink: 0;
        }

        .title-wrap {
            padding-top: 12px;
        }

        h1 {
            font-size: 25px;
            font-weight: 700;
            color: var(--brown);
            line-height: 1.2;
        }

        .description {
            color: var(--muted);
            font-size: 14.5px;
            line-height: 1.45;
            margin-top: 4px;
        }

        .section-divider {
            height: 1px;
            background: #f3e7de;
            margin: 0 0 22px;
        }

        /* ================= ALERTS ================= */

        .success,
        .error {
            padding: 13px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14.5px;
            line-height: 1.5;
        }

        .success {
            background: #eaf8ef;
            border: 1px solid #bfe6cd;
            color: #16794c;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error {
            background: #fff0f0;
            border: 1px solid #f5c2c2;
            color: #a81c1c;
        }

        .error-item {
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .error-item + .error-item {
            margin-top: 4px;
        }

        /* ================= FORM INPUTS ================= */

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14.5px;
            font-weight: 600;
            color: #46322b;
            margin-bottom: 8px;
        }

        .required-dot {
            color: #d63636;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            color: #9e8a80;
            font-size: 16px;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        input {
            width: 100%;
            border: 1.5px solid #e6d6ca;
            border-radius: 12px;
            padding: 12px 44px 12px 42px;
            font-family: inherit;
            font-size: 15px;
            color: var(--brown);
            background: #fffdfb;
            outline: none;
            transition: all 0.2s ease;
        }

        input::placeholder {
            color: #b4a39a;
        }

        input:hover {
            border-color: #d4beb0;
        }

        input:focus {
            border-color: var(--red);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(148, 25, 25, 0.08);
        }

        .input-wrapper:focus-within .input-icon {
            color: var(--red);
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 8px;
            background: transparent;
            color: #8b776d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .toggle-password:hover {
            background: #f5ebe3;
            color: var(--red);
        }

        .password-hint {
            margin-top: 6px;
            font-size: 12.5px;
            color: var(--muted);
        }

        /* ================= ACTIONS ================= */

        .button-area {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 26px;
            padding-top: 20px;
            border-top: 1px solid #f3e7de;
        }

        .submit-btn,
        .back-link {
            width: 100%;
            height: 45px;
            border-radius: 11px;
            font-family: inherit;
            font-size: 15px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .submit-btn {
            border: none;
            color: #ffffff;
            background: var(--red);
            box-shadow: 0 6px 16px rgba(148, 25, 25, 0.22);
        }

        .submit-btn:hover {
            background: var(--red-hover);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(148, 25, 25, 0.28);
        }

        .back-link {
            color: #5c4840;
            background: #ffffff;
            border: 1.5px solid #e2d1c5;
        }

        .back-link:hover {
            border-color: var(--red);
            color: var(--red);
            background: var(--red-soft);
        }

        .footer {
            padding: 20px;
            text-align: center;
            color: var(--muted);
            font-size: 13.5px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 650px) {
            .header {
                padding: 0 18px;
                height: 72px;
            }

            .brand-subtitle {
                display: none;
            }

            .brand-text {
                font-size: 21px;
            }

            .back-button,
            .logout-button {
                height: 36px;
                padding: 0 13px;
                font-size: 13.5px;
            }

            .container {
                margin: 22px auto 36px;
                padding: 0 15px;
            }

            .card-banner {
                height: 88px;
                padding: 16px 22px;
            }

            .card-body {
                padding: 0 22px 26px;
            }

            .header-intro {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .shield-icon-box {
                width: 60px;
                height: 60px;
                margin-top: -30px;
                font-size: 24px;
            }

            .title-wrap {
                padding-top: 2px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <header class="header">
        <a href="{{ route('dashboard') }}" class="brand">
            <div class="brand-icon">
                <i class="fa-solid fa-pizza-slice"></i>
            </div>
            <div>
                <div class="brand-text">Pizza<span>Mozza</span></div>
                <div class="brand-subtitle">Fresh, Tasty, Happiness!</div>
            </div>
        </a>

        <div class="header-links">
            <a href="{{ route('dashboard', ['menu' => 'profile']) }}" class="back-button">
                <i class="bi bi-arrow-left"></i>
                <span>Back</span>
            </a>

            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            @endauth
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main class="container">

        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <i class="bi bi-chevron-right" style="font-size: 11px;"></i>
            <a href="{{ route('dashboard', ['menu' => 'profile']) }}">Akun Saya</a>
            <i class="bi bi-chevron-right" style="font-size: 11px;"></i>
            <span class="current">Reset Password</span>
        </nav>

        <div class="reset-card">

            <div class="card-banner">
                <span class="banner-badge">
                    <i class="bi bi-shield-lock"></i>
                    Keamanan Akun
                </span>
            </div>

            <div class="card-body">

                <div class="header-intro">
                    <div class="shield-icon-box">
                        <i class="bi bi-key-fill"></i>
                    </div>

                    <div class="title-wrap">
                        <h1>Reset Password</h1>
                        <p class="description">
                            Masukkan password lama dan password baru untuk memperbarui keamanan akunmu.
                        </p>
                    </div>
                </div>

                <div class="section-divider"></div>

                @if (session('success'))
                    <div class="success">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="error">
                        @foreach ($errors->all() as $error)
                            <div class="error-item">
                                <i class="bi bi-exclamation-circle-fill" style="margin-top: 2px;"></i>
                                <span>{{ $error }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('password.reset.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="current_password">
                            Password Lama <span class="required-dot">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="bi bi-lock input-icon"></i>
                            <input
                                type="password"
                                id="current_password"
                                name="current_password"
                                placeholder="Masukkan password saat ini"
                                autocomplete="current-password"
                                required
                            >
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('current_password', this)"
                                aria-label="Tampilkan password lama"
                            >
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">
                            Password Baru <span class="required-dot">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="bi bi-shield-lock input-icon"></i>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Masukkan password baru"
                                autocomplete="new-password"
                                required
                            >
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('password', this)"
                                aria-label="Tampilkan password baru"
                            >
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div class="password-hint">
                            Gunakan kombinasi huruf dan angka agar akun lebih aman.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">
                            Konfirmasi Password Baru <span class="required-dot">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="bi bi-check2-square input-icon"></i>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Ulangi password baru"
                                autocomplete="new-password"
                                required
                            >
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('password_confirmation', this)"
                                aria-label="Tampilkan konfirmasi password baru"
                            >
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="button-area">
                        <button type="submit" class="submit-btn">
                            <i class="bi bi-check2-circle"></i>
                            <span>Simpan Password Baru</span>
                        </button>

                        <a class="back-link" href="{{ route('dashboard', ['menu' => 'profile']) }}">
                            <i class="bi bi-arrow-left"></i>
                            <span>Kembali ke Profile</span>
                        </a>
                    </div>
                </form>

            </div>

        </div>

    </main>

    <footer class="footer">
        © {{ date('Y') }} PizzaMozza. All Rights Reserved.
    </footer>

    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (!input || !icon) return;

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    </script>

</body>

</html>