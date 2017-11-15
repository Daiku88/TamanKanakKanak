<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Penegakan extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
        $this->templates->admin('penegakan/index');
    }

    public function datatable()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('p.id as id,jp.jenis as jenis, p.jumlah as jmlh')
                         ->from('penegakan p');
                         $this->datatables->join('jenis_aturan_penegakan as jp', 'p.jenis_aturan_penegakan_id=jp.id','left');
                         $this->datatables->join('aturan_penegakan as ap', 'jp.aturan_penegakan_id=ap.id','left');
                         $this->datatables->join('wilayah as w','ap.wilayah_id=w.id','left');
                         $this->datatables->where('wilayah_id', session('wilayah_id'));


        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol', 
            '<a class="btn btn-mini" href="'.site_url('admin/penegakan/detail').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/pegawai/add').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/pegawai/delete').'/$1"><i class="fa fa-trash"></i></a>', 'id');

        echo $this->datatables->generate();
    }

    public function datatable_aturan()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('ap.id as id, w.wilayah as wil, ap.aturan as atur')
                         ->from('aturan_penegakan as ap');
                         $this->datatables->join('wilayah as w', 'ap.wilayah_id=w.id','left');
                         $this->datatables->where('wilayah_id', session('wilayah_id'));


        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol2', 
            '<a class="btn btn-mini" href="'.site_url('admin/penegakan/detail_aturan').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/penegakan/add_aturan').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus2" href="'.site_url('admin/penegakan/delete_aturan').'/$1"><i class="fa fa-trash"></i></a>', 'id');

        echo $this->datatables->generate();
    }

    public function datatable_jenis()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('jp.id as id,ap.aturan as aturan, jp.jenis as jenis, jp.satuan as satuan, jp.instansi_terkait as instansi')
                         ->from('jenis_aturan_penegakan as jp');
                         $this->datatables->join('aturan_penegakan as ap', 'jp.aturan_penegakan_id=ap.id','left');
                         $this->datatables->join('wilayah as w', 'ap.wilayah_id=w.id','left');
                         $this->datatables->where('wilayah_id', session('wilayah_id'));


        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol2', 
            '<a class="btn btn-mini" href="'.site_url('admin/penegakan/detail_jenis').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/penegakan/add_jenis').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus2" href="'.site_url('admin/penegakan/delete_jenis').'/$1"><i class="fa fa-trash"></i></a>', 'id');

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

    public function add_aturan($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('aturan_penegakan',array('id'=>$id))->row_array();
        $data = get_lastdata($data);

        $data['list_wilayah'] = $this->db->get('wilayah')->result();
        $this->templates->admin('penegakan/form_aturan',$data);
    }

    public function add_jenis($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('jenis_aturan_penegakan',array('id'=>$id))->row_array();
        $data = get_lastdata($data);

        $data['list_aturan'] = $this->db->get('aturan_penegakan')->result();
        $this->templates->admin('penegakan/form_jenis',$data);
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

            redirect('admin/penegakan');
        }
        
    }

    public function save_aturan()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('aturan','aturan','required|is_unique[aturan_penegakan.aturan]');
 
        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/penegakan/add_aturan/'.$id);
        }
        else
        {
            $data = array(
                'wilayah_id' => session('wilayah_id'),
                'aturan' => $this->input->post('aturan'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('aturan_penegakan',$data);
            else:
                $this->db->insert('aturan_penegakan',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/penegakan');
        }
        
    }

    public function save_jenis()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('jenis','jenis','required|is_unique[jenis_aturan_penegakan.jenis]');
        $this->form_validation->set_rules('aturan_penegakan_id', 'aturan_penegakan_id', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('instansi_terkait', 'instansi_terkait', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/penegakan/add_jenis/'.$id);
        }
        else
        {
            $data = array(
                'aturan_penegakan_id' => $this->input->post('aturan_penegakan_id'),
                'jenis' => $this->input->post('jenis'),
                'satuan' => $this->input->post('satuan'),
                'instansi_terkait' => $this->input->post('instansi_terkait'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('jenis_aturan_penegakan',$data);
            else:
                $this->db->insert('jenis_aturan_penegakan',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/penegakan');
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

    public function delete_aturan($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('aturan_penegakan');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/penegakan');
    }

    public function delete_jenis($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('jenis_aturan_penegakan');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/penegakan');
    }


}