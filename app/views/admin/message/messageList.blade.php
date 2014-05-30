@extends('admin.layout')
@section('menuList')
    @include("admin/message/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li  class='select'><a href="{{URL::to('admin/message/list')}}">留言列表</a></li>
       
    </ul>
@stop
@section('content')
    <h3>查看留言列表</h3>
    <span class="anchor">
        <a href="{{$message->getUrl(1)}}">首页</a> 
        <a href="{{$message->getUrl($message->getCurrentPage()+1)}}">下一页</a>
        第{{$message->getCurrentPage()}}页，每页{{$message->getPerPage()}}篇，共{{$message->getLastPage()}}页
    </span>
    @foreach($message as $item)
    <div class="msg">
        <div class="cpt">
            <strong>
                {{$item->title}}
            </strong>
                [{{$item->date}}]
                <a class="w" href="?delete={{$item->id}}" onclick="return window.confirm('确定要删除吗？');">删除</a>
                <a class="r" href="answer?reply={{$item->id}}">回复</a>
        </div>
        <div class="desc">
           <strong>客户：</strong>{{$item->desc}}
        </div>
        @if($item->status!=0)
        <div class="reply">
           <strong>回复：</strong>
           {{$item->reply}}
        </div>
        @endif
    </div>
    @endforeach
    {{$message->links()}}
@stop
