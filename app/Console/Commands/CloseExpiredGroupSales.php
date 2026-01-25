<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GroupSale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Command\Command as CommandAlias;

class CloseExpiredGroupSales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'groupsales:close-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'بستن کمپین‌های فروش گروهی که تاریخشان به پایان رسیده است';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $groupSales = GroupSale::where('status', 'active')
            ->where('end_time', '<=', now())
            ->with(['priceTiers', 'orders.user.wallet'])
            ->get();

        foreach ($groupSales as $groupSale) {
            $this->processGroupSale($groupSale);
        }

        return CommandAlias::SUCCESS;
    }

    protected function processGroupSale(GroupSale $groupSale): void
    {
        DB::transaction(function () use ($groupSale) {

            $orders = $groupSale->orders()
                ->where('payment_status', 'completed')
                ->get();

            $count = $orders->count();

            $tier = $groupSale->priceTiers
                ->where('min_buyers', '<=', $count)
                ->sortByDesc('min_buyers')
                ->first();

            if ($tier) {
                // ✅ موفق
                $groupSale->update([
                    'status' => 'closed',
                    'final_price' => $tier->price,
                ]);

                foreach ($orders as $order) {
                    $order->update([
                        'final_price' => $tier->price,
                    ]);
                }

            } else {
                // ❌ ناموفق → refund
                $walletService = app(WalletService::class);

                foreach ($orders as $order) {
                    $walletService->refund(
                        $order->user,
                        $order->amount_paid,
                        'بازگشت وجه خرید گروهی ناموفق',
                        $order
                    );

                    $order->update([
                        'payment_status' => 'cancelled',
                    ]);
                }

                $groupSale->update([
                    'status' => 'expired',
                ]);
            }
        });
    }

}
