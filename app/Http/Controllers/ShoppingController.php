<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 20:53:02
 * @LastEditTime: 2020-03-23 20:59:48
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\ShoppingController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingController extends Controller
{

    /**
     * @获取用户购物车数据: 
     * @param {用户id} 
     * @return: 
     */
    public function get_Commodity($user_id){
        
    }

    /**
     * @移除购物车商品: 
     * @param {用户id,商品id} 
     * @return: 
     */
    public function delete_Commodity($user_id,$commodity_id){
        
    }

    /**
     * @修改购物车商品: 
     * @param {用户id，商品id} 
     * @return: 
     */
    public function set_Commodity($user_id,$commodity_id){
        
    }
}
