<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 21:01:22
 * @LastEditTime: 2020-03-27 18:33:34
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\OrderController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    /**
     * @: 获取所有订单
     * @param {用户id} 
     * @return: 
     */
    public function get_Order($user_id){
        $original_Data = DB::table('order')
            ->where('user_id','=',$user_id)
            ->get();
            
        // stbClass 转 array
        $data = json_decode(json_encode($original_Data),true);
        
        if($data != 0){
            return response()->json([
                'code'=>'200',
                'message'=>'获取订单成功',
                'data'=>$data
            ]);
        }else {
            return response()->json([
                'code'=>'601',
                'message'=>'获取订单失败!',
                'data'=>''
            ]);
        }
    }

    /**
     * @获取某一状态订单: 
     * @param {用户id,订单状态} 
     * @return: 
     */
    public function get_Status_Order($user_id,$order_status){
        $original_Data = DB::table('order')
                            ->where('order_status','=',$order_status)
                            ->get();
        $data = json_decode(json_encode($original_Data),true);

        if($data != []){
            return response()->json([
                'code'=>'200',
                'message'=>'获取订单成功',
                'data'=>$data
            ]);
        }else {
            return response()->json([
                'code'=>'601',
                'message'=>'亲，订单为空！',
                'data'=>''
            ]);
        }
    }

    /**
     * @删除订单: 
     * @param {用户id,订单id} 
     * @return: 
     */
    public function delete_Order(Request $request){
        // 获取参数
        $user_id = $request->request->get('user_id');
        $order_id = $request->request->get('order_id');
        // 删除订单
        $status = DB::table('order')
                            ->where('user_id','=',$user_id)
                            ->where('order_id','=',$order_id)
                            ->delete();
        if($status != 0){
            return response()->json([
                'code'=>'200',
                'message'=>'删除成功',
                'data'=>""
            ]);
        }else {
            return response()->json([
                'code'=>'200',
                'message'=>'删除失败',
                'data'=>""
            ]);
        }
    }

    /**
     * @新增订单: 
     * @param {type} 
     * @return: 
     */
    public function append_Order(Request $request){
        // 获取参数
        $order_time = now();
        $Note = $request->request->get('Note');
        $address_id = $request->request->get('address_id');
        $total_price = $request->request->get('total_price');
        $user_id = $request->request->get('user_id');
        
        // 插入数据
        $status = DB::table('order')
            ->insertGetId([
                "order_time"=>$order_time,
                "Note"=>$Note,
                "address_id"=>$address_id,
                "total_price"=>$total_price,
                "user_id"=>$user_id,
            ],'order_id');
        if($status != 0){
            return response()->json([
                'code'=>'200',
                'message'=>'新增订单成功',
                'data'=>[
                    'order_id'=>$status
                ]
            ]);
        }else {
            return response()->json([
                'code'=>'601',
                'message'=>'新增订单失败',
                'data'=>''
            ]);
        }
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
