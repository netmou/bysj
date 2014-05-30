@extends('admin.layout')
@section('menuList')
    @include("admin/message/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li  class='select'><a href="{{URL::to('admin/message/list')}}">留言列表</a></li>
    </ul>
@stop
@section('content')
    <h3>选择的留言</h3>
    <div class="msg">
        <div class="cpt">
            <strong>

                标题：{{$message->title}}

            </strong>
                [{{$message->date}}]
        </div>
        <div class="desc">

           客户：{{$message->desc}}

        </div>
    </div>
    <h3>回复内容</h3>
    <form action="answer" method="post">
        <input name='reply' type="hidden" value="{{$message->id}}">
        <table id='reply'>
            <tr>
                <td>
                    <textarea name="answer" cols="50" rows="6">{{$message->reply}}</textarea>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="reset" value="清空" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="提交" />
                </td>
            </tr>
        </table>
    </form>
@stop
