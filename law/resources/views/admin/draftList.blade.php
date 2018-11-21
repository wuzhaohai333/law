@include('admin.layouts.top')
<div class="layui-body">
    <div style="padding: 15px;">投稿列表</div>
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
                    <td>
                        <button class="layui-btn layui-btn-sm cancel" contribute_id="{{$v->contribute_id}}" type="button">通过</button>
                        <button class="layui-btn layui-btn-sm layui-btn-danger block" contribute_id="{{$v->contribute_id}}" type="button">不通过</button>
                        <button class="layui-btn layui-btn-sm layui-btn-danger block" contribute_id="{{$v->contribute_id}}" type="button">删除</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

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
        $('li').eq(4).addClass('layui-nav-itemed');
        $('li').eq(4).find('dd').eq(0).addClass('layui-this');
    })
</script>