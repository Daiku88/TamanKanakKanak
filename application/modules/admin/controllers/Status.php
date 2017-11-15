<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Status extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
        $this->templates->admin('master/status/index');
    }

    public function datatable()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('id,status')
                         ->from('status');

        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol', 
            '<a class="btn btn-mini" href="'.site_url('admin/status/detail').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/status/add').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/status/delete').'/$1"><i class="fa fa-trash"></i></a>', 'id');

        echo $this->datatables->generate();
    }



    /** DETAIL DATA */

    public function detail($id = '')
    {   
        $data = $this->db->get_where('status',array('id'=>$id))->row_array();
        $this->templates->admin('master/status/detail',$data);
    }




    /** TAMPILKAN DATA KE FORM */

    public function add($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('status',array('id'=>$id))->row_array();
        $data = get_lastdata($data);

        $this->templates->admin('master/status/form',$data);
    }


    /** SIMPAN */

    public function save()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('status','status','required|is_unique[status.status]');

        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/status/add/'.$id);
        }
        else
        {
            $data = array(
                'status' => $this->input->post('status'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('status',$data);
            else:
                $this->db->insert('status',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/status');
        }
        
    }


    /** HAPUS */

    public function delete($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('status');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/status');
    }


}