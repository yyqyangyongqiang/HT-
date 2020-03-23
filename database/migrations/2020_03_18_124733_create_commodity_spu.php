<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommoditySpu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity_spu', function (Blueprint $table) {
            $table->bigIncrements('commodity_id')->comment('商品id');
            $table->timestamps();

            // 商品spu表
            $table->string('name')->comment('商品名称')->index('name');
            $table->string('Introduction')->comment('商品介绍');
            $table->mediumInteger('class_id')->comment('商品分类id 数组形式分割');
            $table->mediumInteger('brand_id')->comment('品牌id');
            $table->mediumInteger('like')->comment('点赞')->default(0);
            $table->enum('status', ['下架', '上架','待上架'])->nullable()->default('待上架')->comment('商品状态');
            $table->string('Label')->nullable()->comment('商品标签 用于搜索');
            $table->string('image')->comment('商品图片');
            $table->string('parameter')->comment('商品参数')->nullable();

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
        Schema::dropIfExists('commodity_spu');
    }
}
