@extends('admin.layout')
@section('menuList')
    @include("admin/product/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li><a href="{{URL::to('admin/product/add')}}">添加产品</a></li>
        <li><a href="{{URL::to('admin/product/cat')}}">添加分类</a></li>
        <li><a href="{{URL::to('admin/product/modify')}}">编辑分类</a></li>
        <li  class='select'><a href="{{URL::to('admin/product/list')}}">产品列表</a></li>
    </ul>
@stop
@section('content')
    <h3>查看产品列表</h3>
    <span class="anchor">
        <a href="{{$product->getUrl(1)}}">首页</a> 
        <a href="{{$product->getUrl($product->getCurrentPage()+1)}}">下一页</a>
        第{{$product->getCurrentPage()}}页，每页{{$product->getPerPage()}}篇，共{{$product->getLastPage()}}页
    </span>
    

    <table class="anchor">
        <tr>
            <td>标题</td>
            <td>类别</td>
            <td>日期</td>
            <td colspan="2">操作</td>
        </tr>
        @foreach($product as $item)
        <tr>
            <td><a href="{{URL::to('product/show')}}?pid={{$item->id}}" target="_blank" title='浏览'>{{$item->title}}</a></td>
            <td>{{$item->type}}</td>
            <td>{{$item->date}}</td>
            <td><a href="{{URL::to('admin/product/edit')}}?modify={{$item->id}}">编辑</a></td>
            <td><a href="?delete={{$item->id}}" onclick="return window.confirm('确定要删除吗？');">删除</a></td>
        </tr>
        @endforeach
    </table>
    {{$product->links()}}
@stop
