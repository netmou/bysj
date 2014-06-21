@extends('admin.layout')
@section('menuList')
    @include("admin/user/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li class='select'><a href="{{URL::to('admin/user/create')}}">添加用户</a></li>
        <li><a href="{{URL::to('admin/user/cat')}}">用户列表</a></li>
    </ul>
@stop
@section('content')
    <h3>创建新用户</h3>
    <form action="create" method="post">
        <strong>请选择用户角色类别</strong>
        <br />
        <label for="ctype">角色分类：</label>

        <select id="ctype" name="role[]"  multiple="multiple">

        @foreach($role as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
        </select>
        （多选【ctrl+右击】）
        <br />
        <script>
            $("#ctype option:first").attr("selected",true);
        </script>
        <strong>请填写必填信息</strong>
        <br />
        <label for="title">昵称：</label>
        <input id="title" name="name" type="text" size="36" /> <br />
        <label for="pass">密码：</label>
        <input id="pass" name="pass" type="password" size="36" /> <br />
        <label for="confirm">确认：</label>
        <input id="confirm" name="confirm" type="password" size="36" /> <br />
        <strong>请填写可选信息</strong> <br />
        <label for="rname">姓名：</label>
        <input id="rname" name="realname" type="text" size="36" /> <br />
        <label for="phone">电话：</label>
        <input id="phone" name="phone" type="text" size="36" /> <br />
        <label for="email">邮箱：</label>
        <input id="email" name="email" type="text" size="36" /> <br />
        <label for="birth">生日：</label>
        <input id="birth" name="birth" type="text" size="36" /> <br />
        性别：
        <label for="male">男</label>
        <input id="male" name="sex" type="radio" size="36" value="男" checked="checked" />
        <input id="female" name="sex" type="radio" size="36" value="女" />
        <label for="female">女</label><br />
        <input type="submit" value="创建用户" />
    </form>
@stop
