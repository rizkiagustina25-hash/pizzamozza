<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $product->name }} - PizzaMozza
    </title>


    <style>

        /* =========================================
           RESET
        ========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =========================================
           BODY
        ========================================= */

        body {
            font-family: Arial, Helvetica, sans-serif;

            background: #faf7f2;

            color: #222;

            min-height: 100vh;
        }


        /* =========================================
           HEADER
        ========================================= */

        .header {
            height: 75px;

            background: #ffffff;

            border-bottom: 1px solid #eeeeee;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 70px;

            position: sticky;

            top: 0;

            z-index: 100;
        }


        .logo {
            font-size: 24px;

            font-weight: bold;

            color: #c62828;

            text-decoration: none;
        }


        .header-right {
            display: flex;

            align-items: center;

            gap: 25px;
        }


        .header-link {
            color: #333;

            text-decoration: none;

            font-size: 14px;

            transition: 0.2s;
        }


        .header-link:hover {
            color: #c62828;
        }


        /* =========================================
           CONTAINER
        ========================================= */

        .container {
            max-width: 1150px;

            margin: 0 auto;

            padding: 45px 30px 80px;
        }


        /* =========================================
           BACK BUTTON
        ========================================= */

        .back-button {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            color: #c62828;

            text-decoration: none;

            font-size: 14px;

            margin-bottom: 25px;

            transition: 0.2s;
        }


        .back-button:hover {
            color: #991d1d;
        }


        /* =========================================
           PRODUCT DETAIL
        ========================================= */

        .product-detail {
            background: #ffffff;

            border-radius: 20px;

            padding: 35px;

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 50px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.06);
        }


        /* =========================================
           PRODUCT IMAGE
        ========================================= */

        .image-container {
            width: 100%;
        }


        .product-image {
            width: 100%;

            height: 430px;

            object-fit: cover;

            border-radius: 16px;

            display: block;

            background: #f3c0b4;
        }


        .no-image {
            width: 100%;

            height: 430px;

            background: #f3c0b4;

            border-radius: 16px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 130px;
        }


        /* =========================================
           PRODUCT INFORMATION
        ========================================= */

        .product-info {
            padding-top: 5px;
        }


        .product-category {
            display: inline-block;

            background: #fff1f1;

            color: #c62828;

            padding: 7px 13px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: bold;

            margin-bottom: 15px;
        }


        .product-title {
            font-size: 34px;

            line-height: 1.2;

            margin-bottom: 15px;

            color: #222;
        }


        .description {
            color: #777;

            line-height: 1.7;

            font-size: 14px;

            margin-bottom: 30px;
        }


        /* =========================================
           LABEL
        ========================================= */

        .label {
            display: block;

            font-size: 15px;

            font-weight: bold;

            margin-bottom: 13px;
        }


        /* =========================================
           VARIANT
        ========================================= */

        .variants {
            display: flex;

            gap: 12px;

            flex-wrap: wrap;

            margin-bottom: 30px;
        }


        .variant {
            position: relative;
        }


        .variant input {
            position: absolute;

            opacity: 0;

            pointer-events: none;
        }


        .variant label {
            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            min-width: 135px;

            padding: 14px 20px;

            border: 2px solid #dddddd;

            border-radius: 12px;

            background: #ffffff;

            cursor: pointer;

            transition: 0.2s;
        }


        .variant label:hover {
            border-color: #e08b8b;
        }


        .variant input:checked + label {
            border-color: #c62828;

            background: #fff3f3;

            color: #c62828;
        }


        .variant-name {
            font-size: 14px;

            font-weight: bold;

            margin-bottom: 5px;
        }


        .variant-price {
            font-size: 13px;

            color: #555;
        }


        .variant input:checked + label .variant-price {
            color: #c62828;
        }


        /* =========================================
           TOPPING
        ========================================= */

        .toppings {
            margin-bottom: 30px;
        }


        .topping {
            width: 100%;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 14px 16px;

            border: 1px solid #dddddd;

            border-radius: 10px;

            margin-bottom: 10px;

            cursor: pointer;

            transition: 0.2s;
        }


        .topping:hover {
            border-color: #c62828;
        }


        .topping-left {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .topping input {
            width: 18px;

            height: 18px;

            accent-color: #c62828;

            cursor: pointer;
        }


        .topping-name {
            font-size: 14px;

            font-weight: 500;
        }


        .topping-price {
            font-size: 12px;

            color: #777;

            text-align: right;
        }


        /* =========================================
           QUANTITY
        ========================================= */

        .quantity-section {
            margin-bottom: 30px;
        }


        .quantity-control {
            width: 145px;

            height: 45px;

            border: 1px solid #dddddd;

            border-radius: 10px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            overflow: hidden;

            background: #ffffff;
        }


        .quantity-button {
            width: 42px;

            height: 100%;

            border: none;

            background: #ffffff;

            color: #c62828;

            font-size: 20px;

            cursor: pointer;

            transition: 0.2s;
        }


        .quantity-button:hover {
            background: #fff0f0;
        }


        .quantity-value {
            font-size: 15px;

            font-weight: bold;
        }


        /* =========================================
           PRICE
        ========================================= */

        .price-box {
            border-top: 1px solid #eeeeee;

            padding-top: 22px;

            margin-top: 5px;
        }


        .total-label {
            color: #777;

            font-size: 13px;

            margin-bottom: 5px;
        }


        .total-price {
            color: #c62828;

            font-size: 31px;

            font-weight: bold;

            margin-bottom: 20px;
        }


        /* =========================================
           BUTTONS
        ========================================= */

        .button-group {
            display: flex;

            gap: 10px;
        }


        .cart-button,
        .buy-button {
            flex: 1;

            border: none;

            padding: 14px 15px;

            border-radius: 10px;

            font-size: 14px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }


        .cart-button {
            background: #fff0f0;

            color: #c62828;

            border: 1px solid #c62828;
        }


        .cart-button:hover {
            background: #ffe1e1;
        }


        .buy-button {
            background: #c62828;

            color: #ffffff;
        }


        .buy-button:hover {
            background: #a91f1f;
        }


        /* =========================================
           INFORMATION BOX
        ========================================= */

        .info-box {
            margin-top: 20px;

            padding: 14px;

            background: #fafafa;

            border-radius: 10px;

            color: #777;

            font-size: 12px;

            line-height: 1.6;
        }


        /* =========================================
           FOOTER
        ========================================= */

        .footer {
            text-align: center;

            color: #999;

            font-size: 12px;

            margin-top: 50px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 900px) {

            .header {
                padding: 0 30px;
            }


            .product-detail {
                grid-template-columns: 1fr;

                gap: 30px;
            }


            .product-image,
            .no-image {
                height: 350px;
            }

        }


        @media (max-width: 600px) {

            .header {
                padding: 0 20px;
            }


            .header-right {
                gap: 10px;
            }


            .header-link:first-child {
                display: none;
            }


            .container {
                padding: 25px 15px 50px;
            }


            .product-detail {
                padding: 20px;

                border-radius: 15px;
            }


            .product-title {
                font-size: 27px;
            }


            .product-image,
            .no-image {
                height: 280px;
            }


            .button-group {
                flex-direction: column;
            }

        }

    </style>

</head>


<body>


    {{-- =========================================
         HEADER
    ========================================== --}}

    <header class="header">

        <a
            href="{{ route('dashboard') }}"
            class="logo"
        >
            🍕 PizzaMozza
        </a>


        <div class="header-right">

            <a
                href="{{ route('dashboard') }}"
                class="header-link"
            >
                🏠 Home
            </a>


            <a
                href="{{ route('cart.index') }}"
                class="header-link"
            >
                🛒 Keranjang
            </a>

        </div>

    </header>



    {{-- =========================================
         MAIN
    ========================================== --}}

    <main class="container">


        {{-- KEMBALI --}}

        <a
            href="{{ route('dashboard') }}"
            class="back-button"
        >
            ← Kembali ke menu
        </a>



        <div class="product-detail">


            {{-- =====================================
                 GAMBAR PRODUK
            ====================================== --}}

            <div class="image-container">

                @if ($product->image)

                    <img
                        src="{{ asset('image/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="product-image"
                    >

                @else

                    <div class="no-image">

                        @if ($product->category === 'pizza')

                            🍕

                        @else

                            🍠

                        @endif

                    </div>

                @endif

            </div>



            {{-- =====================================
                 INFORMASI PRODUK
            ====================================== --}}

            <div class="product-info">


                {{-- KATEGORI --}}

                <span class="product-category">

                    @if ($product->category === 'pizza')

                        🍕 Pizza

                    @elseif ($product->category === 'snack')

                        🍠 Snack

                    @else

                        {{ ucfirst($product->category) }}

                    @endif

                </span>



                {{-- NAMA PRODUK --}}

                <h1 class="product-title">

                    {{ $product->name }}

                </h1>



                {{-- DESKRIPSI --}}

                <p class="description">

                    {{ $product->description }}

                </p>



                {{-- =================================
                     VARIANT / UKURAN
                ================================== --}}

                <span class="label">

                    @if ($product->category === 'pizza')

                        Pilih Ukuran Pizza

                    @else

                        Pilih Ukuran Box

                    @endif

                </span>


                <div class="variants">

                    @foreach ($product->variants as $index => $variant)

                        <div class="variant">


                            <input
                                type="radio"
                                name="variant"
                                id="variant{{ $variant->id }}"
                                value="{{ $variant->id }}"
                                data-price="{{ $variant->price }}"
                                {{ $index === 0 ? 'checked' : '' }}
                            >


                            <label
                                for="variant{{ $variant->id }}"
                            >

                                <span class="variant-name">

                                    {{ $variant->name }}

                                </span>


                                <span class="variant-price">

                                    Rp
                                    {{ number_format(
                                        $variant->price,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            </label>

                        </div>

                    @endforeach

                </div>



                {{-- =================================
                     TOPPING KHUSUS PIZZA
                ================================== --}}

                @if ($product->category === 'pizza')

                    <div class="toppings">


                        <span class="label">

                            Tambahan Topping

                        </span>


                        @foreach ($toppings as $topping)

                            <label class="topping">


                                <div class="topping-left">


                                    <input
                                        type="checkbox"
                                        name="topping"
                                        value="{{ $topping->id }}"
                                        data-medium="{{ $topping->price_medium }}"
                                        data-large="{{ $topping->price_large }}"
                                    >


                                    <span class="topping-name">

                                        {{ $topping->name }}

                                    </span>


                                </div>


                                <span class="topping-price">

                                    Medium:
                                    +Rp
                                    {{ number_format(
                                        $topping->price_medium,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                    <br>

                                    Large:
                                    +Rp
                                    {{ number_format(
                                        $topping->price_large,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>


                            </label>

                        @endforeach

                    </div>

                @endif



                {{-- =================================
                     JUMLAH
                ================================== --}}

                <div class="quantity-section">


                    <span class="label">

                        Jumlah

                    </span>


                    <div class="quantity-control">


                        <button
                            type="button"
                            class="quantity-button"
                            onclick="decreaseQuantity()"
                        >
                            −
                        </button>


                        <span
                            class="quantity-value"
                            id="quantity"
                        >
                            1
                        </span>


                        <button
                            type="button"
                            class="quantity-button"
                            onclick="increaseQuantity()"
                        >
                            +
                        </button>


                    </div>

                </div>



                {{-- =================================
                     TOTAL HARGA
                ================================== --}}

                <div class="price-box">


                    <div class="total-label">

                        Total harga

                    </div>


                    <div
                        class="total-price"
                        id="totalPrice"
                    >
                        Rp0
                    </div>



                    {{-- =================================
                         BUTTON
                    ================================== --}}

                    <div class="button-group">


                        <form
    action="{{ route('cart.add') }}"
    method="POST"
    style="flex: 1;"
    onsubmit="return prepareCart()"
>
    @csrf

    <input
        type="hidden"
        name="variant_id"
        id="selectedVariant"
    >

    <input
        type="hidden"
        name="quantity"
        id="selectedQuantity"
        value="1"
    >

    <div id="toppingInputs"></div>

    <button
        type="submit"
        class="cart-button"
        style="width: 100%;"
    >
        🛒 Tambah ke Keranjang
    </button>

</form>


                        <button
                            type="button"
                            class="buy-button"
                            onclick="buyNow()"
                        >
                            ⚡ Beli Sekarang
                        </button>


                    </div>


                    <div class="info-box">

                        💡 Pilih ukuran dan jumlah produk
                        terlebih dahulu. Harga akan dihitung
                        secara otomatis.

                    </div>


                </div>


            </div>

        </div>



        {{-- =========================================
             FOOTER
        ========================================== --}}

        <footer class="footer">

            © {{ date('Y') }} PizzaMozza.
            Semua hak dilindungi.

        </footer>


    </main>



    {{-- =========================================
         JAVASCRIPT
    ========================================== --}}

    <script>

        function prepareCart()
{
    const selectedVariant =
        document.querySelector(
            'input[name="variant"]:checked'
        );

    if (!selectedVariant) {

        alert(
            'Silakan pilih ukuran terlebih dahulu.'
        );

        return false;
    }


    document.getElementById(
        'selectedVariant'
    ).value = selectedVariant.value;


    document.getElementById(
        'selectedQuantity'
    ).value = quantity;


    const toppingContainer =
        document.getElementById(
            'toppingInputs'
        );


    toppingContainer.innerHTML = '';


    toppingInputs.forEach(
        function(topping)
        {

            if (topping.checked)
            {

                const input =
                    document.createElement(
                        'input'
                    );

                input.type = 'hidden';

                input.name = 'toppings[]';

                input.value = topping.value;

                toppingContainer.appendChild(
                    input
                );

            }

        }
    );


    return true;
}

        /*
        ==========================================
        ELEMENT
        ==========================================
        */

        const variantInputs =
            document.querySelectorAll(
                'input[name="variant"]'
            );


        const toppingInputs =
            document.querySelectorAll(
                'input[name="topping"]'
            );


        const totalPriceElement =
            document.getElementById(
                'totalPrice'
            );


        const quantityElement =
            document.getElementById(
                'quantity'
            );


        /*
        ==========================================
        QUANTITY
        ==========================================
        */

        let quantity = 1;


        function increaseQuantity()
        {

            quantity++;

            quantityElement.innerText =
                quantity;

            calculateTotal();

        }


        function decreaseQuantity()
        {

            if (quantity > 1)
            {

                quantity--;

                quantityElement.innerText =
                    quantity;

                calculateTotal();

            }

        }


        /*
        ==========================================
        FORMAT RUPIAH
        ==========================================
        */

        function formatRupiah(number)
        {

            return new Intl.NumberFormat(
                'id-ID'
            ).format(number);

        }


        /*
        ==========================================
        HITUNG TOTAL
        ==========================================
        */

        function calculateTotal()
        {

            /*
            Ambil variant yang dipilih
            */

            const selectedVariant =
                document.querySelector(
                    'input[name="variant"]:checked'
                );


            /*
            Kalau belum ada variant
            */

            if (!selectedVariant)
            {

                totalPriceElement.innerText =
                    'Rp0';

                return;

            }


            /*
            Harga dasar
            */

            let total =
                Number(
                    selectedVariant.dataset.price
                );


            /*
            Nama variant
            */

            const variantName =
                selectedVariant
                    .parentElement
                    .querySelector(
                        '.variant-name'
                    )
                    .innerText
                    .toLowerCase();


            /*
            ======================================
            HITUNG TOPPING
            ======================================
            */

            toppingInputs.forEach(
                function(topping)
                {

                    if (topping.checked)
                    {

                        /*
                        Kalau Large
                        */

                        if (
                            variantName.includes(
                                'large'
                            )
                        )
                        {

                            total +=
                                Number(
                                    topping.dataset.large
                                );

                        }


                        /*
                        Selain Large
                        berarti Medium
                        */

                        else
                        {

                            total +=
                                Number(
                                    topping.dataset.medium
                                );

                        }

                    }

                }
            );


            /*
            ======================================
            KALIKAN JUMLAH
            ======================================
            */

            total =
                total * quantity;


            /*
            ======================================
            TAMPILKAN TOTAL
            ======================================
            */

            totalPriceElement.innerText =
                'Rp' +
                formatRupiah(total);

        }


        /*
        ==========================================
        EVENT VARIANT
        ==========================================
        */

        variantInputs.forEach(
            function(variant)
            {

                variant.addEventListener(
                    'change',
                    calculateTotal
                );

            }
        );


        /*
        ==========================================
        EVENT TOPPING
        ==========================================
        */

        toppingInputs.forEach(
            function(topping)
            {

                topping.addEventListener(
                    'change',
                    calculateTotal
                );

            }
        );


        /*
        ==========================================
        HITUNG SAAT HALAMAN DIBUKA
        ==========================================
        */

        calculateTotal();



        /*
        ==========================================
        TAMBAH KE KERANJANG
        ==========================================
        */

        function addToCart()
        {

            const selectedVariant =
                document.querySelector(
                    'input[name="variant"]:checked'
                );


            if (!selectedVariant)
            {

                alert(
                    'Silakan pilih ukuran terlebih dahulu.'
                );

                return;

            }


            alert(
                'Produk berhasil dipilih untuk keranjang.'
            );

        }



        /*
        ==========================================
        BELI SEKARANG
        ==========================================
        */

        function buyNow()
        {

            const selectedVariant =
                document.querySelector(
                    'input[name="variant"]:checked'
                );


            if (!selectedVariant)
            {

                alert(
                    'Silakan pilih ukuran terlebih dahulu.'
                );

                return;

            }


            

        }

    </script>


</body>

</html>