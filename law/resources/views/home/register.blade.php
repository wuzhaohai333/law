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
    <title>律师注册</title>
    <link rel="stylesheet" href="{{asset('css/f141279dadde4bb7b1d36ec5d9655cf2.css')}}" />
    <script type='text/javascript' src='{{asset('js/4b108b0d99814e2c821c7f2958c9b81f.js')}}' charset='gbk'></script>
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

    <link rel="stylesheet" href="{{asset('css/ea03b81759ce487fb4ba8ddcd76e740f.css')}}"/>
</head>
<body>
<div class="body no-padding-top">
    <div class="header-block ">
        <a class="header-home" href="index">首页</a>
        <p class="header-title">律师注册</p>
        <a href="https://m.findlaw.cn/ask/ask.php?frompage=mobile_top" class="header-ask">免费提问</a>
        <button class="header-menu"></button>
    </div>
    <form name='reform' method='post' action='lawyer_add' id="form">
         @csrf
        <div class="login">
            <div class="common-form-style login-form">
                <div class="form-list">
                    <input type="text" name="realname" class="input-item lawyer-sign username" id="realname" maxlength="10" placeholder="请输入真实姓名">
                </div>
                <div class="form-list">
                    <input type="text" name="uname" class="input-item lawyer-sign username" maxlength="14" id="uname" placeholder="请输入用户名">
                </div>
                <div class="form-list">
                    <input type="tel" class="input-item username" placeholder="请输入手机" maxlength="11" name="mobilep" id="mobileReg">
                    <img src="picture/icon-form-user.png" alt="" class="input-icon">
                </div>
                <div class="form-list" id="auth-code" style="display:none;">
                    <input type="text" class="input-item auth-code" placeholder="图形验证码" maxlength="4" id="vcodeValue">
                    <img src="picture/icon-form-code.png" alt="" class="input-icon">
                    <img src="picture/index.php" alt="验证码" class="aid-tool" onclick="change_verify(this)" id="imgVcode">
                </div>
                <div class="form-list">
                    <input type="number" class="input-item message-code" placeholder="请输入短信验证码" maxlength="6" id="code_input" name="telCode">
                    <img src="picture/icon-form-auth.png" alt="" class="input-icon">
                    <a class="aid-tool" onclick="getverify(this);">获取验证码</a>
                </div>
                <div class="form-list">
                    <input type="password" class="input-item password" maxlength="20" placeholder="请输入密码">
                    <img src="picture/icon-form-password.png" alt="" class="input-icon">
                </div>
                <div class="form-list">
                    <div class="password-strength">
                        <p class="lv1"><span>弱</span></p>
                        <p class="lv2"><span>中</span></p>
                        <p class="lv3"><span>强</span></p>
                    </div>
                </div>
                <div class="form-list">
                    <input type="password" class="input-item repassword" maxlength="20" placeholder="请再次输入密码" name="passwrod">
                    <img src="picture/icon-form-password.png" alt="" class="input-icon">
                </div>
            </div>
            <div class="form-list">
                <p class="error-info"></p>
            </div>
            <div class="form-list">
                <input name="authcode_status" value="0" type="hidden" id="agreedval">
                <p class="agree-agreement">
                    <i class="agreed"></i>我已阅读并同意<a href="http://m.findlaw.cn/?c=member&a=xieyi">《找法网使用协议》</a></a>
                </p>
                <button class="success-button">立即注册</button>
            </div>
            <div class="aid-tools">
                <p class="Separator"><span>已有找法网账号？</span></p>
                <div class="signup">
                    <a href="lawyer_login" class="sign login-in">马上登录</a>
                </div>
            </div>
            <div style="margin-bottom:30px;"></div>
        </div>
        <input name="reg_type" value="1" type="hidden"> <input type="hidden" name="from" value="wap"/>
    </form>
    <div class="footer-appear ">
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
<script type='text/javascript' src='{{asset('js/a717c151b6214b53a230ee84258d8083.js')}}' charset='gbk'></script>
<script type="text/javascript">
    Zepto(document).ready(function ($) {
        Common.init();
        Common.top_menu_2();
        Common.footer_menu_1();
    });
    window.jQuery = $;
    (function () {
        /**
         * 动态加载js文件
         * @param  {string}   url      js文件的url地址
         * @param  {Function} callback 加载完成后的回调函数
         */
        var _getScript = function (url, callback) {
            var head = document.getElementsByTagName('head')[0],
                    js = document.createElement('script');
            js.setAttribute('type', 'text/javascript');
            js.setAttribute('src', url);
            head.appendChild(js);
            //执行回调
            var callbackFn = function () {
                if (typeof callback === 'function') {
                    callback();
                }
            };
            if (document.all) {
                //IE
                js.onreadystatechange = function () {
                    if (js.readyState == 'loaded' || js.readyState == 'complete') {
                        callbackFn();
                    }
                }
            } else {
                js.onload = function () {
                    callbackFn();
                }
            }
        }
        //如果使用的是zepto，就添加扩展函数
        if (Zepto) {
            $.getScript = _getScript;
        }
    })();
</script>
<script src="{{asset('js/wyarea-1.0.min.js')}}"></script>
<script>
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    var citycode = "340200";
    $(document).ready(function () {
        WYArea.init(function () {
            WYArea.select({
                id: citycode,     			//初始化的地区编码.
                level: 2,     			//联动级别
                prov: '#caseProvince', 	//省对象
                city: '#caseCity'  		//市对象
            });
        });
        $(".agreed").toggleClass("checked");
        $("#agreedval").val(1);
    });
    //电话验证
    var isget = false;//防止重复发送
    var iswait = 0;//验证码发送状态 >0 发送中
    var vlid = 0;//是否启动验证码 0 默认不开启 1开启
    var isvlid = 0;//验证码是否正确 0 未验证，1验证正确
    //发送手机验证码
    function getverify(o) {
        if (isget || iswait > 0) return;
        if (vlid == 1) {
            var vcode = $("#vcodeValue").val();
            if (vcode) {
                if (checkyzm() == 0) {
                    layer.msg("验证码错误",{
                        icon:2
                    });
                    $('#auth-code').show();
                    return;
                }
            } else {
                layer.msg("请您输入验证码",{icon:2});
                $('#auth-code').show();
                return;
            }
        }
        var mobile = $("#mobileReg").val().replace(/[ ]/g, ""),
                ismobile  = /^1[345678][0-9]{9}$/;
        if (!ismobile.test(mobile)) {
            layer.msg("手机号格式不正确",{icon:2});
        } else {
            if (!getMoible(mobile)) return;
            $(o).text("正在发送...");
            isget = true;
            $.ajax({
                url: "/phone_code",
                type: 'post',
                dataType: 'json',
                data: {'_token':'{{csrf_token()}}',mobile: mobile},
                async: false,
                success: function(rs){
                    isget = false;
                    if (rs == 1) {
                        iswait = 60;
                        countdown(o);
                    } else {
                        $(o).text("获取验证码");
                        alert(rs.msg ? rs.msg : "验证码发送失败");
                    }
                }
            });
        }
    }
    //判断手机是否存在
    function getMoible(tel) {
        var flag = false;
        $.ajax({
            url: 'is_tel',
            type: 'POST',
            dataType: 'json',
            data: {'_token':'{{csrf_token()}}',tel: tel},
            async: false,
            success: function (res) {
                if (res == 2) {
                    flag = true;
                } else {
                    layer.msg('该手机号码已经注册过了，可直接登录使用！',{icon:3});
                    flag = false;
                }
            }
        });
        return flag;
    }
    //显示发送验证码时间
    function countdown(o) {
        vlid = 1;
        setTimeout(function () {
            if (iswait > 0) {
                iswait--;
                $(o).text(iswait + "秒后重试");
                countdown(o);
            } else {
                iswait = 0;
                $(o).text("获取验证码");
            }
        }, 1000);
    }
//    //更新验证码
//    function change_verify(obj) {
//        var ntime = new Date();
//        var url = "http://m.findlaw.cn/index.php?c=Ask&a=createVerify" + '&t=' + ntime;
//        $(obj).attr('src', url);
//    }
//    // 校对验证码
//    function checkyzm() {
//        var verify_value = $('#vcodeValue').val();
//        if (verify_value) {
//            $.ajax({
//                url: 'http://m.findlaw.cn/index.php?c=Ask&a=checkVerify',
//                type: 'POST',
//                dataType: 'json',
//                data: {value: verify_value},
//                async: false,
//                success: function (data) {
//                    if (data.status == 1) {
//                        isvlid = 1;
//                    } else {
//                        isvlid = 0;
//                        var ntime = new Date();
//                        var url = "http://m.findlaw.cn/index.php?c=Ask&a=createVerify" + '&t=' + ntime;
//                        $('#imgVcode').attr('src', url);
//                    }
//                }
//            });
//        }
//        return isvlid;
//    }
    //获取手机是否存在
    function checkSmsCode() {
        var tel = $('#mobileReg').val();
        var vcode = $('#code_input').val();
        var flag = false;
        $.ajax({
            url: 'verify_code',
            type: 'POST',
            dataType: 'json',
            data: {'_token':'{{csrf_token()}}',mobile: tel,code:vcode},
            async: false,
            success: function (res) {
                if (res == 1) {
                    flag = true;
                } else if(res == 3){
                    layer.msg('验证码！',{icon:2});
                    flag = false;
                } else {
                    layer.msg('您输入的短信验证码错误！',{icon:2});
                    flag = false;
                }
            }
        });
        return flag;
    }
    //手机号格式判断
    $("#mobileReg").change(function () {
        var val = $(this).val();
        if (val && !(/^1[345678]\d{9}$/.test(val))) {
            layer.msg('手机号格式不正确！',{icon:2});
        }
    });
    //密码处理
    $(".password").change(function () {
        if ($(this).val().length < 8) {
            layer.msg('密码不能少于8位！',{icon:2});
        }
    });
    $(".repassword").change(function () {
        if ($(this).val() != $(".password").val() || $(this).val().length < 8) {
            var werninfo = '您两次输入的密码不一致！';
            if ($(this).val().length < 8) {
                werninfo = '密码不能少于8位！';
            }
            layer.msg(werninfo,{icon:2});
        }
    });
    //密码强弱判断
    $(".password").keyup(function () {
        var password = $(".password").val();
        AuthPasswd(password);
    })
    function AuthPasswd(string) {
        if (string.length >= 6) {
            if (/[a-zA-Z]+/.test(string) && /[0-9]+/.test(string) && /\W+\D+/.test(string)) {
                noticeAssign(1);
            } else if (/[a-zA-Z]+/.test(string) || /[0-9]+/.test(string) || /\W+\D+/.test(string)) {
                if (/[a-zA-Z]+/.test(string) && /[0-9]+/.test(string)) {
                    noticeAssign(-1);
                } else if (/\[a-zA-Z]+/.test(string) && /\W+\D+/.test(string)) {
                    noticeAssign(-1);
                } else if (/[0-9]+/.test(string) && /\W+\D+/.test(string)) {
                    noticeAssign(-1);
                } else {
                    noticeAssign(0);
                }
            }
        } else {
            noticeAssign(null);
        }
    }
    function noticeAssign(num) {
        if (num == 1) {
            $(".password-strength").attr("class", 'password-strength strong');
        } else if (num == -1) {
            $(".password-strength").attr("class", 'password-strength middle');
        } else if (num == 0) {
            $(".password-strength").attr("class", 'password-strength weak');
        } else {
            $(".password-strength").attr("class", 'password-strength');
        }
    }
    $(".agree-agreement").click(function () {
        $(".agreed").toggleClass("checked");
        var cl = $(".agreed").attr('class');
        if (cl == 'agreed') {
            $("#agreedval").val(0);
        } else {
            $("#agreedval").val(1);
        }

    });
    //form 表单提交
    $('#form').submit(function () {
        var citycode = $('#realname').val();
        if (citycode == '') {
            layer.msg('请输入真实姓名',{icon:2});
            return false;
        }
        var citycode = $('#uname').val();
        if (citycode == '') {
            layer.msg('请输入用户名',{icon:2});
            return false;
        }
        var mobile = $("#mobileReg").val().replace(/[ ]/g, ""),
                ismobile  = /^1[345678][0-9]{9}$/;
        if (!ismobile.test(mobile)) {
            layer.msg('手机号格式不正确！',{icon:2});
            return false;
        }
        if ($('.repassword').val() != $(".password").val() || $('.repassword').val().length < 8) {
            layer.msg('您两次输入的密码不一致！',{icon:2});
            return false;
        }
        var agreedval = $("#agreedval").val();
        if (agreedval == 0) {
            layer.msg('您未同意注册协议！',{icon:2});
            return false;
        }
        if (checkSmsCode()) {
            return true;
        }
        return false;
    });
</script>
<script async src='{{asset('js/hm_1.js')}}' type='text/javascript'></script>
</body>
</html>