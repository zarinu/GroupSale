<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category_id' => 7,
                'name' => 'گوشی موبایل سامسونگ Galaxy S23',
                'en_name' => 'Samsung Galaxy s23 Mobile Phone',
                'slug' => 'samsung-galaxy-s23',
                'short_description' => 'پرچمدار سامسونگ',
                'description' => 'توضیحات کامل مربوط به گوشی تلفن سامسونگ گلکسی اس ۲۳',
                'price' => 45000000,
//                'thumbnail' => 'products/',
            ],
            [
                'category_id' => 7,
                'name' => 'گوشی موبایل اپل مدل iPhone 13 Pro',
                'en_name' => 'Apple iPhone 13 Pro Mobile Phone',
                'slug' => 'iphone-14',
                'short_description' => 'پرچمدار اپل',
                'price' => 60000000,
//                'thumbnail' => 'products/iphone14/main.jpg',
            ],
            [
                'category_id' => 9,
                'name' => 'هدفون بی‌سیم JBL',
                'en_name' => 'JBL Headphone bluetooth',
                'short_description' => 'کیفیت صدای عالی و باتری ۳۰ ساعته.',
                'slug' => 'headphone-JBL',
                'price' => 3500000,
//                'thumbnail' => 'jbl-headphones.jpg',
            ]
        ];

        foreach ($products as $data) {
            Product::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}