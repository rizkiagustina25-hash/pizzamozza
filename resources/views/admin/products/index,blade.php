<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Produk - PizzaMozza</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50 min-h-screen">

    <main class="p-8 max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

            <div>
                <p class="text-orange-600 font-semibold">
                    PizzaMozza
                </p>

                <h1 class="text-3xl font-bold text-gray-800 mt-1">
                    🍕 Kelola Produk
                </h1>

                <p class="text-gray-500 mt-2">
                    Kelola produk dan varian PizzaMozza.
                </p>
            </div>

            <div class="flex gap-3">

                <!-- Kembali ke dashboard sesuai role -->
                <a
                    href="{{ auth()->user()->role === 'admin'
                        ? route('admin.dashboard')
                        : route('karyawan.dashboard') }}"
                    class="bg-gray-800 text-white px-5 py-3 rounded-xl hover:bg-gray-700 transition"
                >
                    ← Dashboard
                </a>

                <!-- Tambah produk -->
                <a
                    href="{{ route('admin.products.create') }}"
                    class="bg-orange-500 text-white px-5 py-3 rounded-xl hover:bg-orange-600 transition"
                >
                    + Tambah Produk
                </a>

            </div>

        </div>


        <!-- PESAN SUKSES -->
        @if(session('success'))

            <div class="bg-green-100 border border-green-200 text-green-700 px-5 py-4 rounded-xl mb-6">

                {{ session('success') }}

            </div>

        @endif


        <!-- PESAN ERROR -->
        @if(session('error'))

            <div class="bg-red-100 border border-red-200 text-red-700 px-5 py-4 rounded-xl mb-6">

                {{ session('error') }}

            </div>

        @endif


        <!-- TABEL PRODUK -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <!-- HEADER TABLE -->
                    <thead class="bg-gray-900 text-white">

                        <tr>

                            <th class="px-6 py-4 text-left">
                                Produk
                            </th>

                            <th class="px-6 py-4 text-left">
                                Kategori
                            </th>

                            <th class="px-6 py-4 text-left">
                                Harga
                            </th>

                            <th class="px-6 py-4 text-left">
                                Stok
                            </th>

                            <th class="px-6 py-4 text-left">
                                Varian
                            </th>

                            <th class="px-6 py-4 text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <!-- ISI TABLE -->
                    <tbody class="divide-y">

                        @forelse($products as $product)

                            <tr class="hover:bg-orange-50 transition">


                                <!-- PRODUK -->
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-4">

                                        @if($product->image)

                                            <img
                                                src="{{ asset('image/' . $product->image) }}"
                                                alt="{{ $product->name }}"
                                                class="w-16 h-16 object-cover rounded-xl"
                                            >

                                        @else

                                            <div
                                                class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center text-2xl"
                                            >
                                                🍕
                                            </div>

                                        @endif


                                        <div>

                                            <p class="font-bold text-gray-800">
                                                {{ $product->name }}
                                            </p>

                                            <p class="text-sm text-gray-500">
                                                ID Produk: {{ $product->id }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- KATEGORI -->
                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-sm">

                                        {{ ucfirst($product->category) }}

                                    </span>

                                </td>


                                <!-- HARGA -->
                                <td class="px-6 py-4 font-semibold text-gray-700">

                                    Rp {{ number_format($product->price, 0, ',', '.') }}

                                </td>


                                <!-- STOK -->
                                <td class="px-6 py-4">

                                    @if($product->stock > 0)

                                        <span class="text-green-600 font-semibold">

                                            {{ $product->stock }}

                                        </span>

                                    @else

                                        <span class="text-red-600 font-semibold">

                                            Habis

                                        </span>

                                    @endif

                                </td>


                                <!-- VARIAN -->
                                <td class="px-6 py-4">

                                    @if($product->variants->count() > 0)

                                        <div class="space-y-1">

                                            @foreach($product->variants as $variant)

                                                <div class="text-sm text-gray-600">

                                                    <span class="font-medium">
                                                        {{ $variant->name }}
                                                    </span>

                                                    —

                                                    Rp {{ number_format($variant->price, 0, ',', '.') }}

                                                </div>

                                            @endforeach

                                        </div>

                                    @else

                                        <span class="text-gray-400 text-sm">

                                            Tidak ada varian

                                        </span>

                                    @endif

                                </td>


                                <!-- AKSI -->
                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <!-- LIHAT -->
                                        <a
                                            href="{{ route('admin.products.show', $product) }}"
                                            class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition"
                                        >
                                            Lihat
                                        </a>


                                        <!-- EDIT -->
                                        <a
                                            href="{{ route('admin.products.edit', $product) }}"
                                            class="bg-orange-500 text-white px-3 py-2 rounded-lg hover:bg-orange-600 transition"
                                        >
                                            Edit
                                        </a>


                                        <!-- HAPUS -->
                                        <form
                                            action="{{ route('admin.products.destroy', $product) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600 transition"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>


                        @empty

                            <!-- JIKA BELUM ADA PRODUK -->

                            <tr>

                                <td
                                    colspan="6"
                                    class="px-6 py-12 text-center"
                                >

                                    <div class="text-5xl mb-4">
                                        🍕
                                    </div>

                                    <p class="text-gray-500 text-lg">
                                        Belum ada produk.
                                    </p>

                                    <a
                                        href="{{ route('admin.products.create') }}"
                                        class="inline-block mt-4 bg-orange-500 text-white px-5 py-3 rounded-xl hover:bg-orange-600"
                                    >
                                        + Tambah Produk
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <!-- FOOTER -->

        <footer class="text-center text-gray-500 text-sm mt-8">

            © {{ date('Y') }} PizzaMozza.
            All rights reserved.

        </footer>

    </main>

</body>

</html>