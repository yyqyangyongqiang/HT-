<?php
/*
 * @Author: your name
 * @Date: 2020-02-21 12:08:25
 * @LastEditTime: 2020-03-27 18:32:30
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Middleware\VerifyCsrfToken.php
 */

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // 添加白名单，表示此处路由不用使用csrf验证
        "add_comment",    // 添加评论
        "del_comment",    // 删除评论
        "comment_like",   // 评论点赞
        "add_shopping",   // 添加商品至购物车
        "alter_shopping", // 修改购物车商品
        "add_address",    // 新增用户地址
        "Generate_orders", // 生成订单
        "delete"           // 删除订单
    ];

}
