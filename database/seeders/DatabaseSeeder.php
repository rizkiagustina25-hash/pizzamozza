<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Topping;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
// PIZZA
// =========================

Product::create([
    'name' => 'Original Mozza',
    'category' => 'pizza',
    'description' => 'Saus racikan, daging ayam, bawang bombai, jagung manis, baso sapi, mozzarella, oregano.',
    'price' => 50000,
    'image' => 'original-mozza.jpg',
    'stock' => 20,
]);

Product::create([
    'name' => 'Cheese Volcano',
    'category' => 'pizza',
    'description' => 'Original dengan extra gunungan krim keju.',
    'price' => 63000,
    'image' => 'cheese-volcano.jpg',
    'stock' => 20,
]);

Product::create([
    'name' => 'Smoked Beef',
    'category' => 'pizza',
    'description' => 'Original Mozza dengan tambahan smoked beef.',
    'price' => 63000,
    'image' => 'smoked-beef.jpg',
    'stock' => 20,
]);

Product::create([
    'name' => 'Extra Beef',
    'category' => 'pizza',
    'description' => 'Original Mozza dengan extra daging sapi.',
    'price' => 70000,
    'image' => 'extra-beef.jpg',
    'stock' => 20,
]);

// ======================================
// VARIANT PIZZA
// ======================================

$pizza = Product::where('category', 'pizza')->get();

foreach ($pizza as $product) {

    switch ($product->name) {

        case 'Original Mozza':

            ProductVariant::create([
                'product_id' => $product->id,
                'name' => 'Medium',
                'price' => 50000,
                'sort_order' => 1,
            ]);

            ProductVariant::create([
                'product_id' => $product->id,
                'name' => 'Large',
                'price' => 75000,
                'sort_order' => 2,
            ]);

            break;


        case 'Cheese Volcano':

            ProductVariant::create([
                'product_id' => $product->id,
                'name' => 'Medium',
                'price' => 63000,
                'sort_order' => 1,
            ]);

            ProductVariant::create([
                'product_id' => $product->id,
                'name' => 'Large',
                'price' => 88000,
                'sort_order' => 2,
            ]);

            break;


        case 'Smoked Beef':

            ProductVariant::create([
                'product_id' => $product->id,
                'name' => 'Medium',
                'price' => 63000,
                'sort_order' => 1,
            ]);

            ProductVariant::create([
                'product_id' => $product->id,
                'name' => 'Large',
                'price' => 88000,
                'sort_order' => 2,
            ]);

            break;


        case 'Extra Beef':

            ProductVariant::create([
                'product_id' => $product->id,
                'name' => 'Medium',
                'price' => 70000,
                'sort_order' => 1,
            ]);

            ProductVariant::create([
                'product_id' => $product->id,
                'name' => 'Large',
                'price' => 100000,
                'sort_order' => 2,
            ]);

            break;
    }
}

        // =========================
        // SNACK
        // =========================

        Product::create([
            'name' => 'Tape Bakar Original',
            'category' => 'snack',
            'description' => 'Tape bakar tanpa toping.',
            'price' => 12000,
            'image' => 'tape-bakar-original.jpg',
            'stock' => 20,
        ]);

        Product::create([
            'name' => 'Singkong Keju',
            'category' => 'snack',
            'description' => 'Singkong keju topping susu dan keju.',
            'price' => 12000,
            'image' => 'singkong-keju.jpg',
            'stock' => 20,
        ]);

        Product::create([
            'name' => 'Tape Bakar Topping Keju',
            'category' => 'snack',
            'description' => 'Tape bakar toping madu, susu dan keju.',
            'price' => 12000,
            'image' => 'tape-bakar-topping-keju.jpg',
            'stock' => 20,
        ]);
    }
}

// ======================================
// VARIANT SNACK
// ======================================

$snacks = Product::where('category', 'snack')->get();

foreach ($snacks as $product) {

    ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Box Kecil',
        'price' => 12000,
        'sort_order' => 1,
    ]);

    ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Box Sedang',
        'price' => 17000,
        'sort_order' => 2,
    ]);

    ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Box Besar',
        'price' => 25000,
        'sort_order' => 3,
    ]);
}

// ======================================
// TOPPING
// ======================================

Topping::create([
    'name' => 'Pinggiran Sosis',
    'price_medium' => 10000,
    'price_large' => 12000,
    'active' => true,
]);