<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            UserRoleSeeder::class,

            SettingSeeder::class,

            WalletSeeder::class,
            AddressSeeder::class,

            CategorySeeder::class,
            AttributeSeeder::class,

            ProductSeeder::class,
            ProductVariantSeeder::class,
            ProductImageSeeder::class,
//
//            PriceHistorySeeder::class,
//
//            CartSeeder::class,
//            OrderSeeder::class,
//            PaymentSeeder::class,
//
//            ReviewSeeder::class,
//            QuestionAnswerSeeder::class,
//
//            ... and others seeders .............................. -------->>>>
        ]);
    }
}
