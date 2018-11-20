<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
class ClassifyController extends CommController
{
    //分类添加
    public function classifyAdd(){
        return view('admin.classifyAdd',['title'=>'分类添加']);
    }
    //分类列表
    public function classifyList(){
        return view('admin.classifyList',['title'=>'分类列表']);
    }
    //添加
    public function classifyAddDo(){
        $arr=Input::get();
        $new_arr=[];
        $new_arr['classify_name']=$arr['name'];
        $new_arr['classify_img']=$arr['img'];
        $new_arr['classify_status']=1;
        $new_arr['classify_ctime']=time();
        $res=DB::table('law_classify')->insert($new_arr);
        if($res){
            return view('admin.classifyList',['title'=>'分类列表']);
        }else{
            return view('admin.classifyAdd',['title'=>'分类添加']);
        }
    }
}
