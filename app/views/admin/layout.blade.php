<!DOCTYPE html>
<html>
    <head>
        <title>后台首页</title>
        <meta charset="UTF-8">
        {{HTML::style('static/css/common.css')}}
        {{HTML::style('static/css/admin.css')}}
        {{HTML::script('static/js/jquery-1.11.0.min.js')}}
        @yield('script')
        <script>
            $(function() {
                var index = 0;
                $("#submemu li").click(function() {
                    var obj = $("#submemu li").get(index);
                    $(obj).removeClass("select");
                    $("#sublist ul").eq(index).hide();
                    index = $(this).index();
                    $("#sublist ul").eq(index).show();
                    $(this).addClass("select");
                });
            });
        </script>
    </head>
    <body>
        <div id="header" class="cnt clr">
            <div id="user" class="rgt">
            </div>
            <div id="logo" class="abs">
                <img src="{{asset('static/images/logo.png')}}"  alt="alt"/>
            </div>
            <div id="menubar" class="abs">
            @yield('menuList')
            </div>
            <div id="logout" class="abs">
                <span>你好：{{Session::get('user','test')}}</span>&nbsp;&nbsp;<a href="{{URL::to('admin/login')}}" onclick="return window.confirm('确定要注销用户吗？');"><img src="{{asset('static/images/exit.png')}}" alt="exit"></a>
            </div>
        </div>
        <div id="content" class="clr cnt">
            <div id="sidebar" class="lft">
                <div id="sborder">
                    <div id="submemu">
                        <ul class="list">
                            <li class="select">基本</li>
                        </ul>
                    </div>
                    <div id="sublist">
                    @yield('sublist')
                    </div>
                </div>
            </div>
            <div id="main" class="rgt">
                <div id="mborder">
                @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
