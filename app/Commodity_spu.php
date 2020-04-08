<?php
/*
 * @Author: your name
 * @Date: 2020-03-31 15:18:09
 * @LastEditTime: 2020-04-01 23:25:23
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Commodity_spu.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity_spu extends Model
{
    // 定义表名
    protected $table = "commodity_spu";
    // 定义主键
    protected $primartkey = "id";

    // 商品模型 关联 商品分类模型
    public function commodity_class(){
        return $this->hasOne(commodity_class::class,'commodity_class_id',"class_id");
    }
    // 商品模型 关联 品牌模型
    public function commodity_brand(){
        return $this->hasOne(brand::class,'brand_id','brand_id');
    }

    public function get_guige(){
        return $this->hasMany(specification_spu::class,'commodity_id','id');
    }
}
