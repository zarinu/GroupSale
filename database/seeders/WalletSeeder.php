<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    public function run(): void
    {
        Wallet::updateOrCreate(
            ['user_id' => 1],
            ['balance' => 0]
        );
    }
}