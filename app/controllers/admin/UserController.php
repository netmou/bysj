<?php
namespace admin;

use BaseController as Controller;
use Request;
use Session;
use Redirect;
use Response;
use View;
use Hash;
use App;
use DB;

class UserController extends Controller {

    protected $layout = 'admin.layout';

    public function createUser() {
        if (Request::method() == 'POST') {
            $insert['name'] = Request::input('name');
            $insert['realname'] = Request::input('realname');
            $pass = Request::input('pass');
            $confirm = Request::input('confirm');
            if ($confirm && $pass != $confirm) {
                return Redirect::to('admin/operate/failure')->with(array('target' => 'admin/user/create', 'desc' => '请重填写一遍密码喔！'));
            }
            $insert['pass'] = Hash::make($pass);
            $insert['phone'] = Request::input('phone');
            $insert['birth'] = Request::input('birth');
            $insert['sex'] = Request::input('sex');
            $role = Request::input('role');
            $insert['role'] = addslashes(serialize($role));
            $insert['email'] = Request::input('email');
            $insert['regtime'] = date('Y-m-d h:i:s');
            DB::table('user')->insert($insert);
            return Redirect::to('admin/operate/succeed')->with(array('target' => 'admin/user/cat'));
        }
        $data = array();
        $data['role'] = DB::table('role')->select(array('id', 'title'))->get();
        return View::make('admin/user/addUser')->with($data);
    }
    public function modifyUser(){
        if($id=Request::input('modify',0)){
            if (Request::method() == 'POST') {
                $update['name'] = Request::input('name');
                $update['realname'] = Request::input('realname');
                $pass = Request::input('pass');
                $confirm = Request::input('confirm');
                if ($confirm && $pass != $confirm) {
                    return Redirect::to('admin/operate/failure')->with(array('target' => 'admin/user/create', 'desc' => '请重填写一遍密码喔！'));
                }
                if($pass){
                    $update['pass'] = Hash::make($pass);
                }
                $update['phone'] = Request::input('phone');
                $update['birth'] = Request::input('birth');
                $update['sex'] = Request::input('sex');
                $role = Request::input('role');
                $update['role'] = addslashes(serialize($role));
                $update['email'] = Request::input('email');
                $update['regtime'] = date('Y-m-d h:i:s');
                DB::table('user')->where('id',$id)->update($update);
                return Redirect::to('admin/operate/succeed')->with(array('target' => 'admin/user/cat'));
            }
            $data = array();
            $data['role'] = DB::table('role')->select(array('id', 'title'))->get();
            $data['user'] = DB::table('user')->where('id',$id)->first();
            $tmp=stripslashes($data['user']->role);
            $data['user']->role=unserialize($tmp);
            return View::make('admin/user/modifyUser')->with($data);
            }
    }

    public function showUserList() {
        if ($id = Request::input('delete', 0)) {
            DB::table('user')->where('id', $id)->delete();
        }
        $data['user'] = DB::table('user')
                ->select(array('id', 'name', 'realname', 'sex'))
                ->paginate(10);
        return View::make('admin/user/userList')->with($data);
    }

}
?>