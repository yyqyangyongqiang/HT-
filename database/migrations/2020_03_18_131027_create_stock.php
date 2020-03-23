<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->bigIncrements('stock_id')->comment('存量id');
            $table->timestamps();

            // 存量表
            $table->mediumInteger('commodity_id')->comment('商品id');
            $table->string('specification_name_id')->comment('规格名称id');
            $table->string('specification_value_id')->comment('规格值id');
            $table->mediumInteger('stock')->comment('存量')->default(0);
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
        Schema::dropIfExists('stock');
    }
}
