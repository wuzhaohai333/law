<!DOCTYPE html>
<!-- saved from url=(0065)http://www.17sucai.com/preview/1202/2018-08-12/wallet/wallet.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, target-densitydpi=device-dpi" name="viewport">
    <link rel="stylesheet" type="text/css" href="/default/reset.css">
    <link rel="stylesheet" type="text/css" href="/default/weichat.css">
    <title>My Wallet</title>
</head>
<body>
<div class="wrap">
    <div class="top-bar">
        <div class="goback"><a href="http://www.17sucai.com/preview/1202/2018-08-12/wallet/Index.html">
                <img src="/default/fh.png"></a>
        </div>
        <h1>零钱</h1>
        <div class="wallet-more">零钱明细</div>

    </div>
    <div class="wallet-content">
        <div class="wallet-box">
            <img src="/default/aq.png">
            <h2>我的零钱</h2>
            <h3>{{$balance}}</h3>
            <a href="/cz"><button class="in-int">充值</button></a>
            <a href="/withdraw_type/1 "><button class="out1">提现到微信零钱</button></a>
            <a href="/withdraw_type/2"><button class="out1">提现到银行卡</button></a>
            <a href="/withdraw_type/3"><button class="out">提现到支付宝</button></a>
            <p>你有零钱理财资产，点击查看详情</p>
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