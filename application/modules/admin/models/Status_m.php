<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Status_m extends KodeAceh_Model {
	protected $table_name = 'status';

	protected $primary_key = 'id';

    public function __construct() {
        parent::__construct();
    }

	    function getStatus_m(){
		  $this->db->select("*");
		  $this->db->from('status');
		  $this->db->order_by('status', 'asc');
		  $query = $this->db->get();
		  return $query->result();
	 }

}
