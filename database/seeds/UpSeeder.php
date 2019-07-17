<?php

use Illuminate\Database\Seeder;

class UpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $upList = [
            [
                'name' => 'hahysy',
                'img' => 'https://i2.hdslb.com/bfs/face/b0d408bac0d275feb5855bf31a036589aec63566.jpg',
                'up_id' => '331734497',
                'up_center' => 'https://space.bilibili.com/331734497'
            ]
        ];
        foreach ($upList as $up) {
            \App\Models\Up::firstOrCreate($up);
        }
    }
}
