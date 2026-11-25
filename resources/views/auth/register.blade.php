<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - PizzaMozza</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --red: #b51e20;
            --dark-red: #741416;
            --orange: #f36d42;
            --cream: #fff8f2;
            --white: #ffffff;
            --text: #351b18;
            --muted: #806b64;
            --border: #ecd9cf;
            --shadow: 0 20px 50px rgba(100, 35, 20, .12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top left, #ffe9dc 0%, var(--cream) 45%, #fff3ea 100%);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .register-container {
            width: 100%;
            max-width: 1060px;
            background: var(--white);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid #f5e5dc;
            display: grid;
            grid-template-columns: 0.9fr 1.15fr;
        }

        /* PANEL KIRI (VISUAL) */
        .register-visual {
            position: relative;
            background-image: url('https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=1200&q=85');
            background-size: cover;
            background-position: center;
            padding: 42px 36px;
            color: var(--white);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .register-visual::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                160deg,
                rgba(116, 20, 22, 0.94) 0%,
                rgba(181, 30, 32, 0.85) 55%,
                rgba(53, 27, 24, 0.92) 100%
            );
        }

        .visual-top,
        .visual-bottom {
            position: relative;
            z-index: 2;
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: var(--white);
            color: var(--red);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .18);
        }

        .brand-badge h2 {
            font-size: 22px;
            font-weight: 800;
            line-height: 1.1;
        }

        .brand-badge span {
            font-size: 11px;
            color: #ffd9cc;
            display: block;
        }

        .visual-bottom h1 {
            font-size: 28px;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 12px;
        }

        .visual-bottom p {
            font-size: 13px;
            line-height: 1.7;
            color: #f8e3dc;
            margin-bottom: 24px;
        }

        .visual-perks {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .perk-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(6px);
            padding: 10px 14px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.16);
        }

        .perk-item i {
            color: #ffb45e;
            font-size: 14px;
        }

        /* PANEL KANAN (FORM) */
        .register-form-side {
            padding: 34px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .back-home {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            margin-bottom: 18px;
            width: fit-content;
            transition: .25s;
        }

        .back-home:hover {
            color: var(--red);
            transform: translateX(-3px);
        }

        .form-header {
            margin-bottom: 20px;
        }

        .form-header h2 {
            font-size: 25px;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 4px;
        }

        .form-header p {
            font-size: 13px;
            color: var(--muted);
        }

        .alert-error {
            padding: 12px 15px;
            border-radius: 13px;
            font-size: 12px;
            margin-bottom: 18px;
            background: #fff1f1;
            border: 1px solid #f7c5c5;
            color: #a61b1d;
            line-height: 1.5;
        }

        .alert-error ul {
            margin-left: 18px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-group label {
            display: block;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i.input-icon {
            position: absolute;
            left: 14px;
            color: var(--muted);
            font-size: 13.5px;
            pointer-events: none;
            transition: .2s;
        }

        .input-wrapper.textarea-wrapper i.input-icon {
            top: 14px;
        }

        .input-wrapper input,
        .input-wrapper textarea {
            width: 100%;
            padding: 11.5px 38px 11.5px 40px;
            border: 1.5px solid var(--border);
            border-radius: 13px;
            background: #fffcfa;
            font-family: inherit;
            font-size: 13px;
            color: var(--text);
            outline: none;
            transition: .25s;
        }

        .input-wrapper textarea {
            height: 82px;
            resize: vertical;
            padding-right: 14px;
            line-height: 1.5;
        }

        .input-wrapper input:focus,
        .input-wrapper textarea:focus {
            border-color: var(--red);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(181, 30, 32, 0.08);
        }

        .input-wrapper:focus-within i.input-icon {
            color: var(--red);
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            background: none;
            border: none;
            color: var(--muted);
            font-size: 13.5px;
            cursor: pointer;
            padding: 4px;
        }

        .toggle-password:hover {
            color: var(--red);
        }

        .submit-btn {
            width: 100%;
            margin-top: 20px;
            padding: 14px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--red), #991719);
            color: var(--white);
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 10px 22px rgba(181, 30, 32, 0.25);
            transition: .3s;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, var(--dark-red), var(--red));
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(181, 30, 32, 0.32);
        }

        .login-prompt {
            text-align: center;
            margin-top: 18px;
            font-size: 13px;
            color: var(--muted);
        }

        .login-prompt a {
            color: var(--red);
            font-weight: 700;
            margin-left: 4px;
        }

        .login-prompt a:hover {
            color: var(--dark-red);
            text-decoration: underline;
        }

        /* RESPONSIVE */
        @media (max-width: 880px) {
            .register-container {
                grid-template-columns: 1fr;
                max-width: 520px;
            }

            .register-visual {
                padding: 26px;
            }

            .visual-bottom h1 {
                font-size: 21px;
                margin-top: 16px;
            }

            .visual-perks {
                display: none;
            }

            .register-form-side {
                padding: 28px 24px 32px;
            }
        }

        @media (max-width: 540px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>

    <div class="register-container">

        <!-- SISI KIRI: VISUAL & BRANDING -->
        <div class="register-visual">
            <div class="visual-top">
                <a href="{{ url('/') }}" class="brand-badge">
                    <div class="brand-icon">
                        <i class="fa-solid fa-pizza-slice"></i>
                    </div>
                    <div>
                        <h2>PizzaMozza</h2>
                        <span>Fresh, Tasty, Happiness!</span>
                    </div>
                </a>
            </div>

            <div class="visual-bottom">
                <h1>Gabung Jadi Anggota PizzaMozza!</h1>
                <p>
                    Buat akun dalam hitungan detik untuk menyimpan alamat pengiriman dan menikmati kelezatan pizza hangat langsung ke rumahmu.
                </p>

                <div class="visual-perks">
                    <div class="perk-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Alamat pengiriman tersimpan otomatis</span>
                    </div>
                    <div class="perk-item">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span>Checkout pesanan lebih cepat & mudah</span>
                    </div>
                    <div class="perk-item">
                        <i class="fa-solid fa-star"></i>
                        <span>Bisa kasih rating & ulasan menu favorit</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- SISI KANAN: FORM REGISTRASI -->
        <div class="register-form-side">
            <a href="{{ url('/') }}" class="back-home">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Beranda
            </a>

            <div class="form-header">
                <h2>Registrasi Akun 🍕</h2>
                <p>Lengkapi data diri di bawah ini untuk membuat akun baru.</p>
            </div>

            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.process') }}" method="POST">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <div class="input-wrapper">
                            <i class="fa-regular fa-user input-icon"></i>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Nama lengkap"
                                required
                                autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor WhatsApp / Telepon</label>
                        <div class="input-wrapper">
                            <i class="fa-brands fa-whatsapp input-icon"></i>
                            <input
                                type="text"
                                id="no_hp"
                                name="no_hp"
                                value="{{ old('no_hp') }}"
                                placeholder="Contoh: 081234567890"
                                required>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="email">Email</label>
                        <div class="input-wrapper">
                            <i class="fa-regular fa-envelope input-icon"></i>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock input-icon"></i>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Minimal 8 karakter"
                                required>
                            <button type="button" class="toggle-password" data-target="password" aria-label="Tampilkan Password">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-shield-halved input-icon"></i>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Ulangi password"
                                required>
                            <button type="button" class="toggle-password" data-target="password_confirmation" aria-label="Tampilkan Konfirmasi Password">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="address">Alamat Lengkap</label>
                        <div class="input-wrapper textarea-wrapper">
                            <i class="fa-solid fa-map-location-dot input-icon"></i>
                            <textarea
                                id="address"
                                name="address"
                                placeholder="Masukkan alamat lengkap pengiriman (nama jalan, nomor rumah, RT/RW, kelurahan)"
                                required>{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <span>Daftar & Lanjut Checkout</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <p class="login-prompt">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login</a>
            </p>
        </div>

    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach((btn) => {
            btn.addEventListener('click', () => {
                const targetInput = document.getElementById(btn.dataset.target);
                if (!targetInput) return;

                const isPassword = targetInput.type === 'password';
                targetInput.type = isPassword ? 'text' : 'password';
                btn.innerHTML = isPassword
                    ? '<i class="fa-regular fa-eye-slash"></i>'
                    : '<i class="fa-regular fa-eye"></i>';
            });
        });
    </script>

</body>
</html>