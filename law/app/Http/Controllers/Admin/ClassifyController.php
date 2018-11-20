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
        if(Input::get('classify_id')){
            $where=[
                'classify_id'=>Input::get('classify_id')
            ];
            $arr=DB::table('law_classify')->where($where)->first();
            return view('admin.classifyAdd',['title'=>'分类修改','arr'=>$arr]);
        }else{
            return view('admin.classifyAdd',['title'=>'分类添加']);
        }

    }
    //分类列表
    public function classifyList(){
        $data=DB::table('law_classify')->simplePaginate(3);
        //dump($data);
        foreach($data as $k=>$v){
            $data[$k]->classify_ctime=date('Y-m-d H:i:s',$v->classify_ctime);
            if(!empty($v->classify_utime)){
                $data[$k]->classify_utime=date('Y-m-d H:i:s',$v->classify_utime);
            }

        }
        return view('admin.classifyList',['title'=>'分类列表','data'=>$data]);
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
    //修改
    public function classifyUpDo(){
        $arr=Input::get();
        $where=['classify_id'=>$arr['classify_id']];
        $new_arr=[];
        $new_arr['classify_name']=$arr['name'];
        $new_arr['classify_img']=$arr['img'];
        $new_arr['classify_utime']=time();
        $res=DB::table('law_classify')->where($where)->update($new_arr);
        if($res){
            echo "<script>alert('修改成功！');location.href=('/classify_list')</script>";
        }else{
            echo "<script>alert('修改失败！');location.href=('/classify_list')</script>";
        }
    }
    //删除类
    public function deleteClass(){
        $class_id=Input::get('class_id');
        $type=Input::get('type');
        if($type==1){
            $where=[
                'classify_id'=>$class_id
            ];
            $res=DB::table('law_classify')->where($where)->update(['classify_status'=>2,'classify_utime'=>time()]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $where=[
                'classify_id'=>$class_id
            ];
            $res=DB::table('law_classify')->where($where)->update(['classify_status'=>1,'classify_utime'=>time()]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }

    }
}
