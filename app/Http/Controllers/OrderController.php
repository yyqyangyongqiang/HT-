<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 21:01:22
 * @LastEditTime: 2020-03-23 23:04:03
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

    
}
