@include('admin.layouts.top')
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>编号</th>
                <th>标题</th>
                <th>标题图片</th>
                <th>添加时间</th>
                <th>修改时间</th>
                <th>编辑</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v->classify_id}}</td>
                    <td>{{$v->classify_name}}</td>
                    <td><img src="{{$v->classify_img}}" width="50px" height="50px" alt=""></td>
                    <td>{{$v->classify_ctime}}</td>
                    <td>{{$v->classify_utime}}</td>
                    <td>
                        @if($v->classify_status==1)
                            <button class="layui-btn layui-btn-sm layui-btn-danger delete" class_id="{{$v->classify_id}}">删除</button>
                        @else
                            <button class="layui-btn layui-btn-sm layui-btn-danger no_delete" class_id="{{$v->classify_id}}">取消删除</button>
                        @endif
                        <a href="classify_add?classify_id={{$v->classify_id}}"><button class="layui-btn layui-btn-sm updete" class_id="{{$v->classify_id}}">编辑</button></a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        <div style="height: 20px;width: 100%;margin: 0 auto;position: fixed;left: 50%;" id="a">{{ $data->links() }}</div>
        <script src="js/js.js"></script>
        <script>
            $(function(){
                $('#a').find('li').addClass('a');
            });
        </script>
        <style>
            .a{
                float: left;
                margin: 10px;
            }
        </style>
    </div>
</div>

@include('admin.layouts.footr')
<script>
    $(function () {
        layui.use('layer', function(){
            var layer = layui.layer;
        });
      $('li').eq(6).addClass('layui-nav-itemed');
        $('li').eq(6).find('dd').eq(1).addClass('layui-this');
        //删除
        $('.delete').click(function () {
            var class_id=$(this).attr('class_id');
            layer.confirm('确定将该分类删除吗？', {icon: 3, title:'提示'}, function(index){
                //do something
                $.post('delete_class',{'_token':'{{csrf_token()}}',class_id:class_id,type:1},function(msg){
                    if(msg==1){
                        layer.msg('删除成功', {
                            icon: 1,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                            //do something
                            location.reload();
                        });
                    }
                });
                layer.close(index);
            });
        });
        //取消删除
        $('.no_delete').click(function () {
            var class_id=$(this).attr('class_id');
            layer.confirm('确定将该分类取消删除吗？', {icon: 3, title:'提示'}, function(index){
                //do something
                $.post('delete_class',{'_token':'{{csrf_token()}}',class_id:class_id,type:2},function(msg){
                    if(msg==1){
                        layer.msg('取消成功', {
                            icon: 1,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function(){
                            //do something
                            location.reload();
                        });
                    }
                });
                layer.close(index);
            });
        })
    })
</script>