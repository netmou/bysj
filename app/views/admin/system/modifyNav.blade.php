@extends('admin.layout')
@section('menuList')
    @include("admin/system/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li><a href="{{URL::to('admin/system/base')}}">基本设置</a></li>
        <li  class='select'><a href="{{URL::to('admin/system/nav')}}">导航设置</a></li>
        <li><a href="{{URL::to('admin/system/add')}}">添加导航</a></li>
    </ul>
@stop
@section('content')
   <h3>导航编辑</h3>
   <form action="?" method="post">
   链接名称：<input name="title" value="{{$nav->title}}" type="text" size="30"> <br />
   链接位置：<select id="ltype" name="type"> 
       <option value="top">顶部链接</option>
       <option value="bottom">底部链接</option>
       <option value="friend">友情链接</option>
       <option value="channel">导航链接</option>
   </select>
   <script type="text/javascript">
        $("#ltype option[value='{{$nav->type}}']").attr('selected',true);
   </script>
   <br />
   <input name="modify"type="hidden" value="{{$nav->id}}">
   链接地址：<input name="url" value="{{$nav->title}}" type="text" size="30"> <br />
   链接状态：显示<input name="status" type="radio" checked="checked" value="show">&nbsp;&nbsp;禁用<input name="status" type="radio" value="hidden"> <br />
   <input type="submit" value="保存">
   </form>
@stop
