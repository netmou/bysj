@extends('layout')
@section('content')
    <div class="box art">
    	<div class="head">
            <div class="cpt">{{$artc->title}}浏览</div>
        </div>
        <div class="panel show">
	        <h3>{{$article->title}}</h3>
	        <h6>{{$article->user!=""?$article->user:'本站'}} | {{$article->date}}</h6>
	            {{$article->content}}
        </div>
    </div>
@stop
                
       
       