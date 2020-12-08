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

Route::get('queue', 'Api\QueueController@index');


Route::get('test', 'Api\QueueController@test');
