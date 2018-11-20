<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    //登录视图
    public function AdminLogin(Request $request){
        $request->session()->forget('admin_info');
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
        $where['admin_status']=1;
        $user_obj=DB::table('law_admin')->where($where)->first();
        if(empty($user_obj)){
            exit( '账号密码有误');
        }
        $request->session()->put('admin_info',['admin_img'=>$user_obj->admin_img,'admin_id'=>$user_obj->admin_id,'admin_name'=>$arr['userName']]);
        echo 1;
    }
    //后台首页
    public function AdminIndex(Request $request){
        $admin_info = $request->session()->get('admin_info');
        return view('admin.adminIndex',['admin'=>$admin_info,'title'=>'首页']);
    }
    //管理员添加
    public function adminAdd(){
        return view('admin.adminAdd',['title'=>'管理员添加']);
    }
    //管理员添加
    public function adminAddDo(){
        $arr=Input::get();
        //dump($arr);
        $new_arr=[];
        $new_arr['admin_name']=$arr['name'];
        $new_arr['admin_pwd']=md5($arr['password']);
        $new_arr['admin_img']=$arr['img'];
        $new_arr['admin_status']=1;
        $new_arr['admin_ctime']=time();
        $res=DB::table('law_admin')->insert($new_arr);
        if($res){
            return view('admin.adminAdd',['title'=>'管理员添加']);
        }else{
            return view('admin.adminAdd',['title'=>'管理员添加']);
        }
    }
    //管理员列表
    public function adminList(){
        $data=DB::table('law_admin')->simplePaginate(2);
        //dump($data);
        foreach($data as $k=>$v){
            $data[$k]->admin_ctime=date('Y-m-d H:i:s',$v->admin_ctime);
        }
        return view('admin.adminList',['data'=>$data,'title'=>'管理员列表']);
    }
    //管理员删除
    public function adminDelete(){
        $admin_id=Input::get('admin_id');
        $where=[
            'admin_id'=>$admin_id
        ];
        $res=DB::table('law_admin')->where($where)->update(['admin_status'=>2]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    //管理员取消删除
    public function adminNoDelete(){
        $admin_id=Input::get('admin_id');
        $where=[
            'admin_id'=>$admin_id
        ];
        $res=DB::table('law_admin')->where($where)->update(['admin_status'=>1]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    //管理员修改密码
    public function adminUpPwd(){
        $where=[
            'admin_id'=>session('admin_info.admin_id')
        ];
        $arr=DB::table('law_admin')->where($where)->first();
        //dump($arr);
        return view('admin.adminUpPwd',['arr'=>$arr]);
    }
    //执行修改
    public function adminUpPwdDo(Request $request){
        $admin_id=Input::get('admin_id');
        $jpassword=Input::get('jpassword');
        $npassword=Input::get('npassword');
        $password=Input::get('password');
        $where=[
            'admin_id'=>$admin_id
        ];
        $arr=DB::table('law_admin')->where($where)->first();
        if(md5($jpassword)!=$arr->admin_pwd){
            echo 2;
        }else{
            if($npassword!=$password){
                echo 3;
            }else{
                $res=DB::table('law_admin')->where($where)->update(['admin_pwd'=>md5($npassword)]);
                if($res){
                    echo 1;
                    $request->session()->forget('admin_info');
                }else{
                    echo 4;
                }
            }
        }
    }
}
