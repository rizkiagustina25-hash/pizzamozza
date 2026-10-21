
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - PizzaMozza</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #faf7f2;
        }

        .container {
            width: 500px;
            max-width: 90%;
            margin: 50px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .logo {
            text-align: center;
            color: #c62828;
            font-size: 28px;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 18px;
            font-family: inherit;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #c62828;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .login {
            text-align: center;
            margin-top: 20px;
        }

        .login a {
            color: #c62828;
            font-weight: bold;
            text-decoration: none;
        }

        .error {
            background: #ffeaea;
            color: #b71c1c;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="card">
        <div class="logo">🍕 PizzaMozza</div>
        <h1>Registrasi Akun</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST">
            @csrf

            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name') }}"
                   placeholder="Nama lengkap" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                   value="{{ old('email') }}"
                   placeholder="Email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                   placeholder="Minimal 8 karakter" required>

            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation"
                   name="password_confirmation"
                   placeholder="Ulangi password" required>

            <label for="no_hp">Nomor WhatsApp / Telepon</label>
            <input type="text" id="no_hp" name="no_hp"
                   value="{{ old('no_hp') }}"
                   placeholder="Contoh: 081234567890" required>

            <label for="address">Alamat Lengkap</label>
            <textarea id="address" name="address"
                      placeholder="Masukkan alamat lengkap pengiriman"
                      required>{{ old('address') }}</textarea>

            <button type="submit">Daftar &amp; Lanjut Checkout</button>
        </form>

        <div class="login">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</div>
</body>
</html>
