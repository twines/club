<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoryList = [
            [
                'category_name' => '其他',
            ],
            [
                'category_name' => '京剧',
            ],
            [
                'category_name' => '豫剧',
            ],
            [
                'category_name' => '秦腔',
            ],
            [
                'category_name' => '黄梅戏',
            ],
            [
                'category_name' => '梆子戏',
            ],
            [
                'category_name' => '河南坠子',
            ],
        ];
        foreach ($categoryList as $category) {
            \App\Models\Category::firstOrCreate($category);
        }
    }
}
