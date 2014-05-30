@extends('admin.layout')
@section('script')
    {{HTML::script('editor/kindeditor-min.js')}}
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="body"]', {
                resizeType: 1,
                allowPreviewEmoticons: false,
                allowImageUpload: true
            });
        });
    </script>
@stop
@section('menuList')
    @include("admin/article/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li class='select'><a href="{{URL::to('admin/article/add')}}">添加文章</a></li>
        <li><a href="{{URL::to('admin/article/cat')}}">添加分类</a></li>
        <li><a href="{{URL::to('admin/article/modify')}}">编辑分类</a></li>
        <li><a href="{{URL::to('admin/article/list')}}">文章列表</a></li>
    </ul>
@stop
@section('content')
    <h3>添加新闻</h3>
    <form action="add" method="post">
        <strong>请选择新闻类别</strong>
        <br />
        <label for="ctype">文章分类：</label>
        <select id="ctype" name="category">
        @foreach($category as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
        </select>
        <br />
        <strong>请填写文章标题</strong>
        <br />
        <label for="title">标题：</label>
        <input id="title" name="title" type="text" size="36" />
        <br />
        <label for="author">作者（来源）：</label>
        <input id="author" name="author" type="text" size="18" />
        <br />
        <strong>请填写文章正文</strong>
        <textarea id="article" name="body"></textarea>
        <br />
        <strong>请填写文章关键字（英文逗号分隔）</strong>
        <br />
        <label for="keyword">关键字：</label>
        <input id="keyword" name="keyword" type="text" size="36" />
        <br />
        <input type="submit" value="添加文章" />
    </form>
@stop
