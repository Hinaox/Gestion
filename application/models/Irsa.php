<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Irsa extends CI_Model{
	public function modifyIrsa($idTranche,$min,$max,$taux){
		$query = "UPDATE irsa set ";
		$already = false;
		if($min!=''){
			if($already == false){
				$query .= "montantMin=%d";
				$query = sprintf($query,$min);
				$already = true;
			}
			else{
				$query .= ",montantMin=%d";
				$query = sprintf($query,$min);
				$already = true;
			}
		}
		if($max!=''){
			if($already == false){
				$query .= "montantMax=%d";
				$query = sprintf($query,$max);
				$already = true;
			}
			else{
				$query .= ",montantMax=%d";
				$query = sprintf($query,$max);
				$already = true;
			}
		}
		if($taux!=''){
			if($already == false){
				$query .= "taux=%d";
				$query = sprintf($query,$taux);
				$already = true;
			}
			else{
				$query .= ",taux=%d";
				$query = sprintf($query,$taux);
				$already = true;
			}
		}
		$query .= " where idTranche=%d";
		$query = sprintf($query,$idTranche);

        // $query = "UPDATE irsa set montantMin=%d, montantMax=%d, taux=%d where idTranche=%d";
		// $query = sprintf($query,$idTranche,$min,$max,$taux);
		$this->db->query($query);
    }
	public function getIrsa()
	{
        $sql = "SELECT * FROM irsa";
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