@extends('admin.layout')
@section('script')
    {{HTML::script('editor/kindeditor-min.js')}}
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="body"]', {
                resizeType: 1,
                allowPreviewEmoticons: false,
                allowImageUpload: true
            });
        });
    </script>
@stop
@section('menuList')
    @include("admin/product/menuList") 
@stop
@section('sublist')
    <ul class="first">
        <li class='select'><a href="{{URL::to('admin/product/add')}}">添加产品</a></li>
        <li><a href="{{URL::to('admin/product/cat')}}">添加分类</a></li>
        <li><a href="{{URL::to('admin/product/modify')}}">编辑分类</a></li>
        <li><a href="{{URL::to('admin/product/list')}}">产品列表</a></li>
    </ul>
@stop
@section('content')
    <h3>添加产品</h3>
    <form action="add" method="post" enctype="multipart/form-data">
        <strong>请选择产品类别</strong>
        <br />
        <label for="ctype">产品分类：</label>
        <select id="ctype" name="category">
        @foreach($category as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
        @endforeach
        </select>
        <br />
        <label for="title">标题：</label>
        <input id="title" name="title" type="text" size="24" />
        <br />
        <strong>请填写产品规格(双击单元格添加数据)</strong>
        <table id="dynamic">
            <tr>
                <td>规格名</td>
                <td>规格值</td>
                <td>备注</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <input id="mkrow" type="button" value="添加行" /><input id="rmrow" type="button"  value="移除行" />
        <input id="illustrate" name="illustrate" type="hidden" />
        <script type="text/javascript">
        //使用闭包存储全局变量
        (function(){
            var curtd=null;
            var curtr=null;
            var color='#fff';
            var trclick=function(){
                if(curtr&&curtr!=this){
                    $(curtr).css('background-color',color);
                }
                if(0==$(this).index()){
                    return curtr=null;
                }
                if(curtr!=this){
                    curtr=this;
                    color=$(this).css('background');
                    $(this).css('background-color','#f8f8dd');
                }
            };
            var tddblclick=function(){
                if(0==$(this).parent().index()){
                    return null;
                }
                if(curtd&&curtd==this){
                    return null;
                }
                curtd=this;
                var value=$(this).html();
                $(this).html("<input type='text' value='"+value+"'/>");
                $(this).find('input').focus();
                $(this).find('input').blur(function(){
                    var value=$(this).val().trim();
                    var index=$(this).index();
                    $(this).remove();
                    $(curtd).html(value);
                    curtd=null;
                });
            };
            var async=function(){
                var data=new Array();
                var i=0;
                $('#dynamic tr').each(function(){
                    var row=new Array();
                    var j=0;
                    $(this).find('td').each(function(){
                       row[j++]=$(this).html();
                    });
                    data[i++]=row;
                });
                $('#illustrate').val(JSON.stringify(data));
            };
            $('#dynamic').find('tr').click(trclick);
            $('#dynamic').find('td').dblclick(tddblclick);
            
            $('#mkrow').click(function(){
                var text="<tr><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;</td></tr>";
                var index=0;
                if(curtr){
                    $(curtr).after(text);
                    index=$(curtr).index()+1;
                }else{
                    $('#dynamic').append(text);
                    index=$('#dynamic tr:last').index();
                }
                $('#dynamic').find('tr').eq(index).click(trclick);
                $('#dynamic').find('tr').eq(index).find('td').dblclick(tddblclick);
            });
            $('#rmrow').click(function(){
                if(curtr){
                    $(curtr).remove();
                    curtr=null;
                }else if(1<$('#dynamic tr').size()){
                    $("#dynamic tr:last").remove();  
                }
            });
            $(function(){
                $("#addproduct").click(async);
            });

        })();
        
        </script>
        <br />
        <label for="image">外观：</label>
        <input id="image" name="image" type="file" />
        <br />
        <strong>请填写产品描述</strong>
        <textarea id="article" name="body"></textarea>
        <input id="addproduct" type="submit" value="添加产品" />
    </form>
@stop
