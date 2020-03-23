<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationSpu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specification_spu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // 商品 规格 中间表
            $table->mediumInteger('commodity_id')->comment('商品id');
            $table->mediumInteger('specification_id')->comment('规格id');
            $table->mediumInteger('specification_value')->comment('规格值id');
            $table->string('specification_image')->comment('规格图片');
            
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
        Schema::dropIfExists('specification_spu');
    }
}
