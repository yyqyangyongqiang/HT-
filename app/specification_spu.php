<?php
/*
 * @Author: your name
 * @Date: 2020-03-30 15:51:12
 * @LastEditTime: 2020-03-30 16:44:42
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\specification_spu.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class specification_spu extends Model
{
    //定义表名
    protected $table = "specification_spu";
    
    // 定义主键
    protected $primartkey = "id";

    // 模型关联 根据 规格id -> 规格名称
    public function id_name(){
        return $this->hasOne(specification::class,"guige_id","specification_id");
    }

    // 模型关联 根据 规格值id -> 规格值名称
    public function value_name(){
       return $this->hasOne(specification_value::class,"id","specification_value"); 
    }

}
