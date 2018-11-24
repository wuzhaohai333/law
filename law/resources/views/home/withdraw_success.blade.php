<!DOCTYPE html>
<!-- saved from url=(0065)http://www.17sucai.com/preview/1202/2018-08-12/wallet/wallet.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, target-densitydpi=device-dpi" name="viewport">
    <link rel="stylesheet" type="text/css" href="/default/reset.css">
    <link rel="stylesheet" type="text/css" href="/default/weichat.css">
    <title>提现详情</title>
</head>
<body>
<div class="wrap">
    <div class="top-bar">
        <div class="goback"><a href="http://www.17sucai.com/preview/1202/2018-08-12/wallet/Index.html">
                <img src="/default/fh.png"></a>
        </div>
        <h1>提现详情</h1>
        <div class="wallet-more">提现记录</div>

    </div>
    <div class="wallet-content">
        <div class="wallet-box">
            <img src="/default/aq.png">
            <h2>提现成功</h2>

        </div>
        <div style="width: 100%">
            <br>
            <br>
            <p style="">提现方式
                    @if($data->withdraw_status == 2)
                        <span style="margin-left:45%;;">微信零钱 </span>
                    @elseif($data->withdraw_status == 1)
                        <span style="margin-left:48%;;">银行卡 </span>
                    @else
                        <span style="margin-left:48%;;">支付宝 </span>
                    @endif

                   </p>
            <br>
            <p style="">提现金额 <span style="margin-left:50%;">￥{{$data->withdraw_num}}</span></p>
        </div>
        <div style="margin-top:10%;">
            <a href="/law_default"><button class="in-int">完成</button></a>
        </div>
    </div>
</div>
<div class="bottom">
    <p class="qs">常见问题</p>
    <p class="ser">本服务由财付通提供</p>
</div>
<script type="text/javascript">
    window.onload=function()
    {
        var getOut=document.getElementsByClassName("out")[0];
        getOut.onclick=function()
        {
            window.location.href="tixian.html";
        };
    };
</script>

</body></html>