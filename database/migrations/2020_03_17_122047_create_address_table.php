<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->bigIncrements('address_id')->comment('地址id');
            
            // 地址表
            $table->string('user_id')->comment('用户id')->index('user_id');
            $table->string('province')->comment('省');
            $table->string('city')->comment('市');
            $table->string('county')->comment('县');
            $table->string('specific_address')->comment('具体住址');
            $table->string('name')->comment('收货人姓名')->index();
            $table->string('phone')->comment('收货人电话')->index();
            $table->enum('default_address',['1','0'])->nullable()->comment('是否为默认地址，1为选中状态 ');
            $table->enum('delete_status',['1','0'])->default('0')->comment('删除状态 0未删除 1 已删除');
            $table->dateTime('delete_time')->nullable()->comment('删除时间');
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
        Schema::dropIfExists('address');

    }
}
