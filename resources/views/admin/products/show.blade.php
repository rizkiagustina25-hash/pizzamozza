
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} - PizzaMozza</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50 min-h-screen">

    <main class="p-6 md:p-8 max-w-5xl mx-auto">

        <!-- HEADER -->
        <div class="mb-8">

            <a href="{{ route('admin.products.index') }}"
               class="text-gray-600 hover:text-orange-500">
                ← Kembali ke Produk
            </a>

            <h1 class="text-3xl font-bold text-gray-800 mt-4">
                👀 Detail Produk
            </h1>

            <p class="text-gray-500 mt-2">
                Informasi lengkap produk PizzaMozza.
            </p>

        </div>

        <!-- DETAIL PRODUK -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">

            <div class="grid md:grid-cols-2">

                <!-- GAMBAR -->
                <div class="bg-orange-100 p-6 md:p-8 flex items-center justify-center">

                    @if ($product->image)
                        <img
                            src="{{ asset('image/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="w-full max-w-md h-72 md:h-80 object-cover rounded-2xl shadow"
                        >
                    @else
                        <div class="w-full max-w-md h-72 md:h-80 bg-orange-200 rounded-2xl flex items-center justify-center">
                            <span class="text-8xl" aria-label="Gambar produk belum tersedia">
                                🍕
                            </span>
                        </div>
                    @endif

                </div>

                <!-- INFORMASI -->
                <div class="p-6 md:p-8">

                    <div class="mb-6">

                        <span class="inline-block px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-sm font-semibold uppercase">
                            {{ $product->category }}
                        </span>

                        <h2 class="text-3xl font-bold text-gray-800 mt-3 break-words">
                            {{ $product->name }}
                        </h2>

                        <p class="text-sm text-gray-400 mt-2">
                            ID Produk: {{ $product->id }}
                        </p>

                    </div>

                    <!-- HARGA -->
                    <div class="mb-5">
                        <p class="text-sm text-gray-500">
                            Harga Dasar
                        </p>

                        <p class="text-2xl font-bold text-orange-500 mt-1">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>

                    <!-- STOK -->
                    <div class="mb-5">

                        <p class="text-sm text-gray-500">
                            Stok
                        </p>

                        @if ($product->stock > 0)
                            <p class="text-lg font-semibold text-green-600 mt-1">
                                {{ $product->stock }} tersedia
                            </p>
                        @else
                            <p class="text-lg font-semibold text-red-600 mt-1">
                                Habis
                            </p>
                        @endif

                    </div>

                    <!-- DESKRIPSI -->
                    <div class="mb-2">

                        <p class="text-sm text-gray-500">
                            Deskripsi
                        </p>

                        <p class="text-gray-700 mt-2 leading-relaxed whitespace-pre-line break-words">
                            {{ $product->description ?: 'Tidak ada deskripsi produk.' }}
                        </p>

                    </div>

                </div>

            </div>

            <!-- VARIAN PRODUK -->
            <div class="border-t border-gray-200 p-6 md:p-8">

                <h3 class="text-2xl font-bold text-gray-800 mb-5">
                    📦 Varian Produk
                </h3>

                @if ($product->variants->count() > 0)

                    <div class="grid md:grid-cols-2 gap-4">

                        @foreach ($product->variants as $variant)

                            <div class="border border-gray-200 rounded-xl p-5 hover:border-orange-300 transition">

                                <div class="flex flex-wrap items-center justify-between gap-3">

                                    <div>
                                        <p class="font-bold text-gray-800">
                                            {{ $variant->name }}
                                        </p>

                                        <p class="text-sm text-gray-500 mt-1">
                                            Varian produk
                                        </p>
                                    </div>

                                    <p class="text-lg font-bold text-orange-500">
                                        Rp {{ number_format($variant->price, 0, ',', '.') }}
                                    </p>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                        <p class="text-gray-500">
                            Produk ini belum memiliki varian.
                        </p>
                    </div>

                @endif

            </div>

            <!-- TOMBOL AKSI -->
            <div class="border-t border-gray-200 bg-gray-50 p-6 flex flex-col sm:flex-row flex-wrap justify-end gap-3">

                <a
                    href="{{ route('admin.products.index') }}"
                    class="text-center px-6 py-3 rounded-xl bg-gray-200 text-gray-700 hover:bg-gray-300"
                >
                    ← Kembali
                </a>

                <a
                    href="{{ route('admin.products.edit', $product) }}"
                    class="text-center px-6 py-3 rounded-xl bg-orange-500 text-white font-semibold hover:bg-orange-600"
                >
                    ✏️ Edit Produk
                </a>

                <form
                    action="{{ route('admin.products.destroy', $product) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus produk ' + {{ Illuminate\Support\Js::from($product->name) }} + '?')"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="w-full px-6 py-3 rounded-xl bg-red-500 text-white font-semibold hover:bg-red-600"
                    >
                        🗑️ Hapus Produk
                    </button>
                </form>

            </div>

        </div>

    </main>

</body>

</html>
