<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 20:48:41
 * @LastEditTime: 2020-03-25 20:18:49
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\CommentController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CommentController extends Controller
{
    /**
     * @获取10条评论: 
     * @param {商品id} 
     * @return: 
     */
    public function get_Comment($commodity_id){
        $original_comment = DB::table('product_review')
                                ->where('commodity_id','=',$comment_id)
                                ->select('user_id','content','like','order_time')
                                ->simplePaginate(10);        
        $comment = json_decode(json_encode($original_comment),true); 

        return $comment;
    }

    /**
     * @获取所有评论: 
     * @param {type} 
     * @return: 
     */
    public function getAll_Comment(){
        
    }

    /**
     * @新增评论: 
     * @param {type} 
     * @return: 
     */
    public function append_Comment(){
        
    }

    /**
     * @评论点赞: 
     * @param {type} 
     * @return: 
     */
    public function set_Like($commodity_id,$user_id){
        // 获取当前时间
        $order_time = now();
        $status = DB::insert('insert into users (commodity_id,user_id,order_time) values (?, ?, ?)', [$commodity_id,$user_id,$order_time]);
        
        if($status != ''){
            return response()->json([
                'code'=>'200',
                'message'=>'点赞成功',
                'data'=>''
            ]);
        }
        
    }

    /**
     * @删除评论: 
     * @param {评论id,用户id} 
     * @return: 
     */
    public function delete_Comment($comment_id,$user_id){
        
    }
}
