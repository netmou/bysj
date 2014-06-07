@extends('admin.layout')
@section('menuList')
    @include("admin/system/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li class='select'><a href="{{URL::to('admin/system/base')}}">基本设置</a></li>
        <li><a href="{{URL::to('admin/system/nav')}}">导航设置</a></li>
        <li><a href="{{URL::to('admin/system/add')}}">添加导航</a></li>
    </ul>
@stop
@section('content')
    <h3>基本配置</h3>
    <form action="?" method="post">
        网站名称：<input name="title" type="text" size="30" value="{{Config::get('system.title','未设置')}}" /> <br />
        网站域名：<input name="domain" type="text" size="30" value="{{Config::get('system.domain','未设置')}}"/> <br />
        网站描述：<input name="desc" type="text" size="30" value="{{Config::get('system.desc','未设置')}}"/> <br />
        备案 ICP：<input name="icp" type="text" size="30" value="{{Config::get('system.icp','未设置')}}"/> <br />
        关 键 字：<input name="keyword" type="text" size="30" value="{{Config::get('system.keyword','未设置')}}"/> <br />
        上传目录：{{Config::get('system.upload','未设置')}} <br />
        统计代码：<textarea name="statistic" cols="30" rows="4">{{Config::get('system.statistic','未设置')}}</textarea> <br />
        <input type="submit" value="保存配置" />
    </form>
@stop
