<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Employe extends CI_Model{
	public function getEmployes()
	{
        $sql = "SELECT * FROM employe";
        $query = $this->db->query($sql);
        $val = array();
        $i = 0;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val[$i][$key] = $value;  
            }
            $i++;
        }
        return $val;
	}
}