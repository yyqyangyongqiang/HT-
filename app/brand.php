<?php
/*
 * @Author: your name
 * @Date: 2020-03-31 15:31:31
 * @LastEditTime: 2020-03-31 15:32:19
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\brand.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    //定义表名
    protected $table = "brand";

    // 定义主键
    protected $primartkey = "brand_id";
    
}
