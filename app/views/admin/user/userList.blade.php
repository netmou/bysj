@extends('admin.layout')
@section('menuList')
    @include("admin/user/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li><a href="{{URL::to('admin/user/create')}}">添加用户</a></li>
        <li class='select'><a href="{{URL::to('admin/user/cat')}}">用户列表</a></li>
    </ul>
@stop
@section('content')
    <h3>查看文章列表</h3>
    <span class="anchor">
        <a href="{{$user->getUrl(1)}}">首页</a> 
        <a href="{{$user->getUrl($user->getCurrentPage()+1)}}">下一页</a>
        第{{$user->getCurrentPage()}}页，每页{{$user->getPerPage()}}篇，共{{$user->getLastPage()}}页
    </span>
    
    <table width="600" class="anchor">
        <tr>
            <td>昵称</td>
            <td>姓名</td>
            <td>性别</td>
            <td colspan="2">操作</td>
        </tr>
        @foreach($user as $item)
        <tr>
            <td><a href="?id={{$item->id}}" title='浏览'>{{$item->name}}</a></td>
            <td>{{$item->realname}}</td>
            <td>{{$item->sex}}</td>
            <td><a href="{{URL::to('admin/user/edit')}}?modify={{$item->id}}">编辑</a></td>
            <td><a href="?delete={{$item->id}}" onclick="return window.confirm('确定要删除吗？');">删除</a></td>
        </tr>
        @endforeach
    </table>
    {{$user->links()}}
@stop
