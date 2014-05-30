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
use File;
class SystemController extends Controller{
	protected $layout = 'admin.layout';
	public function base(){
		if(Request::method()=='POST'){
			$conf=array();
			$conf['title']=Request::input('title');
			$conf['desc']=Request::input('desc');
			$conf['keyword']=Request::input('keyword');
			$conf['icp']=Request::input('icp');
			$conf['domain']=Request::input('domain');
			$conf['statistic']=Request::input('statistic');
			$conf['gonggao']=Request::input('gonggao');
			$dyanmic=storage_path().'/dyanmic.conf';
			ob_start();
			var_export($conf);
			$data=ob_get_contents();
			ob_end_clean();
			$data='<?php return '.$data.';?>';
			File::put($dyanmic,$data);
			return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/system/base'));
		}
		
		return View::make('admin/system/base');
	}
	public function nav(){
		if($id=Request::input('delete',0)){
			DB::table('link')->where('id',$id)->delete();
		}
		$data=array();
		$data['nav']=DB::table('link')->paginate(10);
		return View::make('admin/system/navList')->with($data);
	}
	public function edit(){
		if($id=Request::input('modify',0)){
			if(Request::method()=='POST'){
				$update=array();
				$update['title']=Request::input('title');
				$update['type']=Request::input('type');
				$update['url']=Request::input('url');
				$update['status']=Request::input('status');
				DB::table('link')->where('id',$id)->update($update);
				return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/system/nav'));
			}
			$data=array();
			$data['nav']=DB::table('link')->where('id',$id)->first();
			return View::make('admin/system/modifyNav')->with($data);
		}
		App::abort('500','UNKNONW ERROR');
	}
	public function add(){
		if(Request::method()=='POST'){
			$insert=array();
			$insert['title']=Request::input('title');
			$insert['type']=Request::input('type');
			$insert['url']=Request::input('url');
			$insert['status']=Request::input('status');
			DB::table('link')->insert($insert);
			return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/system/nav'));
		}
		return View::make('admin/system/addNav');
	}
	
}
?>