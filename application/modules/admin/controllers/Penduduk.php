<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Penduduk extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
    	 $data['kartu'] = $this->db->query("select k.id as id, k.no_kk as no_kk, k.kepala_kk as k_kk,concat_ws('',b.blok,'/',k.no_rmh) as alamat,count(p.id) as pend,jt.jenis_tinggal as tinggal from kk k left join blok b on k.blok_id=b.id left join jns_tinggal jt on k.jns_tinggal=jt.id left join penduduk p on k.id=p.kk_id group by k.id");
    	$data['penduduk'] = $this->db->query("select p.id as id, p.kk_id as idkk,k.no_kk as nokk, jt.jenis_tinggal as tinggal, p.nik as nik, p.nama as nama, p.jk as jk,a.agama as agamas, concat_ws('', b.blok, '/',k.no_rmh) as alamat, p.pekerjaan as kerja, pd.pendi as pend from penduduk p left join agama a on p.agama_id=a.id left join pendidikan pd on p.pendidikan_id=pd.id left join kk k on p.kk_id=k.id left join jns_tinggal jt on k.jns_tinggal=jt.id left join blok b on k.blok_id=b.id order by concat_ws('', b.blok, '/',k.no_rmh) asc");
         // $data['header'] = $sql->row_array();
        $this->templates->admin('penduduk/index',$data);
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
        $this->templates->admin('penduduk/detail',$data);
    }


    public function detail_kk($id = '')
    {   
        $data = $this->db->select('*, k.id as id')
                         ->from('kk as k')
                         ->join('blok as b', 'k.blok_id=b.id','left')
                         ->join('jns_tinggal as j', 'k.jns_tinggal=j.id','left')
                         ->where('k.id',$id)
                         ->get()
                         ->row_array();
        $this->templates->admin('penduduk/detail_kk',$data);
        
       

        
    }

    public function detail_penduduk($id ='')
    {
        
        $data = $this->db->select('*, p.id as id')
                         ->from('penduduk as p')
                         ->join('kk as k', 'p.kk_id=k.id','left')
                         ->join('blok as b', 'k.blok_id=b.id','left')
                         ->join('status as s', 'p.status_id=s.id','left')
                         ->join('hubungan as h', 'p.hubungan_id=h.id','left')
                         ->where('p.id',$id)
                         ->get()
                         ->row_array();

        $this->templates->admin('penduduk/detail_penduduk',$data);
    }

    /** TAMPILKAN DATA KE FORM */

    public function add($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('penduduk',array('id'=>$id))->row_array();
        $data = get_lastdata($data);
        $data['list_kk'] = $this->db->get('kk')->result();
        $data['list_status'] = $this->db->get('status')->result();
        $data['list_hubungan'] = $this->db->get('hubungan')->result();
        $data['list_agama'] = $this->db->get('agama')->result();
        $data['list_pendidikan'] = $this->db->get('pendidikan')->result();
        $this->templates->admin('penduduk/form',$data);
    }

    public function add_kk($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('kk',array('id'=>$id))->row_array();
        $data = get_lastdata($data);
        $data['list_tinggal'] = $this->db->get('jns_tinggal')->result();
        $data['list_blok'] = $this->db->get('blok')->result();
        $this->templates->admin('penduduk/form_kk',$data);
    }



    /** SIMPAN */

    public function save_kk()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('no_kk','no_kk','required|is_unique[kk.no_kk]');
        $this->form_validation->set_rules('alamat_kk', 'alamat_kk', 'required');
        $this->form_validation->set_rules('kepala_kk', 'kepala_kk', 'required');
        $this->form_validation->set_rules('jmlh_anggota', 'jmlh_anggota', 'required');
        $this->form_validation->set_rules('jns_tinggal', 'jns_tinggal', 'required');
        $this->form_validation->set_rules('blok_id', 'blok_id', 'required');
        $this->form_validation->set_rules('no_rmh', 'no_rmh', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/penduduk/add/'.$id);
        }
        else
        {
            $data = array(
                'no_kk' => $this->input->post('no_kk'),
                'alamat_kk' => $this->input->post('alamat_kk'),
                'kepala_kk' => $this->input->post('kepala_kk'),
                'jmlh_anggota' => $this->input->post('jmlh_anggota'),
                'jns_tinggal' => $this->input->post('jns_tinggal'),
                'jns_tinggal' => $this->input->post('jns_tinggal'),
                'blok_id' => $this->input->post('blok_id'),
                'no_rmh' => $this->input->post('no_rmh'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('kk',$data);
            else:
                $this->db->insert('kk',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data KK berhasil disimpan.');

            redirect('admin/penduduk');
        }
        
    }

    public function save_penduduk()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('kk_id','kk_id','required');
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
        $this->form_validation->set_rules('status_id', 'status_id', 'required');
        $this->form_validation->set_rules('hubungan_id', 'hubungan_id', 'required');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
        $this->form_validation->set_rules('agama_id', 'agama_id', 'required');
        $this->form_validation->set_rules('pendidikan_id', 'pendidikan_id', 'required');
        $this->form_validation->set_rules('alamat_ktp', 'alamat_ktp', 'required');

        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/penduduk/add/'.$id);
        }
        else
        {
            $data = array(
                'kk_id' => $this->input->post('kk_id'),
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'status_id' => $this->input->post('status_id'),
                'hubungan_id' => $this->input->post('hubungan_id'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'agama_id' => $this->input->post('agama_id'),
                'pendidikan_id' => $this->input->post('pendidikan_id'),
                'alamat_ktp' => $this->input->post('alamat_ktp'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('penduduk',$data);
            else:
                $this->db->insert('penduduk',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/penduduk');
        }
        
    }





    /** HAPUS */

    public function delete_kk($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('kk');
        $this->db->where(array('kk_id'=>$id))->delete('penduduk');

        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/penduduk');
    }

    public function delete_penduduk($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('penduduk');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/penduduk');
    }


}