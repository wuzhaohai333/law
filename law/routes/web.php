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
############################前台#######################
Route::get('/', function () {
    return view('welcome');
});
#个人中心
Route::any('/center','Home\CenterController@center');

#微信授权回调
Route::any('/wx_return','Home\WxController@wx_return');

#注册成为律师
Route::any('/register','Home\RegisterController@register');








########################后台###########################
#登录视图
Route::any('/admin','Admin\AdminController@AdminLogin');

#执行登录
Route::any('/LoginDo','Admin\AdminController@LoginDo');

