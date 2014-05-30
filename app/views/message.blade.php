@extends('layout')
@section('content')
@foreach($message as $item)
<div class="msg">
    <div class="cpt">
        <strong>标题：</strong>
        <span>{{$item->title}}[{{$item->date}}]</span>
    </div>
    <div class="desc">
        <strong>留言:</strong>
        {{$item->desc}}
    </div>
    @if($item->status!=0)
    <div class="reply">
        <strong>回复:</strong>
        {{$item->reply}}
    </div>
    @endif
</div>
@endforeach
{{$message->links()}}
<form action="message" method="post">
    <table id="reply">         
        <tr>
            <td>标题:</td>
            <td><input name="title" type="text" size="40" /></td>
        </tr>
        <tr>
            <td>内容:</td>
            <td>
                <textarea name="desc" cols="40" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="reset" value="清空" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="提交" />
            </td>
        </tr>
    </table>
</form>
@stop

