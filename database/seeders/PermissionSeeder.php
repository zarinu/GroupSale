<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
//        $permissions = [
//            // Users
//            'users.view', 'users.create', 'users.update', 'users.delete',
//
//            // Products
//            'products.view', 'products.create', 'products.update', 'products.delete',
//
//            // Orders
//            'orders.view', 'orders.manage',
//
//            // Payments
//            'payments.view', 'payments.refund',
//
//            // Content
//            'posts.manage', 'categories.manage',
//
//            // Settings
//            'settings.manage',
//
//            // Reports
//            'reports.view',
//            ['name' => 'all', 'caption' => 'همه دسترسی ها'],
//        ];

        Permission::updateOrCreate(
            ['name' => 'all'],
            ['caption' => 'همه دسترسی ها']
        );
    }
}
