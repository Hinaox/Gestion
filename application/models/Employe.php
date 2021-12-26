<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Employe extends CI_Model{
    public function checkLogin($email, $mdp){
        $sql="SELECT e.*, c.email, c.autre FROM employe_view e 
        JOIN employe p ON p.idEmploye=e.idEmploye
        JOIN contact c on c.idContact=e.idContact WHERE c.email='%s' AND p.mdp=sha1('%s')";
        $sql=sprintf($sql,$email,$mdp);
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
        var_dump($sql);
        return $val;
    }
    public function isInRH($idEmp){
        $sql="SELECT count(*) FROM employe e join poste p on e.idPoste=p.idPoste
            WHERE e.idEmploye='%s' AND p.idDepartement='2' ";
        $sql=sprintf($sql,$idEmp);
        $query = $this->db->query($sql);
        $val = 0;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val = $value;  
            }
        }
        if ($val>0){
            return true;
        }
        return false;
    }
	public function getEmployes1()
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

  public function getEmployeFromBase ($bdd ,$matricule = 0, $nom = null, $prenom = null, $departement = 0, $poste = 0) {
    $retour = array();
    $requete = ("select * from employe_view where 1<2 ");
    if ($matricule > 0) {
        $requete = $requete." and idEmploye=".$matricule;
    }
    if ($nom != null && strlen($nom) > 0) {
        $requete = $requete." and nom like '%".$nom."%'";
    }
    if ($prenom != null && strlen($prenom) > 0) {
        $requete = $requete." and prenom like '%".$prenom."%'";
    }
    if ($departement > 0) {
        $requete = $requete." and idDepartement=".$departement;
    }
    if ($poste > 0) {
        $requete = $requete." and idPoste=".$poste;
    }
    
    $query  = $bdd->query($requete);
    foreach($query->result_array() as $row) {
        array_push($retour, $row);
    }

    return $retour;
  }

  public function getEmployes ($db, $nom_prenom = null, $department = 0) {
    $retour = array();
    $requete = "select * from employe_view where 1<2";

    if ($nom_prenom != null & strlen($nom_prenom)>0) {
        $requete .= " and ( nom like '%".$nom_prenom."%' or prenom like '%".$nom_prenom."%' )";
    }
    if ($department > 0) {
        $requete .= " and idDepartement=".$department;
    }
    $stmt = $db -> query($requete);
    foreach($stmt -> result_array() as $row) {
        array_push($retour, $row);
    }
    return $retour;
  }
  public function getFicheEmploye($id){
    $sql="SELECT e.*, c.email, c.autre FROM employe_view e 
    JOIN employe p ON p.idEmploye=e.idEmploye
    JOIN contact c on c.idContact=e.idContact WHERE e.idEmploye='%s'";
    $sql=sprintf($sql,$id);
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
   public function getEmploye($id){
     $query = "select * from employe_view where idEmploye= %s";
     $query = sprintf($query,$id);
     $result = $this->db->query($query)->row_array();
     //$query->freeResult();
     return $result;
   }
}
?>
