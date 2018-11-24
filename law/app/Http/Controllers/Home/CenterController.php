<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterController extends Controller
{
    #引导用户进入授权页面
    public function center(){
        #获取用户授权，将openid入库
        $wx_appid = env('WX_APPID');#测试号appid
        $wx_return = urlencode('http://law.cjlll.com/wx_return');#授权回调
        $url = "https://open.w eixin.qq.com/connect/oauth2/authorize?appid={$wx_appid}&redirect_uri={$wx_return}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        header('location:'.$url);
    }

    #引导用户进入授权页面  律师个人中心
    public function law_center(){
        #获取用户授权，将openid入库
        $wx_appid = env('WX_APPID');#测试号appid
        $wx_return = urlencode('http://law.cjlll.com/law_return');#授权回调
        $url = "https://open.w eixin.qq.com/connect/oauth2/authorize?appid={$wx_appid}&redirect_uri={$wx_return}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        header('location:'.$url);
    }
}
