<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TopicVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('topic_videos', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('topic_id')
                ->index()
                ->comment('专辑id');

            $table->string('img')
                ->nullable()
                ->comment('视频封面');


            $table->string('vid')
                ->index()
                ->comment('视频在');



            $table->unsignedTinyInteger('status')
                ->default(0)
                ->comment('状态1可用，0禁用');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('topic_videos');
    }
}
