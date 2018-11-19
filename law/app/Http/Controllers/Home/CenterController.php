<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterController extends Controller
{
    #(微信授权登录获取头像，openid)个人中心首页
    public function center(){
        #获取用户授权，将openid入库
        $wx_appid = env('WX_APPID');#测试号appid
        $wx_return = urlencode('http://law.cjlll.com/wx_return');#授权回调
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$wx_appid}&redirect_uri={$wx_return}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        curlRequest($url);


    }
}
