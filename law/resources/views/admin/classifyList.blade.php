@include('admin.layouts.top')
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">分类列表</div>
</div>
@include('admin.layouts.footr')
<script>
    $(function () {
      $('li').eq(6).addClass('layui-nav-itemed');
        $('li').eq(6).find('dd').eq(1).addClass('layui-this');
    })
</script>