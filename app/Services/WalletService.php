<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\WalletTransaction;
use Exception;

// استفاده از این کلاس در هم در زرین‌پال، هم در cron، هم در admin panel
class WalletService
{
    /**
     * محاسبه موجودی کیف پول کاربر
     */
    public function balance(User $user): float
    {
        return (float)WalletTransaction::where('user_id', $user->id)
            ->selectRaw("
                SUM(
                    CASE 
                        WHEN type = 'credit' THEN amount
                        WHEN type = 'debit' THEN -amount
                    END
                ) as balance
            ")
            ->value('balance') ?? 0;
    }

    /**
     * افزایش موجودی (پرداخت موفق یا برگشت پول)
     */
    public function credit(
        User   $user,
        float  $amount,
        string $description,
        ?int   $groupSaleId = null
    ): WalletTransaction
    {
        return WalletTransaction::create([
            'user_id' => $user->id,
            'group_sale_id' => $groupSaleId,
            'amount' => $amount,
            'type' => 'credit',
            'description' => $description,
        ]);
    }

    /**
     * مصرف موجودی (فقط مصرف داخلی – مثلا ورود به کمپین)
     */
    public function debit(
        User   $user,
        float  $amount,
        string $description,
        ?int   $groupSaleId = null
    ): WalletTransaction
    {

        if ($this->balance($user) < $amount) {
            throw new Exception('موجودی کیف پول کافی نیست');
        }

        return WalletTransaction::create([
            'user_id' => $user->id,
            'group_sale_id' => $groupSaleId,
            'amount' => $amount,
            'type' => 'debit',
            'description' => $description,
        ]);
    }
}
