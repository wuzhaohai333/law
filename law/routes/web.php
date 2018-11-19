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

#律师登录页面
Route::any('/lawyer_login','Home\RegisterController@lawyer_login');








########################后台###########################
#登录视图
Route::any('/admin','Admin\AdminController@AdminLogin');

#执行登录
Route::any('/LoginDo','Admin\AdminController@LoginDo');



#后台首页
Route::any('/adminIndex','Admin\AdminController@AdminIndex');
#用户列表
Route::any('/userList','Admin\UserController@userList');
#用户充值
Route::any('/user_top-up','Admin\UserController@userTopUp');
#律师列表
Route::any('/attorney_list','Admin\AttorneyController@attorneyList');
#律师提现记录
Route::any('/attorney_withdraw','Admin\AttorneyController@attorneyWithdraw');
#投稿列表
Route::any('/draft_list','Admin\DraftController@draftList');
#评论列表
Route::any('/comment_list','Admin\CommentController@commentList');

