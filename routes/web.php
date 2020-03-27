<?php
/*
 * @Author: your name
 * @Date: 2020-02-21 12:08:25
 * @LastEditTime: 2020-03-27 18:31:54
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Project\yalv\routes\web.php
 */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {

//     return view('welcome');
// });

// 首页路由
Route::get('/', 'FirstController@index');
// 获取所有商品分类
Route::get('/commodity_Categories','ClassController@commodity_Categories');
// 获取单个商品详细信息
Route::get('/commodity/{commodity_id}', 'CommodityController@get_Commodity');
// 获取二级商品分类
Route::get('/commodity_class/{class_id}','ClassController@get_Next_Class');
// 获取商品分类下商品
Route::get('class_commodity/{class_id}','CommodityController@get_Class_Commodity');
// 获取品牌下商品
Route::get('brand/{brand_id}','CommodityController@get_Brand_Commodity');

// 评论点赞
Route::post('comment_like','CommentController@set_Like');
// 删除评论
Route::delete('del_comment','CommentController@delete_Comment');
// 新增评论
Route::post('add_comment','CommentController@append_Comment');

// 获取专题详细信息
Route::get('thematic/{thematic_id}','ThematicController@getOne_thematic');

// 获取购物车数据
Route::get('shopping/{user_id}','ShoppingController@get_Commodity');
// 修改购物车
Route::post('alter_shopping','ShoppingController@set_Commodity');
// 添加商品至购物车
Route::post('add_shopping','ShoppingController@add_Commodity');
// 移除商品
Route::delete('del_shopping/{user_id}/{shopping_id}','ShoppingController@delete_Commodity');


// 获取某种状态的订单
Route::get('get_order/{user_id}/{order_status}','OrderController@get_Status_Order');
// 获取我的订单
Route::get('order/{user_id}','OrderController@get_Order');
// 生成订单
Route::post('Generate_orders','OrderController@append_Order');
// 删除订单
Route::delete('delete','OrderController@delete_Order');

// 获取我的地址
Route::get('address/{user_id}','AddressController@get_Address');
// 新增地址
Route::post('add_address','AddressController@add_Address');
// 删除地址
Route::delete('del_address/{user_id}','AddressController@delete_Address');
// 修改地址
Route::post('alter_address','AddressController@set_Address');


// 后台管理接口
// 获取某一状态商品
Route::get('commodity/{name}/{commodity_class}/{brand}', 'CommodityController@serch');
// 获取商品修改日志
Route::get('commodity_log/{commodity_id}','CommodityController@commodity_log');

// 根据品牌获取订单
Route::get('brand_order/{brand_id}','OrderController@brand_order');
// 品牌搜索
Route::get('brand_serch/{order_number}/{address_name}/{order_time}/{pay_status}','OrderController@brand_serch');

// 查看商品日志
Route::get('commodity_log/{commodity_id}','CommodityLogController@get_log');
// 数据正常返回：
// ```json
// {
//  "code": 1,
//  "message": "成功",
//  "data": [{
//    "imgUrl": "https://hktapi-uat.hongkun.com.cn/img1.png",
//    "clickUrl": "https://hktapi-uat.hongkun.com.cn/img1.html"
//   },
//   {
//    "imgUrl": "https://hktapi-uat.hongkun.com.cn/img2.png",
//    "clickUrl": "https://hktapi-uat.hongkun.com.cn/img2.html"
//   }
//  ]
// }
// ```
// 错误返回 json示例
// ```json
// {
//  "code": -1,
//  "message": "失败",
//  "data": {}
// }
// ```