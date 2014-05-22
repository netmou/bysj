@extends('layout')
@section('content')
<div class="box">
    <div class="head">  
        <div class="cpt">产品外观</div>
    </div>
    <div class="panel">
        <ul class="list">
            <li>
                <a href="product/show?pid={{$product->id}}"><img src="{{$product->image}}" alt="{{$product->title}}"></a>
            </li>
        </ul>
    </div>
</div>
<div class="box">
    <div class="head">  
        <div class="cpt">产品规格</div>
    </div>
    <div class="panel">
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
        <div class="cpt">产品描述</div>
    </div>
    <div class="panel">
        {{$product->desc}}
    </div>
</div>
@stop



