<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GroupSale;
use App\Models\PriceTier;
use Symfony\Component\Console\Command\Command as CommandAlias;

class UpdateFinalPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'groupsales:update-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'به‌روزرسانی قیمت نهایی برای سفارش‌ها بعد از بسته شدن کمپین';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sales = GroupSale::where('status', 'closed')
            ->with('orders', 'priceTiers')
            ->get();

        foreach ($sales as $sale) {
            $buyers = $sale->orders->count();
            $priceTier = $sale->priceTiers
                ->where('min_buyers', '<=', $buyers)
                ->sortByDesc('min_buyers')
                ->first();

            $finalPrice = $priceTier ? $priceTier->price : $sale->product->base_price;

            foreach ($sale->orders as $order) {
                $order->final_price = $finalPrice;
                $order->save();
                $this->info("سفارش {$order->id} به‌روز شد: {$finalPrice} تومان");
            }
        }

        return CommandAlias::SUCCESS;
    }
}
