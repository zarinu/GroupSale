<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\ReviewPoint;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $review_points = [
            [
                'title' => 'طراحی زیبا',
                'is_positive' => true,
            ],
            [
                'title' => 'خوش دستی',
                'is_positive' => true,
            ],
            [
                'title' => 'وزن زیاد',
                'is_positive' => false,
            ]
        ];

        Review::updateOrCreate(
            [
                'user_id' => '1',
                'product_id' => '1'
            ],
            [
                'name' => 'زهرا خانوم',
                'mobile' => '09034964636',
                'title' => 'خوبه ولی نه خیلی',
                'comment' => 'ببین کار راه اندازه ولی بهترم میتونست باشه',
                'rating' => 4,
                'is_approved' => true,
                'is_recommended' => true,
            ]
        );

        foreach ($review_points as $data) {
            ReviewPoint::updateOrCreate(
                ['review_id' => 1, 'title' => $data['title']],
                $data
            );
        }
    }
}