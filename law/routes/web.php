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
#首页
Route::any('/index','Home\IndexController@index');
#个人中心
Route::any('/center','Home\CenterController@center');
#用户账单(可以查看自己的余额，也可以进行充值)
Route::any('/bill','Home\WxController@bill');
#点击充值（进入充值页面）
Route::any('/cz','Home\WxController@cz');
#去支付（调微信统一下单）
Route::any('/goPay','Home\WxController@goPay');
#微信异步回调
Route::any('/weixinnotify_url', 'Home\WxController@weixinNotify_url');
#微信授权回调
Route::any('/wx_return','Home\WxController@wx_return');
#法律知识
Route::any('/lawKnowledge','Home\LawController@lawKnowledge');
#找律师
Route::any('/findLawyer','Home\LawController@findLawyer');
#注册成为律师
Route::any('/register','Home\RegisterController@register');








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

