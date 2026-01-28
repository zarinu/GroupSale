<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RolePermission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        RolePermission::updateOrCreate(
            ['role_id' => 1],
            ['permission_id' => 1]
        );
    }
}
