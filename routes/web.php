<?php

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
Route::get('/a', function () {
    echo date('H:i:s');
    return DB::select('select * from users');
});

//登录注册
Auth::routes();

Route::get('/home', 'HomeController@index');

//文章资源路由
Route::resource('/article','ArticleController');


Route::group(['middleware' => 'loginMid'],function(){
    Route::resource('/article','ArticleController');
});