<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //用户列表
    public function userList(Request $request){

        $admin_info = $request->session()->get('admin_info');
        return view('admin.userList',['admin'=>$admin_info,'title'=>'用户列表']);
    }
    //用户充值
    public function userTopUp(){
        return view('admin.userTopUp',['title'=>'用户充值']);
    }
}
