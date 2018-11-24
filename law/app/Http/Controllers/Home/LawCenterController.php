<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LawCenterController extends Controller{
    /**
     * 律师的个人中心
     */
    public function law_return(Request $request){
        #接受code
        $code = $request->input('code');
        #换取access_token
        $wx_appid = env('WX_APPID');  #微信APPID
        $wx_secret = env('WX_SECRET'); #微信密钥
        $getToken_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$wx_appid}&secret={$wx_secret}&code={$code}&grant_type=authorization_code";
        $info = json_decode(curlRequest($getToken_url),true);
        #换取openid  用户图像
        $getLawinfo_url = "https://api.weixin.qq.com/sns/userinfo?access_token={$info['access_token']}&openid={$info['openid']}&lang=zh_CN";
        $law_info = json_decode(curlRequest($getLawinfo_url),true);
        #讲律师的信息存到数据库
        $law_id = session('lawyer_info')['attorney_id'];
        $where = [
            'attorney_id'=>$law_id,
            'attorney_openid'=>$law_info['openid']
        ];
        $law = json_decode(json_encode(
            DB::table('law_attorney')
                ->where($where)
                ->first()),true);
        if($law){
            DB::table('law_attorney')
                ->where($where)
                ->update(['attorney_img'=>$law_info['headimgurl']]);
        }else{
            DB::table('law_attorney')
                ->where(['attorney_id'=>$law_id])
                ->update(['attorney_img'=>$law_info['headimgurl'],'attorney_openid'=>$law_info['openid']]);
        }
        $law_data = json_decode(json_encode(
            DB::table('law_attorney')
                ->where($where)
                ->first()),true);
        return view('home.law_center',['name'=>$law_data['attorney_may_bel'],'img'=>$law_data['attorney_img']]);
    }
    /**
     * 律师钱包页面
     */
    public function law_default(){
        $balance = $this->remaining_money();
        return view('home.law_default',['balance'=>$balance['attorney_balance']]);
    }

    /**
     * 提现的类型   1零钱2银行卡3支付宝
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function withdraw_type($id){
        $balance = $this->remaining_money();
        return view('home.withdraw_type', ['id' => $id, 'balance' => $balance['attorney_balance']]);
    }
    /**
     * 提现
     */
    public function withdraw_deposit(){
        $law_id = session('lawyer_info')['attorney_id'];
        $money_data = Input::post();
        $money = $money_data['money'];
        //print_r($money_data);
        if($money_data['type'] == 1) {
            $row = $this->_withdraw_weChar($money, $law_id);
        }elseif($money_data['type'] == 2) {
            $row = $this->_withdraw_bank($money,$law_id);
        }elseif($money_data['type'] == 3) {
            $row = $this->_withdraw_aliPay($money, $law_id);
        }else{
            $row =  ['font'=>'类型错误','code'=>2];
        }
        return $row;
    }
    /**
     * 提现到微信零钱
     */
    private function _withdraw_weChar($money,$law_id){
        #获取订单号
        $order_on = getOrderNo();
        $where = [
            'attorney_id'=>$law_id,
            'attorney_status'=>1
        ];
        #查询提款人
        $attorney_info = json_decode(json_encode(
            DB::table('law_attorney')
                ->where($where)
                ->select('attorney_balance','attorney_openid')
                ->first()),true);
        if(empty($attorney_info)) {
            return ['font' => '账号状态错误,请重新登录', 'code' => 2];
        }
        #核对余额是否满足提款金额
        if($money > $attorney_info['attorney_balance']){
            return ['font'=>'余额不足','code'=>2];
        }
        #订单入库
        $insert = [
            'withdraw_num'=>$money,
            'withdraw_status'=>1,
            'attorney_id'=>$law_id,
            'withdraw_time'=>time(),
            'withdraw_on'=>$order_on
        ];
        $res = DB::table('law_withdraw')->insertGetId($insert);
        if($res){
            $post_url = "https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers";
            $key = "sdg634fghgu5654rtghfghgfy4575htg";
            $arr = [
                'mch_appid'=>'wx3d751ea7a2f7c064',
                'mchid'=>'1499304962',
                'nonce_str'=>uniqid(),
                //'sign'=>'',
                'partner_trade_no'=>$order_on,
                'openid'=>$attorney_info['attorney_openid'],
                'check_name'=>'NO_CHECK',
                'amount'=>$money*100,    //单位为分需要乘100
                'desc'=>'测试提现',
                'spbill_create_ip'=>$_SERVER['SERVER_ADDR'],
            ];
            ksort($arr);
            $string1 = urldecode(http_build_query($arr)).'&key='.$key;
            $sign = strtoupper(md5($string1));
            $arr['sign'] = $sign;
            $xml = ArrToXml($arr);
            $xml_return = postData($post_url,$xml);
            $array = XmlToArr($xml_return);
            file_put_contents('D:/phpStudy1/PHPTutorial/WWW/law/text.txt',print_r($array,true),FILE_APPEND);
            #如果提现成功，把数据库数据补全
            //print_r($array);
            if($array['return_code'] == 'SUCCESS'){
                if($array['return_msg'] == '支付失败'){
                    return ['font'=>'提现失败','code'=>2,'payment_no'=>1499304962201811220435493606];
                }
                if($array['result_code'] == 'SUCCESS'){
                    #条件等于 微信提现 提现表的自增id
                    $withdraw_where = [
                        'withdraw_status'=>1,
                        'withdraw_id'=>$res
                    ];
                    #修改
                    $seav = [
                        'payment_time'=>strtotime($array['payment_time']),
                        'payment_no'=>$array['payment_no'],
                        'status'=>1
                    ];
                    $row = DB::table('law_withdraw')->where($withdraw_where)->update($seav);
                    #如果修改成功，把律师表里的余额减去对应的提现金额
                    if($row){
                        $new_money = $attorney_info['attorney_balance'] - $money;
                        $str = DB::table('law_attorney')->where($where)->update(['attorney_balance'=>$new_money]);
                        if($str){
                            return ['font'=>'提现成功','code'=>'1','payment_no'=>$array['payment_no']];
                        }else{
                            return ['font'=>'金额修改失败','code'=>'1'];
                        }
                    }else{
                        return ['font'=>'没有修改成功','code'=>2];
                    }
                }
            }
        }
    }
    /**
     * 提现到银行卡
     */
    private function _withdraw_bank($money){
        #银行卡
    }
    /**
     * 提现到支付宝
     */
    public function _withdraw_aliPay($money){
        #支付宝
    }
    /**
     * 获取当前律师的余额
     */
    public function remaining_money(){
        $law_id = session('lawyer_info')['attorney_id'];
        $remaining_money = json_decode(json_encode(
            DB::table('law_attorney')
                ->where(['attorney_id'=>$law_id,'attorney_status'=>1])
                ->select('attorney_balance')
                ->first()),true);
        return $remaining_money;
    }
    /**
     * 提现详情页
     */
    public function withdraw_success(){
        $payment_no = Input::get();

        $law_id = session('lawyer_info')['attorney_id'];
        $where = [
            'payment_no'=>$payment_no,
            'status'=>1
        ];
        $data = DB::table('law_withdraw')->where($where)->first();
        //print_r($data);die;
        return view('home.withdraw_success',['data'=>$data]);
    }
}