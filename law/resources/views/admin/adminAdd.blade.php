@include('admin.layouts.top')
@if(session('admin_info.admin_name')=='')
    <script>
        location.href='admin';
    </script>
@endif
    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <!doctype html>
            <html>
            <head>
                <meta charset="utf-8">
                <link rel="stylesheet" href="layui/css/layui.css" media="all">
            </head>
            <body>
            <form class="layui-form" method="post" action="admin_add_do"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label class="layui-form-label">账号</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" placeholder="请输入账号" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-block">
                        <input type="text" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">头像地址</label>
                    <div class="layui-input-block">
                        <input type="text" name="img" placeholder="头像地址http://" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
                <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
            </form>
            <script src="layui/layui.js"></script>
            <script>
                layui.use(['form','layer'], function(){
                    var form = layui.form;
                    var layer = layui.layer;
                    //各种基于事件的操作，下面会有进一步介绍
                });
            </script>

        </div>
    </div>
@include('admin.layouts.footr')
<script>
    $(function () {
        $('li').eq(7).addClass('layui-nav-itemed');
        $('li').eq(7).find('dd').eq(0).addClass('layui-this');
    })
</script>