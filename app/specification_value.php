<?php
/*
 * @Author: your name
 * @Date: 2020-03-30 15:50:06
 * @LastEditTime: 2020-03-30 21:22:08
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\specification_value.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class specification_value extends Model
{
    //定义表名 
    protected $table = 'specification_value';
    
    // 定义主键
    protected $primartkey = "id";

    // 规格值 关联 规格名称
    public function name(){
        return $this->hasOne(specification::class,"guige_id","specification_id");
    }

    public function get_all(){
        return $this->get();
    }
}
