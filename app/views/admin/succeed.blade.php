@extends('admin.layout')
@section('content')
	<h3>操作成功</h3>
	<P>{{--$desc--}}</P>
	<p>您好，页面即将在五秒后跳转，如果无反应，请点击下面的连接</p>
	<a href='{{$target}}'>点击我手动跳转</a>
	<script type="text/javascript">
	    setTimeout(function(){
	        window.location="{{URL::to($target)}}";
	    },2000);
	</script>
@stop
