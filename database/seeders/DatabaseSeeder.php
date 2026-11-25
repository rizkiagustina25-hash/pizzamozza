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
        Product::updateOrCreate(
            ['name' => 'Original Mozza'],
            [
                'category' => 'pizza',
                'description' => 'Saus racikan, daging ayam, bawang bombai, jagung manis, baso sapi, mozzarella, oregano.',
                'price' => 50000,
                'image' => 'product_6b00477e146d83.80910911.jpg',
                'stock' => 20,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Cheese Volcano'],
            [
                'category' => 'pizza',
                'description' => 'Original dengan extra gunungan krim keju.',
                'price' => 63000,
                'image' => 'product_6b00473c1e62a6.29342780.jpg',
                'stock' => 20,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Smoked Beef'],
            [
                'category' => 'pizza',
                'description' => 'Original Mozza dengan tambahan smoked beef.',
                'price' => 63000,
                'image' => 'product_6b0047db8c2155.82088727.jpg',
                'stock' => 20,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Extra Beef'],
            [
                'category' => 'pizza',
                'description' => 'Original Mozza dengan extra daging sapi.',
                'price' => 70000,
                'image' => 'product_6b004760b655e8.74042338.jpg',
                'stock' => 20,
            ]
        );

        // ======================================
        // VARIANT PIZZA
        // ======================================
        $pizzas = Product::where('category', 'pizza')->get();

        foreach ($pizzas as $product) {
            switch ($product->name) {
                case 'Original Mozza':
                    ProductVariant::updateOrCreate(
                        ['product_id' => $product->id, 'name' => 'Medium'],
                        ['price' => 50000, 'sort_order' => 1]
                    );
                    ProductVariant::updateOrCreate(
                        ['product_id' => $product->id, 'name' => 'Large'],
                        ['price' => 75000, 'sort_order' => 2]
                    );
                    break;

                case 'Cheese Volcano':
                    ProductVariant::updateOrCreate(
                        ['product_id' => $product->id, 'name' => 'Medium'],
                        ['price' => 63000, 'sort_order' => 1]
                    );
                    ProductVariant::updateOrCreate(
                        ['product_id' => $product->id, 'name' => 'Large'],
                        ['price' => 88000, 'sort_order' => 2]
                    );
                    break;

                case 'Smoked Beef':
                    ProductVariant::updateOrCreate(
                        ['product_id' => $product->id, 'name' => 'Medium'],
                        ['price' => 63000, 'sort_order' => 1]
                    );
                    ProductVariant::updateOrCreate(
                        ['product_id' => $product->id, 'name' => 'Large'],
                        ['price' => 88000, 'sort_order' => 2]
                    );
                    break;

                case 'Extra Beef':
                    ProductVariant::updateOrCreate(
                        ['product_id' => $product->id, 'name' => 'Medium'],
                        ['price' => 70000, 'sort_order' => 1]
                    );
                    ProductVariant::updateOrCreate(
                        ['product_id' => $product->id, 'name' => 'Large'],
                        ['price' => 100000, 'sort_order' => 2]
                    );
                    break;
            }
        }

        // =========================
        // SNACK
        // =========================
        Product::updateOrCreate(
            ['name' => 'Tape Bakar Original'],
            [
                'category' => 'snack',
                'description' => 'Tape bakar tanpa toping.',
                'price' => 12000,
                'image' => 'product_6b00474848d882.67367372.jpg',
                'stock' => 20,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Singkong Keju'],
            [
                'category' => 'snack',
                'description' => 'Singkong keju topping susu dan keju.',
                'price' => 12000,
                'image' => 'product_6b004752b2ab83.25829181.jpg',
                'stock' => 20,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Tape Bakar Topping Keju'],
            [
                'category' => 'snack',
                'description' => 'Tape bakar toping madu, susu dan keju.',
                'price' => 12000,
                'image' => 'product_6b00476ec29c40.87791158.jpg',
                'stock' => 20,
            ]
        );

        // ======================================
        // VARIANT SNACK
        // ======================================
        $snacks = Product::where('category', 'snack')->get();

        foreach ($snacks as $product) {
            ProductVariant::updateOrCreate(
                ['product_id' => $product->id, 'name' => 'Box Kecil'],
                ['price' => 12000, 'sort_order' => 1]
            );
            ProductVariant::updateOrCreate(
                ['product_id' => $product->id, 'name' => 'Box Sedang'],
                ['price' => 17000, 'sort_order' => 2]
            );
            ProductVariant::updateOrCreate(
                ['product_id' => $product->id, 'name' => 'Box Besar'],
                ['price' => 25000, 'sort_order' => 3]
            );
        }

        // ======================================
        // TOPPING
        // ======================================
        Topping::firstOrCreate(
            ['name' => 'Pinggiran Sosis'],
            [
                'price_medium' => 10000,
                'price_large' => 12000,
                'active' => true,
            ]
        );
    }
}