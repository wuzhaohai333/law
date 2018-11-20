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
    public function lawyer_login(Request $request){
        $data = Input::post();
        if($data){
            #判断是否是数字 是手机号登录 不是用户名登录
            if(is_numeric($data['username'])){
                $where = ['attorney_phone'=>$data['username']];
            }else{
                $where = ['attorney_name'=>$data['username']];
            }
            $law_obj=DB::table('law_attorney')->where($where)->first();
            if(empty($law_obj)){
                echo 2;
            }
            $where['attorney_pwd']=md5($data['password']);
            $law_obj=DB::table('law_attorney')->where($where)->first();
            if(empty($law_obj)){
                echo 2;
            }else{
                $request->session()->put('lawyer_info',['attorney_id'=>$law_obj->attorney_id,'attorney_name'=>$law_obj->attorney_name]);
                echo 1;
            }
        }else{
            return view('home.lawyer_login');
        }
    }
    #判断手机号是否被注册
    public function is_tel(){
        $tel = Input::post();
        $tel = json_decode(json_encode(
            DB::table('law_attorney')
                ->where(['attorney_phone'=>$tel['tel']])
                ->first()),true);
        if($tel){
            echo 1;die;
        }else{
            echo 2;die;
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
        $tel_code = json_decode(json_encode(DB::table('law_message')->where($where)->first()),true);
        if(!empty($tel_code)){
            if(time() - $tel_code['msg_time'] > 300){
                echo 3;
            }else{
                echo 1;
            }
        }else{
            echo 2;
        }
    }
    #律师注册入库
    public function lawyer_add(Request $request){
        $data = Input::post();
        #判断数据库是否有传过来的手机号，防止重复注册
        $row = DB::table('law_attorney')->where(['attorney_phone'=>$data['mobilep']])->first();
        if($row){
            echo "该手机号已经注册过了";die;
        }
        #######有待完善  验证
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
