<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Pembayaran Berhasil - PizzaMozza</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #faf7f2;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 50px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 35px rgba(0,0,0,.08);
        }

        .success-icon {
            width: 80px;
            height: 80px;

            margin: auto;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #e8f5e9;
            color: #2e7d32;

            font-size: 40px;
        }

        h1 {
            margin-top: 25px;
        }

        p {
            color: #777;
            line-height: 1.6;
        }

        .button {
            display: inline-block;

            margin-top: 25px;

            padding: 14px 25px;

            background: #c62828;
            color: white;

            border-radius: 9px;

            text-decoration: none;
            font-weight: bold;
        }

    </style>

</head>


<body>

<div class="container">

    <div class="card">

        <div class="success-icon">
            ✓
        </div>

        <h1>
            Pembayaran Berhasil!
        </h1>

        <p>
            Terima kasih telah melakukan pemesanan
            di PizzaMozza.
        </p>

        <p>
            Pesanan kamu sedang diproses.
        </p>

        <a
            href="{{ route('dashboard') }}"
            class="button"
        >
            🍕 Kembali ke Menu
        </a>

    </div>

</div>

</body>

</html>