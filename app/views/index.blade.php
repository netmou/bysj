@extends('layout')
@section('content')
<div class="box">
    <div class="head">
        <div class="cpt">公司简介</div>
    </div>
    <div class="view clr">
        <img class="lft wrap" src="static/images/about.jpg" alt="公司全景">
        <span>
            这里是公司简介这里是公司简介这里是公司简介这里是公司简介这里是公司简介这里是公司简介
            这里是公司简介这里是公司简介这里是公司简介这里是公司简介
            这里是公司简介这里是公司简介这里是公司简介这里是公司简介
            这里是公司简介这里是公司简介这里是公司简介这里是公司简介
            这里是公司简介这里是公司简介这里是公司简介这里是公司简介
            这里是公司简介这里是公司简介这里是公司简介这里是公司简介
            这里是公司简介这里是公司简介这里是公司简介这里是公司简介这里是公司简介
            这里是公司简介这里是公司简介这里是公司简介这里是公司简介这里是公司简介
            这里是公司简介这里是公司简介这里是公司简介
            <a href="#" style="color:blue;">详情&gt;&gt;</a>
        </span>
    </div>
</div>
<div class="box">
    <div class="head">
        <div class="cpt">推荐产品</div>
        <div class="more"><a href="#">更多&gt;&gt;</a></div>
    </div>
    <div id="slide" class="panel slideWrap">
        <div class="slideTabs clr">
            <ul class="origin">
            @foreach($product as $item)
                <li><a href="product/show?pid={{$item->id}}"><img src="{{$item->image}}" alt="{{$item->title}}"/></a></li>
            @endforeach
            </ul>
            <ul class="clone"><!-- 不能删除的空标签,JS幻灯专用 --></ul>
        </div>
    </div>
</div>
<div class="box art">
    <div class="head">  
        <div class="cpt">最新文章</div>
        <div class="more"><a href="article/list">更多&gt;&gt;</a></div>
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
           