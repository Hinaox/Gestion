<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Proformat extends CI_Model{

    public function insertProformat($dateValiditer,$label,$quantite,$prix,$idDemandeGrouper,$idFournisseur){
        $query = "insert into proformat values(null,'".$dateValiditer."','".$label."',".$quantite.",".$prix.",".$idFournisseur.",".$idDemandeGrouper.")";
        $this->db->query($query);
    }
    public function findProformat($idProformat){
        $sql = "SELECT pro.dateValidite as dateValidite,
            pro.id as idProformat,
            pro.label as labelProformat,
            pro.quantité as quantitePro,
            pro.prix as prix,
            fou.*,
            dem.quantite as quantite,
            dem.label as  label 
            from proformat pro,
                fournisseur fou, 
                demandeGrouper dem 
            where pro.idFournisseur=fou.idFournisseur 
                and dem.idDemandeGrouper = pro.idDemandeGrouper 
                and pro.id =".$idProformat;
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
}