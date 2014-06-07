@extends('layout')
@section('content')
<div class="box art">
    <div class="head">  
        <div class="cpt">{{$category->title}}新闻列表</div>
    </div>
    <div class="panel">
        <ul class="clr">
        @foreach($articles as $item)
             <li>
                <span class="lft"><a href="article/show?art={{$item->id}}">{{$item->title}}</a></span>
                <span class="rgt">{{$item->date}}</span>
            </li>
        @endforeach
        </ul>
    </div>
</div>
@stop
           
            
       