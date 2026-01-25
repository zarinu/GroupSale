<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'title' => 'گوشی موبایل اپل مدل iPhone 13 Pro تک سیم کارت ظرفیت یک ترابایت و رم 6 گیگابایت',
            'en_title' => 'Apple iPhone 13 Pro Single SIM 1TB And 6GB RAM Mobile Phone',
            'description' => 'مدل اقتصادی با امکانات مناسب برای کارهای روزمره.',
            'base_price' => 10000000,
            'image' => 'samsung-a15.jpg',
        ]);

        Product::create([
            'title' => 'هدفون بی‌سیم JBL',
            'description' => 'کیفیت صدای عالی و باتری ۳۰ ساعته.',
            'base_price' => 3500000,
            'image' => 'jbl-headphones.jpg',
        ]);
    }
}