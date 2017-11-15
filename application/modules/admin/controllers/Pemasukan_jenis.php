<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Pemasukan_jenis extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
        $this->templates->admin('keuangan/pemasukan_jenis/index');
    }

    public function datatable()
    {
        $this->load->library('datatables');

        /** query yang akan ditampilkan di table */
        $this->datatables->select('pj.id as id, pj.jns_pemasukan as jenis, pj.tahun_pemasukan as tahun, count(p.jns_id) as jmlh, sum(p.jumlah) as dana')
                         ->from('pemasukkan as p');
                         $this->datatables->join('pemasukan_jns as pj', 'p.jns_id=pj.id','left');
                         $this->datatables->group_by('p.jns_id');


        /** tambah kolom tombol detail, edit, hapus di table */
        $this->datatables->add_column('tombol', 
            '<a class="btn btn-mini" href="'.site_url('admin/pemasukan_jenis/detail').'/$1"><i class="fa fa-info"></i></a>
             <a class="btn btn-mini btn-primary" href="'.site_url('admin/pemasukan_jenis/add').'/$1"><i class="fa fa-edit"></i></a>
             <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/pemasukan_jenis/delete').'/$1"><i class="fa fa-trash"></i></a>', 'id');

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
        $this->templates->admin('keuangan/pemasukan_jenis/detail',$data);
    }

    public function detail_pemasukan($id = '')
    {   
       $data['masuk'] = $this->db->query("select p.id as id, pj.jns_pemasukan as jenis,pj.tahun_pemasukan as tahun,p.jumlah as jmlh, k.kepala_kk as nama,p.asal_dana as asal, p.keterangan as ket, p.tgl as tgl from pemasukkan p left join pemasukan_jns pj on p.jns_id=pj.id left join kk k on p.penduduk_id=k.id where p.jns_id='$id'");
       $data['total'] = $this->db->query("select sum(p.jumlah) as tots from pengeluaran p where p.jns_id='$id'")->row_array();
;

        $this->templates->admin('keuangan/pemasukan_jenis/detail_pemasukan',$data);
    }


    /** TAMPILKAN DATA KE FORM */

    public function add($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('pemasukan_jns',array('id'=>$id))->row_array();
        $data = get_lastdata($data);
        $this->templates->admin('keuangan/pemasukan_jenis/form',$data);
    }

     

    /** SIMPAN */

    public function save()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('jns_pemasukan', 'jns_pemasukan', 'required');
        $this->form_validation->set_rules('tahun_pemasukan', 'tahun_pemasukan', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/pemasukan_jenis/add/'.$id);
        }
        else
        {
            $data = array(
                'jns_pemasukan' => $this->input->post('jns_pemasukan'),
                'tahun_pemasukan' => $this->input->post('tahun_pemasukan'),
                );

            if ($id):
                $this->db->where(array('id'=>$id))
                         ->update('pemasukan_jns',$data);
            else:
                $this->db->insert('pemasukan_jns',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/pemasukan_jenis');
        }
        
    }


    /** HAPUS */

    public function delete($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('pemasukan');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/pemasukan_jenis');
    }



}