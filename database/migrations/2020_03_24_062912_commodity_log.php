<?php
/*
 * @Author: your name
 * @Date: 2020-03-24 14:29:12
 * @LastEditTime: 2020-03-24 14:29:18
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\database\migrations\2020_03_24_062912_commodity_log.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommodityLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('commodity_log', function (Blueprint $table) {
            //商品日志表
            $table->bigIncrements('log_id')->comment('商品日志logid');
            $table->mediumInteger('commodity_id')->comment('商品id');
            $table->mediumInteger('user_id')->comment('用户id');
            $table->enum('stock',['add','del'])->nullable()->comment('库存修改');
            $table->mediumInteger('stock_value')->nullable()->comment('修改数量');
            $table->enum('Label',['grounding','news','recommend'])->comment('修改标签');
            $table->enum('label_value', ['true', 'false'])->nullable()->comment('标签值');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
