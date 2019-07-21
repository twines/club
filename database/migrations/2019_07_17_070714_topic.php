<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Topic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('topics', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('av')
                ->unique()
                ->comment('专题在B站唯一标识');
            $table->string('topic_url')
                ->comment('专题的地址');

            $table->string('up_id')
                ->index()
                ->comment('up主的唯一标识');

            $table->unsignedInteger('priority')
                ->default(0)
                ->comment('播放的权重，子分类每播放300以后权重就增加1');

            $table->string('img')
                ->nullable()
                ->comment('专题封面');

            $table->string('title')
                ->nullable()
                ->comment('专题标题');

            $table->string('description')
                ->nullable()
                ->comment('专题描述');


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
        Schema::dropIfExists('topics');
    }
}
