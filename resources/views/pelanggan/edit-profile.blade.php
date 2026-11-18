<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - PizzaMozza</title>

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
            max-width: 820px;
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

        /* ================= AVATAR SECTION ================= */

        .avatar-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 26px;
            flex-wrap: wrap;
        }

        .avatar-left {
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

        .photo-placeholder {
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

        .avatar-title-wrap {
            padding-top: 2px;
        }

        .title {
            font-size: 26px;
            font-weight: 700;
            color: var(--brown);
            line-height: 1.2;
        }

        .subtitle {
            color: var(--muted);
            font-size: 14.5px;
            margin-top: 4px;
            line-height: 1.4;
        }

        .upload-control {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 6px;
        }

        .upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 16px;
            border-radius: 10px;
            background: #fff6f4;
            border: 1.5px dashed #d48b8b;
            color: var(--red);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .upload-btn:hover {
            background: #fdeae8;
            border-color: var(--red);
        }

        .file-input-hidden {
            display: none;
        }

        .photo-info {
            color: var(--muted);
            font-size: 12.5px;
        }

        .file-name-preview {
            color: #18865c;
            font-size: 12.5px;
            font-weight: 600;
            display: none;
        }

        /* ================= ALERTS ================= */

        .success-message,
        .error-message {
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 22px;
            font-size: 14.5px;
            line-height: 1.5;
        }

        .success-message {
            background: #eaf8ef;
            border: 1px solid #bfe6cd;
            color: #16794c;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error-message {
            background: #fff0f0;
            border: 1px solid #f5c2c2;
            color: #a81c1c;
        }

        .error-message ul {
            margin-top: 6px;
            padding-left: 20px;
        }

        /* ================= FORM GRID & INPUTS ================= */

        .section-divider {
            height: 1px;
            background: #f3e7de;
            margin: 0 0 24px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
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

        .input-wrapper.textarea-wrap .input-icon {
            top: 14px;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            border: 1.5px solid #e6d6ca;
            border-radius: 12px;
            padding: 12px 14px 12px 42px;
            font-family: inherit;
            font-size: 15px;
            color: var(--brown);
            background: #fffdfb;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #b4a39a;
        }

        .form-input:hover,
        .form-textarea:hover {
            border-color: #d4beb0;
        }

        .form-input:focus,
        .form-textarea:focus {
            border-color: var(--red);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(148, 25, 25, 0.08);
        }

        .input-wrapper:focus-within .input-icon {
            color: var(--red);
        }

        .form-textarea {
            min-height: 112px;
            resize: vertical;
            line-height: 1.55;
        }

        .field-hint {
            margin-top: 6px;
            font-size: 12.5px;
            color: var(--muted);
        }

        /* ================= BUTTON AREA ================= */

        .button-area {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #f3e7de;
        }

        .cancel-button {
            height: 44px;
            padding: 0 22px;
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
            gap: 7px;
            transition: all 0.2s ease;
        }

        .cancel-button:hover {
            border-color: #c7b1a2;
            background: #faf3ed;
            color: var(--brown);
        }

        .save-button {
            height: 44px;
            padding: 0 26px;
            border-radius: 11px;
            border: none;
            background: var(--red);
            color: #ffffff;
            font-family: inherit;
            font-size: 15px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            box-shadow: 0 6px 16px rgba(148, 25, 25, 0.22);
            transition: all 0.2s ease;
        }

        .save-button:hover {
            background: var(--red-hover);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(148, 25, 25, 0.28);
        }

        /* ================= FOOTER ================= */

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
                height: 102px;
                padding: 16px 22px;
            }

            .card-body {
                padding: 16px 22px 26px;
            }

            .avatar-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .avatar-wrapper {
                width: 92px;
                height: 92px;
                margin-top: -54px;
            }

            .title {
                font-size: 23px;
            }

            .upload-control {
                align-items: flex-start;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .button-area {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .save-button,
            .cancel-button {
                width: 100%;
            }
        }

        @media (max-width: 460px) {
            .avatar-left {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
        }
    </style>
</head>

<body>

    @php
        $fotoUrl = null;
        if (!empty($user->foto_profile)) {
            $cleanFoto = ltrim($user->foto_profile, '/');
            if (file_exists(public_path('profile/' . $cleanFoto))) {
                $fotoUrl = asset('profile/' . $cleanFoto);
            } elseif (file_exists(public_path('storage/' . $cleanFoto))) {
                $fotoUrl = asset('storage/' . $cleanFoto);
            } elseif (file_exists(public_path($cleanFoto))) {
                $fotoUrl = asset($cleanFoto);
            } else {
                $fotoUrl = asset('profile/' . $cleanFoto);
            }
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

            <a href="{{ route('dashboard') }}?menu=profile" class="back-button">
                <i class="bi bi-arrow-left"></i>
                <span>Back</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>

        </div>

    </header>

    {{-- MAIN --}}
    <main class="container">

        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <i class="bi bi-chevron-right" style="font-size: 11px;"></i>
            <a href="{{ route('dashboard') }}?menu=profile">Akun Saya</a>
            <i class="bi bi-chevron-right" style="font-size: 11px;"></i>
            <span class="current">Edit Profile</span>
        </nav>

        <div class="profile-card">

            {{-- BANNER ATAS KARTU --}}
            <div class="card-banner">
                <span class="banner-badge">
                    <i class="bi bi-person-badge"></i>
                    Pengaturan Akun Pelanggan
                </span>
            </div>

            <div class="card-body">

                {{-- ERROR VALIDASI --}}
                @if ($errors->any())
                    <div class="error-message">
                        <strong><i class="bi bi-exclamation-circle"></i> Periksa kembali data berikut:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- PESAN SUKSES --}}
                @if (session('success'))
                    <div class="success-message">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                {{-- FORM --}}
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- AVATAR & UPLOAD --}}
                    <div class="avatar-row">

                        <div class="avatar-left">
                            <div class="avatar-wrapper" id="avatarContainer">
                                @if ($fotoUrl)
                                    <img
                                        src="{{ $fotoUrl }}"
                                        alt="Foto Profile"
                                        class="profile-photo"
                                        id="photoPreview"
                                        onerror="if(!this.dataset.tried){this.dataset.tried='1';this.src='{{ asset('storage/' . ltrim($user->foto_profile ?? '', '/')) }}';}else{this.style.display='none';document.getElementById('avatarFallback').style.display='flex';}"
                                    >
                                    <div class="photo-placeholder" id="avatarFallback" style="display: none;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @else
                                    <img
                                        src=""
                                        alt="Preview Foto"
                                        class="profile-photo"
                                        id="photoPreview"
                                        style="display: none;"
                                    >
                                    <div class="photo-placeholder" id="avatarFallback">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endif
                            </div>

                            <div class="avatar-title-wrap">
                                <h1 class="title">Edit Profile</h1>
                                <p class="subtitle">Perbarui informasi akun dan alamat pengirimanmu.</p>
                            </div>
                        </div>

                        <div class="upload-control">
                            <label for="foto_profile" class="upload-btn">
                                <i class="bi bi-camera"></i>
                                <span>Ganti Foto Profil</span>
                            </label>

                            <input
                                type="file"
                                id="foto_profile"
                                name="foto_profile"
                                class="file-input-hidden"
                                accept=".jpg,.jpeg,.png,.webp"
                                onchange="previewProfilePhoto(event)"
                            >

                            <span class="file-name-preview" id="fileNamePreview"></span>
                            <span class="photo-info">JPG, JPEG, PNG, WEBP • Maks. 2 MB</span>
                        </div>

                    </div>

                    <div class="section-divider"></div>

                    {{-- GRID INPUT --}}
                    <div class="form-grid">

                        {{-- NAMA --}}
                        <div class="form-group">
                            <label for="name" class="form-label">
                                Nama Lengkap <span class="required-dot">*</span>
                            </label>

                            <div class="input-wrapper">
                                <i class="bi bi-person input-icon"></i>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-input"
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                >
                            </div>
                        </div>

                        {{-- NO HP --}}
                        <div class="form-group">
                            <label for="no_hp" class="form-label">
                                Nomor HP / WhatsApp
                            </label>

                            <div class="input-wrapper">
                                <i class="bi bi-telephone input-icon"></i>
                                <input
                                    type="text"
                                    id="no_hp"
                                    name="no_hp"
                                    class="form-input"
                                    value="{{ old('no_hp', $user->no_hp) }}"
                                    placeholder="Contoh: 081234567890"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                >
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group full-width">
                            <label for="email" class="form-label">
                                Alamat Email <span class="required-dot">*</span>
                            </label>

                            <div class="input-wrapper">
                                <i class="bi bi-envelope input-icon"></i>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-input"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="nama@email.com"
                                    required
                                >
                            </div>
                        </div>

                        {{-- ALAMAT --}}
                        <div class="form-group full-width">
                            <label for="address" class="form-label">
                                Alamat Pengiriman
                            </label>

                            <div class="input-wrapper textarea-wrap">
                                <i class="bi bi-geo-alt input-icon"></i>
                                <textarea
                                    id="address"
                                    name="address"
                                    class="form-textarea"
                                    placeholder="Masukkan alamat lengkap (jalan, nomor rumah, desa/kelurahan, kecamatan)..."
                                >{{ old('address', $user->address) }}</textarea>
                            </div>
                            <span class="field-hint">
                                Alamat ini akan digunakan sebagai tujuan pengiriman pesanan PizzaMozza kamu.
                            </span>
                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="button-area">
                        <a href="{{ route('dashboard') }}?menu=profile" class="cancel-button">
                            Batal
                        </a>

                        <button type="submit" class="save-button">
                            <i class="bi bi-check2-circle"></i>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </main>

    <footer class="footer">
        © {{ date('Y') }} PizzaMozza. All Rights Reserved.
    </footer>

    <script>
        function previewProfilePhoto(event) {
            const file = event.target.files[0];
            if (!file) return;

            const previewImg = document.getElementById('photoPreview');
            const fallback = document.getElementById('avatarFallback');
            const fileNameText = document.getElementById('fileNamePreview');

            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
                if (fallback) {
                    fallback.style.display = 'none';
                }
            };
            reader.readAsDataURL(file);

            if (fileNameText) {
                fileNameText.textContent = 'File dipilih: ' + file.name;
                fileNameText.style.display = 'block';
            }
        }
    </script>

</body>

</html>