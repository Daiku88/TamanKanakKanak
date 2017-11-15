<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Rekap extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
    	$data['masuk'] = $this->db->query("SELECT YEAR(p.tgl) AS tahun, COUNT(p.id) AS pemasukan, sum(p.jumlah) AS jumlah FROM pemasukkan p GROUP BY YEAR(p.tgl) order by YEAR(p.tgl) asc;");
    	$data['keluar'] = $this->db->query("SELECT YEAR(p.tgl) AS tahun, COUNT(p.id) AS pengeluaran, sum(p.jumlah) AS jumlah FROM pengeluaran p GROUP BY YEAR(p.tgl);");
        $this->templates->admin('keuangan/rekap/index', $data);
    }

    public function pemasukan_bulan($id = '')
    {
    	$data['masuk'] = $this->db->query("SELECT CONCAT(MONTH(p.tgl),'-',YEAR(p.tgl)) AS bulan, COUNT(p.id) AS pemasukan, pj.jns_pemasukan as jenis ,sum(p.jumlah) AS jumlah FROM pemasukkan p left join pemasukan_jns pj on p.jns_id=pj.id where pj.tahun_pemasukan = '$id' GROUP BY MONTH(p.tgl)");
    	$data['keluar'] = $this->db->query("SELECT CONCAT(MONTH(p.tgl),'-',YEAR(p.tgl)) AS bulan, COUNT(p.id) AS pengeluaran, pj.jns_pengeluaran as jenis ,sum(p.jumlah) AS jumlah FROM pengeluaran p left join pengeluaran_jns pj on p.jns_id=pj.id where pj.tahun_pengeluaran = '$id' GROUP BY MONTH(p.tgl);");
    	$data['jmlh_keluar'] = $this->db->query("SELECT sum(p.jumlah) as jumlah from pengeluaran p")->result_array();
    	$data['jmlh_masuk'] = $this->db->query("SELECT sum(p.jumlah) as jumlah from pemasukkan p")->result_array;
        $this->templates->admin('keuangan/rekap/masuk_bulan', $data);
    }

    // public function datatable()
    // {
    //     $this->load->library('datatables');

    //     /** query yang akan ditampilkan di table */
    //     $data_rekap = "SELECT YEAR(p.tgl) AS tahun, COUNT(p.id) AS pemasukan, sum(p.jumlah) AS jumlah FROM pemasukkan p GROUP BY YEAR(p.tgl);"
    //     $this->datatables->select($data_rekap)

    //     /** tambah kolom tombol detail, edit, hapus di table */
    //     $this->datatables->add_column('tombol', 
    //         '<a class="btn btn-mini" href="'.site_url('admin/rekap/detail_jenis').'/$1"><i class="fa fa-info"></i></a>
    //          <a class="btn btn-mini btn-primary" href="'.site_url('admin/rekap/add_jenis').'/$1"><i class="fa fa-edit"></i></a>
    //          <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/rekap/delete_jenis').'/$1"><i class="fa fa-trash"></i></a>', 'id');

    //     echo $this->datatables->generate();
    // }

    public function detail_pemasukan($id = '')
    {   
       $data['masuk'] = $this->db->query("select p.id as id, pj.jns_pemasukan as jenis,pj.tahun_pemasukan as tahun,p.jumlah as jmlh, k.kepala_kk as nama,p.asal_dana as asal, p.keterangan as ket, p.tgl as tgl from pemasukkan p left join pemasukan_jns pj on p.jns_id=pj.id left join kk k on p.penduduk_id=k.id where p.jns_id='$id'");
       $data['total'] = $this->db->query("select sum(p.jumlah) as tots from pengeluaran p where p.jns_id='$id'")->row_array();
;

        $this->templates->admin('keuangan/pemasukan_jenis/detail_pemasukan',$data);
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
        $this->templates->admin('keuangan/rekap/detail',$data);
    }


    /** TAMPILKAN DATA KE FORM */

    public function add($id = '')
    {   
        /** kembalikan data ke form jika edit, kosong jika tambah */
        $data = $this->db->get_where('pemasukkan',array('id'=>$id))->row_array();
        $data = get_lastdata($data);

        $data['list_jenis'] = $this->db->get('pemasukan_jns')->result();
        $data['list_pendudukan'] = $this->db->get('penduduk')->result();
        $this->templates->admin('keuangan/rekap/form',$data);
    }


    /** SIMPAN */

    public function save()
    {   
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->unique_reference('id', $id);
        $this->form_validation->set_rules('jns_id','jns_id','required');
        $this->form_validation->set_rules('penduduk_id', 'penduduk_id', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('esselon', 'esselon', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {   
            set_message('danger',first_error());
            set_lastdata($this->input->post());
            redirect('admin/rekap/add/'.$id);
        }
        else
        {
            $data = array(
                'jns_id' => $this->input->post('jns_id'),
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
                         ->update('pemasukan',$data);
            else:
                $this->db->insert('pemasukan',$data);
            endif;

            if ($this->db->affected_rows())
                set_message('success','Data berhasil disimpan.');

            redirect('admin/rekap');
        }
        
    }


    
    /** HAPUS */

    public function delete($id = '')
    {   
        $this->db->where(array('id'=>$id))->delete('pemasukan');
        
        if ($this->db->affected_rows())
            set_message('success','Data berhasil dihapus.');
        
        redirect('admin/rekap');
    }


}