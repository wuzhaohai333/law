<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="GBK">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no,shrink-to-fit=no" />
    <meta name="renderer" content="webkit">
    <meta name="MobileOptimized" content="320" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <meta name="HandheldFriendly" content="true" />
    <meta name="x5-page-mode" content="no-title" />
    <meta name="format-detection" content="telephone=no" />
    <title>找法网会员登录</title>
    <link rel="stylesheet" href="css/df0f5235a76349dc8754eefa5cc07ec9.css" />
    <script type='text/javascript' src='js/f1d2fedfc24948eab768a01f8bff8522.js' charset='gbk'></script>
    <script src="js/js.js"></script>
    <script src="layui/layui.js"></script>
    <script type='text/javascript'>
        !(function(win, doc){
            function setFontSize() {
                var baseFontSize = 100;
                var baseWidth = 320;
                var clientWidth = document.documentElement.clientWidth || window.innerWidth;
                var innerWidth = Math.max(Math.min(clientWidth, 480), 320);

                var rem = 100;

                if (innerWidth > 362 && innerWidth <= 375) {
                    rem = Math.floor(innerWidth / baseWidth * baseFontSize * 0.9);
                }

                if (innerWidth > 375) {
                    rem = Math.floor(innerWidth / baseWidth * baseFontSize * 0.84);
                }

                window.__baseREM = rem;
                document.querySelector('html').style.fontSize = rem + 'px';
            }
            var evt = 'onorientationchange' in win ? 'orientationchange' : 'resize';
            var timer = null;
            win.addEventListener(evt, function () {
                clearTimeout(timer);
                timer = setTimeout(setFontSize, 300);
            }, false);
            win.addEventListener("pageshow", function(e) {
                if (e.persisted) {
                    clearTimeout(timer);
                    timer = setTimeout(setFontSize, 300);
                }
            }, false);
            setFontSize();
        }(window, document));
    </script>

    <link rel="stylesheet" href="css/b162d7674abc402d82b6a336368698f2.css"/>
</head>
<body>
<div class="body no-padding-top">
    <div class="header-block ">
        <a class="header-home" href="http://m.findlaw.cn">首页</a>    <p class="header-title">会员登录</p>    <a href="https://m.findlaw.cn/ask/ask.php?frompage=mobile_top" class="header-ask">免费提问</a>
        <button class="header-menu"></button>
    </div>
    <div class="common-tab-title">
        <ul class="common-tab-menu">
            <li class="tab-menu-item"><a href="http://m.findlaw.cn/?c=member&a=logintel">短信登录</a>
            </li>
            <li class="tab-menu-item selected"><a href="#">密码登录</a></li>
        </ul>
    </div>
    <div class="login">
        <form class="form">
            @csrf
            <div class="common-form-style login-form">
                <div class="form-list">
                    <input type="text" class="input-item username" name="username" placeholder="请输入用户名或手机号码">
                    <img src="picture/icon-form-user.png" alt="" class="input-icon">
                </div>
                <div class="form-list hidden" id="auth-code">
                    <input type="text" class="input-item auth-code" placeholder="图形验证码">
                    <img src="picture/icon-form-password.png" alt="" class="input-icon">
                    <img src="picture/auth-code.png" alt="" class="aid-tool">
                </div>
                <div class="form-list">
                    <input type="password" class="input-item password" name="password" placeholder="请输入密码">
                    <img src="picture/icon-form-password.png" alt="" class="input-icon">
                </div>
            </div>
            <div class="form-list">
                <p class="error-info"></p>
            </div>
            <div class="form-list">
                <button class="success-button" id="but">登录</button>
                <a href="http://m.findlaw.cn/?c=member&a=getPassword" class="back-home gray-notice">忘记密码？</a>
            </div>
        </form>
        <div class="aid-tools">
            <p class="Separator"><span>还没有找法网账号？</span></p>
            <div class="signup" style="margin-left:20%;">
                <a href="register" class="sign lawyer" >律师注册</a>
            </div>
            <p class="aid-info">若登录遇到问题请给我们<a href="http://m.findlaw.cn/advice/">留言</a></p>
        </div>
    </div>
    <div class="footer-appear">
        <p class="footer-appear-center">
            <a href="http://m.findlaw.cn/" class="footer-appear-guide">触屏版</a>
            <a href="http://china.findlaw.cn/" class="footer-appear-guide">电脑版</a>
            <a href="http://m.findlaw.cn/advice/" class="footer-appear-guide">意见反馈</a>
            <a href="http://m.findlaw.cn/?c=member&a=lawnotice" class="footer-appear-guide">法律声明</a>
        </p>
        <p class="footer-appear-info footer-appear-center">
            <span class="info-item">@2003-2017 </span>
            <span class="info-item"> 找法网 </span>
            <span class="info-item"> <a href="http://www.miitbeian.gov.cn" target="_blank" rel="nofollow">粤ICP备10231287号-4</a></span>
        </p>
    </div>
</div>
<script type='text/javascript' src='js/3804fd6ba718445e89c7bbc06286a4cb.js' charset='gbk'></script>
<script type="text/javascript">
    Zepto(document).ready(function ($) {
        Common.init();
        Common.top_menu_2();
        Common.footer_menu_1();
    });
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    $(".password,.username").change(function () {
        if ($(this).val()) {
            $(this).removeClass("warn").addClass("success");
            $(".error-info").removeClass("active");
        }
    });
    $('#but').click(function () {
        var password = $(".password").val();
        var username = $(".username").val();
        if (username == '') {
            $(this).addClass("warn");
            $(".error-info").text("用户名不能为空！").addClass("active");
            return false;
        }
        if (password == '') {
            $(this).addClass("warn");
            $(".error-info").text("密码不能为空！").addClass("active");
            return false;
        }
        $.ajax({
            url:'lawyer_login',
            data:{'_token':'{{csrf_token()}}',username:username,password:password},
            type:'post',
            dataType:'json',
            success: function (json) {
                layer.msg(json);
            }
        });
    })
</script>
</body>
</html>