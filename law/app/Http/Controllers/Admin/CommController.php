<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class CommController extends Controller
{
    //分类添加
    public function __construct(Request $request)
    {

        /*if($admin_info = $request->session()->get('admin_info')){
            echo "<script>alert('请先登录！');location.href=('/admin')</script>";
            exit;
        }*/
    }
}
