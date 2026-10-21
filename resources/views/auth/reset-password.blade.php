```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - PizzaMozza</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .reset-card {
            width: 100%;
            max-width: 440px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            color: #b91c1c;
            text-align: center;
        }

        .description {
            color: #666;
            text-align: center;
            line-height: 1.5;
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button, .back-link {
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            text-align: center;
            text-decoration: none;
            font-size: 15px;
            cursor: pointer;
        }

        button {
            color: white;
            background: #b91c1c;
            font-weight: bold;
        }

        button:hover {
            background: #991b1b;
        }

        .back-link {
            margin-top: 12px;
            color: #444;
            background: #eee;
        }

        .error {
            margin: -10px 0 16px;
            color: #dc2626;
            font-size: 14px;
        }

        .success {
            margin-bottom: 16px;
            padding: 12px;
            color: #166534;
            background: #dcfce7;
            border-radius: 6px;
        }
    </style>
</head>

<body>
    <main class="reset-card">
        <h1>Reset Password</h1>

        <p class="description">
            Masukkan password lama dan password baru untuk mengubah password akunmu.
        </p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('password.reset.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label for="current_password">Password Lama</label>
            <input
                type="password"
                id="current_password"
                name="current_password"
                autocomplete="current-password"
                required
            >

            <label for="password">Password Baru</label>
            <input
                type="password"
                id="password"
                name="password"
                autocomplete="new-password"
                required
            >

            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                autocomplete="new-password"
                required
            >

            <button type="submit">Simpan Password Baru</button>
        </form>

        <a class="back-link"
           href="{{ route('dashboard', ['menu' => 'profile']) }}">
            Kembali ke Profile
        </a>
    </main>
</body>
</html>
```