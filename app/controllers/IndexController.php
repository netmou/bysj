<?php
class IndexController extends BaseController{
	protected $layout = 'layout';

        public function __construct() {
            parent::__construct();
             //share some front data
            $cat = array();
            $channel = DB::table('channel')->select('id')->where('symbol', 'product')->first();
            $cat['product'] = DB::table('category')->select(array('id', 'title'))->where('channel', $channel->id)->where('parent', 0)->get();
            $channel = DB::table('channel')->select('id')->where('symbol', 'article')->first();
            $cat['article'] = DB::table('category')->select(array('id', 'title'))->where('channel', $channel->id)->where('parent', 0)->get();
            View::share('cat', $cat);
            $channel = DB::table('channel')->select('title', 'symbol')->where('show', 'yes')->get();
            View::share('channel', $channel);
            $link = DB::table('link')->where('status', 'show')->get();
            View::share('link', $link);
            $category=DB::table('category')->select('id')->where('symbol', 'gonggao')->first();
            $gonggao = DB::table('article')->where('category', $category->id)->take(5)->get();
            View::share('gonggao', $gonggao);
            View::share('ggc',$category);
            //end share data
        }
	public function init(){
		$data=array();
		$data['product']=DB::table('product')->select(array('id','title','image'))->take(10)->get();
		$data['article']=DB::table('article')->select('id','title','date')->orderBy('date')->take(10)->get();
		return View::make('index')->with($data);
	}
	public function article(){
		$data=array();
		$channel=DB::table('channel')->select('id')->where('symbol','article')->first();
		$data['article']=DB::table('article')->where('channel',$channel->id)->get();
		return View::make('article')->with($data);
	}
	public function articleCat(){
		if ($cat = Request::input('cid', 0)){
			$data=array();
			$data['category']=DB::table('category')->where('id',$cat)->first();
			$data['articles']=DB::table('article')
			->where('category',$cat)->paginate(20);
			$data['articles']->appends(array('cid' => $cat));
			return View::make('articleCat')->with($data);
		}
		App::abort('500','UNKNONW ERROR');
	}
	public function showArticle(){
		if($art=Request::input('art',0)){
			$data=array();
			$data['article']=$article=DB::table('article')->where('id',$art)->first();
			$data['artc']=DB::table('category')->where('id',$article->category)->first();
			return View::make('articleShow')->with($data);
		}
		App::abort('500','UNKNONW ERROR');
	}
	public function product(){
		$data=array();
		$data['product']=DB::table('product')->select(array('id','title','image'))->take(10)->get();
		return View::make('product')->with($data);
	}
	public function productCat(){
		if ($cat = Request::input('cid', 0)){
			$data=array();
			$data['category']=DB::table('category')->where('id',$cat)->first();
			$data['products']=DB::table('product')
			->where('category',$cat)->paginate(3);
			$data['products']->appends(array('cid' => $cat));
			return View::make('productCat')->with($data);
		}
		App::abort('500','UNKNONW ERROR');
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