<?php

class Pendidikan extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

       public function index() {
       	$data['lembaga'] = $this->db->query("select count(*) as hitung,w.id as id, w.wilayah as wil, w.instansi as ins from pegawai p left join golongan g on p.golongan_id=g.id left join `status` s on p.status_id=s.id left join pendidikan pd on p.pendidikan_id=pd.id left join wilayah w on p.wilayah_id=w.id group by w.instansi order by p.wilayah_id asc");
    	$data['pegawai'] = $this->db->query("select w.wilayah as wil, p.wilayah_id as wilid, w.instansi as ins , p.nama as nama, p.nip as nip, p.jabatan as jab from pegawai p left join golongan g on p.golongan_id=g.id left join `status` s on p.status_id=s.id left join pendidikan pd on p.pendidikan_id=pd.id left join wilayah w on p.wilayah_id=w.id order by p.wilayah_id asc");
         // $data['header'] = $sql->row_array();
        $ttd = $this->db->query("select w.wilayah as wil, w.instansi as ins ,g.pangkat as pangkat, p.nama as nama, p.nip as nip, p.jabatan as jab from pegawai p left join golongan g on p.golongan_id=g.id left join `status` s on p.status_id=s.id left join pendidikan pd on p.pendidikan_id=pd.id left join wilayah w on p.wilayah_id=w.id where p.is_pimpinan=1 order by p.wilayah_id asc");
         $data['ttd'] = $ttd->row_array();
        $this->templates->admin('kelembagaan/index',$data, $ttd);
    }


    function pdf(){
       $data['lembaga'] = $this->db->query("select count(*) as hitung,w.id as id, w.wilayah as wil, w.instansi as ins from pegawai p left join golongan g on p.golongan_id=g.id left join `status` s on p.status_id=s.id left join pendidikan pd on p.pendidikan_id=pd.id left join wilayah w on p.wilayah_id=w.id group by w.instansi order by p.wilayah_id asc");
    	$data['pegawai'] = $this->db->query("select w.wilayah as wil, p.wilayah_id as wilid, w.instansi as ins , p.nama as nama, p.nip as nip, p.jabatan as jab from pegawai p left join golongan g on p.golongan_id=g.id left join `status` s on p.status_id=s.id left join pendidikan pd on p.pendidikan_id=pd.id left join wilayah w on p.wilayah_id=w.id order by p.wilayah_id asc");
         // $data['header'] = $sql->row_array();
        $ttd = $this->db->query("select w.wilayah as wil, w.instansi as ins, g.pangkat as pangkat, p.nama as nama, p.nip as nip, p.jabatan as jab from pegawai p left join golongan g on p.golongan_id=g.id left join `status` s on p.status_id=s.id left join pendidikan pd on p.pendidikan_id=pd.id left join wilayah w on p.wilayah_id=w.id where p.is_pimpinan=1 and p.wilayah_id = 'session('wilayah_id')'");
         $data['ttd'] = $ttd->row_array();

        
         $a= $this->load->view('faktur/header','',TRUE);
         $b = $this->load->view('cetak/lembaga',$data,TRUE);
         $c = $this->load->view('faktur/footer','',TRUE);
         $kon =$a.$b.$c;
         kodeacehpdf($kon,'kelembagaan.pdf','P','A4');
        
    }

    public function excel(){
            $this->load->library("PHPExcel/PHPExcel");
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'Hello')
                                        ->setCellValue('B2', 'Ini')
                                        ->setCellValue('C1', 'Excel')
                                        ->setCellValue('D2', 'Pertamaku');
            $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="hasilExcel.xlsx"');
            $objWriter->save("php://output");
 
 }

}