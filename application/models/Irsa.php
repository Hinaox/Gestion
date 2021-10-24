<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Irsa extends CI_Model{
	public function modifyIrsa($idTranche,$min,$max,$taux){
        $query = "UPDATE irsa set montantMin=%d, montantMax=%d, taux=%d where idTranche=%d";
		$query = sprintf($query,$idTranche);
		$this->db->query($query);
    }
}