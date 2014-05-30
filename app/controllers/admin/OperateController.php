<?php
namespace admin;
use BaseController as Controller;
use Request;
use Session;
use Redirect;
use View;
use DB;
class OperateController extends Controller{
	protected $layout = 'admin.layout';

	public function succeed(){
		$target=Session::get('target','target');
		return View::make('admin/succeed')->with(array('target'=>$target));
	}
	public function failure(){
		$desc=Session::get('desc','desc');
		$target=Session::get('target','target');
		return View::make('admin/failure')->with(array('desc'=>$desc,'target'=>$target));
	}
}
?>