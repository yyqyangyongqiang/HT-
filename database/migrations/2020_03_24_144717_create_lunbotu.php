<?php
/*
 * @Author: your name
 * @Date: 2020-03-24 22:47:17
 * @LastEditTime: 2020-03-24 22:49:36
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\database\migrations\2020_03_24_144717_create_lunbotu.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLunbotu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lunbotu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jump_Address')->comment('跳转地址');
            $table->string('lunbo_Image')->comment('图片地址');
            $table->enum('is_Enable',['true','false'])->comment('是否启用');
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
        Schema::dropIfExists('lunbotu');
    }
}
