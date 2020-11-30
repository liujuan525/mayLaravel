<?php
/** 请求接口时，需要在路径前面添加 api , 如：http://may.local/api/test */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 测试路由
Route::get('test', function () {
    return 'Hello World';
});


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
