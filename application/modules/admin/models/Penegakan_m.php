<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Penegakan_m extends KodeAceh_Model {

    public function __construct() {
        parent::__construct();
    }

    function wilayah(){
    	$id = 1;
    	$query1 = "SELECT wilayah as wil from wilayah where id = $id";
        return $this->db->query($query1);
    }

	   function getPenegakan(){
		 $query = "SELECT p.id as id, ap.aturan as atur, jp.jenis as jns,p.jumlah as jumlah,jp.satuan as satuan from penegakan p left join jenis_aturan_penegakan jp on p.jenis_aturan_penegakan_id=jp.id left join aturan_penegakan ap on jp.aturan_penegakan_id=ap.id left join wilayah w on ap.wilayah_id=w.id";
          return $this->db->query($query);
	 }

	 function jenis(){
	 	$query = "SELECT jp.id as id,ap.aturan as aturan, jp.jenis as jenis, jp.satuan as satuan, jp.instansi_terkait as instansi from jenis_aturan_penegakan jp left join aturan_penegakan ap on jp.aturan_penegakan_id=ap.id left join wilayah w on ap.wilayah_id=w.id";
	 	return $this->db->query($query);

	 }

	 function aturan() {
	 	 $query = "SELECT ap.id as id, w.wilayah as wil, ap.aturan as aturan from aturan_penegakan ap left join wilayah w on ap.wilayah_id=w.id";
	 	return $this->db->query($query);
	 }

	 function save($data) {
	 	$this->db->insert('aturan_penegakan', $data);
	 	return $this->db->insert_id();
	 }

	 function delete_aturan($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('aturan_penegakan');
    }



}
