<?php

namespace Database\Seeders;

use App\Models\GroupSalePrice;
use Illuminate\Database\Seeder;
use App\Models\GroupSale;

class GroupSalePriceSeeder extends Seeder
{
    public function run(): void
    {
        $tiers = [
            [1, 0],     // بدون تخفیف
            [2, 10],    // 10%
            [3, 20],    // 20%
            [4, 30],    // 30%
        ];

        foreach (GroupSale::all() as $groupSale) {
            $base = $groupSale->current_price;

            foreach ($tiers as [$min_buyers, $discount_percent]) {
                GroupSalePrice::updateOrCreate(
                    [
                        'group_sale_id' => $groupSale->id,
                        'min_buyers'    => $min_buyers,
                    ],
                    [
                        'price' => $base * (1 - $discount_percent / 100),
                    ]
                );
            }
        }
    }

}