<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class modifierSal extends CI_Model{
	public function modifierSalaire($idEmploye,$montant){
		$query = "insert into salaire values (null,".$idEmploye.",".$montant.",now())";
		$this->db->query($query);
    }
	public function getEmploye($idEmploye)
	{
        $sql = "SELECT * FROM employe_view where idEmploye=".$idEmploye;
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
    public function getSalaire($idEmploye){
        $sql = "SELECT * FROM salaire where idEmploye=".$idEmploye." order by idSalaire desc limit 1";
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