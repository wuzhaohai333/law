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
                <th>积分</th>
                <th>消费记录</th>
                <th>头像</th>
                <th>用户勋章</th>
                <th>openID</th>
                <th>是否关注公众号</th>
                <th>第一次登陆时间</th>
                <th>编辑</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
            <tr>
                <td>{{$v->user_id}}</td>
                <td>{{$v->user_integral}}</td>
                <td>{{$v->user_balance}}</td>
                <td><img width="50px" height="50px" src="https://img02.sogoucdn.com/app/a/100520093/8b06de47d2b490bd-bf83d09b09323b0a-14d813da333d7f359f36e2d7fbb8715c.jpg"/></td>
                <td>@if($v->user_medal==0)
                        没有
                        @elseif($v->user_medal==1)
                        铜
                    @elseif($v->user_medal==2)
                        银
                    @elseif($v->user_medal==3)
                        金
                    @elseif($v->user_medal==4)
                        钻
                        @endif
                    勋章
                </td>
                <td>{{$v->user_openid}}</td>
                <td>@if($v->user_status==1)
                        已关注
                        @elseif($v->user_status==2)
                        已取消关注
                        @else
                        已拉黑（禁止评论）
                    @endif
                </td>
                <td>{{$v->user_ctime}}</td>
                <td>
                    @if($v->user_status==3)
                        <button class="layui-btn layui-btn-sm cancel" user_id="{{$v->user_id}}" type="button">移出拉黑</button>
                    @else
                        <button class="layui-btn layui-btn-sm layui-btn-danger block" user_id="{{$v->user_id}}" type="button">拉黑</button>
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
        <style>
            .a{
                float: left;
                margin: 10px;
            }
        </style>
    </div>
</div>
@include('admin.layouts.footr')
<script src="layui/layui.js"></script>
<script>

    $(function () {
            layui.use('layer', function(){
                var layer = layui.layer;
            });

            $('li').eq(2).addClass('layui-nav-itemed');
        $('li').eq(2).find('dd').eq(0).addClass('layui-this');
        $('.block').click(function(){
            var user_id=$(this).attr('user_id');
            layer.confirm('确定将该用户拉黑，拉黑后将无法评论。', {icon: 3, title:'提示'}, function(index){
                //do something
                $.post('block_user',{'_token':'{{csrf_token()}}',user_id:user_id},function(msg){
                    if(msg==1){
                        layer.msg('拉黑成功', {
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
        $('.cancel').click(function(){
            var user_id=$(this).attr('user_id');
            layer.confirm('确定将该用取消拉黑？', {icon: 3, title:'提示'}, function(index){
                //do something
                $.post('cancel_user',{'_token':'{{csrf_token()}}',user_id:user_id},function(msg){
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