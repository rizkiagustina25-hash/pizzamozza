
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Produk - PizzaMozza</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50 min-h-screen">

    <main class="max-w-7xl mx-auto p-6 md:p-8">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <p class="text-orange-600 font-semibold">PizzaMozza</p>

                <h1 class="text-3xl font-bold text-gray-800 mt-1">
                    Kelola Produk
                </h1>

                <p class="text-gray-500 mt-2">
                    Kelola produk dan varian PizzaMozza.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <!-- KEMBALI KE DASHBOARD -->
                <a
                    href="{{ auth()->user()->role === 'admin'
                        ? route('admin.dashboard')
                        : route('karyawan.dashboard') }}"
                    class="bg-gray-800 text-white px-5 py-3 rounded-xl hover:bg-gray-700 transition"
                >
                    &larr; Dashboard
                </a>

                <!-- TAMBAH PRODUK -->
                <a
                    href="{{ route('admin.products.create') }}"
                    class="bg-orange-500 text-white px-5 py-3 rounded-xl hover:bg-orange-600 transition font-semibold"
                >
                    + Tambah Produk
                </a>
            </div>
        </div>

        <!-- NOTIFIKASI BERHASIL -->
        @if (session('success'))
            <div
                class="mb-6 rounded-xl border px-5 py-4"
                style="background:#ecfdf3;border-color:#a7f3d0;color:#166534"
                role="status"
            >
                <p class="font-semibold">
                    {{ session('success') }}
                </p>
            </div>
        @endif

        <!-- NOTIFIKASI ERROR -->
        @if (session('error'))
            <div
                class="mb-6 rounded-xl border px-5 py-4"
                style="background:#fff0ef;border-color:#efc5c2;color:#9b2424"
                role="alert"
            >
                <p class="font-semibold">
                    {{ session('error') }}
                </p>
            </div>
        @endif

        <!-- VALIDASI ERROR -->
        @if ($errors->any())
            <div
                class="mb-6 rounded-xl border px-5 py-4"
                style="background:#fff0ef;border-color:#efc5c2;color:#9b2424"
                role="alert"
            >
                <p class="font-semibold mb-2">
                    Terdapat kesalahan:
                </p>

                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- TABEL PRODUK -->
        <div class="bg-white rounded-2xl shadow-sm border border-orange-100 overflow-hidden">

            <div class="px-6 py-5 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-800">
                    Daftar Produk
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Berikut daftar produk yang tersedia di PizzaMozza.
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">

                    <thead class="bg-orange-50 text-gray-600 text-sm">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Produk</th>
                            <th class="px-6 py-4 font-semibold">Kategori</th>
                            <th class="px-6 py-4 font-semibold">Harga</th>
                            <th class="px-6 py-4 font-semibold">Stok</th>
                            <th class="px-6 py-4 font-semibold">Varian</th>
                            <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse ($products as $product)
                            <tr class="hover:bg-orange-50/50 transition">

                                <!-- NAMA PRODUK -->
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-bold text-gray-800">
                                            {{ $product->name }}
                                        </p>

                                        <p class="text-sm text-gray-500 mt-1">
                                            ID Produk: {{ $product->id }}
                                        </p>
                                    </div>
                                </td>

                                <!-- KATEGORI -->
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm">
                                        {{ ucfirst($product->category) }}
                                    </span>
                                </td>

                                <!-- HARGA -->
                                <td class="px-6 py-4 font-semibold text-gray-700 whitespace-nowrap">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                <!-- STOK -->
                                <td class="px-6 py-4">
                                    @if ($product->stock > 0)
                                        <span class="text-green-600 font-semibold">
                                            {{ $product->stock }}
                                        </span>
                                    @else
                                        <span class="inline-block px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm font-semibold">
                                            Habis
                                        </span>
                                    @endif
                                </td>

                                <!-- VARIAN -->
                                <td class="px-6 py-4">
                                    @if ($product->variants->count() > 0)
                                        <div class="space-y-2">
                                            @foreach ($product->variants as $variant)
                                                <div class="text-sm text-gray-600">
                                                    <span class="font-medium">
                                                        {{ $variant->name }}
                                                    </span>

                                                    <span class="text-gray-400 mx-1">
                                                        &mdash;
                                                    </span>

                                                    <span>
                                                        Rp {{ number_format($variant->price, 0, ',', '.') }}
                                                    </span>
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
                                    <div class="flex flex-wrap justify-center gap-2">

                                        <!-- DETAIL -->
                                        <a
                                            href="{{ route('admin.products.show', $product) }}"
                                            class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition text-sm font-medium"
                                        >
                                            Lihat
                                        </a>

                                        <!-- EDIT -->
                                        <a
                                            href="{{ route('admin.products.edit', $product) }}"
                                            class="bg-orange-500 text-white px-3 py-2 rounded-lg hover:bg-orange-600 transition text-sm font-medium"
                                        >
                                            Edit
                                        </a>

                                        <!-- HAPUS: BUKA MODAL -->
                                        <button
                                            type="button"
                                            data-action="{{ route('admin.products.destroy', $product) }}"
                                            onclick="bukaModalHapus(
                                                this,
                                                {{ Illuminate\Support\Js::from($product->name) }}
                                            )"
                                            class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600 transition text-sm font-medium"
                                        >
                                            Hapus
                                        </button>

                                    </div>
                                </td>

                            </tr>

                        @empty
                            <!-- JIKA BELUM ADA PRODUK -->
                            <tr>
                                <td colspan="6" class="px-6 py-14 text-center">
                                    <div class="text-5xl mb-4 text-orange-400">
                                        &#128722;
                                    </div>

                                    <p class="text-gray-700 text-lg font-semibold">
                                        Belum ada produk.
                                    </p>

                                    <p class="text-gray-500 text-sm mt-2">
                                        Tambahkan produk pertama PizzaMozza.
                                    </p>

                                    <a
                                        href="{{ route('admin.products.create') }}"
                                        class="inline-block mt-5 bg-orange-500 text-white px-5 py-3 rounded-xl hover:bg-orange-600 transition font-semibold"
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
            &copy; {{ date('Y') }} PizzaMozza. All rights reserved.
        </footer>

    </main>

    <!-- MODAL KONFIRMASI HAPUS -->
    <div
        id="modalHapus"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
        role="dialog"
        aria-modal="true"
        aria-labelledby="judulModalHapus"
        aria-describedby="pesanModalHapus"
    >
        <div
            class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden"
            onclick="event.stopPropagation()"
        >

            <!-- HEADER MODAL -->
            <div class="px-6 py-5 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-full bg-red-100 text-red-600">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="25"
                            height="25"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <path d="M3 6h18"></path>
                            <path d="M8 6V4h8v2"></path>
                            <path d="m19 6-1 14H6L5 6"></path>
                            <path d="M10 11v5"></path>
                            <path d="M14 11v5"></path>
                        </svg>
                    </div>

                    <div>
                        <h2
                            id="judulModalHapus"
                            class="text-xl font-bold text-gray-800"
                        >
                            Konfirmasi Hapus Produk
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Tindakan ini perlu dikonfirmasi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- ISI MODAL -->
            <div class="px-6 py-5">
                <p id="pesanModalHapus" class="text-gray-600 leading-relaxed">
                    Apakah Anda yakin ingin menghapus produk ini?
                </p>

                <p class="text-sm text-red-500 mt-3">
                    Produk yang dihapus tidak dapat dipulihkan.
                </p>
            </div>

            <!-- TOMBOL YA / TIDAK -->
            <div class="px-6 py-4 bg-gray-50 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                <button
                    id="tombolBatalHapus"
                    type="button"
                    onclick="tutupModalHapus()"
                    class="px-5 py-3 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition font-semibold"
                >
                    Tidak, Batal
                </button>

                <form
                    id="formHapusProduk"
                    action=""
                    method="POST"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="w-full px-5 py-3 rounded-xl bg-red-500 text-white hover:bg-red-600 transition font-semibold"
                    >
                        Ya, Hapus
                    </button>
                </form>

            </div>
        </div>
    </div>

    <!-- JAVASCRIPT MODAL -->
    <script>
        const modalHapus = document.getElementById('modalHapus');
        const formHapusProduk = document.getElementById('formHapusProduk');
        const pesanModalHapus = document.getElementById('pesanModalHapus');
        const tombolBatalHapus = document.getElementById('tombolBatalHapus');

        let tombolPemicuHapus = null;

        function bukaModalHapus(tombol, namaProduk) {
            tombolPemicuHapus = tombol;

            formHapusProduk.action = tombol.dataset.action;

            pesanModalHapus.textContent =
                'Apakah Anda yakin ingin menghapus produk "' +
                namaProduk +
                '"?';

            modalHapus.classList.remove('hidden');
            modalHapus.classList.add('flex');

            document.body.style.overflow = 'hidden';

            tombolBatalHapus.focus();
        }

        function tutupModalHapus() {
            modalHapus.classList.add('hidden');
            modalHapus.classList.remove('flex');

            document.body.style.overflow = '';

            if (tombolPemicuHapus) {
                tombolPemicuHapus.focus();
            }

            tombolPemicuHapus = null;
        }

        // Tutup modal saat area luar diklik.
        modalHapus.addEventListener('click', function (event) {
            if (event.target === modalHapus) {
                tutupModalHapus();
            }
        });

        // Tutup modal dengan tombol Escape.
        document.addEventListener('keydown', function (event) {
            if (
                event.key === 'Escape' &&
                !modalHapus.classList.contains('hidden')
            ) {
                tutupModalHapus();
            }
        });
    </script>

</body>
</html>
