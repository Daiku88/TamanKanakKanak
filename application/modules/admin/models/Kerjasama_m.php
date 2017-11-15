<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Kerjasama_m extends KodeAceh_Model { 
	protected $table_name = 'kerjasama_koordinasi';

	protected $primary_key = 'id';

    public function __construct() {
        parent::__construct();
    }

    function getKerjasama_koor(){
		  $this->db->select("*");
		  $this->db->from('kerjasama_koordinasi');
		  $this->db->where('jenis','1');
		  $this->db->order_by('mulai','asc');
		  $query = $this->db->get();
		  return $query->result();
	 }


}
