<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;
use App\Models\AttributeValue;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = [
            [
                'name' => 'رنگ',
                'code' => 'color',
                'type' => 'color',
                'is_filterable' => true,
                'values' => [
                    ['value' => 'مشکی', 'slug' => 'black'],
                    ['value' => 'سفید', 'slug' => 'white'],
                    ['value' => 'قرمز', 'slug' => 'red'],
                    ['value' => 'آبی', 'slug' => 'blue'],
                ],
            ],
            [
                'name' => 'سایز',
                'code' => 'size',
                'type' => 'select',
                'is_filterable' => true,
                'values' => [
                    ['value' => 'کوچک', 'slug' => 's'],
                    ['value' => 'متوسط', 'slug' => 'm'],
                    ['value' => 'بزرگ', 'slug' => 'l'],
                    ['value' => 'خیلی بزرگ', 'slug' => 'xl'],
                ],
            ],
            [
                'name' => 'حافظه داخلی',
                'code' => 'storage',
                'type' => 'select',
                'is_filterable' => true,
                'values' => [
                    ['value' => '۶۴ گیگابایت', 'slug' => '64gb'],
                    ['value' => '۱۲۸ گیگابایت', 'slug' => '128gb'],
                    ['value' => '۲۵۶ گیگابایت', 'slug' => '256gb'],
                ],
            ],
            [
                'name' => 'برند',
                'code' => 'brand',
                'type' => 'select',
                'is_filterable' => true,
                'values' => [
                    ['value' => 'اپل', 'slug' => 'apple'],
                    ['value' => 'سامسونگ', 'slug' => 'samsung'],
                    ['value' => 'شیائومی', 'slug' => 'xiaomi'],
                ],
            ],
            [
                'name' => 'گارانتی',
                'code' => 'warranty',
                'type' => 'text',
                'is_filterable' => false,
                'values' => [
                    ['value' => 'بدون گارانتی', 'slug' => 'no-warranty'],
                    ['value' => '۱۲ ماهه', 'slug' => '12-months'],
                    ['value' => '۱۸ ماهه', 'slug' => '18-months'],
                ],
            ],
        ];

        foreach ($attributes as $attr) {
            $attribute = Attribute::updateOrCreate(
                ['code' => $attr['code']],
                [
                    'name' => $attr['name'],
                    'type' => $attr['type'],
                    'is_filterable' => $attr['is_filterable'],
                ]
            );

            foreach ($attr['values'] as $val) {
                AttributeValue::updateOrCreate(
                    [
                        'attribute_id' => $attribute->id,
                        'value' => $val['value'],
                    ],
                    [
                        'slug' => $val['slug'],
                    ]
                );
            }
        }
    }
}
