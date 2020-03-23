<?php
/*
 * @Author: your name
 * @Date: 2020-02-21 12:08:25
 * @LastEditTime: 2020-03-23 20:41:12
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

Route::get('/', function () {

    return view('welcome');
});

// 首页路由
Route::get('/', 'FirstController@index');
// 分类
Route::get('/commodity_Categories','ClassController@commodity_Categories');
