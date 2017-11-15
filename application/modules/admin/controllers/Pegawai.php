<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Pegawai extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
        $this->templates->admin('pegawai/index');
    }

    public function datatable()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('p.id as id,p.nip as nip, p.nama as nama, p.jabatan as jabatan, g.golongan_ruang as gol, s.status as stat, pd.pendidikan as pend, w.wilayah as wil')
                         ->from('pegawai as p');
                         $this->datatables->join('golongan as g', 'p.golongan_id=g.id','left');
                         $this->datatables->join('status as s', 'p.status_id=s.id','left');
                         $this->datatables->join('pendidikan as pd','p.pendidikan_id=pd.id', 'left');
                         $this->datatables->join('wilayah as w','p.wilayah_id=w.id','left');
                         $this->datatables->where('wilayah_id', session('wilayah_id'));


        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol', 
            '<a class="btn btn-mini" href="'.site_url('admin/pegawai/detail').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/pegawai/add').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/pegawai/delete').'/$1"><i class="fa fa-trash"></i></a>', 'id');

        echo $this->datatables->generate();
    }



    /** DETAIL DATA */

    public function detail($id = '')
    {   
        $data = $this->db->select('p.*, g.golongan, s.status, pd.pendidikan, w.wilayah')
                         ->from('pegawai as p')
                         ->join('golongan as g', 'p.golongan_id=g.id','left')
                         ->join('status as s', 'p.status_id=s.id','left')
                         ->join('pendidikan as pd','p.pendidikan_id=pd.id', 'left')
                         ->join('wilayah as w','p.wilayah_id=w.id','left')
                         ->where('p.id',$id)
                         ->where('p.wilayah_id',session('wilayah_id'))
                         ->get()
                         ->row_array();
        $this->templates->admin('pegawai/detail',$data);
    }




    /** TAMPILKAN DATA KE FORM */

    public function add($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('pegawai',array('id'=>$id))->row_array();
        $data = get_lastdata($data);

        $data['list_golongan'] = $this->db->get('golongan')->result();
        $data['list_status'] = $this->db->get('status')->result();
        $data['list_pendidikan'] = $this->db->get('pendidikan')->result();
        $data['list_wilayah'] = $this->db->get('wilayah')->result();
        $this->templates->admin('pegawai/form',$data);
    }



    /** SIMPAN */

    public function save()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('nip','nip','required|is_unique[pegawai.nip]');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('gol', 'gol', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('esselon', 'esselon', 'required');
        $this->form_validation->set_rules('pimpinan', 'pimpinan', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/pegawai/add/'.$id);
        }
        else
        {
            $data = array(
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'golongan_id' => $this->input->post('gol'),
                'status_id' => $this->input->post('status'),
                'pendidikan_id' => $this->input->post('pend'),
                'wilayah_id' => session('wilayah_id'),
                'is_eselon' => $this->input->post('esselon'),
                'is_pimpinan' => $this->input->post('pimpinan'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('pegawai',$data);
            else:
                $this->db->insert('pegawai',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/pegawai');
        }
        
    }





    /** HAPUS */

    public function delete($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('pegawai');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/pegawai');
    }


}