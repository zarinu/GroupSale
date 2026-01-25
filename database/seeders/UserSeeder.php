<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'زهرا',
            'mobile' => '09034964636',
            'email' => 'zahra@example.com',
            'password' => bcrypt('password')
        ]);
    }
}
