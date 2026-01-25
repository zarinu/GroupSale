<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroupSale;
use App\Models\PriceTier;

class PriceTierSeeder extends Seeder
{
    public function run(): void
    {
        $tiers = [
            [1, 0],     // بدون تخفیف
            [5, 10],    // 10% تخفیف
            [10, 20],   // 20% تخفیف
            [20, 30],   // 30% تخفیف
        ];

        foreach (GroupSale::all() as $groupSale) {
            $base = $groupSale->product->base_price;

            foreach ($tiers as [$min_buyers, $discount_percent]) {
                PriceTier::create([
                    'group_sale_id' => $groupSale->id,
                    'min_buyers' => $min_buyers,
                    'price' => $base * (1 - $discount_percent / 100),
                ]);
            }
        }
    }
}