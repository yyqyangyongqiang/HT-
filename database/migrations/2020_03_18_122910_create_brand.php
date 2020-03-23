<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->bigIncrements('brand_id')->comment('品牌id');
            $table->timestamps();

            // 品牌表
            $table->string('brand_name')->comment('品牌名称')->index('brand_name');
            $table->string('Introduction')->comment('品牌介绍');
            $table->string('logo')->comment('logo');
            $table->mediumInteger('class_id')->comment('品牌分类id 数组形式保存分类id')->index('class_id');
            $table->string('image')->comment('品牌宣传图片');
            $table->string('yuliu1')->comment('预留字段')->nullable();
            $table->string('yuliu2')->comment('预留字段')->nullable();
            $table->string('yuliu3')->comment('预留字段')->nullable();
            $table->string('yuliu4')->comment('预留字段')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand');
    }
}
