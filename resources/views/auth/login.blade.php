<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PizzaMozza</title>

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

        .login-container {
            width: 100%;
            max-width: 980px;
            background: var(--white);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid #f5e5dc;
            display: grid;
            grid-template-columns: 1.05fr 1fr;
        }

        /* PANEL KIRI (VISUAL) */
        .login-visual {
            position: relative;
            background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=1200&q=85');
            background-size: cover;
            background-position: center;
            padding: 42px 38px;
            color: var(--white);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 560px;
        }

        .login-visual::before {
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
            font-size: 30px;
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
        .login-form-side {
            padding: 40px 44px;
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
            margin-bottom: 24px;
            width: fit-content;
            transition: .25s;
        }

        .back-home:hover {
            color: var(--red);
            transform: translateX(-3px);
        }

        .form-header {
            margin-bottom: 26px;
        }

        .form-header h2 {
            font-size: 26px;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 6px;
        }

        .form-header p {
            font-size: 13px;
            color: var(--muted);
        }

        .alert-box {
            padding: 12px 14px;
            border-radius: 13px;
            font-size: 12px;
            margin-bottom: 18px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            line-height: 1.5;
        }

        .alert-error {
            background: #fff1f1;
            border: 1px solid #f7c5c5;
            color: #a61b1d;
        }

        .alert-success {
            background: #eefbf3;
            border: 1px solid #bce8cb;
            color: #166534;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 7px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
        }

        .forgot-link {
            font-size: 12px;
            font-weight: 600;
            color: var(--red);
            transition: .2s;
        }

        .forgot-link:hover {
            color: var(--dark-red);
            text-decoration: underline;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i.input-icon {
            position: absolute;
            left: 15px;
            color: var(--muted);
            font-size: 14px;
            pointer-events: none;
            transition: .2s;
        }

        .input-wrapper input {
            width: 100%;
            padding: 13px 42px 13px 42px;
            border: 1.5px solid var(--border);
            border-radius: 14px;
            background: #fffcfa;
            font-family: inherit;
            font-size: 13px;
            color: var(--text);
            outline: none;
            transition: .25s;
        }

        .input-wrapper input:focus {
            border-color: var(--red);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(181, 30, 32, 0.08);
        }

        .input-wrapper:focus-within i.input-icon {
            color: var(--red);
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            color: var(--muted);
            font-size: 14px;
            cursor: pointer;
            padding: 4px;
        }

        .toggle-password:hover {
            color: var(--red);
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 22px;
            font-size: 12px;
            color: var(--muted);
        }

        .remember-row input[type="checkbox"] {
            accent-color: var(--red);
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
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

        .register-prompt {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
            color: var(--muted);
        }

        .register-prompt a {
            color: var(--red);
            font-weight: 700;
            margin-left: 4px;
        }

        .register-prompt a:hover {
            color: var(--dark-red);
            text-decoration: underline;
        }

        /* RESPONSIVE */
        @media (max-width: 820px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 460px;
            }

            .login-visual {
                min-height: auto;
                padding: 28px 26px;
            }

            .visual-bottom h1 {
                font-size: 22px;
                margin-top: 18px;
            }

            .visual-perks {
                display: none;
            }

            .login-form-side {
                padding: 30px 26px 34px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">

        <!-- SISI KIRI: VISUAL & BRANDING -->
        <div class="login-visual">
            <div class="visual-top">
                <a href="{{ route('home') }}" class="brand-badge">
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
                <h1>Hangatnya Pizza Favoritmu Menanti!</h1>
                <p>
                    Masuk ke akun PizzaMozza untuk memesan lebih cepat, memantau status pesanan, dan memberikan ulasan menu favoritmu.
                </p>

                <div class="visual-perks">
                    <div class="perk-item">
                        <i class="fa-solid fa-bolt"></i>
                        <span>Pemesanan cepat & praktis tanpa antre</span>
                    </div>
                    <div class="perk-item">
                        <i class="fa-solid fa-star"></i>
                        <span>Beri rating & ulasan pada setiap menu</span>
                    </div>
                    <div class="perk-item">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span>Pantau riwayat dan status pesanan real-time</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- SISI KANAN: FORM LOGIN -->
        <div class="login-form-side">
            <a href="{{ route('home') }}" class="back-home">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Beranda
            </a>

            <div class="form-header">
                <h2>Selamat Datang! 👋</h2>
                <p>Silakan masukkan email dan password akun Anda.</p>
            </div>

            @if (session('status'))
                <div class="alert-box alert-success">
                    <i class="fa-solid fa-circle-check" style="margin-top: 2px;"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-box alert-error">
                    <i class="fa-solid fa-circle-exclamation" style="margin-top: 2px;"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <div class="form-label-row">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-envelope input-icon"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required
                            autofocus
                            autocomplete="username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-row">
                        <label for="password">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                Lupa password?
                            </a>
                        @endif
                    </div>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password">
                        <button type="button" class="toggle-password" id="togglePassword" aria-label="Tampilkan Password">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>


                <button type="submit" class="submit-btn">
                    <span>Masuk Sekarang</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            @if (Route::has('register'))
                <p class="register-prompt">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar sekarang</a>
                </p>
            @endif
        </div>

    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', () => {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                togglePassword.innerHTML = isPassword
                    ? '<i class="fa-regular fa-eye-slash"></i>'
                    : '<i class="fa-regular fa-eye"></i>';
            });
        }
    </script>

</body>
</html>