<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use App\Models\GroupSale;
use Carbon\Carbon;

class GroupSaleSeeder extends Seeder
{
    public function run(): void
    {
        $products_variant_id = [4];

        foreach ($products_variant_id as $id) {
            $variant = ProductVariant::find($id);
            GroupSale::updateOrCreate(
                ['product_variant_id' => $id],
                [
                    'starts_at' => Carbon::now(),
                    'ends_at' => Carbon::now()->addDays(30),
                    'status' => 'active',
                    'current_price' => $variant->price,
                ],
            );
        }
    }
}