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

#注册成为律师页面
Route::any('/register','Home\RegisterController@register');

#律师登录页面
Route::any('/lawyer_login','Home\RegisterController@lawyer_login');

#律师接受验证码
Route::any('/phone_code','Home\RegisterController@phone_code');

#判断手机号是否被注册
Route::any('/is_tel','Home\RegisterController@is_tel');

#验证验证码是否正确
Route::any('/verify_code','Home\RegisterController@verify_code');

#律师注册 添加
Route::any('/lawyer_add','Home\RegisterController@lawyer_add');









































########################后台###########################
#登录视图
Route::any('/admin','Admin\AdminController@AdminLogin');

#执行登录
Route::any('/LoginDo','Admin\AdminController@LoginDo');



#后台首页
Route::any('/adminIndex','Admin\AdminController@AdminIndex');
#用户列表
Route::any('/userList','Admin\UserController@userList');
#用户拉黑
Route::any('/block_user','Admin\UserController@blockUser');
#用户拉黑
Route::any('/cancel_user','Admin\UserController@cancelUser');
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
#分类添加
Route::any('/classify_add','Admin\ClassifyController@classifyAdd');
#分类添加
Route::any('/classify_add_do','Admin\ClassifyController@classifyAddDo');
#分类列表
Route::any('/classify_list','Admin\ClassifyController@classifyList');
#管理员添加
Route::any('/admin_add','Admin\AdminController@adminAdd');
#管理员添加
Route::any('/admin_add_do','Admin\AdminController@adminAddDo');
#管理员列表
Route::any('/admin_list','Admin\AdminController@adminList');
#管理员删除
Route::any('/admin_delete','Admin\AdminController@adminDelete');
#管理员取消删除
Route::any('/admin_no_delete','Admin\AdminController@adminNoDelete');
#管理员修改密码
Route::any('/admin_up_pwd','Admin\AdminController@adminUpPwd');
#管理员修改密码执行
Route::any('/admin_up_pwd_do','Admin\AdminController@adminUpPwdDo');
