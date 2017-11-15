<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Aset extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
        $this->templates->admin('master/aset/index');
    }

    public function datatable()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('id,nama,jumlah,satuan')
                         ->from('aset');

        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol', 
            '<a class="btn btn-mini" href="'.site_url('admin/aset/detail').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/aset/add').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/aset/delete').'/$1"><i class="fa fa-trash"></i></a>', 'id');

        echo $this->datatables->generate();
    }



    /** DETAIL DATA */

    public function detail($id = '')
    {   
        $data = $this->db->get_where('aset',array('id'=>$id))->row_array();
        $this->templates->admin('master/aset/detail',$data);
    }




    /** TAMPILKAN DATA KE FORM */

    public function add($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('aset',array('id'=>$id))->row_array();
        $data = get_lastdata($data);

        $this->templates->admin('master/aset/form',$data);
    }






    /** SIMPAN */

    public function save()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('jumlah','jumlah','required');
        $this->form_validation->set_rules('satuan','satuan','required');

        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/aset/add/'.$id);
        }
        else
        {
            $data = array(
                'nama' => $this->input->post('nama'),
                'jumlah' => $this->input->post('jumlah'),
                'satuan' => $this->input->post('satuan'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('aset',$data);
            else:
                $this->db->insert('aset',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/aset');
        }
        
    }





    /** HAPUS */

    public function delete($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('aset');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/aset');
    }


}