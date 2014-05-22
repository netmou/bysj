@extends('layout')
@section('content')
    <div class="box art">
        <div class="panel show">
        <h3>{{$article->title}}</h3>
        <h6>{{$article->user}} | {{$article->date}}</h6>
            {{$article->content}}
        </div>
    </div>
@stop
                
       
       