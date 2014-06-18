@extends('layout')
@section('content')
<div id="product" class="box clr">
    <div class="head">  
        <div class="cpt">{{$category->title}}产品列表</div>
    </div>
    <div class="panel">
        <ul class="list">
        @foreach($products as $item)
            <li>
                <a href="product/show?pid={{$item->id}}"><img src="{{$item->image}}" alt="{{$item->title}}"><a>
                 <br />
                <span>{{$item->title}}</span>
            </li>
        @endforeach
        </ul>
        {{$products->links()}}
    </div>
</div>
@stop

        

