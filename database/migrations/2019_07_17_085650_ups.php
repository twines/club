<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ups', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('name')
                ->comment('影片名称');
            $table->string('up_center')
                ->nullable()
                ->comment('up主主页地址');

            $table->string('img')
                ->nullable()
                ->comment('封面');

            $table->string('up_id')
                ->unique()
                ->comment('up主的唯一标识');

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
        Schema::dropIfExists('ups');
    }
}
