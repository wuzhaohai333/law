<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AttorneyController extends CommController
{
    //律师列表
    public function attorneyList(){
        $data=DB::table('law_attorney')->simplePaginate(3);
        //dump($data);
        foreach($data as $k=>$v){
            $data[$k]->attorney_ctime=date('Y-m-d H:i:s',$v->attorney_ctime);
            if(!empty($v->classify_utime)){
                $data[$k]->attorney_utime=date('Y-m-d H:i:s',$v->attorney_utime);
            }
        }
        return view('admin.attorneyList',['title'=>'律师列表','data'=>$data]);
    }
    //律师提现记录
    public function attorneyWithdraw(){
        return view('admin.attorneyWithdraw',['title'=>'提现记录']);
    }
    //律师封号解封
    public function attorneyStop(){
        $type=Input::get('type');
        $attorney_id=Input::get('attorney_id');
        if($type==1){
            $where=[
                'attorney_id'=>$attorney_id
            ];
            $res=DB::table('law_attorney')->where($where)->update(['attorney_status'=>2]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $where=[
                'attorney_id'=>$attorney_id
            ];
            $res=DB::table('law_attorney')->where($where)->update(['attorney_status'=>1]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
}
