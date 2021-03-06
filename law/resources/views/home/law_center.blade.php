<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
    <title>个人中心</title>
    <style>
        @charset "UTF-8";
        body{margin:0;background: #f9f9f9;}
        a:active,a:hover{outline:0}
        button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}
        button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}
        table{border-collapse:collapse;border-spacing:0}
        td,th{padding:0}
        img{vertical-align:middle;border:0}
        @-ms-viewport{width:device-width}
        html{font-size:300%;-webkit-tap-highlight-color:transparent;height:100%;min-width:320px;overflow-x:hidden}
        body{font-family:"microsoft yahei";font-size:.28em;line-height:1;color:#333;background-color:#f1f1f1;}
        .h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{font-weight:500;line-height:1.1}
        .h1 .small,.h1 small,.h2 .small,.h2 small,.h3 .small,.h3 small,.h4 .small,.h4 small,.h5 .small,.h5 small,.h6 .small,.h6 small,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small,h4 .small,h4 small,h5 .small,h5 small,h6 .small,h6 small{font-weight:400;line-height:1}
        .h1,.h2,.h3,h1,h2,h3{margin-top:.28rem;margin-bottom:.14rem}
        .h1 .small,.h1 small,.h2 .small,.h2 small,.h3 .small,.h3 small,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small{font-size:65%}
        .h4,.h5,.h6,h4,h5,h6{margin-top:.14rem;margin-bottom:.14rem}
        .h4 .small,.h4 small,.h5 .small,.h5 small,.h6 .small,.h6 small,h4 .small,h4 small,h5 .small,h5 small,h6 .small,h6 small{font-size:75%}
        .h1,h1{font-size:.364rem}
        .h2,h2{font-size:.2996rem}
        .h3,h3{font-size:.238rem}
        .h4,h4{font-size:.175rem}
        .h5,h5{font-size:.14rem}
        .h6,h6{font-size:.119rem}
        i{font-style: normal;}
        h6{margin-top:0;margin-bottom:0}
        button,input,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}
        a{color:#777;text-decoration:none;outline:0}
        a:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}
        a.react,label.react{display:block;color:inherit;height:100%}
        a.react.react-active,a.react:active,label.react:active{background:rgba(0,0,0,.1)}
        ul{margin:0;padding:0;list-style-type:none}
        hr{margin-top:.28rem;margin-bottom:.28rem;border:0;border-top:1px solid #DDD8CE}
        h6,p{line-height:1.41;text-align:justify;margin:-.1em 0;word-break:break-all}
        small,weak{color:#666}
        ::-webkit-input-placeholder {color:#999;line-height:inherit;}
        :-moz-placeholder {color:#999;line-height:inherit;}
        ::-moz-placeholder {color:#999;line-height:inherit;}
        .c:before,.c:after {content: "";display: table}
        .c:after {clear: both}
        .c {zoom: 1}
        @font-face {font-family: 'iconfont';
            src: url('css/iconfont.eot'); /* IE9*/
            src: url('css/iconfont.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('css/iconfont.woff') format('woff'), /* chrome、firefox */
            url('css/iconfont.ttf') format('truetype'), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
            url('css/iconfont.svg#iconfont') format('svg'); /* iOS 4.1- */
        }
        .iconfont{
            font-family:"iconfont" !important;
            font-style:normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
        }
        header {
            color: #fff;
            height: 2rem;
            background: linear-gradient(green,#34712c);
        }
        .user{
            text-align: center;
            height: 100%;
            width: 20%;
            float: left;
            line-height: 2rem;
        }
        .user i{
            font-size: 1rem;
        }
        .userinfo{
            height: 2rem;
            float: left;
            width: 50%;
        }
        .userinfo p:first-child{
            font-size: .32rem;
            padding-top: .65rem;
        }
        .userinfo p:last-child span{
            margin-left: 1rem;
        }
        .right_icon{
            font-size: .5rem;
            float: left;
            width: 26%;
            line-height: 2rem;
            text-align: right;
            padding-right: 4%;

        }
        .right_icon a{color: #fff;}
        section{
            display: -webkit-box;
            width: 100%;
            height: 2rem;
            background: #fff;
        }
        section a{
            -webkit-box-flex: 1;
            text-align: center;
            display: block;
        }

        section a i{
            border-radius: 100%;
            width: .8rem;
            background: #2fb8ce;
            margin: .35rem auto .2rem auto;
            display: block;
            font-size: .35rem;
            color: #fff;
            height: .8rem;
            line-height: .8rem;
        }
        aside{
            margin-top: .2rem;
        }
        aside ul{
            font-size: .3rem;
            line-height: .8rem;
            color: #000;
        }
        aside ul li{
            text-align: left;
            width: 96%;
            margin: 0 auto;
            background: #fff;
            padding: 0 2%;
        }
        aside ul li  a i{
            font-size: .35rem;
            text-align: center;
            width: .7rem;
            display: inline-block;
        }
        footer{height: 1rem;position: fixed;bottom: 0;left: 0;width: 100%;background: #f9f9f9;border-top: 1px solid #eee;}
        footer a{width:25%;float: left;text-align: center;line-height: .35rem;margin-top: .2rem;}
        footer a i{display: block;}

        .on{color: #f19d9d;}
    </style>
</head>
<body>
<header>
    <div class="user">
        <img src="picture/1fbaea9a4d3564e_64x64.jpg" alt="">
        {{--<img src="{{$img}}" width="50px" height="50px" alt="">--}}
    </div>

    <div class="userinfo">
        name
        {{--<p>{{$name}}</p>--}}
    </div>

    <div class="right_icon">
        <a href="javascript:;" class="iconfont"></a>
    </div>
</header>



<aside>
    <ul>
        <li><a href="/index" class="sp1">
                <i class="iconfont">&#xe60b;</i>首页<i class="iconfont" style="float: right;font-size: .3rem;">&#xe602;</i></a>
        </li>
        <li style="margin-top: .2rem;"><a href="/law_default" class="sp4">
                <i class="iconfont">&#xe60b;</i>钱包<i class="iconfont" style="float: right;font-size: .3rem;">&#xe602;</i></a>
        </li>
        <li style="margin-top: .2rem;"><a href="JavaScript:;" class="sp2">
                <i class="iconfont">&#xe617;</i>用户管理<i class="iconfont" style="float: right;font-size: .3rem;">&#xe602;</i></a>
        </li>
        <li style="margin-top: .2rem;"><a href="https://www.chinanews.com/" class="sp3">
                <i class="iconfont">&#xe60b;</i>热点关注<i class="iconfont" style="float: right;font-size: .3rem;">&#xe602;</i></a>
        </li>
        <li style="margin-top: .2rem;"><a href="javscript:;" class="sp3">
                <i class="iconfont">&#xe60b;</i>我的积分<i class="iconfont" style="float: right;font-size: .3rem;">&#xe602;</i></a>
        </li>

    </ul>
</aside>
<div style="height: 1rem;"></div>
{{--<footer>--}}
    {{--<a href="javascript:;"><i class="iconfont">&#xe60b;</i>首页</a>--}}
    {{--<a href="javascript:;"><i class="iconfont">&#xe75f;</i>分类</a>--}}
    {{--<a href="javascript:;"><i class="iconfont">&#xe671;</i>购物车</a>--}}
    {{--<a href="javascript:;"><i class="iconfont">&#xe617;</i>我的</a>--}}
{{--</footer>--}}
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $('footer a').click(function(){
        $(this).addClass('on').siblings().removeClass('on');
    });

</script>
</body>
</html>
