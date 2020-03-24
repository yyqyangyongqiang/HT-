<?php
/*
 * @Author: 笑脸
 * @Date: 2020-03-23 19:39:08
 * @LastEditTime: 2020-03-24 23:21:09
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
        
    }

    /**
     * @获取下一级分类: 
     * @param {type} 
     * @return: 
     */
    public function get_Next_Class(){
        
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
