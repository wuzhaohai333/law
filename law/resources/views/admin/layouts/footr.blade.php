<div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
</div>
</div>
<script src="layui/layui.js"></script>
<script src="js/js.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
    $('li').click(function(){
        $(this).addClass('layui-nav-itemed');
        $(this).siblings().removeClass('layui-nav-itemed');
    })
</script>
</body>
</html>