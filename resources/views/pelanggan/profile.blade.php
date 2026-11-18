<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - PizzaMozza</title>

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
            gap: 10px;
        }

        .header-links form {
            margin: 0;
        }

        .nav-btn,
        .logout-button {
            height: 40px;
            padding: 0 16px;
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

        .nav-btn {
            background: #ffffff;
            color: var(--brown);
            border: 1.5px solid #e5d5c9;
        }

        .nav-btn:hover {
            border-color: var(--red);
            color: var(--red);
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
            max-width: 840px;
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

        /* ================= PROFILE CARD ================= */

        .profile-card {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 12px 32px rgba(72, 44, 26, 0.055);
        }

        .card-banner {
            height: 112px;
            background: linear-gradient(125deg, #941919 0%, #c43636 60%, #e06a55 100%);
            padding: 18px 34px;
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
            padding: 18px 34px 36px;
        }

        /* ================= PROFILE TOP ================= */

        .profile-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 26px;
            flex-wrap: wrap;
        }

        .profile-identity {
            display: flex;
            align-items: center;
            gap: 18px;
            min-width: 0;
        }

        .avatar-wrapper {
            position: relative;
            width: 104px;
            height: 104px;
            margin-top: -64px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            background: #ffe4de;
            box-shadow: 0 8px 20px rgba(52, 36, 31, 0.14);
            overflow: hidden;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .profile-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .profile-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            font-weight: 700;
            color: var(--red);
            background: linear-gradient(135deg, #ffe6e0, #ffd2c7);
        }

        .profile-name {
            font-size: 25px;
            font-weight: 700;
            color: var(--brown);
            line-height: 1.2;
        }

        .profile-role {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 5px;
            padding: 4px 11px;
            border-radius: 20px;
            background: var(--red-soft);
            color: var(--red);
            font-size: 13px;
            font-weight: 600;
        }

        .section-divider {
            height: 1px;
            background: #f3e7de;
            margin: 0 0 24px;
        }

        /* ================= INFO GRID ================= */

        .profile-info {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .info-item {
            background: #fffbf7;
            border: 1px solid #f2e4d8;
            border-radius: 14px;
            padding: 16px 18px;
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .info-item.full-width {
            grid-column: 1 / -1;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            background: #fdecec;
            color: var(--red);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            flex-shrink: 0;
        }

        .info-content {
            min-width: 0;
            flex: 1;
        }

        .info-label {
            font-size: 12.5px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 15.5px;
            font-weight: 600;
            color: var(--brown);
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        /* ================= ACTION BUTTONS ================= */

        .action-area {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid #f3e7de;
        }

        .edit-button {
            height: 44px;
            padding: 0 22px;
            border-radius: 11px;
            background: var(--red);
            color: #ffffff;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 6px 16px rgba(148, 25, 25, 0.22);
            transition: all 0.2s ease;
        }

        .edit-button:hover {
            background: var(--red-hover);
            transform: translateY(-1px);
        }

        .reset-button {
            height: 44px;
            padding: 0 20px;
            border-radius: 11px;
            background: #fff4e8;
            border: 1.5px solid #efd2b5;
            color: #8c4714;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .reset-button:hover {
            background: #ffebd6;
            border-color: #d9a777;
        }

        .back-button {
            height: 44px;
            padding: 0 20px;
            border-radius: 11px;
            border: 1.5px solid #e2d1c5;
            background: #ffffff;
            color: #5c4840;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-left: auto;
            transition: all 0.2s ease;
        }

        .back-button:hover {
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

        @media (max-width: 760px) {
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

            .nav-btn,
            .logout-button {
                height: 36px;
                padding: 0 12px;
                font-size: 13.5px;
            }

            .container {
                margin: 22px auto 36px;
                padding: 0 15px;
            }

            .card-banner {
                height: 102px;
                padding: 16px 22px;
            }

            .card-body {
                padding: 16px 22px 26px;
            }

            .avatar-wrapper {
                width: 90px;
                height: 90px;
                margin-top: -54px;
            }

            .profile-name {
                font-size: 22px;
            }

            .profile-info {
                grid-template-columns: 1fr;
            }

            .action-area {
                flex-direction: column;
                align-items: stretch;
            }

            .edit-button,
            .reset-button,
            .back-button {
                width: 100%;
                margin-left: 0;
            }
        }

        @media (max-width: 460px) {
            .profile-identity {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .nav-btn span {
                display: none;
            }
        }
    </style>
</head>

<body>

    @php
        $profileUser = $user ?? auth()->user();
        $fotoUrl = null;

        if (!empty($profileUser?->foto_profile)) {
            $cleanFoto = ltrim($profileUser->foto_profile, '/');
            foreach (['profile/' . $cleanFoto, 'storage/' . $cleanFoto, $cleanFoto] as $path) {
                if (file_exists(public_path($path))) {
                    $fotoUrl = asset($path);
                    break;
                }
            }
            $fotoUrl ??= asset('profile/' . $cleanFoto);
        }
    @endphp

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

            <a href="{{ route('dashboard') }}" class="nav-btn">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
            </a>

            <a href="{{ route('cart.index') }}" class="nav-btn">
                <i class="bi bi-cart3"></i>
                <span>Keranjang</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>

        </div>

    </header>

    {{-- CONTENT --}}
    <main class="container">

        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <i class="bi bi-chevron-right" style="font-size: 11px;"></i>
            <span class="current">Profile Saya</span>
        </nav>

        <div class="profile-card">

            <div class="card-banner">
                <span class="banner-badge">
                    <i class="bi bi-person-check"></i>
                    Informasi Akun Pelanggan
                </span>
            </div>

            <div class="card-body">

                {{-- FOTO + NAMA --}}
                <div class="profile-top">

                    <div class="profile-identity">
                        <div class="avatar-wrapper">
                            @if ($fotoUrl)
                                <img
                                    src="{{ $fotoUrl }}"
                                    alt="Foto Profile"
                                    class="profile-photo"
                                    onerror="if(!this.dataset.tried){this.dataset.tried='1';this.src='{{ asset('storage/' . ltrim($profileUser->foto_profile ?? '', '/')) }}';}else{this.style.display='none';document.getElementById('profileFallback').style.display='flex';}"
                                >
                                <div class="profile-placeholder" id="profileFallback" style="display: none;">
                                    {{ strtoupper(substr($profileUser->name, 0, 1)) }}
                                </div>
                            @else
                                <div class="profile-placeholder">
                                    {{ strtoupper(substr($profileUser->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>

                        <div>
                            <h1 class="profile-name">{{ $profileUser->name }}</h1>
                            <div class="profile-role">
                                <i class="bi bi-patch-check-fill"></i>
                                <span>Pelanggan PizzaMozza</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="section-divider"></div>

                {{-- INFORMASI --}}
                <div class="profile-info">

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Nama Lengkap</div>
                            <div class="info-value">{{ $profileUser->name }}</div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Nomor HP / WhatsApp</div>
                            <div class="info-value">{{ $profileUser->no_hp ?: '-' }}</div>
                        </div>
                    </div>

                    <div class="info-item full-width">
                        <div class="info-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Alamat Email</div>
                            <div class="info-value">{{ $profileUser->email }}</div>
                        </div>
                    </div>

                    <div class="info-item full-width">
                        <div class="info-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Alamat Pengiriman</div>
                            <div class="info-value">{{ $profileUser->address ?: 'Alamat belum diisi.' }}</div>
                        </div>
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="action-area">

                    <a href="{{ route('profile.edit') }}" class="edit-button">
                        <i class="bi bi-pencil-square"></i>
                        <span>Edit Profile</span>
                    </a>

                    @if (Route::has('password.reset.form'))
                        <a href="{{ route('password.reset.form') }}" class="reset-button">
                            <i class="bi bi-key"></i>
                            <span>Reset Password</span>
                        </a>
                    @endif

                    <a href="{{ route('dashboard') }}" class="back-button">
                        <i class="bi bi-arrow-left"></i>
                        <span>Kembali ke Menu</span>
                    </a>

                </div>

            </div>

        </div>

    </main>

    <footer class="footer">
        © {{ date('Y') }} PizzaMozza. All Rights Reserved.
    </footer>

</body>

</html>