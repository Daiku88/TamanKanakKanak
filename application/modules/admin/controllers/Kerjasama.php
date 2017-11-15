<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerjasama extends Admin_Controller {

	function __construct() {
        parent::__construct();

        $this->load->model(array('admin/kerjasama_m'));
        $this->load->database();

    }

	public function index()
	{
		$query = $this->kerjasama_m->getKerjasama_koor();
        $data['conf'] = null;
        if($query){
           $data['conf'] =  $query;
          }
		$this->templates->admin('kerjasama/daf_kerjasama', $data);
	}

	public function create() {
        if ($this->input->post()) {
            $data['dengan'] = $this->input->post('dengan');
            $data['bidang'] = $this->input->post('bidang');
            $data['mulai'] = $this->input->post('mulai');
            $data['akhir'] = $this->input->post('akhir');
            $data['masih_berlangsung'] = $this->input->post('masih_berlangsung');
            $data['wilayah_id'] = '1';
            $this->kerjasama_m->insert($data);
            redirect('/admin/kerjasama', 'refresh');
        }
        $data = array();
        $this->templates->admin('kerjasama/kerjasama_add', $data);
    }


    public function edit($id) {
        if ($this->input->post()) {
            $data['dengan'] = $this->input->post('dengan');
            $data['bidang'] = $this->input->post('bidang');
            $data['mulai'] = $this->input->post('mulai');
            $data['akhir'] = $this->input->post('akhir');
            $data['masih_berlangsung'] = $this->input->post('masih_berlangsung');
            $data['wilayah_id'] = '1';

            $this->brand->update($data, $id);

            redirect('/admin/kerjasama', 'refresh');
        }

        $kerjasama = $this->kerjasama_m->get($id);

        $data['dengan'] = $dengan;
        $data['bidang'] = $bidang;
        $data['mulai'] = $mulai;
        $data['akhir'] = $akhir;
        $data['masih_berlangsung'] = '1';
        $data['wilayah_id'] = '1';

        $this->templates->admin('kerjasama/kerjasama_edit', $data);

    }
    
    public function delete($id){
        $this->kerjasama_m->delete($id);
        
        redirect('/admin/kerjasama', 'refresh');
    }

}

	