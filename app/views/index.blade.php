@extends('layout')
@section('content')
<div class="box">
    <div class="head">
        <div class="cpt">公司简介</div>
    </div>
    <div class="view clr">
        <img class="lft wrap" src="static/images/about.jpg" alt="公司全景">
        <span>
            新秀有限公司位于江西省新余市国家高新技术产业开发区沃格工业园。公司创立于2009年12月，2013年11月改制为股份公司。是一家集TFT-LCD玻璃薄化、ITO镀膜和COVER LENS（视窗玻璃）和OGS（一体式触控）二次强化研发、生产、销售于一体的玻璃精加工业务与系统解决方案提供商，是平板显示器（FPD）用光电玻璃精加工领域最具综合实力的高科技企业之一。公司以“同创分享，共赢未来”为经营理念，采用现代企业管理模式，倡导绿色生态环境与可持续发展。公司拥有一支具有行业领先水平的资深研发团队，拥有自主研发的核心技术和知识产权，产品工艺先进，良率远高于同行业水平，先后通过了ISO9001质量管理体系和ISO14001环境管理体系认证。公司与天马微电子、龙腾光电、中航光电、TCL、瀚宇彩晶、中华映管、宇顺电子等国内外行业知名企业建立了战略合作关系，积累了优良的客户资源。公司致力于精细化管理，引进了一批管理、研发和营销高端人才，各项管理在同行业处于领先水平。公司将继续围绕客户的需求持续创新，与合作伙伴开放合作，致力于为客户提供系统的解决方案、产品和服务，为客户创造最大价值。
            <a href="#" style="color:blue;">详情&gt;&gt;</a>
        </span>
    </div>
</div>
<div class="box">
    <div class="head">
        <div class="cpt">推荐产品</div>
        <div class="more"><a href="product">更多&gt;&gt;</a></div>
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
<div class="box">
    <div class="head">  
        <div class="cpt">最新文章</div>
        <div class="more"><a href="article">更多&gt;&gt;</a></div>
    </div>
    <div class="panel">
        <ul class="clr art">
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
           