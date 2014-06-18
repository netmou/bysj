<?php
class UploadController extends BaseController{
	
	public function picture(){
		if (Input::hasFile('imgFile')){
		    $file = Input::file('imgFile');
		    if ($file->getError() != UPLOAD_ERR_OK) {
		        return Response::json(array('error' => 1, 'message' => 'error with upload'));
		    }
		    $path = Config::get('system.upload') . date('Y/m/d/');
		    if (!file_exists($path)) {
		        mkdir($path, 0666, true);
		    }
		    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
		    $file->move($path, $filename);
		    $file_url=URL::to($path.'/'.$filename);
			return Response::json(array('error' => 0, 'url' =>$file_url));
		}
		return Response::json(array('error' => 1, 'message' => 'nothing need upload'));
	}
}
?>