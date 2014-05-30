<?php

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function __construct() {
        if (Request::segment(1) == 'admin') {
            if (!$user = Session::get('user', null)) {
                $url = URL::to('admin/login');
                header('Location: ' . $url);
                exit;
            }
            $info = DB::table('user')->select('role')->where('name', $user)->first();
            $role = unserialize(stripslashes($info->role));
            $jump = true;
            $module = Request::segment(2, 'system');
            foreach ($role as $id) {
                
                $right = DB::table('role')->select('rights')->where('id', $id)->first();
                if ($module=='operate'||$right->rights == 'all' || false !== stripos($right->rights, $module)) {
                    $jump = false;
                    break;
                }
            }
            if ($jump) {
                $right = DB::table('role')->select('rights')->where('id', $role[0])->first();
                $rights = explode("|", $right->rights);
                $url = URL::to('admin/' . $rights[0]);
                header('Location: ' . $url);
                exit;
            }
        } 
    }

}
