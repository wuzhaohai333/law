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
                <th>评论内容</th>
                <th>评论类型</th>
                <th>用户律师id</th>
                <th>评论时间</th>
                <th>修改时间</th>
                <th>是否是标杆用户</th>
                <th>是否是幸运用户</th>
                <th>编辑</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v->comment_id}}</td>
                    <td>{{$v->comment_content}}</td>
                    <td>
                        @if($v->comment_status==1)
                            普通用户
                            @else
                            律师
                        @endif
                    </td>
                    <td>{{$v->user_id}}</td>
                    <td>{{$v->comment_ctime}}</td>
                    <td>{{$v->comment_utime}}</td>
                    <td>
                        @if($v->comment_status==1)
                            @if($v->is_sightcing==1)
                                <button class="layui-btn layui-btn-sm cancel no_sightcing" status="user" comment_id="{{$v->comment_id}}">标杆用户</button>
                            @else
                                <button class="layui-btn layui-btn-sm layui-btn-danger sightcing" status="user" comment_id="{{$v->comment_id}}">选为标杆用户</button>
                            @endif
                        @else
                            @if($v->is_sightcing==1)
                                <button class="layui-btn layui-btn-sm cancel no_sightcing" status="attorney" comment_id="{{$v->comment_id}}">标杆用户</button>
                            @else
                                <button class="layui-btn layui-btn-sm layui-btn-danger sightcing" status="attorney" comment_id="{{$v->comment_id}}">选为标杆用户</button>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if($v->comment_status==1)
                            @if($v->is_good==1)
                                <button class="layui-btn layui-btn-sm cancel on_good" status="user" comment_id="{{$v->comment_id}}">幸运用户</button>
                            @else
                                <button class="layui-btn layui-btn-sm layui-btn-danger good" status="user" comment_id="{{$v->comment_id}}">选为幸运用户</button>
                            @endif
                        @else
                            @if($v->is_good==1)
                                <button class="layui-btn layui-btn-sm cancel on_good" status="attorney" comment_id="{{$v->comment_id}}">幸运用户</button>
                            @else
                                <button class="layui-btn layui-btn-sm layui-btn-danger good" status="attorney" comment_id="{{$v->comment_id}}">选为幸运用户</button>
                            @endif
                        @endif
                    </td>
                    <td>
                        <button class="layui-btn layui-btn-sm layui-btn-danger delete" comment_id="{{$v->comment_id}}">删除评论</button>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        <div style="height: 20px;width: 100%;margin: 0 auto;position: fixed;left: 50%;" id="a">{{ $data->links() }}</div>
        <script src="js/js.js"></script>
        <script>
            $(function(){
                layui.use('layer', function(){
                    var layer = layui.layer;
                });
                $('#a').find('li').addClass('a');
                //选为标杆用户
                $('.sightcing').click(function () {
                    var comment_id=$(this).attr('comment_id');
                    var status=$(this).attr('status');
                    layer.confirm('确定将该用户选为标杆用户吗？', {icon: 3, title:'提示'}, function(index){
                        //do something
                        $.post('comment_sightcing',{'_token':'{{csrf_token()}}',status:status,comment_id:comment_id,type:1},function(msg){
                            if(msg==1){
                                layer.msg('选择成功', {
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
                //删除标杆用户
                $('.no_sightcing').click(function () {
                    var comment_id=$(this).attr('comment_id');
                    layer.confirm('确定将该用户删除标杆用户吗？', {icon: 3, title:'提示'}, function(index){
                        //do something
                        $.post('comment_sightcing',{'_token':'{{csrf_token()}}',comment_id:comment_id,type:2},function(msg){
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
                //选取幸运用户
                $('.good').click(function () {
                    var comment_id=$(this).attr('comment_id');
                    layer.confirm('确定将该用户选取幸运用户吗？', {icon: 3, title:'提示'}, function(index){
                        //do something
                        $.post('comment_good',{'_token':'{{csrf_token()}}',comment_id:comment_id,type:1},function(msg){
                            if(msg==1){
                                layer.msg('选取成功', {
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
                //删除幸运用户
                $('.on_good').click(function () {
                    var comment_id=$(this).attr('comment_id');
                    layer.confirm('确定将该用户删除幸运用户吗？', {icon: 3, title:'提示'}, function(index){
                        //do something
                        $.post('comment_good',{'_token':'{{csrf_token()}}',comment_id:comment_id,type:2},function(msg){
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
                //删除评论
                $('.delete').click(function () {
                    var comment_id=$(this).attr('comment_id');
                    layer.confirm('删除后将无法恢复,确定将该用户删除此评论吗？', {icon: 3, title:'提示'}, function(index){
                        //do something
                        $.post('comment_delete',{'_token':'{{csrf_token()}}',comment_id:comment_id},function(msg){
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
      $('li').eq(5).addClass('layui-nav-itemed');
        $('li').eq(5).find('dd').eq(0).addClass('layui-this');
    })
</script>