<!DOCTYPE HTML>
<html>
    <head>
        <meta name="keywords" content="{{Config::get('system.seo')}}" />
        <meta charset="utf-8" />
        <meta name="description" content="{{Config::get('system.desc')}}" />
        <title>{{Config::get('system.title')}}</title>
        <base href="{{asset('/')}}"/>
        {{ HTML::style('static/css/common.css') }}
        {{ HTML::style('static/css/index.css') }}
        {{ HTML::script('static/js/jquery-1.11.0.min.js') }}
        {{ HTML::script('static/js/index.js') }}
        
        <script type="text/javascript">
            $(function(){
                var images = [
                    "{{asset('static/images/focus1.jpg')}}", 
                    "{{asset('static/images/focus2.jpg')}}"
                ];
                focusImage(images);
            });
        </script>
    </head>
    <body>
        <div id="banner">
            <div class="cnt clr">
                <div class="lft wrap">
                    您好 {{Session::get('user', '游客')}}，欢迎到来 
                    @foreach($link as $item)
                        @if($item->type=='top')
                        | <a href="{{$item->url}}">{{$item->title}}</a>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
        <div id="header" class="cnt">
            <div id="ls" class="clr">
                <div class="lft">
                    <a href="#"><img src="{{asset('static/images/logo.png')}}" alt="新秀的logo" /></a>
                </div>
                <div id="search" class="rgt">
                <!--
                    <form id="form" action="http://www.baidu.com/baidu" target="_blank">
                -->
                <form id="form" action="http://www.baidu.com/baidu" target="_blank">
                        <input name="word" type="text" size="12"/>
                        
                        <input type="image" src="{{asset('static/images/search.png')}}" onclick="innerSite()" alt="search">
                        <input type="hidden" value="utf-8" name="ie">
                        <input type="hidden" value="3" name="cl">
                        <input type="hidden" value="xinxiu" name="tn">
                        <input type="hidden" value="2097152" name="ct">
                        <input type="hidden" value="{{Config::get('system.domain')}}" name="si">
                    </form>
                    <script type="text/javascript">
                        function innerSite(){
                            $('#form').submit();
                        }
                    
                    </script>
                </div>
            </div>
            <div id="nav">
                <ul class="clr">
                    <li class="first"><a href="{{asset('/')}}" >首页</a></li>
                    @foreach($channel as $item)
                        <li><a href="{{asset($item->symbol)}}" >{{$item->title}}</a></li>
                    @endforeach
                    @foreach($link as $item)
                        @if($item->type=='channel')
                        <li><a href="{{$item->url}}" >{{$item->title}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        
        <div id="light" class="cnt">
            <div id="focus">
                <img id="image" src="{{asset('static/images/focus1.jpg')}}" alt="focus" />
            </div>
        </div>
        <div id="main" class="cnt">
            <div id="sidebar" class="lft">
            @section('sidebar')
                <div class="box" id="notice">
                    <div class="head">
                        <div class="cpt">站内公告</div>
                        <div class="more"><a href="article/cat?cid={{$ggc->id}}">更多</a></div>
                    </div>
                    <div class="view">
                    <ul>
                    @foreach($gonggao as $item)
                        <li>
                           <a href="article/show?art={{$item->id}}">{{$item->title}}</a> 
                        </li>
                    @endforeach
                    </ul>
                    </div>
                </div>
                <div class="box" id="listbox">
                    <div class="head">
                        <div class="cpt">分类浏览</div>
                    </div>
                    <div class="panel">
                        <dl>
                            <dt>文章分类</dt>
                             @foreach ($cat['article'] as $element)
                            <a href="article/cat?cid={{$element->id}}"><dd>{{$element->title}}</dd></a>
                             @endforeach
                        </dl>
                        <dl>
                            <dt>产品分类</dt>
                             @foreach ($cat['product'] as $element)
                            <a href="product/cat?cid={{$element->id}}"><dd>{{$element->title}}</dd></a>
                             @endforeach
                        </dl>
                    </div>
                </div>
                <div class="box" id="about">
                    <div class="head">
                        <div class="cpt">联系我们</div>
                    </div>
                    <div class="view">
                        <span>联系人：牟经理</span><br />
                        <span>手机：187*****211</span><br />
                        <span>传真：010-12***18</span><br />
                        <span>邮编：2**00</span><br />
                        <span>地址：XXXXXX</span><br />
                        <span>网址：blog.xxx.com/</span><br />
                        <span>Q Q：10****38</span><br />
                        <span>邮箱：le***fo@###.com</span>
                    </div>
                </div>
            @show
            </div>
            <!--end sidebar-->
            <div id="content" class="rgt">
            @yield('content')  
            </div>
        </div>   
        <!--end main-->

        <div id="footer" class="cnt">
            <div id="friend">
                <div class="head">
                    <div class="bar"> 友情链接</div>
                </div>
                <div class="panel">
                    <a href="{{asset('index.php')}}">本站</a>
                    @foreach($link as $item)
                        @if($item->type=='friend')
                        | <a href="{{$item->url}}">{{$item->title}}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <p>
                <a href="#">首页</a>
                @foreach($link as $item)
                    @if($item->type=='bottom')
                    | <a href="{{$item->url}}">{{$item->title}}</a>
                    @endif
                @endforeach
            </p> 
            <p>
                Powered by <a href="http://qzone.qq.com/1064390338>">leiyanfo</a>
                备案号：<a href="#">{{Config::get('system.icp')}}</a>
                工作室：<a href="#">11号楼507</a>
                网站统计：{{Config::get('system.statistic')}}
            </p>
        </div>
    </body>
</html>


