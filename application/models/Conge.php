<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Conge extends CI_Model{
   
    public function getMotifs()
    {
        $sql = "SELECT * FROM motifConge";
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
    public function sendDemande($idEmp,$idMotif,$dateDebut,$dateFin){
        $query = "insert into historiqueConge values (null,'".$idEmp."','".$idMotif."','".$dateDebut."','".$dateFin."',0)";
		$this->db->query($query);
    }
    public function getDemandeEnCours(){
        $sql = "SELECT * FROM demandeEnCours order by dateDebut ASC";
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
    public function accepterDemande ($idDemande){
        $query = "update historiqueConge set etat=1 where id='".$idDemande."'";
		$this->db->query($query);
    }
    public function refuserDemande ($idDemande){
        $query = "update historiqueConge set etat=-1 where id='".$idDemande."'";
		$this->db->query($query);
    }
    public function getEtatConge(){
        $sql = "SELECT * FROM etatConge";
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