<?php
/*
 * @Author: 笑脸
 * @Date: 2020-03-23 20:01:08
 * @LastEditTime: 2020-03-24 23:45:04
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\ThematicController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ThematicController extends Controller
{

    /**
     * @获取所有专题: 
     * @param {type} 
     * @return: 
     */
    public function getAll_thematic(){
        return DB::table('thematic')->get();
    }

    /**
     * @获取单个专题详细信息: 
     * @param {type} 
     * @return: 
     */
    public function getOne_thematic(){
        
    }

    /**
     * @修改专题: 
     * @param {type} 
     * @return: 
     */
    public function update(){
        
    }

}
