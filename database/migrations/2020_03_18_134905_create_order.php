<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('order_id')->comment('订单id');
            $table->timestamps();

            // 订单表
            $table->dateTime('order_time')->comment('下单时间');
            $table->string('Note')->comment('备注信息');
            $table->enum('pay_status', [ '已支付','待付款'])->comment('支付状态');
            $table->string('address_id')->comment('地址id');
            $table->mediumInteger('total_price')->comment('总价');
            $table->mediumInteger('user_id')->comment('用户id');
            $table->enum('pay_way', ['微信', '支付宝'])->comment('支付方式');
            $table->string('kuaidi')->comment('快递单号');

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
        Schema::dropIfExists('order');
    }
}
