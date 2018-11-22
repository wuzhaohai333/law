<!DOCTYPE html>
<!-- saved from url=(0065)http://www.17sucai.com/preview/1202/2018-08-12/wallet/tixian.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, target-densitydpi=device-dpi" name="viewport">
    <link rel="stylesheet" type="text/css" href="/default/reset.css">
    <link rel="stylesheet" type="text/css" href="/default/weichat.css">
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script src="/js/js.js"></script>
    <script src="/layui/layui.js"></script>
    <title>提现</title>
</head>
<body>
<div class="wrap">
    <div class="top-bar">
        <div class="goback"><a href="http://www.17sucai.com/preview/1202/2018-08-12/wallet/Index.html"><img src="./fh.png"></a></div>
        <h1>零钱提现</h1>
        <div class="wallet-more">.....</div>
    </div>
    <div class="tixian-box">
        @if($id == 1)
            <div class="tobank">
                <input type="hidden" value="1" id="type">
                <span class="dzyh">提到微信零钱</span>
                <span class="yhk">微信零钱</span>
                <span class="dz">2小时内到帐</span>
            </div>
        @elseif($id == 2)
            <div class="tobank">
                <input type="hidden" value="2" id="type">
                <span class="dzyh">提到银行卡</span>
                <span class="yhk">建设银行(8888)</span>
                <span class="dz">2小时内到帐</span>
            </div>
        @elseif($id == 3)
            <div class="tobank">
                <input type="hidden" value="3" id="type">
                <span class="dzyh">提到支付宝</span>
                <span class="yhk">到帐支付宝</span>
                <span class="dz">2小时内到帐</span>
            </div>
        @else
            <div class="tobank">
                <input type="hidden" value="4" id="type">
                <span class="dzyh">不正确</span>
            </div>
        @endif
        <div class="t-moneys">
            <span class="txje">提现金额</span>
            <span class="rmb">￥</span>
            <span class="kyye">当前零钱余额：{{$balance}}元，<a href="javascript:;" '="" id="getall">全部提现</a></span>
            <input type="text" id="getmoneys" class="t-input">
            <button id="getout">提现</button>
        </div>
    </div>
</div>
<script>
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    $('#getout').click(function () {
        var type = $('#type').val();
        var money = $('#getmoneys').val();
        if(money == ''){
            layer.msg('请输入提现金额',{icon:3})
        }
        $.ajax({
            url:'/withdraw_deposit',
            data: {'_token':'{{csrf_token()}}',type:type,money:money},
            type:'post',
            dataType:'json',
            success: function (json) {
                layer.msg(json);
            }
        })
    });


    window.onload=function()
    {
        var okyMOneys=30;//模拟可用余额,实际使用的时候从数据库返回或其它的操作。
        var oGetAll=document.getElementById("getall");
        var oGetMoneys=document.getElementById("getmoneys");
        var oGetOut=document.getElementById("getout");
        var oKyye=document.getElementsByClassName("kyye")[0];

        oGetMoneys.oninput=function()//监听用户的输入给出相应提示。
        {
            if(oGetMoneys.value=="")
            {
                oGetOut.style.opacity=0.4;
                oKyye.innerHTML="当前零钱余额：30元，<a href='javascript:;'' id='getall'>全部提现</a>"
            }
            else if(parseFloat(oGetMoneys.value)>okyMOneys)
            {
                oGetOut.style.opacity=0.4;
                oKyye.innerHTML="<font color=red>输入金额超过零钱余额</font>"
            }
            else
            {
                var paroGetMoneys=parseFloat(oGetMoneys.value);
                var sxf=paroGetMoneys*0.001;
                var sjdz=paroGetMoneys-sxf;
                //oGetMoneys.value=sjdz.toFixed(2);
                oKyye.innerHTML="额外扣除￥"+sxf.toFixed(2)+"手续费（费率0.1%）";
                oGetOut.style.opacity=1;
                //这里就可以进行与后台交互的操作比如ajax操作等。
            }
        };
        //全部提现
        oGetAll.onclick=function()
        {
            var parGetMoneys=parseFloat(oGetMoneys.value);//格式化成数字
            var sjdz=okyMOneys-(okyMOneys*0.000);//手费0.1%
            var sxf=okyMOneys*0.000;
            oGetMoneys.value=sjdz.toFixed(2);
            //oKyye.innerHTML="额外扣除￥"+sxf.toFixed(2)+"手续费（费率0.1%）";
            //alert("a");
        };
    };
</script>

</body></html>