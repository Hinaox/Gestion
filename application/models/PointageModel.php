<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class PointageModel extends CI_Model{
	public function enregistrerPointage($idEmploye,$choix){
        $query = null;
        if($choix == 1){
            $query = "insert into pointage values (null,".$idEmploye.",now(), null)";
        }else{
            $query = "update pointage set datefin=now() where dateFin is NULL and datedebut is not NULL and idEmploye=".$idEmploye;
        } 
		$ret=$this->db->query($query);
        var_dump($query);
    }
	public function getEmploye($idEmploye)
	{
        if($idEmploye != ""){
            $sql = "SELECT * FROM employe_view where idEmploye=".$idEmploye;
            $query = $this->db->query($sql);
            $row = $query->row();
            return count($row); 
        }
        return 0;
	}
    public function DejaPointage($idEmploye){
        $sql = null;  
        $sql = "SELECT * FROM pointage where idEmploye = ".$idEmploye." and datefin is NULL";  
        $query = $this->db->query($sql);
        $row = $query->row();
        return count($row);     
    }
    
}