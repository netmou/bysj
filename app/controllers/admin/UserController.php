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

class UserController extends Controller{
	protected $layout = 'admin.layout';
	public function createUser(){
		if(Request::method()=='POST'){
			$insert['name']=Request::input('name');
			$insert['realname']=Request::input('realname');
			$pass=Request::input('pass');
			$confirm=Request::input('confirm');
			if($confirm && $pass!=$confirm){
				return Redirect::to('admin/operate/failure')->with(array('target'=>'admin/user/create','desc'=>'请重田一遍密码喔！'));
			}
			$insert['pass']=Hash::make($pass);
			$insert['phone']=Request::input('phone');
			$insert['birth']=Request::input('birth');
			$insert['sex']=Request::input('sex');
			$insert['role']=Request::input('role');
			$insert['email']=Request::input('email');
			$insert['regtime']=date('Y-m-d h:i:s');
			DB::table('user')->insert($insert);
			return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/user/cat'));
		}
		$data=array();
		$data['role']=DB::table('role')->select(array('id','title'))->get();
		return View::make('admin/user/addUser')->with($data);
	}
	
	public function showUserList(){
		if($id=Request::input('delete',0)){
			DB::table('user')->where('id', $id)->delete();
		}
		$data['user']=DB::table('user')
		->leftJoin('role', 'role.id', '=', 'user.role')
		->select(array('user.id as id','user.name as name','user.realname as realname','role.title as role','user.sex as sex'))
		->paginate(10);
		return View::make('admin/user/userList')->with($data);
	}
}
?>