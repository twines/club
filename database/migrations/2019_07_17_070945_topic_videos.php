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


            $table->string('av')
                ->index()
                ->comment('视频在B站的标识');

            $table->string('p')
                ->default(1)
                ->comment('在专辑里面的页码');


            $table->string('title')
                ->nullable()
                ->comment('视频标题');

            $table->string('description')
                ->nullable()
                ->comment('视频描述');

            $table->unsignedInteger('view_number')
                ->default(1)
                ->comment('观看次数');

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
