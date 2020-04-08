<?php
/*
 * @Author: your name
 * @Date: 2020-03-23 21:19:45
 * @LastEditTime: 2020-03-29 17:55:02
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\app\Http\Controllers\AddressController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Address;

class AddressController extends Controller
{
    /**
     * @获取用户地址: 
     * @param {用户id} 
     * @return: 
     */
    public function get_Address($user_id){
        $original_Data = DB::table('address')
                            ->where('user_id','=',$user_id)
                            ->get();
        $data = json_decode(json_encode($original_Data),true);

        
        return response()->json([
            'code'=>"200",
            "message"=>"获取地址成功",
            "data"=>$data
        ]);
        
    }

    /**
     * @增加地址: 
     * @param {用户id} 
     * @return: 
     */
    public function add_Address(Request $request){
        // 创建新模型实例
        $address = new Address;

        // 给实例设置属性
        $address->user_id = $request->user_id;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->county = $request->county;
        $address->specific_address = $request->specific_address;
        $address->name = $request->name;
        $address->phone = $request->phone;

        // 保存
        $status = $address->save();

        if($status){
            return response()->json([
                'code'=>'200',
                'message'=>'新增地址成功',
                'data'=>""
            ]);
        }else {
            return response()->json([
                'code'=>'601',
                'message'=>'新增地址失败!',
                'data'=>''
            ]);
        }
    }

    /**
     * @修改地址: 
     * @param {用户id} 
     * @return: 
     */
    public function set_Address(Request $request){
        $update = [];
        // 获取参数
        $user_id = $request->request->get('user_id');
        $address_id = $request->request->get('address_id');
        // 获取修改值
        $province = $request->request->get('province');
        $city = $request->request->get('city');
        $county = $request->request->get('county');
        $specific_address = $request->request->get('specific_address');
        $name = $request->request->get('name');
        $phone = $request->request->get('phone');


        $status = DB::table('address')
                    ->where('user_id','=',$user_id)
                    ->where('address_id','=',$address_id)
                    ->update([
                        'user_id'=>$user_id,
                        'province'=>$province,
                        'city'=>$city,
                        "county"=>$county,
                        "specific_address"=>$specific_address,
                        "name"=>$name,
                        "phone"=>$phone,
                    ]);
        if($status != 0){
            return response()->json([
                "code"=>'200',
                "message"=>'修改成功',
                "data"=>''
            ]);    
        }else {
            return response()->json([
                "code"=>'601',
                "message"=>'修改失败',
                "data"=>''
            ]);
        }
    }

    /**
     * @删除地址: 
     * @param {type} 
     * @return: 
     */
    public function delete_Address(Request $request){
        // 获取参数
        $user_id = $request->request->get('user_id');
        $address_id = $request->request->get('address_id');
        
        $status = DB::table('address')
            ->where('user_id',"=",$user_id)
            ->where('address_id',"=",$address_id)
            ->delete();

        if($status != 0){
            return response()->json([
                "code"=>'200',
                "message"=>'删除成功',
                "data"=>''
            ]);    
        }else {
            return response()->json([
                "code"=>'601',
                "message"=>'删除失败',
                "data"=>''
            ]);
        }
        
    }

}
