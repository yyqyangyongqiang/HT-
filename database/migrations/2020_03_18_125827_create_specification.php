<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specification', function (Blueprint $table) {
            $table->bigIncrements('guige_id')->comment('规格id');
            $table->timestamps();

            // 规格表
            $table->string('guige_name')->comment('规格名称');
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
        Schema::dropIfExists('specification');
    }
}
