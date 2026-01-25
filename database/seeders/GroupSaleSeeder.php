<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroupSale;
use App\Models\Product;
use Carbon\Carbon;

class GroupSaleSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            GroupSale::create([
                'product_id' => $product->id,
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now()->addDays(3),
                'status' => 'active',
                'min_participants' => 1,
                'max_participants' => 50,
                'current_price' => $product->base_price,
            ]);
        }
    }
}