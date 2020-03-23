<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_class', function (Blueprint $table) {
            $table->bigIncrements('brand_class_id')->comment('分类id');
            $table->timestamps();

             // 品牌分类表
             $table->string('classification_name')->comment('分类名称')->unique('classification_name');
             $table->mediumInteger('superior_id')->comment('上级分类id')->nullable()->index('superior_id')->default(0);
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
        Schema::dropIfExists('brand_class');
    }
}
