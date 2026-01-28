<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    private array $slugMap = [
        'پوشاک' => 'clothing',
        'مردانه' => 'men',
        'زنانه' => 'women',
        'بچگانه' => 'kids',

        'کالای دیجیتال' => 'digital-products',
        'لپ تاپ و کامپیوتر' => 'laptop-computer',
        'موبایل' => 'mobile',
        'تبلت' => 'tablet',
        'وسایل جانبی' => 'accessories',

        'لوازم خانگی' => 'home-appliances',
        'یخچال و فریزر' => 'refrigerator-freezer',
        'ماشین لباسشویی' => 'washing-machine',
        'ماشین ظرف شویی' => 'dishwasher',
        'اجاق گاز' => 'gas-stove',
        'هود و سینک' => 'hood-sink',

        'زیبایی' => 'beauty',
        'لوازم آرایشی' => 'cosmetics',
        'عطر و ادکلن' => 'perfume',
        'لوازم بهداشتی' => 'hygiene',

        'لوازم برقی' => 'electric-appliances',
        'سشوار' => 'hair-dryer',
        'اتو' => 'iron',
        'ریش تراش' => 'shaver',
        'ساعت دیجیتال' => 'digital-watch',
        'هم زن و آبمیوه گیر' => 'mixer-juicer',
        'ترازو دیجیتال و چرخ کن' => 'digital-scale-meat-grinder',

        'سوپر مارکت' => 'supermarket',
        'صبحانه' => 'breakfast',
        'تنقلات' => 'snacks',
        'خشکبار' => 'nuts',
        'حبوبات و کنسرو' => 'legumes-canned',
        'میوه و سبزیجات' => 'fruits-vegetables',
        'سوسیس و کالباس' => 'sausages',
        'گوشت' => 'meat',
        'لبنیات' => 'dairy',

        'کودک و نوزاد' => 'baby-kids',
        'پوشک' => 'diapers',
        'بهداشت و حمام' => 'bath-hygiene',
        'سرگرمی و غذاخوری' => 'entertainment-feeding',
        'کالای خواب' => 'sleep-products',
    ];

    public function run(): void
    {
        $categories = [
            'پوشاک' => [
                'مردانه',
                'زنانه',
                'بچگانه',
            ],
            'کالای دیجیتال' => [
                'لپ تاپ و کامپیوتر',
                'موبایل',
                'تبلت',
                'وسایل جانبی',
            ],
            'لوازم خانگی' => [
                'یخچال و فریزر',
                'ماشین لباسشویی',
                'ماشین ظرف شویی',
                'اجاق گاز',
                'هود و سینک',
            ],
            'زیبایی' => [
                'لوازم آرایشی',
                'عطر و ادکلن',
                'لوازم بهداشتی',
            ],
            'لوازم برقی' => [
                'سشوار',
                'اتو',
                'ریش تراش',
                'ساعت دیجیتال',
                'هم زن و آبمیوه گیر',
                'ترازو دیجیتال و چرخ کن',
            ],
            'سوپر مارکت' => [
                'صبحانه',
                'تنقلات',
                'خشکبار',
                'حبوبات و کنسرو',
                'میوه و سبزیجات',
                'سوسیس و کالباس',
                'گوشت',
                'لبنیات',
            ],
            'کودک و نوزاد' => [
                'پوشک',
                'بهداشت و حمام',
                'سرگرمی و غذاخوری',
                'کالای خواب',
            ],
        ];

        $sortOrder = 1;

        foreach ($categories as $parentName => $children) {

            $parent = Category::updateOrCreate(
                ['slug' => $this->makeSlug($parentName)],
                [
                    'name' => $parentName,
                    'parent_id' => null,
                    'is_active' => true,
                    'sort_order' => $sortOrder++,
                    'meta_title' => $parentName,
                ]
            );

            $childSortOrder = 1;

            foreach ($children as $childName) {
                Category::updateOrCreate(
                    ['slug' => $this->makeSlug($childName)],
                    [
                        'name' => $childName,
                        'parent_id' => $parent->id,
                        'is_active' => true,
                        'sort_order' => $childSortOrder++,
                        'meta_title' => $childName,
                    ]
                );
            }
        }
    }

    private function makeSlug(string $name): string
    {
        return $this->slugMap[$name]
            ?? \Illuminate\Support\Str::slug($name);
    }
}
