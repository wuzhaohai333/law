<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="layui/css/layui.css" media="all">
</head>
<body>
<form class="layui-form" > <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
    {{ csrf_field() }}
    <div class="layui-form-item">
        <label class="layui-form-label">账号</label>
        <div class="layui-input-block">
            <input type="text" name="name" placeholder="请输入账号" disabled value="{{session('admin_info.admin_name')}}" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">旧密码</label>
        <div class="layui-input-block">
            <input type="password" name="jpassword" id="jpassword" placeholder="请输入旧密码" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">新密码</label>
        <div class="layui-input-block">
            <input type="password" name="npassword" id="npassword" placeholder="请输入新密码" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">确认新密码</label>
        <div class="layui-input-block">
            <input type="password" name="password" id="password" placeholder="请确认密码" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" type="button" admin_id="{{$arr->admin_id}}" lay-submit lay-filter="*" id="tj">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
    <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
</form>
</body>
<script src="layui/layui.js"></script>
<script src="js/js.js"></script>
<script>
    layui.use(['form','layer'], function(){
        var form = layui.form;
        var layer = layui.layer;
        //各种基于事件的操作，下面会有进一步介绍
        $('#tj').click(function(){
            var admin_id=$(this).attr('admin_id');
            var jpassword=$('#jpassword').val();
            var npassword=$('#npassword').val();
            var password=$('#password').val();
            if(npassword!=password){
                alert('确认密码跟密码不一致！');
                return false;
            }
            $.post('admin_up_pwd_do',{'_token':'{{csrf_token()}}',
                admin_id:admin_id,
                jpassword:jpassword,
                npassword:npassword,
                password:password
            },function(msg){
                if(msg==1){
                    layer.msg('修改成功', {
                        icon: 1,
                        time: 2000 //2秒关闭（如果不配置，默认是3秒）
                    }, function(){
                        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                        parent.layer.close(index); //再执行关闭

                    });
                }else if(msg==2){
                    layer.msg('旧密码有误', {
                        icon: 2
                    })
                }else if(msg==3){
                    layer.msg('确认密码和新密码不一致', {
                        icon: 2
                    })
                }else{
                    layer.msg('修改失败请重试', {
                        icon: 2
                    })
                }

            })
        })
    });
</script>