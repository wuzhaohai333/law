<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">法律咨询后台</div>

        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    {{session('admin_info.admin_name')}}
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="userList">用户列表</a></dd>
                        <dd><a href="user_top-up">充值记录</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">律师管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="attorney_list">律师列表</a></dd>
                        <dd><a href="attorney_withdraw">提现记录</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">投稿管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="draft_list">投稿列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">评论管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="comment_list">评论列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">分类管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="classify_add">分类添加</a></dd>
                        <dd><a href="classify_list">分类列表</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
