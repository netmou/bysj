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
                <li><img src="{{$item->image}}" alt="{{$item->title}}"/></li>
            @endforeach
            </ul>
            <ul class="clone"><!-- 不能删除的空标签,JS幻灯专用 --></ul>
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
                <a href="product/show?pid={{$item->id}}"><img src="{{$item->image}}" alt="{{$item->title}}"><a>
            </li>
        @endforeach
        </ul>
    </div>
</div>
@stop

        

