<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::any('admin', array('as'=>'admin','uses'=>'admin\SystemController@base'));
Route::any('admin/operate/failure', array('uses'=>'admin\OperateController@failure','as'=>'failure'));

Route::any('admin/operate/succeed', array('uses'=>'admin\OperateController@succeed','as'=>'succeed'));

// route for user
Route::any('admin/login', function(){
	if(Session::has('user')){
		Session::forget('user');
	}
	if(Request::method()=='POST'){
		$name=Request::input('uname',0);
		$pass=Request::input('passwd',0);
		$user=DB::table('user')->where('name',$name)->first();
		if($user && crypt($pass, $user->pass)==$user->pass){
			Session::put('user',$name);
			return Redirect::route('admin');
		}
	}
	return View::make('admin/login');
});
Route::any('admin/system', 'admin\SystemController@base');
Route::any('admin/system/base', 'admin\SystemController@base');
Route::any('admin/system/nav', 'admin\SystemController@nav');
Route::any('admin/system/add', 'admin\SystemController@add');
Route::any('admin/system/edit', 'admin\SystemController@edit');

// route for user
Route::any('admin/user', 'admin\UserController@showUserList');
Route::any('admin/user/create', 'admin\UserController@createUser');
Route::any('admin/user/cat', 'admin\UserController@showUserList');
Route::any('admin/user/edit', 'admin\UserController@modifyUser');


// route for message
Route::any('admin/message', 'admin\MessageController@showMessageList');
Route::any('admin/message/list', 'admin\MessageController@showMessageList');
Route::any('admin/message/answer', 'admin\MessageController@replyMessage');

// route for product
Route::any('admin/product', 'admin\ProductController@showProductList');
Route::any('admin/product/list', 'admin\ProductController@showProductList');
Route::any('admin/product/cat', 'admin\ProductController@addCategory');
Route::any('admin/product/add', 'admin\ProductController@addProduct');
Route::any('admin/product/edit', 'admin\ProductController@modifyProduct');
Route::any('admin/product/modify', 'admin\ProductController@modifyCategory');

// route for article
Route::any('admin/article', 'admin\ArticleController@showArticleList');
Route::any('admin/article/list', 'admin\ArticleController@showArticleList');
Route::any('admin/article/cat', 'admin\ArticleController@addCategory');
Route::any('admin/article/add', 'admin\ArticleController@addArticle');
Route::any('admin/article/edit', 'admin\ArticleController@modifyArticle');
Route::any('admin/article/modify', 'admin\ArticleController@modifyCategory');

Route::any('message', 'IndexController@message');

Route::any('product', 'IndexController@product');
Route::any('product/show', 'IndexController@showProduct');
Route::any('product/cat', 'IndexController@productCat');

Route::any('article', 'IndexController@article');
Route::any('article/cat', 'IndexController@articleCat');
Route::any('article/show', 'IndexController@showArticle');

Route::any('picture/upload', 'UploadController@picture');

Route::any('index/home', array('as'=>'index','uses'=>'IndexController@init'));
// route without action
Route::get('index', function(){
        return Redirect::route('index');
});
// route for default
Route::get('/', function(){
        return Redirect::route('index');
});


