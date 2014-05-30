<?php
class IndexController extends BaseController{
	protected $layout = 'layout';
	public function init(){
		$data=array();
		$data['product']=DB::table('product')->select(array('id','title','image'))->take(10)->get();
		$data['article']=DB::table('article')->select('id','title','date')->orderBy('date')->take(10)->get();
		$channel=DB::table('channel')->select('id')->where('symbol','about')->first();
		$data['brief']=DB::table('article')->select('content')->where('channel',$channel->id)->get();
		return View::make('index')->with($data);
	}
	public function article(){
		$data=array();
		$channel=DB::table('channel')->select('id')->where('symbol','article')->first();
		$data['article']=DB::table('article')->where('channel',$channel->id)->get();
		return View::make('article')->with($data);
	}
	public function showArticle(){
		if($art=Request::input('art',0)){
			$data=array();
			$data['article']=DB::table('article')->where('id',$art)->first();
			return View::make('articleShow')->with($data);
		}
		App::abort('500','UNKNONW ERROR');
	}
	public function product(){
		$data=array();
		$data['product']=DB::table('product')->select(array('id','title','image'))->take(10)->get();
		return View::make('product')->with($data);
	}
	public function showProduct(){
		if($pid=Request::input('pid',0)){
			$data=array();
			$data['product']=DB::table('product')->where('id',$pid)->first();
			$tmp=stripslashes($data['product']->illustrate);
			$data['product']->illustrate=unserialize($tmp);
			return View::make('productShow')->with($data);
		}
		App::abort('500','UNKNONW ERROR');
	}
	public function message(){
		$channel=DB::table('channel')->select('id')->where('symbol','message')->first();
		if(Request::method()=='POST'){
			$insert=array();
			$insert['title']=Request::input('title');
			$insert['desc']=Request::input('desc');
			$insert['channel']=$channel->id;
			$insert['category']=0;
			$insert['date']=date('Y-m-d');
			DB::table('message')->insert($insert);
		}
		$data['message']=DB::table('message')
		->where('channel',$channel->id)->paginate(10);
		return View::make('message')->with($data);
	}
}
?>