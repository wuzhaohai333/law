
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>管理员登录</title>
    <script src="js/js.js"></script>
    <script src="layui/layui.js"></script>
</head>
<body>
<div style="height: 100%; width: 100%; float: left;">
    <div style="height: 35%; width: 100%; float: left;"></div>
    <div style="height: 30%; width: 40%; float: left;"></div>
    <div class="login">
        <div class="login_head">L O G I N F O R M</div>
        <div class="login_middle">
            <div style="height: 50%; width: 100%; text-align: center; padding-top: 30px;">
                <input id="UserName" class="input" type="text" placeholder="UserName" />
            </div>
            <div style="height: 50%; width: 100%; text-align: center;">
                <input id="Password" class="input" type="password" placeholder="Password" />
            </div>
        </div>
        <div class="login_bottom">
            <input type="button" class="button" value="Login" onclick="sendLoginData()" />
        </div>
    </div>
</div>
</body>
</html>

<style type="text/css">

    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
        background-image: url(http://img2.shangxueba.com/img/fevte/20140813/14/8EC98DC339C440975B4C14F3FB60875D.jpg);
        background-repeat: no-repeat;
        background-size: 100%;
    }
    .login {
        float: left;
        height: 30%;
        width: 20%;
        opacity: 0.8;
        background-color: #000;
        border-radius: 16px 16px 16px 16px;
    }
    .login_head {
        height: 25%;
        width: 100%;
        color: white;
        line-height: 200%;
        text-align: center;
        font-family: Andalus;
        font-size: 38px;
        font-weight: bold;
        border-bottom:1px solid #FFF;
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 16px;
    }
    .login_middle {
        height: 45%;
        width: 100%;
    }
    .login_bottom {
        height: 30%;
        width: 100%;
        padding-top: 22px;
    }
    .input {
        border: 1px solid #ffd800;
        background-color: #808080;
        height: 35px;
        width: 78%;
        font-family: Andalus;
        font-size: 20px;
        padding-left: 15px;
    }
    .button {
        color: gold;
        float: right;
        background-color: #000;
        font-size: 20px;
        height: 40px;
        width: 120px;
        margin-right: 20px;
        border-radius: 10px 10px 10px 10px;
        font-family: Andalus;
    }
    .button:hover {
        color: white;
        float: right;
        background-color: #808080;
        font-size: 25px;
        height: 40px;
        width: 120px;
        margin-right: 20px;
        border-radius: 10px 10px 10px 10px;
        font-family: Andalus;
    }

</style>

<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    //回车键按下时执行 Login
    $("body").keydown(function (e) {
        e = e || event;
        if (e.keyCode == 13) {
            sendLoginData();
        }
    });

    //按下 Login 按钮
    function sendLoginData() {
        var userName = document.getElementById("UserName").value;
        var password = document.getElementById("Password").value;
        if (userName == "") {
            layer.msg("UserName不能为空！", {icon: 2});
            return;
        }
        if (password == "") {
            layer.msg("Password不能为空！", {icon: 2});
            return;
        }
        $.post("LoginDo", { '_token':'{{csrf_token()}}',userName: userName, password: password },
                function (response) {
                    if (response == 1) {
                        layer.msg('登录成功', {
                            icon: 1,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                            window.location.href = "/adminIndex";
                        });
                    }else {
                        layer.msg(response, {icon: 2});
                    }
                });
    }

</script>