<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KodeAceh_Form_validation extends CI_Form_validation {

    #referensi saat cek unik
    private $unique_primary;
    private $unique_value;

    public function unique_reference($primary, $value)
    {
        $this->unique_primary = $primary;
        $this->unique_value = $value;
    }

    public function is_unique($str, $field)
    {
        sscanf($field, '%[^.].%[^.]', $table, $field);

        if (!empty($this->unique_primary) && !empty($this->unique_value))
        {
            return isset($this->CI->db)
                ? ($this->CI->db->limit(1)->get_where($table, 
                    "$field = '$str' AND ".$this->unique_primary." != '".$this->unique_value."'")->num_rows() === 0)
                : FALSE;
        }
        else{
            return isset($this->CI->db)
                ? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() === 0)
                : FALSE;
        }

    }
    
    public function first_error() 
    {   
        foreach($this->_error_array as $v)
        {   
            return $v;
        }
    }

}