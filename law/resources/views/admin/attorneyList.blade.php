@include('admin.layouts.top')
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">律师列表</div>
</div>
@include('admin.layouts.footr')
<script>
    $(function () {
      $('li').eq(3).addClass('layui-nav-itemed');
        $('li').eq(3).find('dd').eq(0).addClass('layui-this');
    })
</script>