<?php
/*
 * @Author: your name
 * @Date: 2020-03-31 15:26:22
 * @LastEditTime: 2020-03-31 21:09:15
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\commodity_class.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class commodity_class extends Model
{
    //定义表名
    protected $table = 'commodity_class';

    // 定义主键
    protected $primartkey = "commodity_class_id";
    
    public function get_class(){
        return DB::select('select * from commodity_class ');
    }
}
