<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Templates {

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function admin($page, $data = array()){
		$this->ci->load->view('header', $data);
		$this->ci->load->view($page, $data);
		$this->ci->load->view('footer', $data);
	}
}