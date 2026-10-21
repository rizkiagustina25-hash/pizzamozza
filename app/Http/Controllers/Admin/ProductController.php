<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * UML: Lihat Produk
     */
    public function index()
    {
        $products = Product::with('variants')
            ->latest()
            ->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * UML: Menampilkan halaman tambah produk
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * UML: Validasi dan menyimpan produk baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'variants' => 'nullable|array',
            'variants.*.name' => 'nullable|string|max:100',
            'variants.*.price' => 'nullable|numeric|min:0',
        ]);

        // Upload gambar setelah validasi berhasil.
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $folder = public_path('image');

            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            $filename = uniqid('product_', true)
                . '.'
                . $file->extension();

            $file->move($folder, $filename);
            $data['image'] = $filename;
        }

        DB::transaction(function () use ($data) {
            $product = Product::create([
                'name' => $data['name'],
                'category' => $data['category'],
                'description' => $data['description'] ?? null,
                'price' => $data['price'],
                'stock' => $data['stock'],
                'image' => $data['image'] ?? null,
            ]);

            foreach ($data['variants'] ?? [] as $index => $variant) {
                if (
                    empty($variant['name']) ||
                    !isset($variant['price']) ||
                    $variant['price'] === ''
                ) {
                    continue;
                }

                ProductVariant::create([
                    'product_id' => $product->id,
                    'name' => $variant['name'],
                    'price' => $variant['price'],
                    'sort_order' => $index,
                ]);
            }
        });

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * UML: Lihat detail produk
     */
    public function show(Product $product)
    {
        $product->load('variants');

        return view('admin.products.show', compact('product'));
    }

    /**
     * UML: Menampilkan halaman ubah produk
     */
    public function edit(Product $product)
    {
        $product->load('variants');

        return view('admin.products.edit', compact('product'));
    }

    /**
     * UML: Validasi dan memperbarui produk
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'variants' => 'nullable|array',
            'variants.*.name' => 'nullable|string|max:100',
            'variants.*.price' => 'nullable|numeric|min:0',
        ]);

        // Jika tidak memilih gambar baru, gambar lama tetap digunakan.
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $folder = public_path('image');

            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            $filename = uniqid('product_', true)
                . '.'
                . $file->extension();

            $file->move($folder, $filename);
            $data['image'] = $filename;
        }

        DB::transaction(function () use ($data, $product) {
            $product->update([
                'name' => $data['name'],
                'category' => $data['category'],
                'description' => $data['description'] ?? null,
                'price' => $data['price'],
                'stock' => $data['stock'],
                'image' => $data['image'] ?? $product->image,
            ]);

            // Perbarui varian produk.
            $product->variants()->delete();

            foreach ($data['variants'] ?? [] as $index => $variant) {
                if (
                    empty($variant['name']) ||
                    !isset($variant['price']) ||
                    $variant['price'] === ''
                ) {
                    continue;
                }

                ProductVariant::create([
                    'product_id' => $product->id,
                    'name' => $variant['name'],
                    'price' => $variant['price'],
                    'sort_order' => $index,
                ]);
            }
        });

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * UML: Menghapus produk setelah konfirmasi dari halaman.
     */
    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            // Hapus varian terlebih dahulu jika relasi tidak
            // menggunakan cascade delete pada database.
            $product->variants()->delete();
            $product->delete();
        });

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
