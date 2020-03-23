<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_review', function (Blueprint $table) {
            $table->bigIncrements('comment_id')->comment('评论id');
            $table->timestamps();

            // 商品评价表
            $table->mediumInteger('superior_id')->comment('上级评论id')->default(0)->index('superior_id');
            $table->mediumInteger('commodity_id')->comment('商品id')->index('commodity_id');
            $table->string('order_id')->comment('订单id')->index('order_id');
            $table->mediumInteger('user_id')->comment('用户id')->index('user_id');
            $table->string('content')->comment('评论内容');
            $table->datetime('order_time')->comment('评论时间');
            $table->mediumInteger('like')->comment('点赞数量')->index('like')->default(0);
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
        Schema::dropIfExists('product_review');
    }
}
