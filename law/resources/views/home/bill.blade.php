<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, target-densitydpi=device-dpi" name="viewport" >
    <link rel="stylesheet" type="text/css" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/weichat.css')}}">
    <script src="{{asset('js/jquery-1.8.2.min.js')}}"></script>
    <title>我的账单</title>
</head>
<body>
<div class="wrap">
    <div class="top-bar">

        <h1>零钱</h1>
        <div class="wallet-more">零钱明细</div>

    </div>
    <div class="wallet-content">
        <div class="wallet-box">
            <img src="{{asset('picture/aq.png')}}">
            <h2>我的余额</h2>
            <h3>￥
                @if(!$money)
                    0
                @else
                    {{$money}}
                @endif
            </h3>
            <button id="cz" class="in-int">充值</button>
        </div>
    </div>
</div>
<div class="bottom">
    <p class="qs">常见问题</p>
    <p class="ser">本服务由财付通提供</p>
</div>
<script type="text/javascript">
    $('#cz').click(function(){
        window.location.href=("/cz");
    });
</script>
</body>
</html>