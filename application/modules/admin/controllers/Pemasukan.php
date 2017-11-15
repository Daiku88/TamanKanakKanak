<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Pemasukan extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
        $this->templates->admin('keuangan/pemasukan/index');
    }

    public function datatable()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('p.id as id, pj.jns_pemasukan as jenis,pj.tahun_pemasukan as tahun, k.kepala_kk as pend, p.asal_dana as asal, p.jumlah as jmlh, p.keterangan as ket, p.tgl as tgl')
                         ->from('pemasukkan as p');
                         $this->datatables->join('pemasukan_jns as pj', 'p.jns_id=pj.id','left');
                         $this->datatables->join('kk as k', 'p.penduduk_id=k.id','left');

        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol', 
            '<a class="btn btn-mini" href="'.site_url('admin/pemasukan/detail').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/pemasukan/add').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/pemasukan/delete').'/$1"><i class="fa fa-trash"></i></a>', 'id');

        echo $this->datatables->generate();
    }

    /** DETAIL DATA */

    public function detail($id = '')
    {   
        $data = $this->db->select('p.*, g.golongan, s.status, pd.pendidikan, w.wilayah')
                         ->from('pemasukan as p')
                         ->join('golongan as g', 'p.golongan_id=g.id','left')
                         ->join('status as s', 'p.status_id=s.id','left')
                         ->join('pendidikan as pd','p.pendidikan_id=pd.id', 'left')
                         ->join('wilayah as w','p.wilayah_id=w.id','left')
                         ->where('p.id',$id)
                         ->where('p.wilayah_id',session('wilayah_id'))
                         ->get()
                         ->row_array();
        $this->templates->admin('keuangan/pemasukan/detail',$data);
    }


    /** TAMPILKAN DATA KE FORM */

    public function add($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('pemasukkan',array('id'=>$id))->row_array();
        $data = get_lastdata($data);

        $data['list_jenis'] = $this->db->get('pemasukan_jns')->result();
        $data['list_pendudukan'] = $this->db->get('kk')->result();
        $this->templates->admin('keuangan/pemasukan/form',$data);
    }


    /** SIMPAN */

    public function save()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('jns_id','jns_id','required');
        $this->form_validation->set_rules('penduduk_id','penduduk_id','required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/pemasukan/add/'.$id);
        }
        else
        {
            $data = array(
                'jns_id' => $this->input->post('jns_id'),
                'penduduk_id' => $this->input->post('penduduk_id'),
                'asal_dana' => $this->input->post('asal_dana'),
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan'),
                'tgl' => $this->input->post('tgl'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('pemasukkan',$data);
            else:
                $this->db->insert('pemasukkan',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/pemasukan');
        }
        
    }


    
    /** HAPUS */

    public function delete($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('pemasukkan');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/pemasukan');
    }


}