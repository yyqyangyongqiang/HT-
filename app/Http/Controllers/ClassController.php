<?php
/*
 * @Author: 笑脸
 * @Date: 2020-03-23 19:39:08
 * @LastEditTime: 2020-03-25 22:26:33
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\ClassController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
{
    /**
     * @获取品牌分类: 
     * @param {type} 
     * @return: 
     */
    public function get_brand_class(){
        return DB::table('brand_class')->pluck('classification_name','brand_class_id');
    }

    /**
     * @获取商品分类: 
     * @param {type} 
     * @return: 
     */
    public function commodity_Categories(){
        
        // 获取数据
        $original_Data = DB::table('commodity_class')->select('commodity_class_id','class_name','superior_id')->get();
        
        // 转换数据格式 (stdClass 转换为 array)
        $data_array = json_decode(json_encode($original_Data), true); 
        
        // 返回数据
        $data = [];
        
        // 转换数据 一级分类下 保存二级分类
        foreach ($data_array as $value) {
            if($value['superior_id'] == 0){
                $data[$value['commodity_class_id']] = $value;
            }else {
                $data[$value['superior_id']]['erji'][$value['commodity_class_id']] = $value;
            }
        }

        // 返回数据
        if($data != []){
            return response()->json([
                'code'=>'200',
                'message'=>'获取成功',
                'data'=>$data
            ]);
        }else {
            return response()->json([
                'code' => '404',
                'message' => '获取分类数据失败',
                'data'=>[]
            ]);
        }
        

    }

    /**
     * @获取下一级分类: 
     * @param {一级分类id} 
     * @return: 
     */
    public function get_Next_Class($first_Class){
        $original_Data= DB::table('commodity_class')
                            ->where('superior_id',$first_Class)
                            ->select('superior_id','class_name','class_big_image','class_image')
                            ->get();
        $data_array = json_decode(json_encode($original_Data), true);

        return response()->json([
            'code'=>'200',
            'message'=>'获取分类成功',
            'data'=>$data_array
        ]);
        
    }

    /**
     * @设置品牌分类: 
     * @param {type} 
     * @return: 
     */
    public function set_Brand_Class(){
        
    }

    /**
     * @设置商品分类: 
     * @param {type} 
     * @return: 
     */
    public function set_Commodity_Class(){
        
    }

    /**
     * @删除品牌分类: 
     * @param {type} 
     * @return: 
     */
    public function delete_Brand_Class(){
        
    }

    /**
     * @删除商品分类: 
     * @param {type} 
     * @return: 
     */
    public function delete_Commodity_Class(){
        
    }


}
