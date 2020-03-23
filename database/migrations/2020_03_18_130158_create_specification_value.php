<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specification_value', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('规格值id');
            $table->timestamps();

            // 规格值表
            $table->mediumInteger('specification_id')->comment('规格id');
            $table->string('specification_value')->comment('规格值');
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
        Schema::dropIfExists('specification_value');
    }
}
