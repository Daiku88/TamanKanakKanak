<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Pengurus extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
        $this->templates->admin('master/pengurus/index');
    }

    public function datatable()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('pr.id as id,p.nama as nama, pr.jabatan as jab, pr.tahun as tahun, b.blok as blokk,k.no_rmh as nom')
                         ->from('pengurus as pr');
                         $this->datatables->join('penduduk as p', 'pr.penduduk_id=p.id','left');
                         $this->datatables->join('kk as k', 'p.kk_id=k.id','left');
                         $this->datatables->join('blok b', 'k.blok_id=b.id','left');

        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol', 
            '<a class="btn btn-mini" href="'.site_url('admin/pengurus/detail').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/pengurus/add').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/pengurus/delete').'/$1"><i class="fa fa-trash"></i></a>', 'id');

        echo $this->datatables->generate();
    }



    /** DETAIL DATA */

    public function detail($id = '')
    {   
        $data = $this->db->select('pr.id as id,p.nama as nama, pr.jabatan as jab, pr.tahun as tahun, b.blok as blokk,k.no_rmh as nom')
                         ->from('pengurus as pr')
                         ->join('penduduk as p', 'pr.penduduk_id=p.id','left')
                         ->join('kk as k', 'p.kk_id=k.id','left')
                         ->join('blok as b', 'k.blok_id=b.id','left')
                         ->where('pr.id',$id)
                         ->get()
                         ->row_array();
        $this->templates->admin('master/pengurus/detail',$data);
    }




    /** TAMPILKAN DATA KE FORM */

    public function add($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('pengurus',array('id'=>$id))->row_array();
        $data = get_lastdata($data);

        $data['list_penduduk'] = $this->db->get('penduduk')->result();
        $this->templates->admin('master/pengurus/form',$data);
    }



    /** SIMPAN */

    public function save()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('pend','pend','required|is_unique[pengurus.penduduk_id]');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('tahun', 'tahun', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/pengurus/add/'.$id);
        }
        else
        {
            $data = array(
                'penduduk_id' => $this->input->post('pend'),
                'jabatan' => $this->input->post('jabatan'),
                'tahun' => $this->input->post('tahun'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('pengurus',$data);
            else:
                $this->db->insert('pengurus',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/pengurus');
        }
        
    }





    /** HAPUS */

    public function delete($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('pengurus');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/pengurus');
    }


}