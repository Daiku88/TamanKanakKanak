<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Admin_Controller extends KodeAceh_Controller {

    public function __construct() {
        parent::__construct();

        $id = session('id');

    	if(empty($id)){
    		redirect('login');
    	}
    }
}