<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Str;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        $colorAttr = Attribute::where('code', 'color')->first();
        $storageAttr = Attribute::where('code', 'storage')->first();

        $colors = AttributeValue::where('attribute_id', $colorAttr->id)->get();
        $storages = AttributeValue::where('attribute_id', $storageAttr->id)->get();

        Product::all()->each(function ($product) use ($colors, $storages) {
            foreach ($colors as $color) {
                foreach ($storages as $storage) {
                    $variant = ProductVariant::updateOrCreate(
                        [
                            'sku' => strtoupper(Str::slug(
                                $product->slug . '-' . $color->slug . '-' . $storage->slug
                            )),
                        ],
                        [
                            'product_id' => $product->id,
                            'price' => $product->price + rand(0, 5000000),
                            'stock' => rand(5, 50),
                            'is_active' => true,
                        ]
                    );

                    $variant->attributeValues()->syncWithoutDetaching([
                        $color->id,
                        $storage->id,
                    ]);
                }
            }
        });
    }
}
