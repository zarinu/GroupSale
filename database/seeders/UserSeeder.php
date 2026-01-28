<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['mobile' => '09034964636'],
            [
                'name' => 'زهرا',
                'email' => 'zahra@example.com',
                'password' => bcrypt('password')
            ]
        );
    }
}
