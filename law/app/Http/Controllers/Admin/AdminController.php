<?php

namespace App\Http\Controllers\Admin;

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
    public function LoginDo(){
        print_r(Input::get());
    }
}
