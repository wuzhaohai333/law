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
                <th>真实姓名</th>
                <th>微信id</th>
                <th>律师积分</th>
                <th>帮助人数</th>
                <th>联系方式</th>
                <th>好评</th>
                <th>添加时间</th>
                <th>修改时间</th>
                <th>编辑</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v->attorney_id}}</td>
                    <td>{{$v->attorney_name}}</td>
                    <td>{{$v->attorney_may_bel}}</td>
                    <td>{{$v->attorney_openid}}</td>
                    <td>{{$v->attorney_integral}}</td>
                    <td>{{$v->attorney_help}}</td>
                    <td>{{$v->attorney_phone}}</td>
                    <td>{{$v->attorney_good}}</td>
                    <td>{{$v->attorney_ctime}}</td>
                    <td>{{$v->attorney_utime}}</td>
                    <td>
                        @if($v->attorney_status==2)
                            <button class="layui-btn layui-btn-sm unfasten" attorney_id="{{$v->attorney_id}}" type="button">解除封号</button>
                        @else
                            <button class="layui-btn layui-btn-sm layui-btn-danger stop" attorney_id="{{$v->attorney_id}}" type="button">停封账号</button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="height: 20px;width: 100%;margin: 0 auto;position: fixed;left: 50%;" id="a">{{ $data->links() }}</div>
        <script src="js/js.js"></script>
        <script src="layui/layui.js"></script>
        <script>
            $(function(){
                layui.use('layer', function(){
                    var layer = layui.layer;
                });
                $('#a').find('li').addClass('a');
                //停封账号
                $('.stop').click(function(){
                    var attorney_id=$(this).attr('attorney_id');
                    layer.confirm('确定将该律师账号停封吗？', {icon: 3, title:'提示'}, function(index){
                        //do something
                        $.post('attorney_stop',{'_token':'{{csrf_token()}}',attorney_id:attorney_id,type:1},function(msg){
                            if(msg==1){
                                layer.msg('封号成功', {
                                    icon: 1,
                                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                                }, function(){
                                    //do something
                                    location.reload();
                                });
                            }else{
                                layer.msg('封号失败请重试', {
                                    icon: 2
                                });
                            }
                        });
                        layer.close(index);
                    });
                });
                //解封账号
                $('.unfasten').click(function(){
                    var attorney_id=$(this).attr('attorney_id');
                    layer.confirm('确定将该律师账号解封吗？', {icon: 3, title:'提示'}, function(index){
                        //do something
                        $.post('attorney_stop',{'_token':'{{csrf_token()}}',attorney_id:attorney_id,type:2},function(msg){
                            if(msg==1){
                                layer.msg('解封成功', {
                                    icon: 1,
                                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                                }, function(){
                                    //do something
                                    location.reload();
                                });
                            }else{
                                layer.msg('解封失败请重试', {
                                    icon: 2
                                });
                            }
                        });
                        layer.close(index);
                    });
                })
            });

        </script>
        <style>
            .a{
                float: left;
                margin: 10px;
            }
        </style></div>
</div>
@include('admin.layouts.footr')
<script>
    $(function () {
      $('li').eq(3).addClass('layui-nav-itemed');
        $('li').eq(3).find('dd').eq(0).addClass('layui-this');
    })
</script>