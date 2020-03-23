<?php
/*
 * @Author: 笑脸
 * @Date: 2020-03-23 19:22:20
 * @LastEditTime: 2020-03-23 20:40:54
 * @LastEditors: 首页控制器
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\FirstController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\ClassController; // 分类控制器
use app\Http\Controllers\ThematicController; // 专题控制器

class FirstController extends Controller
{

    /**
     * @入口文件: 
     * @param {} 
     * @return: 
     */
    public function index(){
        // 获取品牌分类
		ClassController::get_brand_class();
		// 获取专题精选
		ThematicController::getAll_thematic();
		
		self::lunbo_iamge();
		self::get_Recommend_Brand();
		self::new_Products();
		self::popular_Good();
	}

    
    /**
     * @获取轮播图: 
     * @param {type} 
     * @return: 
     */
    public function lunbo_iamge(){
        
    }

	/**
	 * @: 获取推荐品牌
     * @param {type} 
	 * @return: 
	 */
	public function get_Recommend_Brand(){
		
	}

	/**
	 * @获取新品首发: 
	 * @param {type} 
	 * @return: 
	 */
	public function new_Products(){
		
	}

	/**
	 * @获取人气好物: 
	 * @param {type} 
	 * @return: 
	 */
	public function popular_Good(){
		
	}

	
}
