<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} - Pizza Mozza</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f7f4ef;
        }

        .navbar {
            background: #b52323;
            padding: 20px 50px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
        }

        .product-detail {
            background: white;
            border-radius: 20px;
            padding: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .product-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            background: #eee;
        }

        .product-info {
            padding: 20px;
        }

        .product-info h1 {
            font-size: 35px;
            margin-bottom: 15px;
        }

        .description {
            color: #666;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .price {
            color: #b52323;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .stock {
            margin-bottom: 25px;
        }

        .button {
            display: inline-block;
            background: #b52323;
            color: white;
            text-decoration: none;
            border: none;
            padding: 13px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        @media (max-width: 700px) {
            .product-detail {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="{{ route('dashboard') }}">
            ← Kembali ke Dashboard
        </a>
    </div>

    <div class="container">

        <div class="product-detail">

            <div>
                @if ($product->image)
                    <img
                        src="{{ asset('image/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="product-image"
                    >
                @else
                    <div class="product-image"></div>
                @endif
            </div>

            <div class="product-info">

                <h1>{{ $product->name }}</h1>

                <p class="description">
                    {{ $product->description }}
                </p>

                <div class="price">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>

                <div class="stock">
                    Stok tersedia: <strong>{{ $product->stock }}</strong>
                </div>

                <button class="button">
                    🛒 Tambah ke Keranjang
                </button>

            </div>

        </div>

    </div>

</body>
</html>