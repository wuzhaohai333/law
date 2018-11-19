<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    //登录视图
    public function AdminLogin(){
        return view('admin.welcome');
    }
    //登录验证执行
    public function LoginDo(Request $request){
        $arr=Input::get();
        $where=[
            'admin_name'=>$arr['userName']
        ];
        $user_obj=DB::table('law_admin')->where($where)->first();
        if(empty($user_obj)){
            exit( '账号密码有误');
        }
        $where['admin_pwd']=md5($arr['password']);
        $user_obj=DB::table('law_admin')->where($where)->first();
        if(empty($user_obj)){
            exit( '账号密码有误');
        }
        $request->session()->put('admin_info',['admin_id'=>$user_obj->admin_id,'admin_name'=>$arr['userName']]);
        echo 1;
    }
    public function AdminIndex(Request $request){
        $admin_info = $request->session()->get('admin_info');
        return view('admin.adminIndex',['admin'=>$admin_info,'title'=>'首页']);
    }
}
