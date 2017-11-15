<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Pengguna extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
        $this->templates->admin('pengguna/index');
    }

    public function datatable()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('p.id,username,level,last_login')
                         ->from('pengguna p');

        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol', 
            '<a class="btn btn-mini" href="'.site_url('admin/pengguna/detail').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/pengguna/add').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/pengguna/delete').'/$1"><i class="fa fa-trash"></i></a>', 'id');

        echo $this->datatables->generate();
    }



    /** DETAIL DATA */

    public function detail($id = '')
    {   
        $data = $this->db->select('*')
                         ->from('pengguna')
                         ->join('wilayah','pengguna.wilayah_id = wilayah.id','left')
                         ->where('pengguna.id',$id)
                         ->get()
                         ->row_array();
        $this->templates->admin('pengguna/detail',$data);
    }




    /** TAMPILKAN DATA KE FORM */

    public function add($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('pengguna',array('id'=>$id))->row_array();
        $data = get_lastdata($data);

        $data['pegawai'] = $this->db->get('pegawai')->result();
        $this->templates->admin('pengguna/form',$data);
    }






    /** SIMPAN */

    public function save()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('kepenggunaan','Kepenggunaan','required|is_unique[pengguna.kepenggunaan]');

        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/pengguna/add/'.$id);
        }
        else
        {
            $data = array(
                'kepenggunaan' => $this->input->post('kepenggunaan'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('pengguna',$data);
            else:
                $this->db->insert('pengguna',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/pengguna');
        }
        
    }





    /** HAPUS */

    public function delete($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('pengguna');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/pengguna');
    }


}