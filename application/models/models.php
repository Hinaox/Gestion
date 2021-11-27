<?php if(! defined('BASEPATH')) exit('NO direct script access allowed');
class Models extends CI_Model
{


    public function getListeAchat($caisse){
		$sql = "SELECT *  FROM v_achat where idCaisse=%d";
		$sql = sprintf($sql,$this->db->escape($caisse));
		$query = $this->db->query($sql);
		$listeAchat = array();
		foreach($query->result_array() as $row) {
			$achat = array();
			foreach($row as $key => $value){
				$achat[$key] = $value;
			}
			$listeAchat[] = $achat;
		}
		return $listeAchat;
	}
	
	

}?>