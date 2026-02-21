<?php

namespace Database\Seeders;

use App\Models\GroupSale;
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
            ProductAttributeSeeder::class,
            ProductImageSeeder::class,
            ProductVariantSeeder::class,

            ReviewSeeder::class,

            GroupSaleSeeder::class,
            GroupSalePriceSeeder::class,
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
