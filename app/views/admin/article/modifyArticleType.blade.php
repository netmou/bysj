@extends('admin.layout')
@section('menuList')
    @include("admin/article/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li><a href="{{URL::to('admin/article/add')}}">添加文章</a></li>
        <li><a href="{{URL::to('admin/article/cat')}}">添加分类</a></li>
        <li class='select'><a href="{{URL::to('admin/article/modify')}}">编辑分类</a></li>
        <li><a href="{{URL::to('admin/article/list')}}">文章列表</a></li>
    </ul>
@stop
@section('content')
    <h3>添加文章类别</h3>
    <form action="?" method="post">
        <strong>选择已有的类别</strong>
        <br />
        <label for="ctype">文章分类：</label>
        <select id="ctype" name="category">
        @foreach($category as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
        </select>
        <br />
        <strong>修改选择的分类</strong>
        <br />
        <label for="title">标题：</label>
        <input id="title" name="title" type="text" size="36" />
        <br />
        <label for="symbol">标识：</label>
        <input id="symbol" name="symbol" type="text" size="36" />
        <br />
        <input type="submit" value="保存文章分类" />
        <input id="delete" type="button" value="删除文章分类" />
    </form>
    <script type="text/javascript">
        var changeType=function(){
            if($("#ctype option").size()==0){
                $("#title").val("");
                $("#symbol").val("");
                return null;
            }
            var value=$('#ctype').children('option:selected').val();
            $.ajax({
                data: "typeIndex=" + value,
                dataType:"json",
                timeout:5000,
                error:function(){
                    alert("UNKNOWN INTERNET ERROR!");
                },
                success:function(data){
                    $("#title").val(data.title);
                    $("#symbol").val(data.symbol);
                }
            });
        };
        $('#ctype').change(changeType);
        $("input[type='button']").click(function(){
            if($("#ctype option").size()==0){
                return null;
            }
            if(!window.confirm('确定要删除吗?')){
                return null;
            }
            var value=$("#ctype option:selected").val();
            $.ajax({   
                data: "deleteIndex=" + value,
                timeout:5000,
                error:function(){
                    alert("UNKNOW ERROR!");
                },
                success:function(){
                    $("#ctype option:selected").remove();
                    changeType();
                }
            });
        });
        //init the symbol and title    
        changeType();   
    </script>
@stop
