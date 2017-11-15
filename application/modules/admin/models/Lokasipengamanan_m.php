<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Lokasipengamanan_m extends KodeAceh_Model {

    public function __construct() {
        parent::__construct();
    }

	    function getLokasipengamanan(){

		   $query = "SELECT w.wilayah as wil, lp.lokasi as lokasi, lp.id as id from lokasi_pengamanan lp left join wilayah w on lp.wilayah_id=w.id";
          return $this->db->query($query);
	 }

	 public function lokasi() {
	 		$id = 1;
	 	$query = "SELECT wilayah as wil from wilayah where id = $id";
          return $this->db->query($query);
	 }
	 public function save($data) {
	 	$this->db->insert('lokasi_pengamanan', $data);
	 	return $this->db->insert_id();
	 }


}
