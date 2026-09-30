<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - PizzaMozza</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #faf7f2;
        }

        .container {
            width: 420px;
            max-width: 90%;
            margin: 80px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        .logo {
            text-align: center;
            color: #c62828;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 18px;
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

        .register {
            text-align: center;
            margin-top: 20px;
        }

        .register a {
            color: #c62828;
            text-decoration: none;
            font-weight: bold;
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

        <div class="logo">
            🍕 PizzaMozza
        </div>

        <h1>Login</h1>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                required
            >

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan password"
                required
            >

            <button type="submit">
                Login
            </button>

        </form>

        <div class="register">
            Belum punya akun?

            <a href="{{ route('register') }}">
                Daftar sekarang
            </a>
        </div>

    </div>

</div>

</body>
</html>