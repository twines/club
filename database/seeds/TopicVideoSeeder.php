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
                'cid' => '95987305',
                'p' => 2,
                'title' => '扒瓜园',
                'description' => '扒瓜园',
            ],
            [
                'topic_id' => 1,
                'img' => '',
                'av' => '54886554',
                'cid' => '95987668',
                'p' => 2,
                'title' => '白奶奶醉酒',
                'description' => '白奶奶醉酒',
            ],
        ];
        foreach ($videoList as $video) {
            \App\Models\TopicVideo::firstOrCreate($video);
        }
    }
}
