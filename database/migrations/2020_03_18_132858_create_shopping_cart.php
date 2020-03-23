<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // 购物车表
            $table->mediumInteger('commodity_id')->comment('商品id');
            $table->mediumInteger('stock_id')->comment('存量id');
            $table->mediumInteger('user_id')->comment('用户id');
            $table->dateTime('append_time')->comment('添加时间');
            $table->mediumInteger('amount')->comment('数量');
            $table->mediumInteger('unit_price')->comment('单价');
            
            $table->string('yuliu')->comment('预留字段')->nullable();
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
        Schema::dropIfExists('shopping_cart');
    }
}
