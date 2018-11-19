<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WxController extends Controller
{
    #微信授权回调
    public function wx_return(Request $request){
        #接受code
        $code = $request -> input('code');
        #换取access_token
        $wx_appid = env('WX_APPID');#微信appid
        $wx_secret = env('WX_SECRET');#微信秘钥
        $getToken_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$wx_appid}&secret={$wx_secret}&code={$code}&grant_type=authorization_code";
        $info = json_decode(curlRequest($getToken_url),true);
        #换取openid  用户图像
        $getUserinfo_url = "https://api.weixin.qq.com/sns/userinfo?access_token={$info['access_token']}&openid={$info['openid']}&lang=zh_CN";
        $user_info = json_decode(curlRequest($getUserinfo_url),true);
        #将用户信息存入数据库
        $user = json_decode(json_encode(DB::table('law_user')
            -> where(['user_openid'=>$user_info['openid']])
            -> first()),true);
        $user_id = '';
        if($user){
            DB::table('law_user')
                ->where(['user_openid'=>$user_info['openid']])
                ->update(['user_img'=>$user_info['headimgurl']]);
            $user_id = $user['user_id'];
        }else{
            $user_id = DB::table('law_user')
                ->insertGetId(['user_openid'=>$user_info['openid'],'user_img'=>$user_info['headimgurl']]);
        }
        $session = [
            'user_id' => $user_id,
            'name' => $user_info['nickname'],
            'openid' => $user_info['openid']
        ];
        session($session);#登录状态
        #个人中心页面
        return view('home.center',['name'=>$user_info['nickname'],'img'=>$user_info['headimgurl']]);
    }
}
