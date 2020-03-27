<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 20:53:02
 * @LastEditTime: 2020-03-27 12:56:23
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\ShoppingController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShoppingController extends Controller
{

    /**
     * @获取用户购物车数据: 
     * @param {用户id} 
     * @return: 
     */
    public function get_Commodity($user_id){
        // 获取数据 连接 商品表 连接条件为商品id 为了获取商品图片
        $original_Data = DB::table('shopping_cart as cart')
                            ->where('user_id','=',$user_id)
                            ->leftJoin('commodity_spu as spu','cart.commodity_id','=','spu.commodity_id')
                            ->select('cart.commodity_id','cart.user_id','cart.amount','cart.unit_price','cart.spu_zuhe','spu.image')
                            ->get();
        // 转换数据格式
        $data = json_decode(json_encode($original_Data),true);

        if($data != []){
            return response()->json([
                'code'=>'200',
                'message'=>'获取成功',
                'data'=>$data
            ]);
        }else {
            return response()->json([
                'code'=>'601',
                'message'=>'购物车，空空如也!',
                'data'=>''
            ]);
        }
        
    }

    /**
     * @移除购物车商品: 
     * @param {用户id,商品id} 
     * @return: 
     */
    public function delete_Commodity($user_id,$shopping_id){
        // 删除购物车数据
        $original_Data = DB::delete('delete shopping_cart where user_id = ? and id = ?', [$user_id,$shopping_id]);
        
        if($original_Data != 0){
            return response()->json([
                'code'=>'200',
                'message'=>'删除成功',
                'data'=>''
            ]);
        }
    }

    /**
     * @修改购物车商品: 
     * @param {用户id，商品id,spu组合，数量} 
     * @return: 
     */
    public function set_Commodity(Request $request){
        // 获取参数
        $user_id = $request->request->get('user_id');
        $id = $request->request->get('id');
        $spu_zuhe = $request->request->get('spu_zuhe');
        $amount = $request->request->get('amount');
        $stock_id = $request->request->get('stock_id');

        // 修改语句
        // $original_Data = DB::update('update shopping_cart set spu_zuhe = ? , amount = ? where user_id = ? and shopping_id = ?', [$spu_zuhe,$amount,$user_id,$shopping_id]);
        $original_Data = DB::table('shopping_cart')
                            ->where('user_id','=',$user_id)
                            ->where('id','=',$id)
                            ->update([
                                'spu_zuhe'=>$spu_zuhe,
                                'amount'=>$amount,
                                'stock_id'=>$stock_id
                            ]);
                            
        // 判断是否修改成功
        if($original_Data != 0){
            return response()->json([
                'code'=>'200',
                'message'=>'修改成功',
                'data'=>''
            ]);
        }
    }

    /**
     * @添加商品至购物车: 
     * @param {商品id，用户id,规格id，商品价格，数量} 
     * @return: 
     */
    public function add_Commodity(Request $request){
        $commodity_id = $request->request->get('commodity_id');
        $user_id = $request->request->get('user_id');
        $amount = $request->request->get('amount');
        $unit_price = $request->request->get('unit_price');
        $spu_zuhe = $request->request->get('spu_zuhe');
        $stock_id = $request->request->get('stock_id');
        // 获取当前时间
        $time = now();
        // 插入数据
        $original_Data = DB::table('shopping_cart')
                            ->insertGetId ([
                                'commodity_id'=>$commodity_id,
                                'user_id'=>$user_id,
                                'append_time'=>$time,
                                'amount'=>$amount,
                                'unit_price'=>$unit_price,
                                'spu_zuhe'=>$spu_zuhe,
                                'stock_id'=>$stock_id
                            ]);
        
        if($original_Data != ''){
            return response()->json([
                'code'=>'200',
                'message'=>'添加成功',
                'data'=>''
            ]);
        }
    }
}
