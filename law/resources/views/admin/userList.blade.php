@include('admin.layouts.top')
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">用户列表</div>
</div>
@include('admin.layouts.footr')
<script>
    $(function () {
      $('li').eq(2).addClass('layui-nav-itemed');
        $('li').eq(2).find('dd').eq(0).addClass('layui-this');
    })
</script>