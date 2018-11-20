<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    #律师注册界面
    public function register(){

        return view('home.register');
    }
    #律师登录页面
    public function lawyer_login(){
        return view('home.lawyer_login');
    }
    #判断手机号是否被注册
    public function is_tel(){
        $tel = Input::post();
        $tel = json_decode(json_encode(
            DB::table('law_attorney')
                ->where(['attorney_phone'=>$tel['tel']])
                ->first()),true);
        if($tel){
            echo 1;
        }else{
            echo 2;
        }
    }
    #接受手机验证码
    public function phone_code(){
        $phone = Input::post();
        $phone_code = getCode();
        //$message_model = new message();
        DB::beginTransaction();
        //$ser1 = sendSms($phone['phone'],$phone_code);
        //把手机号和短信验证码存到数据库
        $arr = [
            'msg_phone'=>$phone['mobile'],
            'msg_code'=>$phone_code,
            'msg_time'=>time(),
            'msg_type'=>2
        ];
        $ser2 = DB::table('law_message')->insert($arr);
        //if($ser1 && $ser2){
        if($ser2){
            DB::commit();
            return 1;
        }else{
            DB::rollBack();
            return 2;
        }
    }
    #验证验证码是否正确
    public function verify_code(){
        $code = Input::post();
        $where = [
            'msg_phone'=>$code['mobile'],
            'msg_code'=>$code['code']
        ];
        $row = DB::table('law_message')->where($where)->first();
        if(!empty($row)){
            echo 1;
        }else{
            echo 2;
        }
    }
    #律师注册入库
    public function lawyer_add(Request $request){
        $data = Input::post();
        //print_r($data);
        ######验证
        $insert = [
            'attorney_may_bel'=>$data['realname'],
            'attorney_name'=>$data['uname'],
            'attorney_phone'=>$data['mobilep'],
            'attorney_pwd'=>md5($data['passwrod']),
            'attorney_status'=>1,
            'attorney_ctime'=>time(),
        ];
        $row = DB::table('law_attorney')->insert($insert);
        if($row){
            $law_info = json_decode(json_encode(
                DB::table('law_attorney')
                    ->where(['attorney_phone'=>$data['mobilep']])
                    ->first()),true);
            $request->session()->put('lawyer_info',
                [
                     'attorney_id'=>$law_info['attorney_id'],
                     'attorney_name'=>$law_info['attorney_name']
                ]);
            header("location:http://www.law.com/index");
        }else{
            header("location:http://www.law/com/register");
        }
    }
}
