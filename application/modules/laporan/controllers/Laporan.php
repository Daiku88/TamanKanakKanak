<?php

class Laporan extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
    	redirect('admin');
    }

}