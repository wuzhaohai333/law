@include('admin.layouts.top')
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">律师提现记录</div>
</div>
@include('admin.layouts.footr')
<script>
    $(function () {
      $('li').eq(3).addClass('layui-nav-itemed');
        $('li').eq(3).find('dd').eq(1).addClass('layui-this');
    })
</script>