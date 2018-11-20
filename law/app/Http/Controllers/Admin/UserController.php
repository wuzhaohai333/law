<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    //用户列表
    public function userList(Request $request){
        //$data=DB::table('law_user')->get();
        $data=DB::table('law_user')->simplePaginate(3);
        Paginator::useBootstrapThree();

        foreach ($data as $k=>$v) {
            $data[$k]->user_utime=date('Y-m-d H:i:s',$v->user_utime);
            $data[$k]->user_ctime=date('Y-m-d H:i:s',$v->user_ctime);
        }
        $admin_info = $request->session()->get('admin_info');
        return view('admin.userList',['admin'=>$admin_info,'title'=>'用户列表','data'=>$data]);
    }
    //用户充值
    public function userTopUp(){
        return view('admin.userTopUp',['title'=>'用户充值']);
    }
    //用户拉黑
    public function blockUser(){
        $arr=Input::get();
        $where=[
            'user_id'=>$arr['user_id']
        ];
        $res=DB::table('law_user')->where($where)->update(['user_status'=>3]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    //移出拉黑
    public function cancelUser(){
        $arr=Input::get();
        $where=[
            'user_id'=>$arr['user_id']
        ];
        $res=DB::table('law_user')->where($where)->update(['user_status'=>1]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
}
