<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class BonDeCommande extends CI_Model{

    public function insertProformat($dateValiditer,$label,$quantite,$prix,$idDemandeGrouper,$idFournisseur){
        $query = "insert into proformat values(null,'".$dateValiditer."','".$label."',".$quantite.",".$prix.",".$idFournisseur.",".$idDemandeGrouper.")";
        $this->db->query($query);
    }
    public function allProformat($idDemandeGroupe){
        $sql = "select * from proformat where idDemandeGrouper =".$idDemandeGroupe;
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

    public function insertBonCommande($idProformat,$quantite,$delaiLivraison){
        $query = "insert into bonDeCommande values (null,".$idProformat.",now(),".$quantite.",'".$delaiLivraison."')";
        $this->db->query($query);
    }
}