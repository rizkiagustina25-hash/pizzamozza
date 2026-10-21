
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - PizzaMozza</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --maroon: #861b1b;
            --maroon-hover: #a52828;
            --cream: #fffaf3;
            --border: #f0e1d5;
            --text: #34241f;
        }

        body {
            background: var(--cream);
            color: var(--text);
        }

        .form-input {
            width: 100%;
            border: 1px solid #e7d8cc;
            border-radius: 10px;
            padding: 12px 15px;
            background: #fff;
            outline: none;
            transition: .2s;
        }

        .form-input:focus {
            border-color: var(--maroon);
            box-shadow: 0 0 0 3px rgba(134, 27, 27, .10);
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 22px;
            border-radius: 10px;
            background: var(--maroon);
            color: #fff;
            font-weight: 600;
            transition: .2s;
        }

        .primary-button:hover {
            background: var(--maroon-hover);
        }

        .secondary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 22px;
            border-radius: 10px;
            background: #f3eee9;
            color: #59453d;
            font-weight: 600;
        }

        .upload-area {
            border: 2px dashed #dfc7b8;
            border-radius: 14px;
            padding: 24px;
            background: #fffdf9;
            transition: .2s;
        }

        .upload-area:hover {
            border-color: var(--maroon);
        }

        .field-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #59453d;
        }
    </style>
</head>

<body class="min-h-screen">

<main class="max-w-4xl mx-auto px-4 py-8 md:px-8">

    <!-- HEADER -->
    <div class="mb-8">
        <a href="{{ route('admin.products.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold"
           style="color:var(--maroon)">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Produk
        </a>

        <div class="flex items-center gap-4 mt-5">
            <div class="flex items-center justify-center rounded-2xl"
                 style="width:58px;height:58px;background:#f5e5df;color:var(--maroon)">
                <i class="bi bi-plus-circle text-2xl"></i>
            </div>

            <div>
                <h1 class="text-2xl md:text-3xl font-bold">
                    Tambah Produk
                </h1>
                <p class="text-sm mt-1" style="color:#81716a">
                    Tambahkan menu baru ke PizzaMozza.
                </p>
            </div>
        </div>
    </div>

    <!-- ERROR VALIDATION -->
    @if ($errors->any())
        <div class="border rounded-xl px-5 py-4 mb-6"
             style="background:#fff0ef;border-color:#efc5c2;color:#9b2424">
            <p class="font-bold mb-2">
                <i class="bi bi-exclamation-circle mr-2"></i>
                Ada kesalahan:
            </p>

            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden"
         style="border:1px solid var(--border)">

        <div class="px-6 py-5 md:px-8"
             style="border-bottom:1px solid var(--border)">
            <h2 class="font-bold text-lg">Informasi Produk</h2>
            <p class="text-sm mt-1" style="color:#81716a">
                Lengkapi informasi produk yang ingin ditambahkan.
            </p>
        </div>

        <form action="{{ route('admin.products.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-6 md:p-8">

            @csrf

            <!-- NAMA -->
            <div class="mb-6">
                <label class="field-label" for="name">Nama Produk</label>
                <input id="name" type="text" name="name"
                       value="{{ old('name') }}"
                       placeholder="Contoh: Pizza Mozzarella"
                       class="form-input" required>
            </div>

            <!-- KATEGORI -->
            <div class="mb-6">
                <label class="field-label" for="category">Kategori</label>
                <select id="category" name="category"
                        class="form-input" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="pizza"
                        {{ old('category') == 'pizza' ? 'selected' : '' }}>
                        Pizza
                    </option>
                    <option value="snack"
                        {{ old('category') == 'snack' ? 'selected' : '' }}>
                        Snack
                    </option>
                </select>
            </div>

            <!-- DESKRIPSI -->
            <div class="mb-6">
                <label class="field-label" for="description">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                          placeholder="Deskripsi produk..."
                          class="form-input">{{ old('description') }}</textarea>
            </div>

            <!-- HARGA DAN STOK -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                <div>
                    <label class="field-label" for="price">Harga Dasar (Rp)</label>
                    <input id="price" type="number" name="price"
                           value="{{ old('price') }}"
                           placeholder="50000" min="0" step="any"
                           class="form-input" required>
                </div>

                <div>
                    <label class="field-label" for="stock">Stok</label>
                    <input id="stock" type="number" name="stock"
                           value="{{ old('stock', 0) }}"
                           min="0" step="1"
                           class="form-input" required>
                </div>
            </div>

            <!-- GAMBAR PRODUK -->
            <div class="mb-8">
                <label class="field-label" for="image">Gambar Produk</label>

                <div class="upload-area">
                    <div class="flex flex-col items-center text-center">
                        <div class="flex items-center justify-center rounded-full mb-3"
                             style="width:56px;height:56px;background:#f5e5df;color:var(--maroon)">
                            <i class="bi bi-cloud-arrow-up text-2xl"></i>
                        </div>

                        <p class="font-semibold">Unggah gambar produk</p>
                        <p class="text-sm mt-1 mb-4" style="color:#81716a">
                            Pilih gambar dari komputer kamu.
                        </p>

                        <input id="image" type="file" name="image"
                               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                               class="w-full text-sm"
                               style="max-width:360px">

                        <p class="text-xs mt-3" style="color:#81716a">
                            JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        </p>

                        <p id="imageError" class="hidden text-sm mt-3 text-red-600"></p>
                    </div>

                    <!-- PREVIEW -->
                    <div id="imagePreviewContainer" class="hidden mt-5 text-center">
                        <img id="imagePreview" src="" alt="Preview gambar produk"
                             class="mx-auto rounded-xl object-cover"
                             style="width:180px;height:180px;border:1px solid var(--border)">

                        <p id="imageFileName" class="text-sm mt-3 break-all"></p>

                        <button type="button" id="removeImage"
                                class="mt-2 text-sm font-semibold"
                                style="color:var(--maroon)">
                            <i class="bi bi-trash"></i>
                            Hapus pilihan gambar
                        </button>
                    </div>
                </div>
            </div>

            <!-- VARIAN PRODUK -->
            <div class="mb-8">
                <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                    <div>
                        <h3 class="font-bold text-lg">Varian Produk</h3>
                        <p class="text-sm mt-1" style="color:#81716a">
                            Opsional. Tambahkan ukuran atau varian beserta harganya.
                        </p>
                    </div>

                    <button type="button" id="addVariant"
                            class="secondary-button">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Varian
                    </button>
                </div>

                <div id="variantsContainer" class="space-y-4">
                    @foreach(old('variants', []) as $index => $variant)
                        <div class="variant-row grid grid-cols-1 md:grid-cols-2 gap-4 border rounded-xl p-4"
                             style="border-color:var(--border)">
                            <div>
                                <label class="field-label">Nama Varian</label>
                                <input type="text"
                                       name="variants[{{ $index }}][name]"
                                       value="{{ $variant['name'] ?? '' }}"
                                       class="form-input"
                                       placeholder="Contoh: Medium">
                            </div>

                            <div>
                                <label class="field-label">Harga Varian (Rp)</label>
                                <div class="flex gap-2">
                                    <input type="number"
                                           name="variants[{{ $index }}][price]"
                                           value="{{ $variant['price'] ?? '' }}"
                                           min="0" step="any"
                                           class="form-input"
                                           placeholder="50000">

                                    <button type="button"
                                            class="remove-variant px-3 rounded-lg bg-red-50 text-red-600"
                                            aria-label="Hapus varian">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- ACTIONS -->
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-6"
                 style="border-top:1px solid var(--border)">

                <a href="{{ route('admin.products.index') }}"
                   class="secondary-button">
                    <i class="bi bi-x-circle"></i>
                    Batal
                </a>

                <button type="submit" class="primary-button">
                    <i class="bi bi-save"></i>
                    Simpan Produk
                </button>
            </div>

        </form>
    </div>
</main>

<!-- MODAL KONFIRMASI TAMBAH PRODUK -->
<div
    id="modalKonfirmasiSimpan"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
    role="dialog"
    aria-modal="true"
    aria-labelledby="judulKonfirmasiSimpan"
    aria-describedby="pesanKonfirmasiSimpan"
>
    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl">

        <div class="flex items-start gap-4">

            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full text-2xl"
                style="background:#f5e5df;color:#861b1b"
            >
                <i class="bi bi-question-circle"></i>
            </div>

            <div class="flex-1">
                <h2
                    id="judulKonfirmasiSimpan"
                    class="text-xl font-bold"
                    style="color:#34241f"
                >
                    Konfirmasi Tambah Produk
                </h2>

                <p
                    id="pesanKonfirmasiSimpan"
                    class="mt-2 text-sm leading-relaxed"
                    style="color:#81716a"
                >
                    Apakah kamu yakin ingin menyimpan produk baru ke PizzaMozza?
                </p>
            </div>

        </div>

        <div class="mt-7 flex flex-col-reverse sm:flex-row justify-end gap-3">

            <button
                type="button"
                id="batalKonfirmasiSimpan"
                class="secondary-button"
            >
                <i class="bi bi-x-circle"></i>
                Tidak, Batal
            </button>

            <button
                type="button"
                id="yaKonfirmasiSimpan"
                class="primary-button"
            >
                <i class="bi bi-check-circle"></i>
                Ya, Simpan
            </button>

        </div>

    </div>
</div>

<script>
    const imageInput = document.getElementById('image');
    const previewContainer = document.getElementById('imagePreviewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const imageFileName = document.getElementById('imageFileName');
    const removeImage = document.getElementById('removeImage');
    const imageError = document.getElementById('imageError');

    let previewUrl = null;

    imageInput.addEventListener('change', function () {
        imageError.textContent = '';
        imageError.classList.add('hidden');

        const file = this.files[0];

        if (!file) {
            return;
        }

        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

        if (!allowedTypes.includes(file.type)) {
            this.value = '';
            imageError.textContent = 'Format gambar harus JPG, JPEG, PNG, atau WEBP.';
            imageError.classList.remove('hidden');
            previewContainer.classList.add('hidden');
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            this.value = '';
            imageError.textContent = 'Ukuran gambar maksimal 2 MB.';
            imageError.classList.remove('hidden');
            previewContainer.classList.add('hidden');
            return;
        }

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
        }

        previewUrl = URL.createObjectURL(file);
        imagePreview.src = previewUrl;
        imageFileName.textContent = file.name;
        previewContainer.classList.remove('hidden');
    });

    removeImage.addEventListener('click', function () {
        imageInput.value = '';
        imagePreview.removeAttribute('src');
        imageFileName.textContent = '';
        previewContainer.classList.add('hidden');
        imageError.classList.add('hidden');

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }
    });

    const variantsContainer = document.getElementById('variantsContainer');
    const addVariant = document.getElementById('addVariant');

    let variantIndex = {{ count(old('variants', [])) }};

    addVariant.addEventListener('click', function () {
        const row = document.createElement('div');

        row.className = 'variant-row grid grid-cols-1 md:grid-cols-2 gap-4 border rounded-xl p-4';
        row.style.borderColor = 'var(--border)';

        row.innerHTML = `
            <div>
                <label class="field-label">Nama Varian</label>
                <input type="text"
                       name="variants[${variantIndex}][name]"
                       class="form-input"
                       placeholder="Contoh: Medium">
            </div>

            <div>
                <label class="field-label">Harga Varian (Rp)</label>
                <div class="flex gap-2">
                    <input type="number"
                           name="variants[${variantIndex}][price]"
                           min="0"
                           step="any"
                           class="form-input"
                           placeholder="50000">

                    <button type="button"
                            class="remove-variant px-3 rounded-lg bg-red-50 text-red-600"
                            aria-label="Hapus varian">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        `;

        variantsContainer.appendChild(row);
        variantIndex++;
    });

    variantsContainer.addEventListener('click', function (event) {
        const button = event.target.closest('.remove-variant');

        if (button) {
            button.closest('.variant-row').remove();
        }
    });
    
    // =====================================================
    // KONFIRMASI SIMPAN PRODUK
    // =====================================================

    const formProduk = document.querySelector(
        'form[action="{{ route('admin.products.store') }}"]'
    );

    const modalKonfirmasiSimpan = document.getElementById(
        'modalKonfirmasiSimpan'
    );

    const tombolYaSimpan = document.getElementById(
        'yaKonfirmasiSimpan'
    );

    const tombolBatalSimpan = document.getElementById(
        'batalKonfirmasiSimpan'
    );

    let produkSiapDisimpan = false;

    // Tampilkan popup ketika formulir akan dikirim.
    formProduk.addEventListener('submit', function (event) {
        if (produkSiapDisimpan) {
            return;
        }

        event.preventDefault();

        modalKonfirmasiSimpan.classList.remove('hidden');
        modalKonfirmasiSimpan.classList.add('flex');

        tombolBatalSimpan.focus();
    });

    // Pilihan YA: kirim formulir ke Laravel.
    tombolYaSimpan.addEventListener('click', function () {
        produkSiapDisimpan = true;

        tombolYaSimpan.disabled = true;
        tombolBatalSimpan.disabled = true;

        tombolYaSimpan.innerHTML =
            '<i class="bi bi-arrow-repeat"></i> Menyimpan...';

        formProduk.requestSubmit();
    });

    // Pilihan TIDAK: tutup popup, pertahankan isian.
    tombolBatalSimpan.addEventListener('click', function () {
        tutupKonfirmasiSimpan();
    });

    function tutupKonfirmasiSimpan() {
        modalKonfirmasiSimpan.classList.add('hidden');
        modalKonfirmasiSimpan.classList.remove('flex');

        tombolYaSimpan.disabled = false;
        tombolBatalSimpan.disabled = false;

        tombolYaSimpan.innerHTML =
            '<i class="bi bi-check-circle"></i> Ya, Simpan';

        produkSiapDisimpan = false;
        document.querySelector(
            'button[type="submit"]'
        )?.focus();
    }

    // Tutup popup saat area gelap di luar kotak diklik.
    modalKonfirmasiSimpan.addEventListener('click', function (event) {
        if (event.target === modalKonfirmasiSimpan) {
            tutupKonfirmasiSimpan();
        }
    });

    // Tutup popup menggunakan tombol Escape.
    document.addEventListener('keydown', function (event) {
        if (
            event.key === 'Escape' &&
            !modalKonfirmasiSimpan.classList.contains('hidden')
        ) {
            tutupKonfirmasiSimpan();
        }
    });

</script>

</body>
</html>
