@include('admin.layouts.top')
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px; width: 700px;">
        <form class="layui-form" action="classify_add_do">
            {{ csrf_field() }}
            <div class="layui-form-item">
                <label class="layui-form-label">分类标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文件上传</label>
                <div class="layui-input-inline">
                    <input type="file" name="file" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
        <script src="layui/layui.js"></script>
        <script>
            //Demo
            layui.use('form', function(){
                var form = layui.form;

                //监听提交
                form.on('submit(formDemo)', function(data){
                    layer.msg(JSON.stringify(data.field));
                    return false;
                });
            });
        </script>
    </div>
@include('admin.layouts.footr')
<script>
    $(function () {
      $('li').eq(6).addClass('layui-nav-itemed');
        $('li').eq(6).find('dd').eq(0).addClass('layui-this');
    })
</script>