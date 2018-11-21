<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Index\SmsComController;
use Illuminate\Support\Facades\Input;

class DraftController extends CommController
{
    //投稿列表
    public function draftList( Request $request){
        $contribute_data = DB::table('law_contribute')->join('law_attorney' ,'law_contribute.attorney_id' , '=','law_attorney.attorney_id' ) -> get();
        //dump($contribute_data);
        return view('admin.draftList',['title'=>'投稿列表','data'=>$contribute_data ]);
    }
    //投稿通过、驳回
    public function contributeOk(){
        $type=Input::get('type');
        $contribute_id=Input::get('contribute_id');
        $where=[
            'contribute_id'=>$contribute_id
        ];
        if($type==1){
            $res=DB::table('law_contribute')->where($where)->update(['contribute_status'=>1,'contribute_utime'=>time()]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }else if($type==2){
            $res=DB::table('law_contribute')->where($where)->update(['contribute_status'=>2,'contribute_utime'=>time()]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $res=DB::table('law_contribute')->where($where)->update(['contribute_status'=>3,'contribute_utime'=>time()]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
}
