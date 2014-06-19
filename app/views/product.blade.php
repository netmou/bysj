@extends('layout')
@section('content')
<div class="box">
    <div class="head">
        <div class="cpt">推荐产品</div>
    </div>
    <div id="slide" class="panel slideWrap">
        <div class="slideTabs clr">
            <ul class="origin">
            @foreach($product as $item)
                <li>
                    <a href="product/show?pid={{$item->id}}"><img src="{{$item->image}}" title="{{$item->title}}" alt="{{$item->title}}"/></a><br />
                    <span>{{$item->title}}</span>
                </li>
            @endforeach
            </ul>
            <ul class="clone"><!-- 不能删除的空ul标签,JS幻灯专用 --></ul>
        </div>
    </div>
</div>
<div id="product" class="box clr">
    <div class="head">  
        <div class="cpt">最新产品</div>
    </div>
    <div class="panel">
        <ul class="list">
        @foreach($product as $item)
            <li>
                <a href="product/show?pid={{$item->id}}"><img src="{{$item->image}}" title="{{$item->title}}" alt="{{$item->title}}"><a>
                <br />
                <span>{{$item->title}}</span>
            </li>
        @endforeach
        </ul>
    </div>
</div>
@stop

        

