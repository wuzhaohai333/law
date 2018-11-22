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
    public function law_center(){
        return view('home.law_center');
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
            $row =  ['font'=>'类型错误','icon'=>2];
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
            return ['font' => '账号状态错误,请联系客服', 'icon' => 2];
        }
        #核对余额是否满足提款金额
        if($money > $attorney_info['attorney_balance']){
            return ['font'=>'余额不足','icon'=>2];
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

        }
        print_r($res);


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
}