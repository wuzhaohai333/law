<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WxController extends Controller
{
    #微信授权回调
    public function wx_return(){
        #接受code

        #换取access_token

        #换取openid  用户图像
    }
}
