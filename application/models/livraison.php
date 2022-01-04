<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class livraison extends CI_Model{

    public function insertLivraison($idBonDeCommande){
        $query = "insert into livraison values(null,now(),".$idBonDeCommande.")";
        $this->db->query($query);
    }
    
    public function getAllLivraison()
    {
        $retour = array();
        $sql = "select * from livraison";
        $query = $this->db->query($sql);
        $i = 0;
        foreach($query -> result_array() as $row)
        {
            $retour[$i] = $row;
            $i++;
        }
        return $retour;
    }

    public function getAllBonDeCommande()
    {
        $retour = array();
        $sql = "select  * from bonDeCommande where idBonDeCommande not in (select idBonDeCommande from livraison)";
        $query =$this->db->query($sql);
        $i = 0;
        foreach($query ->result_array() as $row)
        {
            $retour[$i]=$row;
            $i++;
        }
        return $retour;
    }

    public function getAllBonDeCommandeNonLivre()
    {
        $retour = array();
        $sql = "select  * from bonDeCommande where idBonDeCommande in (select idBonDeCommande from livraison)";
        $query =$this->db->query($sql);
        $i = 0;
        foreach($query ->result_array() as $row)
        {
            $retour[$i]=$row;
            $i++;
        }
        return $retour;
    }
}