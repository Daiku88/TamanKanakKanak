<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Hubungan extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
        $this->templates->admin('master/hubungan/index');
    }

    public function datatable()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('id,hubungan')
                         ->from('hubungan');

        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol', 
            '<a class="btn btn-mini" href="'.site_url('admin/hubungan/detail').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/hubungan/add').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/hubungan/delete').'/$1"><i class="fa fa-trash"></i></a>', 'id');

        echo $this->datatables->generate();
    }



    /** DETAIL DATA */

    public function detail($id = '')
    {   
        $data = $this->db->get_where('hubungan',array('id'=>$id))->row_array();
        $this->templates->admin('master/hubungan/detail',$data);
    }




    /** TAMPILKAN DATA KE FORM */

    public function add($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('hubungan',array('id'=>$id))->row_array();
        $data = get_lastdata($data);

        $this->templates->admin('master/hubungan/form',$data);
    }


    /** SIMPAN */

    public function save()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('hubungan','hubungan','required|is_unique[hubungan.hubungan]');

        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/hubungan/add/'.$id);
        }
        else
        {
            $data = array(
                'hubungan' => $this->input->post('hubungan'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('hubungan',$data);
            else:
                $this->db->insert('hubungan',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/hubungan');
        }
        
    }


    /** HAPUS */

    public function delete($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('hubungan');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/hubungan');
    }


}