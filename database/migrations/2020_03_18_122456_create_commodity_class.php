<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommodityClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity_class', function (Blueprint $table) {
            $table->bigIncrements('commodity_class_id')->comment('分类id');
            $table->timestamps();

            // 商品分类表
            $table->string('class_name')->comment('分类名称')->index('class_name');
            $table->mediumInteger('superior_id')->comment('上级分类id')->index('superior_id')->default(0);
            $table->mediumInteger('first_class')->comment('一级分类')->nullable(); //参照京东首页 手机/运营商/数码   电脑/办公  在分类的基础上再进行分类
            $table->string('class_image')->comment('分类图片')->nullable();
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
        Schema::dropIfExists('commodity_class');
    }
}
