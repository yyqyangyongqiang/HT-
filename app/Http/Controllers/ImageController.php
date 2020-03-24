<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 21:24:21
 * @LastEditTime: 2020-03-24 18:46:56
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\ImageController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public $path_catalog;
    /**
     * @根据文件作用不同，返回对应的路径: 
     * @param {图片类型} 
     * @return: 图片目录
     */
    public function __controller($image_type){
        // 根据不同的业务设置不同的存放路径
        switch ($image_type) {
            case '轮播':
                this::$path_catalog = 'storage/app/lunbo/';
                break;
            case '商品':
                this::$path_catalog = 'stroage/app/commodity/'.$commodity_id.'/';
                break;
            case '品牌':
                this::$path_catalog = 'stroage/app/brand/'.$brand_id.'/';
                break;
            case '专题':
                this::$path_catalog = 'stroage/app/thematic/'.'/';
                break;
            case '图标':
                this::$path_catalog = 'stroage/app/iconfont/'.'/';
                break;
            default:
                this::$path_catalog =  'stroage/app/beiyong/'.'/';
                break;
        }
    }
    
    
    /**
     * @上传图片: 
     * @param {图片文件,商品id,品牌id} 
     * @return: 图片地址
     */
    public function upload_Image($avatar,$commodity_id='',$brand_id = ''){
        
        // 上传图片
        $path = Storage::putfile(this::$path_catalog,$avatar);
        
        // 判断是否上传成功
        if($path!= ''){
            return response()->json([
                'code'=>'true',
                'message'=>"上传失败",
                'data'=>[
                    'path'=>"$path",
                ],
            ]);    
        }else {
            return response()->json([
                'code'=>'false',
                'message'=>"上传失败",
                'data'=>[
                    'path'=>'',
                ],
            ]);
        }
        
        
    }

    /**
     * @更换图片: 
     * @param {新图片，原图片名称} 
     * @return: 
     */
    public function Change_Iamge($avatar,$image_name){

        // 上传图片
        $path = Storage::putfile(this::$path_catalog,$avatar);

        // 删除原来图片
        $delete_status = self::delete_Image(this::$path_catalog.$image_name);

        if($path != '' && $delete_status['code']){
            return response()->json([
                'code'=>'true',
                'message'=>'更改成功',
                'data'=>[
                    'path'=>$path,
                ],
            ]);
            
        }else {
            return response()->json([
                'code'=>'false',
                'message'=>'更改失败',
                'data'=>[
                    'path'=>'',
                ],
            ]);
        }
    }

    /**
     * @删除图片: 
     * @param {图片名称} 
     * @return: 
     */
    public function delete_Image($image_name){
        $status = Storage::delete(this::$path_catalog.$image_name);
        // 判断文件是否删除成功
        if($status){
            return response()->json([
                'code'=>'true',
                'message'=>'删除成功',
                'data'=>'',
            ]);
        }else {
            return response()->json([
                'code'=>'false',
                'message'=>'删除失败',
                'data'=>'',
            ]);
        }
    }

    
}
