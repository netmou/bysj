<?php
namespace admin;
use BaseController as Controller;
use Request;
use Session;
use Redirect;
use View;
use App;
use DB;
use Input;
use Config;
use Response;

class ProductController extends Controller{
	protected $layout = 'admin.layout';
	public function addProduct(){
		$channel=DB::table('channel')->select('id')->where('symbol','product')->first();
		if(Request::method()=='POST'){
			$insert=array();
			$insert['title']=Request::input('title');
			$insert['desc']=Request::input('body');
			$illustrate=json_decode(Request::input('illustrate'));
			$insert['illustrate']=addslashes(serialize($illustrate));// use stripslashes
			$insert['channel']=$channel->id;
			$file = Input::file('image');
			if($file->getError()!=UPLOAD_ERR_OK){
				return Redirect::to('admin/operate/failure')->with(array('target'=>'admin/product/add','desc'=>'图片上传失败！'));
			}
        	$path=Config::get('system.upload').date('Y/m/d/');
        	if(!file_exists($path)){
        		mkdir($path,0666,true);
        	}
			$filename=uniqid().'.'.$file->getClientOriginalExtension();
			$file->move($path,$filename);
			$insert['image']=$path.$filename;
			$insert['category']=Request::input('category');
			$insert['date']=date('Y-m-d');
			DB::table('product')->insert($insert);
			return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/product/list'));
		}
		$data=array();
		$data['category']=DB::table('category')->select(array('id','title'))->where('channel',$channel->id)->get();
		return View::make('admin/product/addProduct')->with($data);
	}
	public function addCategory(){
		$data=array();
		$channel=DB::table('channel')->select('id')->where('symbol','product')->first();
		if(Request::method()=='POST'){
			$insert=array();
			$insert['parent']=0;
			$insert['channel']=$channel->id;
			$insert['title']=Request::input('title');
			$insert['symbol']=Request::input('symbol');
			DB::table('category')->insert($insert);
			return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/product/cat'));
		}
		$data['category']=DB::table('category')->select(array('id','title'))->where('channel',$channel->id)->get();
		return View::make('admin/product/addProductType')->with($data);
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
		$channel=DB::table('channel')->select('id')->where('symbol','product')->first();
		if(Request::method()=='POST'){
			$update=array();
			$id=Request::input('category',-1);
			$update['symbol'] = Request::input('symbol');
			$update['title'] = Request::input('title');
			DB::table('category')->where('id', $id)->update($update);
			return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/product/cat'));
		}
		$data['category']=DB::table('category')->select(array('id','title'))->where('channel',$channel->id)->get();
		return View::make('admin/product/modifyProductType')->with($data);
	}
	//uncomplete
	public function showProductList(){
		if($id=Request::input('delete',0)){
			DB::table('product')->where('id', $id)->delete();
		}
		$channel=DB::table('channel')->select('id')->where('symbol','product')->first();
		$data['product']=DB::table('product')
 		->join('category', 'category.id', '=', 'product.category')
		->select(array('product.id as id','product.title as title','product.date as date','product.title as type'))
		->where('product.channel',$channel->id)->paginate(10);
		return View::make('admin/product/productList')->with($data);
	}
	public function modifyProduct(){
		$channel=DB::table('channel')->select('id')->where('symbol','product')->first();
		if($id=Request::input('modify',0)){
			if(Request::method()=='POST'){
				$update=array();
				$update['title']=Request::input('title');
				$update['desc']=Request::input('body');
				$illustrate=json_decode(Request::input('illustrate'));
				$update['illustrate']=addslashes(serialize($illustrate));// use stripslashes
				$update['channel']=$channel->id;
				$file = Input::file('image');
				if($file->getError()!=UPLOAD_ERR_OK){
				return Redirect::to('admin/operate/failure')->with(array('target'=>'admin/product/add','desc'=>'图片上传失败！'));
				}
	        	$path=Config::get('system.upload').date('Y/m/d/');
	        	if(!file_exists($path)){
	        		mkdir($path,0666,true);
	        	}
				$filename=uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path,$filename);
				$update['image']=$path.$filename;
				$update['category']=Request::input('category');
				$update['date']=date('Y-m-d');
				DB::table('product')->where('id',$id)->update($update);
				return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/product/list'));
			}
			$data['product']=DB::table('product')->where('id',$id)->first();
			$tmp=stripslashes($data['product']->illustrate);
			$data['product']->illustrate=unserialize($tmp);
			$data['category']=DB::table('category')->select(array('id','title'))->where('channel',$channel->id)->get();
			return View::make('admin/product/modifyProduct')->with($data);
		}
		App::abort('500','UNKNOWN ERROR');
	}
}
?>