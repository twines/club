<?php

use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $topicList = [
            [
                'topic_url' => 'https://www.bilibili.com/video/av54886554',
                'description' => '来源于网络//
京剧电影合辑//
持续更新/',
                'title' => '【集锦】京剧电影合辑(持续更新)',
                'img' => '',
                'up_id' => '331734497',
                'av' => '54886554'
            ]
        ];
        foreach ($topicList as $topic) {
            \App\Models\Topic::firstOrCreate($topic);
        }
    }
}
