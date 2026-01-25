<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GroupSaleOrder;
use Illuminate\Support\Facades\Notification;
use App\Notifications\GroupSaleClosedNotification;
use Symfony\Component\Console\Command\Command as CommandAlias;

class NotifyBuyersOfClosedGroupSales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'groupsales:notify-buyers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ارسال نوتیفیکیشن به کاربران پس از بسته شدن کمپین';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = GroupSaleOrder::whereHas('groupSale', function ($query) {
            $query->where('status', 'closed')
                ->where('notified', false);
        })
            ->with('user', 'groupSale')
            ->get();

        foreach ($orders as $order) {
            Notification::route('mail', $order->user->email)
                ->notify(new GroupSaleClosedNotification($order->groupSale));

            $this->info("ارسال اعلان برای کاربر {$order->user->id}");
        }

        // علامت‌گذاری کمپین به عنوان اعلان شده
        $orders->pluck('groupSale')->unique()->each(function ($groupSale) {
            $groupSale->notified = true;
            $groupSale->save();
        });

        return CommandAlias::SUCCESS;
    }
}
