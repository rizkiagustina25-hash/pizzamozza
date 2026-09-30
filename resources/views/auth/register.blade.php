<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar - PizzaMozza</title>

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
            width: 500px;
            max-width: 90%;
            margin: 50px auto;
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

        input,
        textarea {
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

        <div class="logo">
            🍕 PizzaMozza
        </div>

        <h1>Registrasi Akun</h1>

        @if ($errors->any())

            <div class="error">

                <ul style="margin: 0; padding-left: 20px;">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form
            action="{{ route('register.process') }}"
            method="POST"
        >

            @csrf

            <label>
                Nama Lengkap
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Nama lengkap"
                required
            >


            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Email"
                required
            >


            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Minimal 8 karakter"
                required
            >


            <label>
                Konfirmasi Password
            </label>

            <input
                type="password"
                name="password_confirmation"
                placeholder="Ulangi password"
                required
            >


            <label>
                Alamat Lengkap
            </label>

            <textarea
                name="address"
                placeholder="Masukkan alamat lengkap pengiriman"
                required
            >{{ old('address') }}</textarea>


            <button type="submit">
                Daftar & Lanjut Checkout
            </button>

        </form>


        <div class="login">

            Sudah punya akun?

            <a href="{{ route('login') }}">
                Login
            </a>

        </div>

    </div>

</div>

</body>
</html>