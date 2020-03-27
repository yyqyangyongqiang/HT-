<?php
/*
 * @Author: 笑脸
 * @Date: 2020-03-23 17:03:11
 * @LastEditTime: 2020-03-26 20:08:55
 * @LastEditors: Please set LastEditors
 * @Description: 商品控制器
 * @FilePath: \Project\yalv\app\Http\Controllers\commodity.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\CommentController;
class CommodityController extends Controller
{
    
    /**
     * @获取单个商品详细信息: 
     * @param {商品id} 
     * @return: 
     */
    public function get_Commodity($commodity_id){
        // 获取商品基本信息
        $original_commodity = DB::table('commodity_spu')->where('commodity_id',$commodity_id)->get();
        $commodity = json_decode(json_encode($original_commodity),true); 
        // 商品规格信息
        $specification = self::get_Commodity_Sku($commodity_id);
        // 商品存量信息
        $stock = self::get_Stock($commodity_id);

        // 获取商品评论
        $comment_Class = new CommentController;
        $comment = $comment_Class->get_Comment($commodity_id);

        // 获取推荐商品
        $recommend = self::recommend_Commodity();
        
        // (拼接)   商品信息 + 规格组合 + 存量
        $commodity['guige'] = $specification;   
        $commodity['stock'] = $stock;
        $commodity['comment'] = $comment;
        $commodity['recommend'] = $recommend;
        return $commodity;
    }

    /**
     * @获取商品规格名称: 
     * @param {商品id} 
     * @return: 
     */
    public function get_Commodity_Sku($commodity_id){
        // 获取商品对应的规格id 名称
        $original_Data_Id_Name = DB::table('specification_spu as spu')
                            ->where('spu.commodity_id',$commodity_id)
                            ->leftJoin('specification','spu.specification_id','=','specification.guige_id')
                            ->select('spu.specification_id','specification.guige_name')
                            ->distinct()
                            ->get();
        $guige_id_name = json_decode(json_encode($original_Data_Id_Name),true);

        // 获取规格id对应的名称
        $guige_id = array_column($guige_id_name,'specification_id'); // 从二维数组($guige_id_name)中获取id 返回值：[1,2]
        $original_Data_Value = DB::table('specification_value')
                        ->whereIn('specification_id',$guige_id)
                        ->select('specification_id','specification_value','id')
                        ->get();
        $guige_value = json_decode(json_encode($original_Data_Value),true);

        // 定义返回数组
        $data = [];
        // 数据格式说明  $data
        // array (size=2)
        //   1 =>                                   （规格名称id） 
        //   array (size=6)
        //     1 => string '黑色' (length=6)         （规格值id） => (规格值)
        //     2 => string '白色' (length=6)
        
        // 转换数据格式为$data
        foreach ($guige_value as $value) {
            $data[$value['specification_id']][$value['id']] = $value['specification_value'];
        }

        
        return $data;
    }
    /**
     * @获取商品存量: 
     * @param {商品id} 
     * @return: 
     */
    public function get_Stock($commodity_id){
        $original_Data = DB::table('stock')->select('commodity_id','guige_zuhe','stock','unit_price')->get();
        $data = json_decode(json_encode($original_Data),true);
        

        // $data 数据说明
        // 0 => 
        //     array (size=4)
        //     'commodity_id' => int 1                      商品ID
        //     'guige_zuhe' => string '[1,7]' (length=5)    规格组合
        //     'stock' => int 5                             库存
        //     'unit_price' => int 5499                     销售价格

        return $data;
    }

    /**
     * @获取所有商品类型: 
     * @param {} 
     * @return: 
     */
    public function get_Commodity_Class(){
        
    }

    /**
     * @获取分类下所有商品基本信息: 
     * @param {} 
     * @return: 
     */
    public function get_Class_Commodity($class_id){
        // 获取数据
        $original_Data = DB::table('commodity_spu')
            ->where('class_id','=',$class_id)
            ->select('commodity_id')
            ->get();
        // stdClass 转换为 array
        $data = json_decode(json_encode($original_Data),true);
        
        // 保存所有商品id
        $data_array = [];
        foreach ($data as  $line) {
            foreach ($line as $key => $value) {
                $data_array[] = $value;
            }
        }
      
        // 转换数据格式
        // $commodity_id = array_column($data,'');
        
        // 根据商品id 获取基本信息
        $data = self::get_Commodity_Basic($data_array);
        
        return response()->json([
            'code'=>'200',
            'message'=> '获取商品分类成功',
            'data'=>$data
        ]);
    }

    /**
     * @新增商品: 
     * @param {type} 
     * @return: 0-1
     */
    public function append(){
        
    }

    /**
     * @修改商品: 
     * @param {} 
     * @return: 0-1
     */
    public function alter(){
        
    }

    /**
     * @删除商品: 
     * @param {id} 
     * @return: 0-1
     */
    public function delete(){
        
    }


    /**
     * @获取品牌下所有商品: 
     * @param {品牌id} 
     * @return: 
     */
    public function get_Brand_Commodity($brand_id){
        // 获取数据
        $original_Data = DB::table('commodity_spu')
            ->where('brand_id','=',$brand_id)
            ->select('commodity_id')
            ->get();
        // stdClass 转换为 array
        $data = json_decode(json_encode($original_Data),true);
        // 转换数据格式
        $commodity_id = array_column($data,'commodity_id');
        
        // 根据商品id 获取基本信息
        $data = self::get_Commodity_Basic($commodity_id);

        return response()->json([
            'code'=>'200',
            'message'=> '获取商品分类成功',
            'data'=>$data
        ]);
    }

    /**
     * @搜索商品: 
     * @param {商品名称,商品分类,商品品牌} 
     * @return: 
     */
    public function serch($name,$commodity_class,$brand){
        
    }

    /**
     * @商品修改日志: 
     * @param {商品id} 
     * @return: 
     */
    public function commodity_Log($commodity_id){
        
    }

    
    /**
     * @获取推荐商品: 
     * @param {type} 
     * @return: 
     */
    public function recommend_Commodity(){
        $original_Data = DB::table('commodity_spu')
                            ->where('recommend',true)
                            ->paginate(15);
        $data = json_decode(json_encode($original_Data),true);

        return $data;
    }
    

    /**
     * @获取商品基本信息: 
     * @param {type} 
     * @return: 
     */
    public function get_Commodity_Basic($commodity_id_array){
      
        $original_Data = DB::table('commodity_spu')
                            ->whereIn('commodity_id',$commodity_id_array)
                            ->select('commodity_id','name','Introduction','image')
                            ->get();
        $data = json_decode(json_encode($original_Data),true);
        return $data;
    }
}
