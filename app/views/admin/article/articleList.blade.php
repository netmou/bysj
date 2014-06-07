@extends('admin.layout')
@section('menuList')
    @include("admin/article/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li><a href="{{URL::to('admin/article/add')}}">添加文章</a></li>
        <li><a href="{{URL::to('admin/article/cat')}}">添加分类</a></li>
        <li><a href="{{URL::to('admin/article/modify')}}">编辑分类</a></li>
        <li  class='select'><a href="{{URL::to('admin/article/list')}}">文章列表</a></li>
    </ul>
@stop
@section('content')
    <h3>查看文章列表</h3>
    <span class="anchor">
        <a href="{{$article->getUrl(1)}}">首页</a> 
        <a href="{{$article->getUrl($article->getCurrentPage()+1)}}">下一页</a>
        第{{$article->getCurrentPage()}}页，每页{{$article->getPerPage()}}篇，共{{$article->getLastPage()}}页
    </span>
    

    <table width="600" class="anchor">

        <tr>
            <td>标题</td>
            <td>类别</td>
            <td>日期</td>
             <td>作者</td>
            <td colspan="2">操作</td>
        </tr>
        @foreach($article as $item)
        <tr>
            <td><a href="{{URL::to('article/show')}}?art={{$item->id}}" target="_blank" title='浏览'>{{$item->title}}</a></td>
            <td>{{$item->type}}</td>
            <td>{{$item->date}}</td>
            <td>{{$item->user}}</td>
            <td><a href="{{URL::to('admin/article/edit')}}?modify={{$item->id}}">编辑</a></td>
            <td><a href="?delete={{$item->id}}" onclick="return window.confirm('确定要删除吗？');">删除</a></td>
        </tr>
        @endforeach
    </table>
    {{$article->links()}}
@stop
