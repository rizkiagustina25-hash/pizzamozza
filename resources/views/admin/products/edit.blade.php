
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Produk - PizzaMozza</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50 min-h-screen">

    <main class="p-6 md:p-8 max-w-4xl mx-auto">

        <!-- HEADER -->
        <div class="mb-8">
            <a href="{{ route('admin.products.index') }}"
               class="text-gray-600 hover:text-orange-600">
                ← Kembali ke Produk
            </a>

            <h1 class="text-3xl font-bold text-gray-800 mt-4">
                ✏️ Edit Produk
            </h1>

            <p class="text-gray-500 mt-2">
                Ubah informasi produk PizzaMozza.
            </p>
        </div>

        <!-- ERROR -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-200 text-red-700 px-5 py-4 rounded-xl mb-6">
                <p class="font-bold mb-2">Ada kesalahan:</p>

                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM -->
        <div class="bg-white rounded-2xl shadow-md p-6 md:p-8">

            <form
                action="{{ route('admin.products.update', $product) }}"
                method="POST"
                enctype="multipart/form-data"
                id="editProductForm"
            >
                @csrf
                @method('PUT')

                <!-- NAMA -->
                <div class="mb-6">
                    <label for="name"
                           class="block font-semibold text-gray-700 mb-2">
                        Nama Produk
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name', $product->name) }}"
                        maxlength="255"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400"
                        required
                    >
                </div>

                <!-- KATEGORI -->
                <div class="mb-6">
                    <label for="category"
                           class="block font-semibold text-gray-700 mb-2">
                        Kategori
                    </label>

                    <select
                        id="category"
                        name="category"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400"
                        required
                    >
                        <option value="">-- Pilih Kategori --</option>

                        <option value="pizza"
                            {{ old('category', $product->category) == 'pizza' ? 'selected' : '' }}>
                            Pizza
                        </option>

                        <option value="snack"
                            {{ old('category', $product->category) == 'snack' ? 'selected' : '' }}>
                            Snack
                        </option>
                    </select>
                </div>

                <!-- DESKRIPSI -->
                <div class="mb-6">
                    <label for="description"
                           class="block font-semibold text-gray-700 mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400"
                    >{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- HARGA -->
                <div class="mb-6">
                    <label for="price"
                           class="block font-semibold text-gray-700 mb-2">
                        Harga Dasar (Rp)
                    </label>

                    <input
                        id="price"
                        type="number"
                        name="price"
                        value="{{ old('price', $product->price) }}"
                        min="0"
                        step="any"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400"
                        required
                    >
                </div>

                <!-- STOK -->
                <div class="mb-6">
                    <label for="stock"
                           class="block font-semibold text-gray-700 mb-2">
                        Stok
                    </label>

                    <input
                        id="stock"
                        type="number"
                        name="stock"
                        value="{{ old('stock', $product->stock) }}"
                        min="0"
                        step="1"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400"
                        required
                    >
                </div>

                <!-- GAMBAR -->
                <div class="mb-8">
                    <label for="image"
                           class="block font-semibold text-gray-700 mb-2">
                        Gambar Produk
                    </label>

                    @if ($product->image)
                        <div class="mb-4">
                            <img
                                id="currentImage"
                                src="{{ asset('image/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="w-36 h-36 object-cover rounded-xl border border-gray-200"
                            >

                            <p class="text-sm text-gray-500 mt-2">
                                Gambar saat ini
                            </p>
                        </div>
                    @endif

                    <input
                        id="image"
                        type="file"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3"
                    >

                    <p class="text-sm text-gray-500 mt-2">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        Kosongkan jika tidak ingin mengganti gambar.
                    </p>

                    <div id="previewContainer" class="hidden mt-4">
                        <p class="text-sm text-gray-600 mb-2">
                            Pratinjau gambar baru
                        </p>

                        <img
                            id="imagePreview"
                            src=""
                            alt="Pratinjau gambar baru"
                            class="w-36 h-36 object-cover rounded-xl border border-gray-200"
                        >

                        <button
                            type="button"
                            id="removeImage"
                            class="mt-2 text-sm font-semibold text-red-600 hover:text-red-800"
                        >
                            Hapus pilihan gambar baru
                        </button>
                    </div>

                    <p id="imageError"
                       class="hidden text-sm text-red-600 mt-2"></p>
                </div>

                <!-- VARIAN -->
                <div class="border-t border-gray-200 pt-6 mb-8">

                    <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">
                                Varian Produk
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                Ubah varian yang sudah ada atau tambahkan varian baru.
                            </p>
                        </div>

                        <button
                            type="button"
                            id="addVariant"
                            class="px-4 py-2 rounded-xl bg-orange-100 text-orange-700 font-semibold hover:bg-orange-200"
                        >
                            + Tambah Varian
                        </button>
                    </div>

                    <div id="variantsContainer" class="space-y-4">

                        @php
                            $variantRows = old(
                                'variants',
                                $product->variants->map(function ($variant) {
                                    return [
                                        'name' => $variant->name,
                                        'price' => $variant->price,
                                    ];
                                })->values()->all()
                            );
                        @endphp

                        @forelse ($variantRows as $index => $variant)
                            <div class="variant-row border border-gray-200 rounded-xl p-4"
                                 data-index="{{ $index }}">

                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="font-semibold text-gray-700">
                                        Varian <span class="variant-number">{{ $loop->iteration }}</span>
                                    </h3>

                                    <button
                                        type="button"
                                        class="remove-variant text-sm font-semibold text-red-600 hover:text-red-800"
                                    >
                                        Hapus
                                    </button>
                                </div>

                                <div class="grid md:grid-cols-2 gap-4">

                                    <div>
                                        <label class="block font-medium text-gray-600 mb-2">
                                            Nama Varian
                                        </label>

                                        <input
                                            type="text"
                                            name="variants[{{ $index }}][name]"
                                            value="{{ $variant['name'] ?? '' }}"
                                            maxlength="100"
                                            placeholder="Contoh: Medium"
                                            class="variant-name w-full border border-gray-300 rounded-xl px-4 py-3"
                                        >
                                    </div>

                                    <div>
                                        <label class="block font-medium text-gray-600 mb-2">
                                            Harga Varian (Rp)
                                        </label>

                                        <input
                                            type="number"
                                            name="variants[{{ $index }}][price]"
                                            value="{{ $variant['price'] ?? '' }}"
                                            min="0"
                                            step="any"
                                            placeholder="Contoh: 50000"
                                            class="variant-price w-full border border-gray-300 rounded-xl px-4 py-3"
                                        >
                                    </div>

                                </div>
                            </div>
                        @empty
                            <p id="emptyVariants"
                               class="text-sm text-gray-500">
                                Belum ada varian. Klik Tambah Varian jika ingin menambahkannya.
                            </p>
                        @endforelse

                    </div>

                    <p class="text-xs text-gray-500 mt-3">
                        Kosongkan nama dan harga jika baris varian tidak digunakan.
                        Jika mengisi salah satunya, lengkapi keduanya.
                    </p>
                </div>

                <!-- BUTTON -->
                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3">

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="text-center px-6 py-3 rounded-xl bg-gray-200 text-gray-700 hover:bg-gray-300"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-xl bg-orange-500 text-white font-semibold hover:bg-orange-600"
                    >
                        💾 Simpan Perubahan
                    </button>

                </div>

            </form>
        </div>
    </main>

    <script>
        // =====================================================
        // PREVIEW DAN VALIDASI GAMBAR DI SISI BROWSER
        // Validasi backend Laravel tetap menjadi pemeriksaan utama.
        // =====================================================

        const imageInput = document.getElementById('image');
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');
        const removeImageButton = document.getElementById('removeImage');
        const imageError = document.getElementById('imageError');

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        const maxImageSize = 2 * 1024 * 1024;
        let previewUrl = null;

        function clearImagePreview() {
            if (previewUrl) {
                URL.revokeObjectURL(previewUrl);
                previewUrl = null;
            }

            imagePreview.src = '';
            previewContainer.classList.add('hidden');
        }

        function showImageError(message) {
            imageError.textContent = message;
            imageError.classList.remove('hidden');
        }

        imageInput.addEventListener('change', function () {
            imageError.textContent = '';
            imageError.classList.add('hidden');

            const file = this.files[0];

            if (!file) {
                clearImagePreview();
                return;
            }

            if (!allowedTypes.includes(file.type)) {
                this.value = '';
                clearImagePreview();
                showImageError('Format gambar harus JPG, JPEG, PNG, atau WEBP.');
                return;
            }

            if (file.size > maxImageSize) {
                this.value = '';
                clearImagePreview();
                showImageError('Ukuran gambar maksimal 2 MB.');
                return;
            }

            clearImagePreview();

            previewUrl = URL.createObjectURL(file);
            imagePreview.src = previewUrl;
            previewContainer.classList.remove('hidden');
        });

        removeImageButton.addEventListener('click', function () {
            imageInput.value = '';
            clearImagePreview();

            imageError.textContent = '';
            imageError.classList.add('hidden');
        });

        // =====================================================
        // TAMBAH DAN HAPUS VARIAN
        // =====================================================

        const variantsContainer = document.getElementById('variantsContainer');
        const addVariantButton = document.getElementById('addVariant');

        let variantIndex = {{ count($variantRows) }};

        function updateVariantNumbers() {
            const rows = variantsContainer.querySelectorAll('.variant-row');
            const emptyMessage = document.getElementById('emptyVariants');

            rows.forEach(function (row, index) {
                row.querySelector('.variant-number').textContent = index + 1;
            });

            if (rows.length === 0) {
                if (!emptyMessage) {
                    const message = document.createElement('p');
                    message.id = 'emptyVariants';
                    message.className = 'text-sm text-gray-500';
                    message.textContent =
                        'Belum ada varian. Klik Tambah Varian jika ingin menambahkannya.';

                    variantsContainer.appendChild(message);
                }
            } else if (emptyMessage) {
                emptyMessage.remove();
            }
        }

        addVariantButton.addEventListener('click', function () {
            const emptyMessage = document.getElementById('emptyVariants');

            if (emptyMessage) {
                emptyMessage.remove();
            }

            const row = document.createElement('div');

            row.className = 'variant-row border border-gray-200 rounded-xl p-4';
            row.dataset.index = variantIndex;

            row.innerHTML = `
                <div class="flex items-center justify-between mb-3">
                    <h3 class="font-semibold text-gray-700">
                        Varian <span class="variant-number"></span>
                    </h3>

                    <button
                        type="button"
                        class="remove-variant text-sm font-semibold text-red-600 hover:text-red-800"
                    >
                        Hapus
                    </button>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium text-gray-600 mb-2">
                            Nama Varian
                        </label>

                        <input
                            type="text"
                            name="variants[${variantIndex}][name]"
                            maxlength="100"
                            placeholder="Contoh: Large"
                            class="variant-name w-full border border-gray-300 rounded-xl px-4 py-3"
                        >
                    </div>

                    <div>
                        <label class="block font-medium text-gray-600 mb-2">
                            Harga Varian (Rp)
                        </label>

                        <input
                            type="number"
                            name="variants[${variantIndex}][price]"
                            min="0"
                            step="any"
                            placeholder="Contoh: 75000"
                            class="variant-price w-full border border-gray-300 rounded-xl px-4 py-3"
                        >
                    </div>
                </div>
            `;

            variantsContainer.appendChild(row);
            variantIndex++;

            updateVariantNumbers();
        });

        variantsContainer.addEventListener('click', function (event) {
            const button = event.target.closest('.remove-variant');

            if (!button) {
                return;
            }

            const row = button.closest('.variant-row');

            if (row) {
                row.remove();
                updateVariantNumbers();
            }
        });

        // Cegah pengiriman baris varian yang hanya terisi sebagian.
        document.getElementById('editProductForm').addEventListener('submit', function (event) {
            const rows = variantsContainer.querySelectorAll('.variant-row');

            for (const row of rows) {
                const name = row.querySelector('.variant-name').value.trim();
                const price = row.querySelector('.variant-price').value.trim();

                if ((name && !price) || (!name && price)) {
                    event.preventDefault();
                    alert('Lengkapi nama dan harga setiap varian, atau kosongkan keduanya.');
                    return;
                }
            }
        });

        updateVariantNumbers();
    </script>

</body>
</html>
