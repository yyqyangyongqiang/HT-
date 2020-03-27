<?php
/*
 * @Author: 笑脸
 * @Date: 2020-03-23 20:01:08
 * @LastEditTime: 2020-03-26 15:32:21
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\ThematicController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\CommodityController;

class ThematicController extends Controller
{

    /**
     * @获取所有专题: 
     * @param {type} 
     * @return: 
     */
    public function getAll_thematic(){
        // 获取数据
        $original_Data = DB::table('thematic')
                            ->where('recommend',true)
                            ->select('thematic_id','thematic_name','thematic_image','thematic_introduce','thematic_price')
                            ->get();
        // 转换数据格式 stdclass =》 array
        $data = json_decode(json_encode($original_Data),true); 
        
        return response()->json([
            'code'=>'200',
            'message'=>'获取专题成功',
            'data'=>$data
        ]);
        
    }

    /**
     * @获取单个专题详细信息: 
     * @param {专题id} 
     * @return: 
     */
    public function getOne_thematic($thiematic_id){
        // 获取数据
        $original_Data = DB::table('thematic')
            ->where('thematic_id','=',$thiematic_id)
            ->select('thematic_id','thematic_name','thematic_image','thematic_introduce','thematic_price','commodity_id')
            ->get();
        // 转换数据格式 stdclass =》 array
        $commodity_id = json_decode(json_encode($original_Data),true); 

        // 获取商品基本信息
        $commodity = new CommodityController();
        $data = $commodity->get_Commodity_Basic($commodity_id);
        
        return response()->json([
            'code'=>'200',
            'message'=>'获取成功',
            'data'=>$data
        ]);
        
    }

    /**
     * @修改专题: 
     * @param {type} 
     * @return: 
     */
    public function update(){
        
    }

}
