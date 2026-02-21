<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    public function run(): void
    {
        $product = Product::where('slug', 'samsung-galaxy-s23')->first();

        $attributeValues = [18,19,20,21,22];

        $product->attributeValues()->syncWithoutDetaching($attributeValues);
    }
}
