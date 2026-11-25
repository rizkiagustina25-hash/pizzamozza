
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Status Pembayaran - PizzaMozza</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #faf7f2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        .card {
            background: white;
            padding: 45px 35px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 35px rgba(0, 0, 0, .08);
        }

        .status-icon {
            width: 85px;
            height: 85px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 42px;
            font-weight: bold;
        }

        .success {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .pending {
            background: #fff3cd;
            color: #a87900;
        }

        .failed {
            background: #ffebee;
            color: #c62828;
        }

        .unknown {
            background: #eeeeee;
            color: #666;
        }

        h1 {
            margin-bottom: 15px;
            color: #333;
            font-size: 27px;
        }

        p {
            color: #777;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .order-info {
            background: #faf7f2;
            padding: 16px;
            border-radius: 10px;
            margin-top: 25px;
            text-align: left;
        }

        .order-info p {
            margin: 5px 0;
            color: #555;
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
            transition: .2s;
        }

        .button:hover {
            background: #a91f1f;
        }

        .refresh-button {
            display: inline-block;
            margin-top: 12px;
            padding: 12px 22px;
            border: 1px solid #c62828;
            color: #c62828;
            border-radius: 9px;
            text-decoration: none;
            font-weight: bold;
        }

        .refresh-button:hover {
            background: #fff0f0;
        }

        @media (max-width: 480px) {
            .card {
                padding: 35px 22px;
            }

            h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

@php
    $paymentStatus = $order->payment_status ?? 'unknown';

    $isPaid = $paymentStatus === 'paid';
    $isPending = $paymentStatus === 'pending';
    $isFailed = $paymentStatus === 'failed';
@endphp

<div class="container">
    <div class="card">

        @if($isPaid)

            <div class="status-icon success">✓</div>

            <h1>Pembayaran Berhasil!</h1>

            <p>
                Terima kasih telah melakukan pemesanan
                di PizzaMozza.
            </p>

            <p>
                Pembayaran kamu telah dikonfirmasi.
                Pesanan sedang diproses.
            </p>

        @elseif($isPending)

            <div class="status-icon pending">!</div>

            <h1>Menunggu Pembayaran</h1>

            <p>
                Pesanan kamu sudah dibuat, tetapi pembayaran
                belum dikonfirmasi oleh Midtrans.
            </p>

            <p>
                Silakan selesaikan pembayaran QRIS dan periksa
                kembali status pembayaran kamu.
            </p>

            <a
                href="{{ route('payment.success') }}"
                class="refresh-button"
            >
                ↻ Periksa Status Pembayaran
            </a>

        @elseif($isFailed)

            <div class="status-icon failed">✕</div>

            <h1>Pembayaran Gagal</h1>

            <p>
                Maaf, pembayaran pesanan kamu gagal,
                dibatalkan, atau sudah kedaluwarsa.
            </p>

            <p>
                Silakan hubungi admin PizzaMozza
                untuk mendapatkan bantuan.
            </p>

        @else

            <div class="status-icon unknown">?</div>

            <h1>Status Pesanan Tidak Ditemukan</h1>

            <p>
                Kami belum dapat menemukan informasi
                pembayaran pesanan kamu.
            </p>

        @endif

        @if($order)

            <div class="order-info">

                <p>
                    <strong>Nomor Pesanan:</strong>
                    #{{ $order->id }}
                </p>

                <p>
                    <strong>Total Pembayaran:</strong>
                    Rp{{ number_format((float) $order->total_price, 0, ',', '.') }}
                </p>

                <p>
                    <strong>Status:</strong>
                    {{ ucfirst($paymentStatus) }}
                </p>

                @if($order->paid_at)
                    <p>
                        <strong>Waktu Pembayaran:</strong>
                        {{ $order->paid_at->format('d-m-Y H:i') }}
                    </p>
                @endif

            </div>

        @endif

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
