<?php
/*
 * @Author: 笑脸
 * @Date: 2020-03-23 19:22:20
 * @LastEditTime: 2020-03-24 23:46:04
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\FirstController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ClassController; // 分类控制器
use App\Http\Controllers\ThematicController; // 专题控制器
use Storage;
use DB;
class FirstController extends Controller
{
	
    /**
     * @入口文件: 
     * @param {} 
     * @return: 
     */
    public function index(){


		// die;

		// 获取品牌分类
		$brand_object = new ClassController();
		$brand_class = $brand_object->get_brand_class();
		
		// 获取专题精选
		$themaric_object = new ThematicController();
		$themaric = $themaric_object->getAll_thematic();
		
		$lunbotu = self::lunbo_iamge();
		$recommend_brand = self::get_Recommend_Brand();
		$news_commodity = self::new_Products();
		$recommend = self::popular_Good();
		return response()->json([
			'code' => '200',
			'message'=> '获取成功',
			'data' => [
				'brand_class'=>$brand_class,
				'themaric'=>$themaric,
				'lunbotu'=>$lunbotu,
				'recommend_brand'=>$recommend_brand,
				'new_commodity'=>$news_commodity,
				'recommend'=>$recommend,
			],
		]);
		
	}

    
    /**
     * @获取轮播图: 
     * @param {type} 
     * @return: 
     */
    public function lunbo_iamge(){
        return DB::table('lunbotu')->where('is_Enable','true')->get();
    }

	/**
	 * @: 获取推荐品牌
     * @param {type} 
	 * @return: 
	 */
	public function get_Recommend_Brand(){
		return DB::table('brand')->where('recommend','true')->get();
	}

	/**
	 * @获取新品首发: 
	 * @param {type} 
	 * @return: 
	 */
	public function new_Products(){
		return DB::table('commodity_spu')->where('news','true')->get();
	}

	/**
	 * @获取人气好物: 
	 * @param {type} 
	 * @return: 
	 */
	public function popular_Good(){
		return DB::table('commodity_spu')->where('recommend','true')->get();
		
	}

	
}
