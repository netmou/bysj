@extends('admin.layout')
@section('content')

    <h3 class="w">操作失败</h3>
    <P>{{$desc}}</P>
    <p>您好，页面即将在五秒后跳转，如果无反应，请点击下面的连接</p>
    <a href='{{URL::to($target)}}' style="color:blue;">点击我手动跳转</a>

    <script type="text/javascript">
        setTimeout(function(){
            window.location="{{URL::to($target)}}";
        },5000);
    </script>
@stop
