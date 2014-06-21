@extends('admin.layout')
@section('menuList')
    @include("admin/article/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li><a href="{{URL::to('admin/article/add')}}">添加文章</a></li>
        <li class='select'><a href="{{URL::to('admin/article/cat')}}">添加分类</a></li>
        <li><a href="{{URL::to('admin/article/modify')}}">编辑分类</a></li>
        <li><a href="{{URL::to('admin/article/list')}}">文章列表</a></li>
    </ul>
@stop
@section('content')
    <h3>添加文章类别</h3>
    <form action="?" method="post">
        <strong>查看已有的类别</strong>
        <br />
        <label for="ctype">文章分类：</label>
        <select id="ctype" name="category">
        @foreach($category as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
        </select>
        <br />
        <strong>添加新的分类</strong>
        <br />
        <label for="title">标题：</label>
        <input id="title" name="title" type="text" size="36" />
         <br />
        <label for="symbol">标识：</label>
        <input id="symbol" name="symbol" type="text" size="36" />【限制为英文字符和数字，无空格】
        <br />
        <input type="submit" value="添加分类" />
    </form>
@stop
