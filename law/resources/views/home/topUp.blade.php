<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <link rel="stylesheet" href="{{asset('css/new_file.css')}}" />
    <script type="text/javascript" src="{{asset('js/jquery-1.8.2.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('js/new_file.js')}}" ></script>
    <link rel="stylesheet" href="{{asset('css/layer.css')}}" />
    <script type="text/javascript" src="{{asset('js/layer.js')}}" ></script>
    <title>充值</title>
</head>
<body>
<!--头部  star-->
<header>
    <a href="javascript:history.go(-1);">
        <div class="_left"><img src="{{asset('picture/arrow_left_icon.png')}}"></div>
        充值
    </a>
</header>
<!--头部 end-->
<div class="banner">
    <img src="{{asset('picture/banner.png')}}" width="100%" height="100%"/>
</div>
<!--充值列表-->
<div class="person_wallet_recharge">
    <ul class="ul">
        <li>
            <h2>￥10</h2>
            <div class="sel" style=""></div>
        </li>
        <li>
            <h2>￥30</h2>
            <div class="sel" style=""></div>
        </li>
        <li>
            <h2>￥50</h2>
            <div class="sel" style=""></div>
        </li>
        <li>
            <h2>￥100</h2>
            <div class="sel" style=""></div>
        </li>
        <li>
            <h2>￥200</h2>
            <div class="sel" style=""></div>
        </li>
        <li>
            <h2>￥500</h2>
            <div class="sel" style=""></div>
        </li>
        <div style="clear: both;"></div>
    </ul>
    <div class="pic">金额：<input type="text" placeholder="金额必须为10元以上" id="txt" /></div>
    <div class="botton">我要充值</div>
    <div class="agreement"><p>点击我要充值，即您已经表示同意<a>《充返活动协议》</a></p></div>
    <div class="nav">
    </div>
    <!--遮罩层-->
    <div class="f-overlay"></div>
    <div class="addvideo" style="display: none;">
        <h3>本次充值<span id="amount"></span>元</h3>
        <ul>
            <li><a id="goPay">微信支付</a></li>
            <li class="cal">取消</li>
        </ul>
    </div>
</div>
</body>
</html>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    //去支付
    $('#goPay').click(function(){
        //金额
        var money = parseInt($('#amount').text().substr(1));
        window.location.href=('/goPay?money='+money);

    });
</script>


