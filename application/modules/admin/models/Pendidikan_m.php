<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Pendidikan_m extends KodeAceh_Model {
	protected $table_name = 'pendidikan';

	protected $primary_key = 'id';

    public function __construct() {
        parent::__construct();
    }

	    function getPendidikan_m(){
		  $this->db->select("*");
		  $this->db->from('pendidikan');
		  $this->db->order_by('pendidikan', 'asc');
		  $query = $this->db->get();
		  return $query->result();
	 }

}
