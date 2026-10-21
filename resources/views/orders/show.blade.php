<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Pesanan</title>
</head>

<body style="font-family: Arial; padding: 30px;">

    <h1>Detail Pesanan</h1>

    <hr>

    <h2>Informasi Pesanan</h2>

    <p>
        <strong>ID:</strong>
        {{ $order->id }}
    </p>

    <p>
        <strong>User ID:</strong>
        {{ $order->user_id }}
    </p>

    <p>
        <strong>Total:</strong>
        Rp{{ number_format(
            $order->total_price,
            0,
            ',',
            '.'
        ) }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $order->status }}
    </p>

    <p>
        <strong>Status Pembayaran:</strong>
        {{ $order->payment_status }}
    </p>

    <p>
        <strong>Alamat:</strong>
        {{ $order->address }}
    </p>

    <hr>

    <h2>Produk Pesanan</h2>

    @forelse($order->items as $item)

        <div style="
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
        ">

            <p>
                <strong>Produk:</strong>

                {{ $item->product->name ?? 'Produk tidak ditemukan' }}
            </p>

            <p>
                <strong>Ukuran:</strong>

                {{ $item->variant->name ?? '-' }}
            </p>

            <p>
                <strong>Jumlah:</strong>

                {{ $item->quantity }}
            </p>

            <p>
                <strong>Harga:</strong>

                Rp{{ number_format(
                    $item->price,
                    0,
                    ',',
                    '.'
                ) }}
            </p>

            <p>
                <strong>Subtotal:</strong>

                Rp{{ number_format(
                    $item->subtotal,
                    0,
                    ',',
                    '.'
                ) }}
            </p>

        </div>

    @empty

        <p style="color: red;">
            Pesanan ini belum mempunyai produk.
        </p>

    @endforelse

    <br>

    <a href="{{ route('dashboard') }}?menu=orders">
        ← Kembali ke Pesanan Saya
    </a>

</body>

</html>