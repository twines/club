<?php

use Illuminate\Database\Seeder;

class TopicVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $videoList = [
            [
                'topic_id' => 1,
                'img' => '',
                'av' => '54886554',
                'p' => 1,
                'title' => '穆桂英挂帅',
                'description' => '穆桂英挂帅',
            ],
            [
                'topic_id' => 1,
                'img' => '',
                'av' => '54886554',
                'p' => 2,
                'title' => '宋世杰',
                'description' => '宋世杰',
            ],
        ];
        foreach ($videoList as $video) {
            \App\Models\TopicVideo::firstOrCreate($video);
        }
    }
}
