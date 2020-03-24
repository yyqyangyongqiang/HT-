<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 21:01:22
 * @LastEditTime: 2020-03-24 13:25:34
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\OrderController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @: 获取所有订单
     * @param {用户id} 
     * @return: 
     */
    public function get_Order($user_id){
        
    }

    /**
     * @获取某一状态订单: 
     * @param {用户id,订单状态} 
     * @return: 
     */
    public function get_Status_Order($user_id,$order_status){
        
    }

    /**
     * @删除订单: 
     * @param {用户id,订单id} 
     * @return: 
     */
    public function delete_Order($user_id,$order_id){
        
    }

    /**
     * @新增订单: 
     * @param {type} 
     * @return: 
     */
    public function append_Order(){
        
    }

    /**
     * @根据品牌获取订单: 
     * @param {品牌id} 
     * @return: 
     */
    public function brand_order($brand_id){
        
    }

    /**
     * @品牌搜索: 
     * @param {订单编号，收货人，提交时间，订单状态} 
     * @return: 
     */
    public function brand_serch($order_number,$address_name,$order_time,$pay_status){
        
    }

    
}
