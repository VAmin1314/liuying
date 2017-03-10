<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMusic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('歌曲的标题');
            $table->string('artist')->comment('歌曲的作者');
            $table->string('path')->comment('歌曲的链接地址');
            $table->string('cover')->comment('歌曲的封面图片');
            $table->string('status')->comment('是否显示');

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
        Schema::dropIfExists('music');
    }
}
