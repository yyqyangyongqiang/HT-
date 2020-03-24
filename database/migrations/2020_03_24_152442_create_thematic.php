<?php
/*
 * @Author: your name
 * @Date: 2020-03-24 23:24:42
 * @LastEditTime: 2020-03-24 23:31:27
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\database\migrations\2020_03_24_152442_create_thematic.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThematic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thematic', function (Blueprint $table) {
            $table->bigIncrements('thematic_id')->comment('主题id');
            $table->string('thematic_name')->comment('专题名称');
            $table->string('thematic_image')->comment('专题图片');
            $table->string('thematic_introduce')->comment('专题介绍');
            $table->string('thematic_price')->comment('专题价格 0元起 99封顶...');
            
            $table->string('yuliu')->comment('预留字段')->nullable();
            $table->string('yuliu1')->comment('预留字段')->nullable();
            $table->string('yuliu2')->comment('预留字段')->nullable();
            $table->string('yuliu3')->comment('预留字段')->nullable();
            $table->string('yuliu4')->comment('预留字段')->nullable();
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
        Schema::dropIfExists('thematic');
    }
}
