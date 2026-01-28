<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        Address::updateOrCreate(
            ['user_id' => 1],
            [
                'full_name' => 'زهرا حیدری',
                'mobile' => '09034964636',
                'province' => 'خراسان رضوی',
                'city' => 'مشهد',
                'address' => 'حرم امام رضا، رواق حضرت معصومه، سمت چپ، پلاک ۸',
            ]
        );
    }
}