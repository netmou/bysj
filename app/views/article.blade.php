@extends('layout')
@section('content')
<div class="box art">
    <div class="head">  
        <div class="cpt">最新文章</div>
    </div>
    <div class="panel">
        <ul class="clr">
        @foreach($article as $item)
             <li>
                <span class="lft"><a href="article/show?art={{$item->id}}">{{$item->title}}</a></span>
                <span class="rgt">{{$item->date}}</span>
            </li>
        @endforeach
        </ul>
    </div>
</div>
@stop
           
            
       