<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class DemandeGrouper extends CI_Model{

    public function insert($label,$quatite,$liste){
        $query = "insert into demandeGrouper values (null,'".$label."',".$quatite.")";
        $this->db->query($query);
        $valFinal = $this->getLastInsert();
        for($i=0;$i<count($liste);$i++){
            $query = "insert into detailDemandeGrouper values('".$valFinal."','".$liste[$i]."')";
            $this->db->query($query);
        }

        var_dump($valFinal);

    }

    public function getLastInsert()
	{
        $sql = "SELECT max(idDemandeGrouper) as maxi FROM demandeGrouper";
        $query = $this->db->query($sql);
        $val;
        foreach($query -> result_array() as $row)
        {
            $val = $row['maxi'];
        }
        return $val;
	}

    public function findDemandeGrouper()
	{
        $sql = "SELECT * FROM demandeGrouper";
        $query = $this->db->query($sql);
        $val;
        foreach($query -> result_array() as $row)
        {
            $val[] = $row;
        }
        return $val;
	}

    public function findOne($id)
	{
        $sql = "SELECT * FROM demandeGrouper where idDemandeGrouper = ".$id;
        $query = $this->db->query($sql);
        $val;
        foreach($query -> result_array() as $row)
        {
            $val[] = $row;
        }
        return $val;
	}


    


    // public function insert($label,$quatite,$unite,$idDepartement){
    //     $query = "insert into demande values (null,'".$label."',".$quatite.",'".$unite."','".$idDepartement."','envoye')";
	// 	$this->db->query($query);
    // }

    

    // public function find($idDemande)
	// {
    //     $sql = "SELECT * from demande where id = '".$idDemande."'";
    //     $query = $this->db->query($sql);
    //     $val = array();
    //     $i = 0;
    //     foreach($query -> result_array() as $row)
    //     {
    //         foreach($row as $key => $value)
    //         {
    //             $val[$i][$key] = $value;  
    //         }
    //         $i++;
    //     }
    //     return $val;
	// }

    // public function insertDemandeGrouper($label,$qtt){
    //     $query = "insert into demandeGrouper values (null,'".$label."',".$qtt.")";
	// 	$this->db->query($query);
    // }

    // public function findLastEntry (){
    //     $sql = "SELECT max(idDemandeGrouper) from demandeGrouper";
    //     $query = $this->db->query($sql);
    //     $val = array();
    //     $i = 0;
    //     foreach($query -> result_array() as $row)
    //     {
    //         foreach($row as $key => $value)
    //         {
    //             $val[$i][$key] = $value;  
    //         }
    //         $i++;
    //     }
    //     return $val;
    // }

    // public function insertDetailDemandeGrouper($label,$qtt){
    //     $query = "insert into detailDemandeGrouper values ('".$label."',".$qtt.")";
	// 	$this->db->query($query);
    // }

    

    // public function grouper($liste){
    //     $somme =0.0;
    //     $dem;
    //     $label;
    //     for($i =0 ;$i<count($liste);$i++){
    //         $dem[]=$this->find($liste[$i]);
    //         $somme+=$dem[$i][0]['quantite'];
    //         $label = $dem[$i][0]['label'];
    //     }

    //     // for($i=0$i<count($dem);)
    //     var_dump($somme);
    // }

    /*public function getMotifsDeductible()
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
    public function accepterDemande ($idDemande){
        $query = "update historiqueConge set etat=1 where id='".$idDemande."'";
		$this->db->query($query);
        return "Demande Acceptée";
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
    }*/
}