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
    <h3>修改用户</h3>
    <form action="edit" method="post">
        <strong>请选择用户角色类别</strong>
        <br />
        <label for="ctype">角色分类：</label>
        <select id="ctype" name="role[]"  multiple="multiple">
        @foreach($role as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
        </select>
        （多选【ctrl+右击】）
        <script>
            @foreach($user->role as $item)
                $("#ctype option[value='{{$item}}']").attr("selected",true)
            @endforeach
        </script>
        <br />
        <strong>请填写必填信息</strong>
        <br />
        <input type="hidden" value="{{$user->id}}" name="modify" />
        <label for="title">昵称：</label>
        <input id="title" name="name" type="text" size="36" value="{{$user->name}}" /> <br />
        <label for="pass">密码：</label>
        <input id="pass" name="pass" type="password" size="36" />【留空不修改密码】 <br />
        <label for="confirm">确认：</label>
        <input id="confirm" name="confirm" type="password" size="36" /> <br />
        <strong>请填写可选信息</strong> <br />
        <label for="rname">姓名：</label>
        <input id="rname" name="realname" type="text" value="{{$user->realname}}" size="36" /> <br />
        <label for="phone">电话：</label>
        <input id="phone" name="phone" type="text" value="{{$user->phone}}" size="36" /> <br />
        <label for="email">邮箱：</label>
        <input id="email" name="email" type="text" value="{{$user->email}}" size="36" /> <br />
        <label for="birth">生日：</label>
        <input id="birth" name="birth" type="text" value="{{$user->birth}}" size="36" /> <br />
        性别：
        <label for="male">男</label>
        <input id="male" name="sex" type="radio" size="36" value="男" checked="checked" />
        <input id="female" name="sex" type="radio" size="36" value="女" />
        <label for="female">女</label><br />
        <script>
           $("input[name='sex']").filter(function(){
               return $(this).val()=='{{$user->sex}}';
           }).attr("checked",true)
        </script>
        <input type="submit" value="保存修改" />
    </form>
@stop
