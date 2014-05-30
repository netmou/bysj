<?php
namespace admin;
use BaseController as Controller;
use Request;
use Session;
use Redirect;
use Response;
use View;
use App;
use DB;

class ArticleController extends Controller{
	protected $layout = 'admin.layout';
	public function addArticle(){
		$channel=DB::table('channel')->select('id')->where('symbol','article')->first();
		if(Request::method()=='POST'){
			$insert=array();
			$insert['title']=Request::input('title');
			$insert['content']=Request::input('body');
			$insert['keyword']=Request::input('keyword');
			$insert['channel']=$channel->id;
			$insert['category']=Request::input('category');
			$insert['date']=date('Y-m-d');
			$insert['user']=Request::input('author');
			DB::table('article')->insert($insert);
			return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/article/list'));
		}
		$data=array();
		$data['category']=DB::table('category')->select(array('id','title'))->where('channel',$channel->id)->get();
		return View::make('admin/article/addArticle')->with($data);
	}
	public function addCategory(){
		$data=array();
		$channel=DB::table('channel')->select('id')->where('symbol','article')->first();
		if(Request::method()=='POST'){
			$insert=array();
			$insert['parent']=0;
			$insert['channel']=$channel->id;
			$insert['title']=Request::input('title');
			$insert['symbol']=Request::input('symbol');
			DB::table('category')->insert($insert);
			return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/article/cat'));
		}
		$data['category']=DB::table('category')->select(array('id','title'))->where('channel',$channel->id)->get();
		return View::make('admin/article/addArticleType')->with($data);
	}
	public function showArticleList(){
		if($id=Request::input('delete',0)){
			DB::table('article')->where('id', $id)->delete();
		}
		$channel=DB::table('channel')->select('id')->where('symbol','article')->first();
		$data['article']=DB::table('article')
 		->leftJoin('category', 'category.id', '=', 'article.category')
		->select(array('article.id as id','article.title as title','article.date as date','article.user as user','category.title as type'))
		->where('article.channel',$channel->id)->paginate(10);
		return View::make('admin/article/articleList')->with($data);
	}
	public function modifyArticle(){
		if($id=Request::input('modify',0)){
			$channel=DB::table('channel')->select('id')->where('symbol','article')->first();
			if(Request::method()=='POST'){
				$update=array();
				$update['title']=Request::input('title');
				$update['content']=Request::input('body');
				$update['keyword']=Request::input('keyword');
				$update['channel']=$channel->id;
				$update['category']=Request::input('category');
				$update['date']=date('Y-m-d');
				$update['user']=Request::input('author');
				DB::table('article')->where('id',$id)->update($update);
				return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/article/list'));
			}
			$data['article']=DB::table('article')->where('id',$id)->first();
			$data['category']=DB::table('category')->select(array('id','title'))->where('channel',$channel->id)->get();
			return View::make('admin/article/modifyArticle')->with($data);
		}
		App::abort('500','UNKNONW ERROR');
	}
	public function modifyCategory(){
		if(Request::ajax()){
			if($index=Request::input('typeIndex',0)){
					$category=DB::table('category')->select(array('title','symbol'))->where('id',$index)->first();
					return Response::json(array('title' => $category->title, 'symbol' => $category->symbol));
			}
			if($index=Request::input('deleteIndex',0)){
				DB::table('category')->where('id',$index)->delete();
				$response = Response::make("delete ok");
				$response->header('Content-Type', 'text/plain');
				return $response;
			}
		}
		$data=array();
		$channel=DB::table('channel')->select('id')->where('symbol','article')->first();
		if(Request::method()=='POST'){
			$update=array();
			$id=Request::input('category',-1);
			$update['symbol'] = Request::input('symbol');
			$update['title'] = Request::input('title');
			DB::table('category')->where('id', $id)->update($update);
			return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/article/cat'));
		}
		$data['category']=DB::table('category')->select(array('id','title'))->where('channel',$channel->id)->get();
		return View::make('admin/article/modifyArticleType')->with($data);
	}
}
?>