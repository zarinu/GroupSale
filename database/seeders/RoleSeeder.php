<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin', 'caption' => 'ادمین'],
            ['name' => 'User', 'caption' => 'کاربر عادی'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['name' => $role['name']],
                ['caption' => $role['caption']],
            );
        }
    }
}
