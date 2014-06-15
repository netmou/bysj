@extends('admin.layout')
@section('script')
    {{HTML::script('editor/kindeditor-min.js')}}
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="body"]', {
                resizeType: 1,
                allowPreviewEmoticons: false,
                allowImageUpload: true,
                width : '500px',
                minWidth: '500px',
                items : [
                        'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                        'removeformat','|','subscript','superscript', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist','insertunorderedlist', '|', 'emoticons', 'image', 'link']

            });
        });
    </script>
@stop
@section('menuList')
    @include("admin/article/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li class='select'><a href="{{URL::to('admin/article/add')}}">编辑文章</a></li>
        <li><a href="{{URL::to('admin/article/cat')}}">添加分类</a></li>
        <li><a href="{{URL::to('admin/article/modify')}}">编辑分类</a></li>
        <li><a href="{{URL::to('admin/article/list')}}">文章列表</a></li>
    </ul>
@stop
@section('content')
    <h3>添加新闻</h3>
    <form action="edit" method="post">
        <strong>请选择新闻类别</strong>
        <br />
        <label for="category">文章分类：</label>
        <select id="category" name="category">
        @foreach($category as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
        </select>
        <script type="text/javascript">
            $('#category').find("option[value='{{$article->category}}']").attr("selected",true);
        </script>
        <br />
        <strong>请填写文章标题</strong>
        <br />
        <input name="modify" value="{{$article->id}}" type="hidden" />
        <label for="title">标题：</label>

        <input id="title" name="title" value="{{$article->title}}" type="text" size="24" />
        <br />
        <label for="author">作者：</label>
        <input id="author" name="author" value="{{$article->user}}" type="text" size="24" />（或文章来源）

        <br />
        <strong>请填写文章正文</strong>
        <textarea id="article" name="body">{{$article->content}}</textarea>
        <br />
        <strong>请填写文章关键字（英文逗号分隔）</strong>
        <br />
        <label for="keyword">关键字：</label>

        <input id="keyword" name="keyword" value="{{$article->keyword}}" type="text" size="24" />

        <br />
        <input type="submit" value="保存修改" />
    </form>
@stop
