<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 20:48:41
 * @LastEditTime: 2020-03-27 12:16:53
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
        $original_Data = DB::table('product_review')
                                ->where('commodity_id','=',$commodity_id)
                                ->select('user_id','content','like','order_time')
                                ->simplePaginate(10);        
        $comment = json_decode(json_encode($original_Data),true); 

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
     * @param {商品id,用户id,评论内容,上级id} 
     * @return: 
     */
    public function append_Comment(Request $request){
        // 接受post参数
        $commodity_id = $request->request->get('commodity_id');
        $content = $request->request->get('content');
        $user_id = $request->request->get('user_id');
        $superior_id = $request->request->get('superior_id');
        // 获取当前时间
        $time = now();
        // 添加数据
        $original_Data = DB::table('product_review')
            ->insert([
                'superior_id'=>$superior_id,
                'commodity_id'=>$commodity_id,
                'user_id'=>$user_id,
                'content'=>$content,
                'order_time'=>$time,
            ]);
        
        if($original_Data != 0){
            return response()->json([
                'code'=>'200',
                'message'=>'新增成功',
                'data'=>''
            ]);
        }else {
            return response()->json([
                'code'=>'601',
                'message'=>'失败',
                'data'=>''
            ]);
        }
    }

    /**
     * @评论点赞: 
     * @param {type} 
     * @return: 
     */
    public function set_Like(Request $request){
        // 获取参数
        $commodity_id = $request->request->get('commodity_id'); 
        $user_id = $request->request->get('user_id');
        $comment_id = $request->request->get('comment_id'); 
        
        // 获取当前时间
        $order_time = now();
        // 评论点赞记录表
        $inster_status = DB::table('comment_like')
                            ->insert(
                                [
                                    'commodity_id'=>$commodity_id,
                                    'user_id'=>$user_id,
                                    'comment_id'=>$comment_id,
                                    'updated_at'=>$order_time
                                ]
                            );
        // 商品表 点赞记录+1
        $like_status = DB::table('product_review')
                            ->increment('like');
        
        // 根据sql执行效果 返回不同的状态 
        if($inster_status != 0 && $like_status != 0){
            return response()->json([
                'code'=>'200',
                'message'=>'点赞成功',
                'data'=>''
            ]);
        }else if($inster_status == 0 && $like_status == 0){
            return response()->json([
                'code'=>'601',
                'message'=>'评论记录生成失败,商品表点赞数量失败',
                'data'=>''
            ]);
        }else if($inster_status != 0){
            return response()->json([
                'code'=>'601',
                'message'=>'评论记录生成失败',
                'data'=>''
            ]);
        }else {
            return response()->json([
                'code'=>'601',
                'message'=>'商品表点赞数量失败',
                'data'=>''
            ]);   
        }
        
    }

    /**
     * @删除评论: 
     * @param {评论id,用户id} 
     * @return: 
     */
    public function delete_Comment(Request $request){
        // 接受数据
        $comment_id = $request->request->get('comment_id');
        $user_id = $request->request->get('user_id');

        
        // 删除数据
        $original_Data = DB::table('product_review')
            ->where('comment_id','=',$comment_id)
            ->where('user_id','=',$user_id)
            ->delete();
        
        if($original_Data != 0){
            
            return response()->json([
                'code'=>'200',
                'message'=> '删除评论成功',
                'data'=>''
            ]);
            
        }else {
            return response()->json([
                'code'=>'601',
                'message'=> '删除评论失败',
                'data'=>''
            ]);
        }
    }
}
