<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class ClassifyController extends Controller
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
    public function classifyAddDo(Request $request){
        $arr=Input::get();
        dump($arr);
        dump($_FILES["file"]);
        if ($_FILES["file"] > 0)
        {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        }
        else
        {
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Stored in: " . $_FILES["file"]["tmp_name"];
        }
    }
}
