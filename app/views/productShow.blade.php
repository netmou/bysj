@extends('layout')
@section('content')
<div class="box">
    <div class="head">  
        <div class="cpt">{{$product->title}}外观</div>
    </div>
    <div class="panel product">
        <img src="{{$product->image}}" alt="{{$product->title}}">
    </div>
</div>
<div class="box">
    <div class="head">  
        <div class="cpt">{{$product->title}}规格</div>
    </div>
    <div class="panel product">
        <table id="dynamic">
            @foreach($product->illustrate as $item)
            <tr>
                <td>{{$item[0]}}</td>
                <td>{{$item[1]}}</td>
                <td>{{$item[2]}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<div id="product" class="box">
    <div class="head">  
        <div class="cpt">{{$product->title}}描述</div>
    </div>
    <div class="panel product">
        {{$product->desc}}
    </div>
</div>
@stop



