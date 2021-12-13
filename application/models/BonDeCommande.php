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
    public function lastInserted(){
        $sql = "SELECT
                    bon.idBonDeCommande as idBonDeCommande,
                    frs.nom as nomFornisseur,
                    frs.nif as nif,
                    pro.label as label,
                    bon.quantite as quantite,
                    pro.prix as prixProformat,
                    bon.dateCommande as dateCommande,
                    bon.delaiLivraison as delaiLivraison
                from 
                    bondecommande bon,
                    proformat pro,
                    fournisseur frs
                where
                    bon.idProformat = pro.id 
                and
                    pro.idFournisseur = frs.idFournisseur
                and
                     id in (select max(id) from bonddecommande)";
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