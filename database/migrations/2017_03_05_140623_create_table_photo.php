<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->comment('添加图片的id');
            $table->string('path')->default('')->comment('图片的路径');
            $table->string('title')->default('')->comment('图片的大标题');
            $table->string('shot_time')->default('')->comment('图片的拍摄时间');
            $table->string('shot_add')->default('')->comment('图片的拍摄地点');
            $table->string('little_title')->default('')->comment('图片的小标题');
            $table->string('qiniu_key')->default('')->comment('图片的小标题');
            $table->string('qiniu_hash')->default('')->comment('图片的小标题');
            $table->text('description')->comment('图片的描述');

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
        Schema::dropIfExists('photo');
    }
}
