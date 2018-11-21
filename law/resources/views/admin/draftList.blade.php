@include('admin.layouts.top')
<div class="layui-body">
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
                <th>投稿内容</th>
                <th>律师</th>
                <th>管理员</th>
                <th>投稿状态</th>
                <th>投稿时间</th>
                <th>修改时间</th>
                <th>编辑</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v->contribute_id}}</td>
                    <td>{{$v->contribute_text}}</td>
                    <td>{{$v->attorney_may_bel}}</td>
                    <td>{{$v->admin_id}}</td>
                    <td>@if($v->contribute_status==1)
                            审核通过
                        @elseif($v->contribute_status==2)
                            管理员驳回
                        @else
                            删除
                        @endif
                    </td>
                    <td>{{$v->contribute_ctime}}</td>
                    <td>{{$v->contribute_utime}}</td>
                    <td>@if($v->contribute_status==1)
                            已通过
                            @elseif($v->contribute_status==2)
                            已驳回
                            @elseif($v->contribute_status==3)
                            已删除
                            @else

                            <button class="layui-btn layui-btn-sm ok" contribute_id="{{$v->contribute_id}}" type="button">通过</button>
                            <button class="layui-btn layui-btn-sm layui-btn-danger no" contribute_id="{{$v->contribute_id}}" type="button">不通过</button>

                        @endif
                        <button class="layui-btn layui-btn-sm layui-btn-danger delete" contribute_id="{{$v->contribute_id}}" type="button">删除</button>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script src="js/js.js"></script>
        <script>
            $(function(){
                layui.use('layer', function(){
                    var layer = layui.layer;
                });
                $('#a').find('li').addClass('a');
                //审核通过
                $('.ok').click(function(){
                    var contribute_id=$(this).attr('contribute_id');
                    layer.confirm('确定将该稿子通过？', {icon: 3, title:'提示'}, function(index){
                        //do something
                        $.post('contribute_ok',{'_token':'{{csrf_token()}}',contribute_id:contribute_id,type:1},function(msg){
                            if(msg==1){
                                layer.msg('通过成功', {
                                    icon: 1,
                                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                                }, function(){
                                    //do something
                                    location.reload();
                                });
                            }else{
                                layer.msg('通过失败请重试', {
                                    icon: 2
                                });
                            }
                        });
                        layer.close(index);
                    });
                });
                //审核驳回
                $('.no').click(function(){
                    var contribute_id=$(this).attr('contribute_id');
                    layer.confirm('确定将该稿子驳回？', {icon: 3, title:'提示'}, function(index){
                        //do something
                        $.post('contribute_ok',{'_token':'{{csrf_token()}}',contribute_id:contribute_id,type:2},function(msg){
                            if(msg==1){
                                layer.msg('驳回成功', {
                                    icon: 1,
                                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                                }, function(){
                                    //do something
                                    location.reload();
                                });
                            }else{
                                layer.msg('驳回失败请重试', {
                                    icon: 2
                                });
                            }
                        });
                        layer.close(index);
                    });
                });
                //投稿删除
                $('.delete').click(function(){
                    var contribute_id=$(this).attr('contribute_id');
                    layer.confirm('确定将该稿子删除？', {icon: 3, title:'提示'}, function(index){
                        //do something
                        $.post('contribute_ok',{'_token':'{{csrf_token()}}',contribute_id:contribute_id,type:3},function(msg){
                            if(msg==1){
                                layer.msg('删除成功', {
                                    icon: 1,
                                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                                }, function(){
                                    //do something
                                    location.reload();
                                });
                            }else{
                                layer.msg('驳回失败请重试', {
                                    icon: 2
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
        $('li').eq(4).addClass('layui-nav-itemed');
        $('li').eq(4).find('dd').eq(0).addClass('layui-this');
    })
</script>