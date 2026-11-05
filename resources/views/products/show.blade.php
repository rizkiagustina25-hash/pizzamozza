
@php
    $isNastar = mb_strtolower(trim($product->name)) === 'kue nastar';

    $cartCount = array_sum(
        array_column(session()->get('cart', []), 'quantity')
    );
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} - PizzaMozza</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        
/* =========================================
   SIDEBAR PIZZAMOZZA
========================================= */

:root {
    --dashboard-red: #941919;
    --dashboard-red-hover: #b52d2d;
}

.app-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    width: 265px;
    background: var(--dashboard-red);
    border-right: none;
    display: flex;
    flex-direction: column;
    z-index: 100;
    transition: transform .25s ease;
}

/* BRAND */

.app-brand {
    height: 88px;
    padding: 18px 24px;
    display: flex;
    align-items: center;
    gap: 11px;
    border-bottom: 1px solid rgba(255,255,255,.15);
    color: #fff;
    text-decoration: none;
    flex-shrink: 0;
}

.app-brand-icon {
    width: 38px;
    height: 38px;
    flex-shrink: 0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--dashboard-red-hover);
    color: #fff;
    font-size: 20px;
}

.app-brand-name {
    font-size: 23px;
    font-weight: 700;
    line-height: 1.1;
    color: #fff;
}

.app-brand-subtitle {
    margin-top: 4px;
    font-size: 11px;
    color: #f5dede;
}

/* MENU */

.app-menu {
    padding: 24px 15px;
    flex: 1;
}

.app-menu-label {
    margin: 0 12px 12px;
    font-size: 10px;
    font-weight: 700;
    color: #f5dede;
    letter-spacing: .8px;
    text-transform: uppercase;
}

.app-menu-link {
    min-height: 45px;
    padding: 0 14px;
    margin-bottom: 5px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    gap: 12px;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: .2s ease;
}

.app-menu-link i {
    width: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

.app-menu-link:hover,
.app-menu-link.active {
    background: var(--dashboard-red-hover);
    color: #fff;
}

/* PROFIL BAWAH SIDEBAR */

.app-profile {
    margin-top: auto;
    padding: 18px 16px;
    border-top: 1px solid rgba(255,255,255,.15);
    color: #fff;
    font-size: 13px;
}

.app-profile-info {
    display: flex;
    align-items: center;
    gap: 11px;
    margin-bottom: 15px;
    padding: 5px 6px;
}

.app-profile-avatar {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
    border-radius: 50%;
    background: var(--dashboard-red-hover);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 17px;
}

.app-profile-name {
    min-width: 0;
}

.app-profile-name strong {
    display: block;
    font-size: 12px;
    color: #fff;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.app-profile-name span {
    display: block;
    margin-top: 4px;
    font-size: 10px;
    color: #f5dede;
}

.app-logout-button {
    width: 100%;
    height: 38px;
    border: 1px solid rgba(255,255,255,.4);
    border-radius: 8px;
    background: #fff;
    color: #941919;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: .2s ease;
}

.app-logout-button:hover {
    background: #f5dede;
}

/* MAIN */

.app-main {
    margin-left: 265px;
    min-height: 100vh;
}

/* RESPONSIVE */

@media (max-width: 800px) {
    .app-sidebar {
        transform: translateX(-100%);
    }

    .app-sidebar.open {
        transform: translateX(0);
    }

    .app-main {
        margin-left: 0;
    }

    .app-menu-toggle {
        display: block;
    }
}

    </style>
</head>

<body class="bg-orange-50 min-h-screen">

    {{-- =========================================
         SIDEBAR
    ========================================= --}}

    
<aside class="app-sidebar" id="appSidebar">

    {{-- BRAND --}}
    <a href="{{ route('dashboard') }}" class="app-brand">

        <div class="app-brand-icon">
            <i class="fa-solid fa-pizza-slice"></i>
        </div>

        <div>
            <div class="app-brand-name">
                PizzaMozza
            </div>

            <div class="app-brand-subtitle">
                Pelanggan
            </div>
        </div>

    </a>

    {{-- MENU --}}
    <nav class="app-menu">

        <div class="app-menu-label">
            Main Menu
        </div>

        {{-- DASHBOARD --}}
        <a href="{{ route('dashboard') }}"
           class="app-menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-1x2"></i>
            <span>Dashboard</span>

        </a>

        {{-- PRODUK --}}
        <a href="{{ route('products.index') }}"
           class="app-menu-link {{ request()->routeIs('products.*') ? 'active' : '' }}">

            <i class="bi bi-box-seam"></i>
            <span>Produk</span>

        </a>

        {{-- PESANAN SAYA --}}
        <a href="{{ route('dashboard') }}"
           class="app-menu-link">

            <i class="bi bi-receipt"></i>
            <span>Pesanan Saya</span>

        </a>

        {{-- AKUN SAYA --}}
        <a href="{{ route('dashboard') }}"
           class="app-menu-link">

            <i class="bi bi-person"></i>
            <span>Akun Saya</span>

        </a>

    </nav>

    {{-- PROFIL --}}
    <div class="app-profile">

        <div class="app-profile-info">

            <div class="app-profile-avatar">
                <i class="bi bi-person"></i>
            </div>

            <div class="app-profile-name">

                <strong>
                    {{ auth()->user()->name ?? 'Pelanggan' }}
                </strong>

                <span>
                    PizzaMozza
                </span>

            </div>

        </div>

        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="app-logout-button">
                    <i class="bi bi-box-arrow-right"></i>
                    Keluar
                </button>
            </form>
        @endauth

    </div>

</aside>



    {{-- =========================================
         MAIN WRAPPER
    ========================================= --}}

    <div class="app-main">

        {{-- TOPBAR --}}

        <header class="app-topbar">

            <button
                type="button"
                class="app-menu-toggle"
                onclick="document.getElementById('appSidebar').classList.toggle('open')"
                aria-label="Buka menu">

                <i class="bi bi-list"></i>

            </button>

            <span class="font-semibold text-gray-700">
                Detail Produk
            </span>

            <a href="{{ route('cart.index') }}"
               class="topbar-cart-button"
               aria-label="Keranjang">

                <i class="bi bi-cart3"></i>

                <span class="cart-badge">
                    {{ $cartCount }}
                </span>

            </a>

        </header>


        {{-- =========================================
             MAIN CONTENT
        ========================================= --}}

        <main class="max-w-7xl mx-auto px-5 lg:px-8 py-8">

            {{-- BREADCRUMB --}}

            <div class="flex items-center gap-2 text-sm mb-7">

                <a href="{{ route('dashboard') }}"
                   class="text-gray-400 hover:text-orange-500 transition">

                    Beranda

                </a>

                <span class="text-gray-300">/</span>

                <span class="text-orange-500 font-semibold">
                    Detail Produk
                </span>

            </div>


            {{-- BACK BUTTON --}}

            <a href="{{ route('dashboard') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-orange-500 transition mb-6">

                <i class="bi bi-arrow-left"></i>
                Kembali ke Dashboard

            </a>


            {{-- =========================================
                 PRODUCT DETAIL
            ========================================= --}}

            <div class="bg-white rounded-3xl shadow-sm border border-orange-100 overflow-hidden">

                <div class="grid grid-cols-1 lg:grid-cols-2">

                    {{-- GAMBAR PRODUK --}}

                    <div class="bg-orange-50 min-h-[420px] flex items-center justify-center p-8">

                        <div class="w-full max-w-lg aspect-square rounded-3xl bg-white shadow-sm overflow-hidden flex items-center justify-center">

                            @if ($product->image)

                                <img
                                    src="{{ asset('image/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover"
                                    onerror="this.style.display='none'; this.parentElement.innerHTML='<span class=\'text-8xl\'>🍕</span>';"
                                >

                            @else

                                <span class="text-8xl">
                                    {{ $product->category === 'pizza' ? '🍕' : '🍠' }}
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- INFORMASI PRODUK --}}

                    <div class="p-7 lg:p-10">

                        {{-- CATEGORY --}}

                        <div class="flex items-center gap-2 mb-3">

                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-orange-100 text-orange-600 text-xs font-bold">

                                {{ ucfirst($product->category ?? 'Pizza') }}

                            </span>

                        </div>


                        {{-- PRODUCT NAME --}}

                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-800">

                            {{ $product->name }}

                        </h1>


                        {{-- DESCRIPTION --}}

                        @if ($product->description)

                            <p class="text-gray-500 mt-4 leading-relaxed">

                                {{ $product->description }}

                            </p>

                        @else

                            <p class="text-gray-500 mt-4 leading-relaxed">

                                Nikmati {{ $product->name }}
                                dengan cita rasa khas PizzaMozza.

                            </p>

                        @endif


                        <div class="border-t border-gray-100 my-6"></div>


                        {{-- =========================================
                             FORM PRODUK
                        ========================================= --}}

                        <form
                            action="{{ route('cart.add') }}"
                            method="POST"
                            id="productForm"
                        >

                            @csrf

                            <input type="hidden"
                                   name="product_id"
                                   value="{{ $product->id }}">


                            {{-- VARIANT --}}

                            @if ($product->variants->count() > 0)

                                <div>

                                    <div class="flex items-center justify-between mb-3">

                                        <label class="font-bold text-gray-800">
                                            Pilih Ukuran
                                        </label>

                                        <span class="text-xs text-gray-400">
                                            Wajib dipilih
                                        </span>

                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                                        @foreach ($product->variants as $index => $variant)

                                            <label class="variant-option cursor-pointer">

                                                <input
                                                    type="radio"
                                                    name="variant_id"
                                                    value="{{ $variant->id }}"
                                                    data-price="{{ $variant->price }}"
                                                    data-name="{{ $variant->name }}"
                                                    class="hidden variant-radio"
                                                    {{ $index === 0 ? 'checked' : '' }}
                                                >

                                                <div class="variant-card border-2 border-gray-200 rounded-xl p-4 hover:border-orange-400 transition">

                                                    <div class="flex items-center justify-between">

                                                        <div>

                                                            <p class="font-bold text-gray-800">
                                                                {{ $variant->name }}
                                                            </p>

                                                            <p class="text-xs text-gray-400 mt-1">
                                                                Pilihan ukuran
                                                            </p>

                                                        </div>

                                                        <div class="text-orange-600 font-bold">

                                                            Rp{{ number_format($variant->price, 0, ',', '.') }}

                                                        </div>

                                                    </div>

                                                </div>

                                            </label>

                                        @endforeach

                                    </div>

                                </div>

                            @else

                                <div class="bg-orange-50 rounded-xl p-4">

                                    <p class="text-sm text-gray-500">
                                        Harga produk
                                    </p>

                                    <p class="text-2xl font-bold text-orange-600 mt-1">

                                        Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}

                                    </p>

                                </div>

                            @endif


                            {{-- TOPPINGS --}}

                            @if (isset($toppings) && $toppings->count() > 0 && $product->category === 'pizza')

                                <div class="mt-7">

                                    <div class="flex items-center justify-between mb-3">

                                        <label class="font-bold text-gray-800">
                                            Tambahan Topping
                                        </label>

                                        <span class="text-xs text-gray-400">
                                            Opsional
                                        </span>

                                    </div>

                                    <div class="space-y-2">

                                        @foreach ($toppings as $topping)

                                            <label class="topping-option flex items-center justify-between gap-3 border border-gray-200 rounded-xl p-3 cursor-pointer hover:border-orange-300 hover:bg-orange-50 transition">

                                                <div class="flex items-center gap-3">

                                                    <input
                                                        type="checkbox"
                                                        name="toppings[]"
                                                        value="{{ $topping->id }}"
                                                        data-medium="{{ $topping->price_medium }}"
                                                        data-large="{{ $topping->price_large }}"
                                                        class="topping-checkbox w-4 h-4 accent-orange-500"
                                                    >

                                                    <div>

                                                        <p class="font-semibold text-gray-700 text-sm">
                                                            {{ $topping->name }}
                                                        </p>

                                                        <p class="topping-price text-xs text-gray-400">

                                                            + Rp{{ number_format($topping->price_medium, 0, ',', '.') }}

                                                        </p>

                                                    </div>

                                                </div>

                                                <i class="bi bi-plus-circle text-orange-500"></i>

                                            </label>

                                        @endforeach

                                    </div>

                                </div>

                            @endif


                            {{-- QUANTITY --}}

                            <div class="mt-7">

                                <label class="font-bold text-gray-800 block mb-3">
                                    Jumlah
                                </label>

                                <div class="flex items-center">

                                    <button
                                        type="button"
                                        onclick="decreaseQty()"
                                        class="w-11 h-11 rounded-l-xl bg-gray-100 hover:bg-orange-100 hover:text-orange-600 font-bold text-lg transition">

                                        −

                                    </button>

                                    <input
                                        type="number"
                                        id="quantity"
                                        name="quantity"
                                        value="1"
                                        min="1"
                                        class="w-16 h-11 border-y border-gray-200 text-center font-bold text-gray-700 focus:outline-none"
                                    >

                                    <button
                                        type="button"
                                        onclick="increaseQty()"
                                        class="w-11 h-11 rounded-r-xl bg-gray-100 hover:bg-orange-100 hover:text-orange-600 font-bold text-lg transition">

                                        +

                                    </button>

                                </div>

                            </div>


                            {{-- PRE ORDER DATE KHUSUS NASTAR --}}

                            @if ($isNastar)

                                <div class="mt-6">

                                    <label for="po_date"
                                           class="block font-bold text-gray-800 mb-2">

                                        Tanggal Pre-Order

                                    </label>

                                    <input
                                        type="date"
                                        id="po_date"
                                        min="{{ now()->toDateString() }}"
                                        required
                                        class="w-full border border-gray-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-orange-400"
                                    >

                                    <p class="text-sm text-gray-500 mt-2">

                                        Pilih tanggal yang kamu inginkan untuk pesanan Kue Nastar.

                                    </p>

                                </div>

                            @endif


                            {{-- TOTAL PRICE --}}

                            <div class="mt-7 bg-orange-50 rounded-2xl p-5">

                                <div class="flex justify-between items-center">

                                    <div>

                                        <p class="text-xs text-gray-400">
                                            Total Harga
                                        </p>

                                        <p id="totalPrice"
                                           class="text-2xl font-bold text-orange-600 mt-1">

                                            Rp0

                                        </p>

                                    </div>

                                    <div class="text-xs text-gray-400 text-right">

                                        <p>Termasuk topping</p>
                                        <p>Sesuai pilihan kamu</p>

                                    </div>

                                </div>

                            </div>


                            {{-- BUTTON KHUSUS NASTAR --}}

                            @if ($isNastar)

                                <button
                                    type="button"
                                    onclick="orderViaWhatsApp()"
                                    class="w-full mt-5 bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-xl transition shadow-sm flex items-center justify-center gap-2">

                                    <i class="bi bi-whatsapp text-xl"></i>
                                    Pesan Kue Nastar via WhatsApp

                                </button>

                            @else

                                <button
                                    type="submit"
                                    class="w-full mt-5 bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-xl transition shadow-sm flex items-center justify-center gap-2">

                                    <i class="bi bi-cart-plus"></i>
                                    Tambah ke Keranjang

                                </button>

                            @endif

                        </form>

                    </div>

                </div>

            </div>


            {{-- PRODUCT DESCRIPTION CARD --}}

            <div class="mt-7 bg-white rounded-2xl border border-orange-100 shadow-sm p-6">

                <h2 class="text-lg font-bold text-gray-800">
                    Tentang Produk
                </h2>

                <p class="text-gray-500 text-sm leading-relaxed mt-3">

                    {{ $product->description ?? 'Pizza lezat dengan bahan pilihan dan cita rasa khas PizzaMozza. Cocok dinikmati bersama keluarga maupun teman.' }}

                </p>

            </div>

        </main>


        {{-- FOOTER --}}

        <footer class="mt-12 bg-white border-t border-orange-100">

            <div class="max-w-7xl mx-auto px-5 lg:px-8 py-7 text-center">

                <p class="text-sm text-gray-400">

                    © {{ date('Y') }} PizzaMozza.
                    Semua hak dilindungi.

                </p>

            </div>

        </footer>

    </div>


    {{-- =========================================
         JAVASCRIPT
    ========================================= --}}

    <script>

        const variantRadios =
            document.querySelectorAll('.variant-radio');

        const toppingCheckboxes =
            document.querySelectorAll('.topping-checkbox');

        const quantityInput =
            document.getElementById('quantity');

        const totalPrice =
            document.getElementById('totalPrice');


        /*
        ==========================================
        SELECTED VARIANT
        ==========================================
        */

        function getSelectedVariant() {

            const selected = document.querySelector(
                '.variant-radio:checked'
            );

            if (!selected) {

                return {
                    price: Number(@json((float) ($product->price ?? 0))),
                    name: ''
                };

            }

            return {
                price: parseFloat(selected.dataset.price) || 0,
                name: selected.dataset.name || ''
            };

        }


        /*
        ==========================================
        FORMAT RUPIAH
        ==========================================
        */

        function formatRupiah(number) {

            return new Intl.NumberFormat('id-ID').format(number);

        }


        /*
        ==========================================
        UPDATE TOPPING PRICE
        ==========================================
        */

        function updateToppingPrices() {

            const variant = getSelectedVariant();

            const variantName = variant.name.toLowerCase();

            const isLarge =
                variantName.includes('large') ||
                variantName.includes('besar');

            toppingCheckboxes.forEach(checkbox => {

                const medium = parseFloat(checkbox.dataset.medium) || 0;
                const large = parseFloat(checkbox.dataset.large) || 0;

                const priceElement = checkbox
                    .closest('.topping-option')
                    ?.querySelector('.topping-price');

                const price = isLarge ? large : medium;

                if (priceElement) {

                    priceElement.textContent =
                        '+ Rp' + formatRupiah(price);

                }

            });

        }


        /*
        ==========================================
        CALCULATE TOTAL
        ==========================================
        */

        function calculateTotal() {

            const variant = getSelectedVariant();

            let price = variant.price;

            const variantName = variant.name.toLowerCase();

            const isLarge =
                variantName.includes('large') ||
                variantName.includes('besar');

            toppingCheckboxes.forEach(checkbox => {

                if (checkbox.checked) {

                    const medium = parseFloat(checkbox.dataset.medium) || 0;
                    const large = parseFloat(checkbox.dataset.large) || 0;

                    price += isLarge ? large : medium;

                }

            });

            let quantity = parseInt(quantityInput.value, 10) || 1;

            if (quantity < 1) {
                quantity = 1;
            }

            const total = price * quantity;

            totalPrice.textContent =
                'Rp' + formatRupiah(total);

        }


        /*
        ==========================================
        QUANTITY
        ==========================================
        */

        function increaseQty() {

            const current = parseInt(quantityInput.value, 10) || 1;

            quantityInput.value = current + 1;

            calculateTotal();

        }


        function decreaseQty() {

            const current = parseInt(quantityInput.value, 10) || 1;

            quantityInput.value = Math.max(1, current - 1);

            calculateTotal();

        }


        /*
        ==========================================
        VARIANT EVENT
        ==========================================
        */

        variantRadios.forEach(radio => {

            radio.addEventListener('change', function () {

                updateToppingPrices();

                calculateTotal();

            });

        });


        /*
        ==========================================
        TOPPING EVENT
        ==========================================
        */

        toppingCheckboxes.forEach(checkbox => {

            checkbox.addEventListener('change', calculateTotal);

        });


        /*
        ==========================================
        QUANTITY EVENT
        ==========================================
        */

        quantityInput.addEventListener('input', calculateTotal);

        quantityInput.addEventListener('change', function () {

            if (!this.value || parseInt(this.value, 10) < 1) {
                this.value = 1;
            }

            calculateTotal();

        });


        /*
        ==========================================
        INITIALIZE
        ==========================================
        */

        document.addEventListener('DOMContentLoaded', function () {

            updateToppingPrices();

            calculateTotal();

        });


        /*
        ==========================================
        WHATSAPP PRE-ORDER NASTAR
        ==========================================
        */

        function orderViaWhatsApp() {

            const quantity = parseInt(quantityInput.value, 10);

            const dateInput = document.getElementById('po_date');

            const poDate = dateInput.value;

            if (!Number.isInteger(quantity) || quantity < 1) {

                alert('Jumlah pesanan minimal 1.');

                quantityInput.focus();

                return;

            }

            if (!poDate) {

                alert('Silakan pilih tanggal Pre-Order.');

                dateInput.focus();

                return;

            }

            const today = new Date();

            today.setHours(0, 0, 0, 0);

            const selectedDate = new Date(poDate + 'T00:00:00');

            if (selectedDate < today) {

                alert('Tanggal Pre-Order tidak boleh sebelum hari ini.');

                dateInput.focus();

                return;

            }


            const productName = @json($product->name);

            const unitPrice = Number(@json((float) ($product->price ?? 0)));

            const total = unitPrice * quantity;

            const sellerNumber = @json(config('services.whatsapp.seller_number'));


            const formattedPrice = formatRupiah(unitPrice);

            const formattedTotal = formatRupiah(total);


            const message = [

                'Halo PizzaMozza, saya ingin memesan Pre-Order.',

                '',

                'Produk: ' + productName,

                'Jumlah: ' + quantity,

                'Harga satuan: Rp ' + formattedPrice,

                'Perkiraan total: Rp ' + formattedTotal,

                'Tanggal Pre-Order: ' + poDate,

                '',

                'Mohon konfirmasi ketersediaan dan pesanan saya. Terima kasih.'

            ].join('\n');


            if (!sellerNumber) {

                alert('Nomor WhatsApp penjual belum dikonfigurasi.');

                return;

            }


            const whatsappUrl =
                'https://wa.me/' + sellerNumber +
                '?text=' + encodeURIComponent(message);


            window.open(
                whatsappUrl,
                '_blank',
                'noopener,noreferrer'
            );

        }

    </script>

</body>
</html>
