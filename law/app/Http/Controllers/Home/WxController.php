<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use QRcode;

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
        if($user){
            DB::table('law_user')
                ->where(['user_openid'=>$user_info['openid']])
                ->update(['user_img'=>$user_info['headimgurl']]);
        }else{
            DB::table('law_user')
                ->insertGetId(['user_openid'=>$user_info['openid'],'user_img'=>$user_info['headimgurl']]);
        }
        $user = json_decode(json_encode(DB::table('law_user')
            -> leftJoin('law_medal','law_user.user_id','=','law_medal.user_id')
            -> where(['user_openid'=>$user_info['openid']])
            -> first()),true);#重新查这个用户信息，用于查积分，余额等
        $session = [
            'user_id' => $user['user_id'],
            'name' => $user_info['nickname'],
            'openid' => $user['user_openid']
        ];
        session(['user'=>$session]);#登录状态
        #个人中心页面
        return view('home.center',['name'=>$user_info['nickname'],'img'=>$user['user_img'],'grade'=>$user['user_integral'],'medal'=>$user['medal_status']]);
    }

    #用户账单
    public function bill(){
        $user_id = session('user')['user_id'];
        $money = json_decode(json_encode(DB::table('law_user')
            -> where(['user_id' => $user_id])
            -> select('user_balance')
            -> first()),true);
        return view('home.bill',['money'=>$money['user_balance']]);
    }
    #充值页面
    public function cz(){
        return view('home.topUp');
    }
    #微信支付（调用统一下单api）
    public function goPay(Request $request){
        $order_no = getOrderNo();
        $money = $request -> input('money');#正式环境 *100
        #订单入库
        $user_id = session('user')['user_id'];
        $res = DB::table('law_order')
            -> insertGetId(['order_no' => $order_no,'status'=>1,'amount'=>$money,'user_id'=>$user_id]);
        if($res){
            $key = 'sdg634fghgu5654rtghfghgfy4575htg';
            $url="https://api.mch.weixin.qq.com/pay/unifiedorder";
            $par=[
                'appid'=>'wx3d751ea7a2f7c064',//公众账号
                'mch_id'=>'1499304962',//商户号
                'nonce_str'=>uniqid(),//随机字符串
                'body'=>'最好的我',//商品描述
                'out_trade_no'=>$order_no,//订单号
                'total_fee'=>$money,//金额
                'spbill_create_ip'=>$_SERVER['SERVER_ADDR'],//调用微信支付的服务器ip
                'notify_url'=>'http://law.cjlll.com/weixinnotify_url',//异步通知
                'trade_type'=>'NATIVE',//交易类型
            ];
            ksort($par);
            $sign = strtoupper(md5(urldecode(http_build_query($par)).'&key='.$key));
            $par['sign'] = $sign;
            $data = ArrToXml($par);
            $resalt =  XmlToArr( curlRequest($url,$data));
            QRcode::png($resalt['code_url'],false,'H',4,2,false);//输出到浏览器或者生成文件
            exit;
        }
    }

    //微信异步通知
    public function weixinNotify_url(){
        $xmlStr = file_get_contents('php://input');//接受微信服务器 响应的信息
        $arr = XmlToArr($xmlStr);
        file_put_contents('/data/wwwroot/default/weixin/test.txt',print_r($arr,true),FILE_APPEND);
        $order_info = json_decode(json_encode(DB::table('law_order')
            ->where(['order_no'=>$arr['out_trade_no']])
            ->first()),true);
        //验证签名
        if(!$this -> checkSign($arr)){
            file_put_contents('/data/wwwroot/default/weixin/test.txt','error sign',FILE_APPEND);
            exit;
        }
        //验证金额
        if($arr['cash_fee'] != $order_info['amount']){
            file_put_contents('/data/wwwroot/default/weixin/test.txt','money error',FILE_APPEND);
            exit;
        }
        //修改订单状态
        DB::table('law_order')
            ->where(['order_no'=>$arr['out_trade_no']])
            ->update(['status'=>2]);
        //修改用户余额
        DB::table('law_user')
            ->where(['user_id'=>$order_info['user_id']])
            ->increment('user_balance',$arr['cash_fee']);
        //用户勋章
        $this -> _getMedal($order_info,$arr);
        file_put_contents('/data/wwwroot/default/weixin/test.txt','success',FILE_APPEND);
        $returnXml = ArrToXml(['return_code'=>'SUCCESS','return_msg'=>'OK']);
        echo  $returnXml;
    }
    //微信验证签名
    public function checkSign($arr){
        $sign = $arr['sign'];
        $key = 'sdg634fghgu5654rtghfghgfy4575htg';
        unset($arr['sign']);
        ksort($arr);
        $returnSign = strtoupper(md5(urldecode(http_build_query($arr)).'&key='.$key));
        if($sign == $returnSign){
            return true;
        }else{
            return false;
        }
    }
    //计算用户勋章
    private function _getMedal($order_info,$arr){
        //用户勋章
        $medal_info = json_decode(json_encode(DB::table('law_medal')
            ->where(['user_id'=>$order_info['user_id']])
            ->first()),true);
        $dueTime = strtotime('+7 day');//到期时间
        if(!$medal_info){
            $sum = $arr['cash_fee'];//消费的金额
            if($sum>0 && $sum<10){
                $medal = 0;
            }elseif($sum>=10 && $sum<20){
                $medal = 1;
            }elseif($sum>=20 && $sum<30){
                $medal = 2;
            }elseif($sum>=30 && $sum<50){
                $medal = 3;
            }elseif($sum>=50){
                $medal = 4;
            }
            DB::table('law_medal')
                ->insertGetId(['user_id'=>$order_info['user_id'],'medal_utime'=>time(),'due_time'=>$dueTime,'medal_status'=>$medal]);
        }else{
            #本次消费时间距离上次消费时间是否超过7天
            if(time() >= $medal_info['due_time']){
                #超过七天  根据消费情况重置勋章
                $sum = $arr['cash_fee'];//消费的金额
                if($sum>0 && $sum<10){
                    $medal = 0;
                }elseif($sum>=10 && $sum<20){
                    $medal = 1;
                }elseif($sum>=20 && $sum<30){
                    $medal = 2;
                }elseif($sum>=30 && $sum<50){
                    $medal = 3;
                }elseif($sum>=50){
                    $medal = 4;
                }
                DB::table('law_medal')
                    ->where(['user_id'=>$order_info['user_id']])
                    ->update(['medal_status'=>$medal,'due_time'=>$dueTime]);
            }else{
                #未超过七天 根据消费情况重置勋章
                $dueTime = 0;#到期时间
                $medal_status = $medal_info['medal_status'];#勋章等级
                $sum = $arr['cash_fee'];//消费的金额
                if($sum>0 && $sum<10){
                    $medal = 0;
                }elseif($sum>=10 && $sum<20 && $medal_status == 1){
                    $medal = 1;
                    $dueTime = $medal_info['due_time'] + 60*60*24*7;
                }elseif($sum>=20 && $sum<30  && $medal_status == 2){
                    $medal = 2;
                    $dueTime = $medal_info['due_time'] + 60*60*24*7;
                }elseif($sum>=30 && $sum<50  && $medal_status == 3){
                    $medal = 3;
                    $dueTime = $medal_info['due_time'] + 60*60*24*7;
                }elseif($sum>=50  && $medal_status == 4){
                    $medal = 4;
                    $dueTime = $medal_info['due_time'] + 60*60*24*7;
                }
                DB::table('law_medal')
                    ->where(['user_id'=>$order_info['user_id']])
                    ->update(['medal_status'=>$medal,'due_time'=>$dueTime]);
            }
        }
    }






}
