<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Conge extends CI_Model{
   
    public function getMotifsDeductible()
    {
        $sql = "SELECT * FROM motifConge where deductibilite='D'";
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
    public function getMotifsNonDeductible()
    {
        $sql = "SELECT * FROM motifConge where deductibilite='ND'";
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
    public function accepterND($idEmp,$idMotif,$dateDebut,$dateFin){
        $query = "insert into historiqueConge values (null,'".$idEmp."','".$idMotif."','".$dateDebut."','".$dateFin."',1)";
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
    public function controleDate($date1, $date2){
        $sql = "select controleDate('".$date1."','".$date2."') as control";
        $query = $this->db->query($sql);
        $val = null;
        $i = 0;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val = $value;  
            }
        }
        return $val;
    }
    public function nombreCongeParDepartement($idDepartement,$dateDebut){
        $sql = "select countCongeParDeptMoisAnnee(".$idDepartement.",'".$dateDebut."') as nb";
        $query = $this->db->query($sql);
        $val = null;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val = $value;  
            }
        }
        return $val;
        
    }
    public function accepterDemande ($idDemande,$dateDebut,$idDepartement,$conf){
        if ($conf != null){
            $query = "update historiqueConge set etat=1 where id='".$idDemande."'";
            $this->db->query($query);
            return "Demande Acceptée";  
        }

        if ($this->nombreCongeParDepartement($idDepartement,$dateDebut)>=3){
            return "Il y a déjà plus de 3 personnes en congé ce mois-ci dans cette département
            Voulez-vous vraiment confirmer cette demande? ";
        }else{
            $query = "update historiqueConge set etat=1 where id='".$idDemande."'";
            $this->db->query($query);
            return "Demande Acceptée";    
        }
        
    }
    public function refuserDemande ($idDemande){
        $query = "update historiqueConge set etat=-1 where id='".$idDemande."'";
		$this->db->query($query);
        return "Demande Refusée";
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
    public function heurePeutEtreRetireDuConge($heure, $idEmploye){
        $sql = "select diminuerConger(%d, %d) as retrait";
        $sql = sprintf($sql,$heure,$idEmploye);
        $query = $this->db->query($sql);
        $val = null;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val = $value;  
            }
        }
        return $val;
    }
    function getConger($idEmpl)
    {
        $sql ="select * from EmployeConge where idEmp=".$idEmpl;
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

    function getNbrCongerDeductible($idEmpl)
    {
        $sql ="select SUM(NbrHeure) from EmployeConge where idEmp=".$idEmpl." and deductibilite='oui' and  (select YEAR(dateDebut)) = (select YEAR(NOW()))";
        $query = $this->db->query($sql);
        $val = null;
        $i = 0;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val = $value;  
            }
        }
        return $val;
    }

    function getNbrCongerNDeductible($idEmpl)
    {
        $sql ="select SUM(NbrHeure) from EmployeConge where idEmp=".$idEmpl." and deductibilite='non' and  (select YEAR(dateDebut)) = (select YEAR(NOW()))";
        $query = $this->db->query($sql);
        $val = null;
        $i = 0;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val = $value;  
            }
        }
        return $val;
    }
}