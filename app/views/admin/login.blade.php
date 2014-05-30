<!DOCTYPE html>
<html>
    <head>
        <title>登陆</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{HTML::style('static/css/login.css')}}
    </head>
    <body>
        <div id="main">
            <form action="?" method="post">
            <img class="btn" src="{{asset('static/images/user.png')}}">&nbsp;<input class="ipt" name="uname" type="text" size="16"> <br />
            <img class="btn" src="{{asset('static/images/pass.png')}}">&nbsp;<input class="ipt" name="passwd" type="password" size="16"> <br />
            <input class="ibt" type="reset" value="重置"/>&nbsp;&nbsp;<input class="ibt" type="submit" value="登陆"/>    
            </form>
        </div>
    </body>
</html>
