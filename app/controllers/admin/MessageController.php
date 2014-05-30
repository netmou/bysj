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

class MessageController extends Controller{
	protected $layout = 'admin.layout';
	
	public function showMessageList(){
		if($id=Request::input('delete',0)){
			DB::table('message')->where('id', $id)->delete();
		}
		$channel=DB::table('channel')->select('id')->where('symbol','message')->first();
		$data['message']=DB::table('message')
		->where('channel',$channel->id)->paginate(10);
		return View::make('admin/message/messageList')->with($data);
	}
	public function replyMessage(){
		if($id=Request::input('reply',0)){
			$channel=DB::table('channel')->select('id')->where('symbol','message')->first();
			if(Request::method()=='POST'){
				$update=array();
				$update['reply']=Request::input('answer');
				$update['status']=1; //already reply
				DB::table('message')->where('id',$id)->update($update);
				return Redirect::to('admin/operate/succeed')->with(array('target'=>'admin/message/list',));
			}
			$data['message']=DB::table('message')
			->where('channel',$channel->id)->where('id',$id)->first();
			return View::make('admin/message/messageReply')->with($data);
		}
		App::abort('500','UNKNOWN ERROR');
	}
	
}
?>