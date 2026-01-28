<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        Product::all()->each(function ($product) {
            $images = [
                'products/' . $product->slug . '/1.jpg',
                'products/' . $product->slug . '/2.jpg',
                'products/' . $product->slug . '/3.jpg',
            ];

            foreach ($images as $index => $path) {
                ProductImage::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'path' => $path,
                    ],
                    [
                        'sort_order' => $index,
                        'is_primary' => $index === 0,
                    ]
                );
            }
        });
    }
}
