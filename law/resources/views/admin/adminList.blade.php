@include('admin.layouts.top')
@if(session('admin_info.admin_name')=='')
    <script>
    location.href='admin';
    </script>
@endif
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
                    <th>账号</th>
                    <th>头像</th>
                    <th>添加时间</th>
                    <th>编辑</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                    <tr>
                        <td>{{$v->admin_id}}</td>
                        <td>{{$v->admin_name}}</td>
                        <td><img src="{{$v->admin_img}}" width="50px" height="50px"/></td>
                        <td>{{$v->admin_ctime}}</td>
                        <td>
                            @if(session('admin_info.admin_name')=='root')
                                @if($v->admin_name==session('admin_info.admin_name'))
                                <button class="layui-btn layui-btn-sm cancel admin_update" admin_id="{{$v->admin_id}}" type="button">修改密码</button>
                                @elseif($v->admin_status==2)
                                    <button class="layui-btn layui-btn-sm admin_no_delete" admin_id="{{$v->admin_id}}" type="button">取消删除管理员</button>
                                @else
                                    <button class="layui-btn layui-btn-sm layui-btn-danger admin_delete" admin_id="{{$v->admin_id}}" type="button">删除管理员</button>
                                @endif
                            @else
                                @if($v->admin_name==session('admin_info.admin_name'))
                                    <button class="layui-btn layui-btn-sm cancel admin_update" admin_id="{{$v->admin_id}}" type="button">修改密码</button>
                                @endif
                            @endif
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
        </div>
        <style>
            .a{
                float: left;
                margin: 10px;
            }
        </style>
    </div>
@include('admin.layouts.footr')
<script>
    $(function () {
        $('li').eq(7).addClass('layui-nav-itemed');
        $('li').eq(7).find('dd').eq(1).addClass('layui-this');
    })
</script>
<script src="layui/layui.js"></script>
<script>

    $(function () {
        layui.use('layer', function(){
            var layer = layui.layer;
        });
        //左侧列表样式
        $('li').eq(2).addClass('layui-nav-itemed');
        $('li').eq(2).find('dd').eq(0).addClass('layui-this');
        //root 删除管理员
        $('.admin_delete').click(function(){
            var admin_id=$(this).attr('admin_id');
            layer.confirm('确定将该管理员删除?', {icon: 3, title:'提示'}, function(index){
                //do something
                $.post('admin_delete',{'_token':'{{csrf_token()}}',admin_id:admin_id},function(msg){
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
        //root 取消删除管理员
        $('.admin_no_delete').click(function(){
            var admin_id=$(this).attr('admin_id');
            layer.confirm('确定将该管理员取消删除？', {icon: 3, title:'提示'}, function(index){
                //do something
                $.post('admin_no_delete',{'_token':'{{csrf_token()}}',admin_id:admin_id},function(msg){
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
        });
        //管理员修改密码
        $('.admin_update').click(function(){
            var admin_id=$(this).attr('admin_id');
            layer.open({
                area: ['550px', '350px'],
                type: 2,
                content: 'admin_up_pwd' //这里content是一个普通的String
            });

        })
    })
</script>