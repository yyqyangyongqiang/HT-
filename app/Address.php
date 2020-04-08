<?php
/*
 * @Author: your name
 * @Date: 2020-03-28 15:15:03
 * @LastEditTime: 2020-03-30 14:13:19
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Address.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // 与模型关联的表名
    protected $table = "address";
    // 重定义主键
    protected $primartkey = "address_id";

    // 定义默认值
    protected $arrtibutes = [
        'default_address'=>'0', // 是否为默认选中状态
        'delete_status'=>'0',   // 删除状态 默认为未删除
    ];
    
    
}
