@extends('admin.layout')
@section('menuList')
    @include("admin/system/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li><a href="{{URL::to('admin/system/base')}}">基本设置</a></li>
        <li  class='select'><a href="{{URL::to('admin/system/nav')}}">导航列表</a></li>
        <li><a href="{{URL::to('admin/system/add')}}">添加导航</a></li>
    </ul>
@stop
@section('content')
    <h3>导航列表</h3>
    <span class="anchor">
        <a href="{{$nav->getUrl(1)}}">首页</a> 
        <a href="{{$nav->getUrl($nav->getCurrentPage()+1)}}">下一页</a>
        第{{$nav->getCurrentPage()}}页，每页{{$nav->getPerPage()}}篇，共{{$nav->getLastPage()}}页
    </span>
    
    <table width="600" class="anchor">
        <tr>
            <td>标题</td>
            <td>类别</td>
            <td>地址</td>
            <td colspan="2">操作</td>
        </tr>
        @foreach($nav as $item)
        <tr>
            <td><a href="?id={{$item->id}}" title='浏览'>{{$item->title}}</a></td>
            <td>{{$item->type}}</td>
            <td>{{$item->url}}</td>
            <td><a href="{{URL::to('admin/system/edit')}}?modify={{$item->id}}">编辑</a></td>
            <td><a href="?delete={{$item->id}}" onclick="return window.confirm('确定要删除吗？');">删除</a></td>
        </tr>
        @endforeach
    </table>
    {{$nav->links()}}
@stop
