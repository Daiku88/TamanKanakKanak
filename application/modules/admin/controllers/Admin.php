<?php

class Admin extends Admin_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['pem'] = $this->db->select('sum(p.jumlah) as masuk')
                         ->from('pemasukkan as p')
                         ->get()
                         ->row_array();
        $data['mas'] = $this->db->select('sum(p.jumlah) as keluar')
                         ->from('pengeluaran as p')
                         ->get()
                         ->row_array();
        $data['sisa'] = $this->db->select('sum(p.jumlah-peng.jumlah) as sisa')
                         ->from('pemasukkan as p')
                         ->from('pengeluaran as peng')
                         ->get()
                         ->row_array();                                  
        $data['kk'] = $this->db->select('count(k.id) as kks')
                         ->from('kk as k')
                         ->get()
                         ->row_array();
         $data['pend'] = $this->db->select('count(p.id) as pen')
                         ->from('penduduk as p')
                         ->get()
                         ->row_array();
                         // print_r($data); die();
        $this->templates->admin('dashboard', $data);
    }

    public function logout()
    {
    	$this->session->sess_destroy();
    	redirect('login');
    }

}
