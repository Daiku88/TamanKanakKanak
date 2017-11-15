<?php

class Lokasipengamanan extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/lokasipengamanan_m','lokasipengamanan');
        $this->load->database();

    }

    public function index() {
        $query = $this->lokasipengamanan->getLokasipengamanan();
          $data['conf'] = null;
          if($query){
           $data['conf'] =  $query;
          }
        $this->templates->admin('pengamanan/lokasi/daf_lokasipengamanan', $data);
    }

   public function create() {
        if ($this->input->post()) {
            $data['wilayah_id'] = 1;
            $data['lokasi'] = $this->input->post('lokasi');
            $this->lokasipengamanan->save($data);
            redirect('admin/lokasipengamanan');
    }
        $data['lokasi'] = $this->lokasipengamanan->lokasi();

        $this->templates->admin('pengamanan/lokasi/lkspengamanan_add', $data);
    }


    public function edit($id) {
        if ($this->input->post()) {
            $data['kediklatan'] = $this->input->post('kediklatan');
            $this->brand->update($data, $id);

            redirect('/admin/diklats', 'refresh');
        }

        $lokasipengamanann = $this->lokasipengamanan->get($id);
        $data['diklat'] = $diklat;
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "master/diklat/diklat_edit";
        $this->load->view($this->_container, $data);
    }
    
    public function delete($id){
        $this->lokasipengamanan->delete($id);
        
        redirect('/admin/lokasipengamanan');
    }
}
