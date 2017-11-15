<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

Class Iuran extends KodeAceh_Controller {

    public function __construct()
    {
        parent::__construct();
    }





    /** 
      TAMPILKAN DATA KE TABLE 
    */
    public function index()
    {
    	$data['lapan'] = $this->db->query("SELECT DISTINCT k.id as kid, concat_ws('',b.blok,'/',k.no_rmh) as bloks,k.no_kk AS no_kk,k.kepala_kk as kepala,
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='1' AND YEAR(tgl)='2018') AS '1', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='2' AND YEAR(tgl)='2018') AS '2', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='3' AND YEAR(tgl)='2018') AS '3', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='4' AND YEAR(tgl)='2018') AS '4', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='5' AND YEAR(tgl)='2018') AS '5', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='6' AND YEAR(tgl)='2018') AS '6', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='7' AND YEAR(tgl)='2018') AS '7', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='8' AND YEAR(tgl)='2018') AS '8', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='9' AND YEAR(tgl)='2018') AS '9',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='10' AND YEAR(tgl)='2018') AS '10',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='11' AND YEAR(tgl)='2018') AS '11',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='12' AND YEAR(tgl)='2018') AS '12' 
FROM kk k left join blok b on k.blok_id=b.id order by concat_ws('',b.blok,'/',k.no_rmh) asc");

    	$data['tujuh'] = $this->db->query("SELECT DISTINCT k.id as kid, concat_ws('',b.blok,'/',k.no_rmh) as bloks,k.no_kk AS no_kk,k.kepala_kk as kepala, 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='1' AND YEAR(tgl)='2017') AS '1', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='2' AND YEAR(tgl)='2017') AS '2', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='3' AND YEAR(tgl)='2017') AS '3', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='4' AND YEAR(tgl)='2017') AS '4', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='5' AND YEAR(tgl)='2017') AS '5', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='6' AND YEAR(tgl)='2017') AS '6', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='7' AND YEAR(tgl)='2017') AS '7', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='8' AND YEAR(tgl)='2017') AS '8', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='9' AND YEAR(tgl)='2017') AS '9',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='10' AND YEAR(tgl)='2017') AS '10',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='11' AND YEAR(tgl)='2017') AS '11',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='12' AND YEAR(tgl)='2017') AS '12' 
FROM kk k left join blok b on k.blok_id=b.id order by concat_ws('',b.blok,'/',k.no_rmh) asc");

    	$data['enam'] = $this->db->query("SELECT DISTINCT k.id as kid, concat_ws('',b.blok,'/',k.no_rmh) as bloks,k.no_kk AS no_kk,k.kepala_kk as kepala,
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='1' AND YEAR(tgl)='2016') AS '1', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='2' AND YEAR(tgl)='2016') AS '2', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='3' AND YEAR(tgl)='2016') AS '3', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='4' AND YEAR(tgl)='2016') AS '4', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='5' AND YEAR(tgl)='2016') AS '5', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='6' AND YEAR(tgl)='2016') AS '6', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='7' AND YEAR(tgl)='2016') AS '7', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='8' AND YEAR(tgl)='2016') AS '8', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='9' AND YEAR(tgl)='2016') AS '9',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='10' AND YEAR(tgl)='2016') AS '10',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='11' AND YEAR(tgl)='2016') AS '11',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='12' AND YEAR(tgl)='2016') AS '12' 
FROM kk k left join blok b on k.blok_id=b.id order by concat_ws('',b.blok,'/',k.no_rmh) asc");

    	$data['keluar'] = $this->db->query("SELECT YEAR(p.tgl) AS tahun, COUNT(p.id) AS pengeluaran, sum(p.jumlah) AS jumlah FROM pengeluaran p GROUP BY YEAR(p.tgl);");
        $this->load->view('laporan_iuran', $data);
    }

    public function lapan()
    {
    	$data['lapan'] = $this->db->query("SELECT DISTINCT k.id as kid, concat_ws('',b.blok,'/',k.no_rmh) as bloks,k.no_kk AS no_kk,k.kepala_kk as kepala,
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='1' AND YEAR(tgl)='2018') AS '1', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='2' AND YEAR(tgl)='2018') AS '2', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='3' AND YEAR(tgl)='2018') AS '3', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='4' AND YEAR(tgl)='2018') AS '4', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='5' AND YEAR(tgl)='2018') AS '5', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='6' AND YEAR(tgl)='2018') AS '6', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='7' AND YEAR(tgl)='2018') AS '7', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='8' AND YEAR(tgl)='2018') AS '8', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='9' AND YEAR(tgl)='2018') AS '9',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='10' AND YEAR(tgl)='2018') AS '10',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='11' AND YEAR(tgl)='2018') AS '11',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='12' AND YEAR(tgl)='2018') AS '12' 
FROM kk k left join blok b on k.blok_id=b.id order by concat_ws('',b.blok,'/',k.no_rmh) asc");
        $this->load->view('lapan', $data);
    }

    public function tujuh()
    {
    	$data['tujuh'] = $this->db->query("SELECT DISTINCT k.id as kid, concat_ws('',b.blok,'/',k.no_rmh) as bloks,k.no_kk AS no_kk,k.kepala_kk as kepala,
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='1' AND YEAR(tgl)='2017') AS '1', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='2' AND YEAR(tgl)='2017') AS '2', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='3' AND YEAR(tgl)='2017') AS '3', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='4' AND YEAR(tgl)='2017') AS '4', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='5' AND YEAR(tgl)='2017') AS '5', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='6' AND YEAR(tgl)='2017') AS '6', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='7' AND YEAR(tgl)='2017') AS '7', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='8' AND YEAR(tgl)='2017') AS '8', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='9' AND YEAR(tgl)='2017') AS '9',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='10' AND YEAR(tgl)='2017') AS '10',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='11' AND YEAR(tgl)='2017') AS '11',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='12' AND YEAR(tgl)='2017') AS '12' 
FROM kk k left join blok b on k.blok_id=b.id order by concat_ws('',b.blok,'/',k.no_rmh) asc");
        $this->load->view('tujuh', $data);
    }

    public function enam()
    {
    	$data['enam'] = $this->db->query("SELECT DISTINCT k.id as kid, concat_ws('',b.blok,'/',k.no_rmh) as bloks,k.no_kk AS no_kk,k.kepala_kk as kepala,
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='1' AND YEAR(tgl)='2016') AS '1', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='2' AND YEAR(tgl)='2016') AS '2', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='3' AND YEAR(tgl)='2016') AS '3', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='4' AND YEAR(tgl)='2016') AS '4', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='5' AND YEAR(tgl)='2016') AS '5', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='6' AND YEAR(tgl)='2016') AS '6', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='7' AND YEAR(tgl)='2016') AS '7', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='8' AND YEAR(tgl)='2016') AS '8', 
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='9' AND YEAR(tgl)='2016') AS '9',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='10' AND YEAR(tgl)='2016') AS '10',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='11' AND YEAR(tgl)='2016') AS '11',
(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='12' AND YEAR(tgl)='2016') AS '12' 
FROM kk k left join blok b on k.blok_id=b.id order by concat_ws('',b.blok,'/',k.no_rmh) asc");
        $this->load->view('enam', $data);
    }

    public function enam_detail($id = '')
    {
    	$data['enam'] = $this->db->query("SELECT DISTINCT k.id as kid, concat_ws('',b.blok,'/',k.no_rmh) as bloks,k.no_kk AS no_kk,k.kepala_kk as kepala,
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='1' AND YEAR(tgl)='2018') AS '1', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='2' AND YEAR(tgl)='2018') AS '2', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='3' AND YEAR(tgl)='2018') AS '3', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='4' AND YEAR(tgl)='2018') AS '4', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='5' AND YEAR(tgl)='2018') AS '5', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='6' AND YEAR(tgl)='2018') AS '6', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='7' AND YEAR(tgl)='2018') AS '7', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='8' AND YEAR(tgl)='2018') AS '8', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='9' AND YEAR(tgl)='2018') AS '9',
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='10' AND YEAR(tgl)='2018') AS '10',
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='11' AND YEAR(tgl)='2018') AS '11',
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='12' AND YEAR(tgl)='2018') AS '12' 
			FROM kk k left join blok b on k.blok_id=b.id where k.id='$id' order by concat_ws('',b.blok,'/',k.no_rmh) asc");
        $this->load->view('enam', $data);

    }

    public function tujuh_detail($id = '')
    {
    	$data['enam'] = $this->db->query("SELECT DISTINCT k.id as kid, concat_ws('',b.blok,'/',k.no_rmh) as bloks,k.no_kk AS no_kk,k.kepala_kk as kepala,
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='1' AND YEAR(tgl)='2017') AS '1', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='2' AND YEAR(tgl)='2017') AS '2', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='3' AND YEAR(tgl)='2017') AS '3', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='4' AND YEAR(tgl)='2017') AS '4', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='5' AND YEAR(tgl)='2017') AS '5', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='6' AND YEAR(tgl)='2017') AS '6', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='7' AND YEAR(tgl)='2017') AS '7', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='8' AND YEAR(tgl)='2017') AS '8', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='9' AND YEAR(tgl)='2017') AS '9',
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='10' AND YEAR(tgl)='2017') AS '10',
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='11' AND YEAR(tgl)='2017') AS '11',
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='12' AND YEAR(tgl)='2017') AS '12' 
			FROM kk k left join blok b on k.blok_id=b.id where k.id='$id' order by concat_ws('',b.blok,'/',k.no_rmh) asc");
        $this->load->view('tujuh', $data);

    }

    public function lapan_detail($id = '')
    {
    	$data['enam'] = $this->db->query("SELECT DISTINCT k.id as kid, concat_ws('',b.blok,'/',k.no_rmh) as bloks,k.no_kk AS no_kk,k.kepala_kk as kepala,
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='1' AND YEAR(tgl)='2018') AS '1', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='2' AND YEAR(tgl)='2018') AS '2', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='3' AND YEAR(tgl)='2018') AS '3', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='4' AND YEAR(tgl)='2018') AS '4', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='5' AND YEAR(tgl)='2018') AS '5', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='6' AND YEAR(tgl)='2018') AS '6', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='7' AND YEAR(tgl)='2018') AS '7', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='8' AND YEAR(tgl)='2018') AS '8', 
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='9' AND YEAR(tgl)='2018') AS '9',
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='10' AND YEAR(tgl)='2018') AS '10',
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='11' AND YEAR(tgl)='2018') AS '11',
			(SELECT jumlah FROM pemasukkan WHERE penduduk_id=kid AND jns_id='2' AND MONTH(tgl)='12' AND YEAR(tgl)='2018') AS '12' 
			FROM kk k left join blok b on k.blok_id=b.id where k.id='$id' order by concat_ws('',b.blok,'/',k.no_rmh) asc");
        $this->load->view('lapan', $data);

    }

     public function laporan_lain()
    {
        $data['laporan'] = $this->db->query("SELECT mj.id as id,mj.jns_pemasukan as jns, mj.kode_pemasukan as kode from pemasukan_jns mj order by mj.id asc");
        $this->load->view('laporan_lain', $data);
    }

     public function laporan_all()
    {
        $data['laporan'] = $this->db->query("SELECT * from (select mj.jns_pemasukan as jns, pem.jumlah as jmlh, '' as jmlh_k, pem.tgl as tgl  from pemasukkan pem left join pemasukan_jns mj on pem.jns_id=mj.id where pem.jns_id!=2 union all select concat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',pen.keterangan) as jns, '' as jmlh, pen.jumlah as jmlh_k, pen.tgl as tgl from pengeluaran pen left join pengeluaran_jns kj on pen.jns_id=kj.id) as b order by b.tgl asc");
        $this->load->view('laporan_lain', $data);
    }

    public function laporan_lain_detail($id = '')
    {
        $data['head'] = $this->db->query("SELECT * from pemasukan_jns where id='$id'")->row_array();
        $data['laporan'] = $this->db->query("SELECT * from (select mj.id as id ,pem.asal_dana as jns, pem.jumlah as jmlh, '' as jmlh_k, pem.tgl as tgl  from pemasukkan pem left join pemasukan_jns mj on pem.jns_id=mj.id union all select pen.asal_dana as id, concat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',pen.keterangan) as jns, '' as jmlh, pen.jumlah as jmlh_k, pen.tgl as tgl from pengeluaran pen left join pengeluaran_jns kj on pen.jns_id=kj.id) as b where id='$id' order by b.tgl asc");
        $this->load->view('laporan_detail_lainnya', $data);
    }

}