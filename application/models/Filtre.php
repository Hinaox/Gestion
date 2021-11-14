<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Filtre extends CI_Model{

	public  function getFiltre($matrimonial,$age,$distance,$titreLangue,$sexe,$nomPosteExperience,$titreDomaine,$titreDiplome,$titreGrade){
        $isFirst=0;
        $query = "select * from filtre_view ";
        if($matrimonial!="" || $age!="" || $distance!="" || $titreLangue!="" || $sexe!="" || $nomPosteExperience!="" || $titreDomaine!="" || $titreDiplome!="" || $titreGrade!=""){
                $query.=" where ";
        }
                if($matrimonial!=""){
                        if($isFirst!=0){
                                $query .= " AND ";
                        }
                        $query.="matrimonial='".$matrimonial."' ";
                        $isFirst=1;
                }
                if($age!=""){
                        if($isFirst!=0){
                                $query .= " AND ";
                        }
                        $query.="age>=".$age." ";
                        $isFirst=1;
                }
                if($distance!=""){
                        if($isFirst!=0){
                                $query .= " AND ";
                        }
                        $query.="distance>=".$distance."";
                        $isFirst=1;
                }
                if($titreLangue!=""){
                        if($isFirst!=0){
                                $query .= " AND ";
                        }
                        $query.="titreLangue='".$titreLangue."'";
                        $isFirst=1;
                }
                if($sexe!=""){

                        if($isFirst!=0){
                                $query .= " AND ";
                        }
                        $query.="sexe='".$sexe."'  ";
                        $isFirst=1;
                }
                if($nomPosteExperience!=""){
                        if($isFirst!=0){
                                $query .= " AND ";
                        }
                        $query.="nomPosteExperience='".$nomPosteExperience."' ";
                        $isFirst=1;
                }
                if($titreDomaine!=""){
                        if($isFirst!=0){
                                $query .= " AND ";
                        }
                        $query.="titreDomaine='".$titreDomaine."' ";
                        $isFirst=1;
                }
                if($titreDiplome!=""){
                        if($isFirst!=0){
                                $query .= " AND ";
                        }
                        $query.="titreDiplome='".$titreDiplome."'";
                        $isFirst=1;
                } 
                if($titreGrade!=""){
                        if($isFirst!=0){
                                $query .= " AND ";
                        }
                        $query.="titreGrade='".$titreGrade."'";
                        $isFirst=1;
                }   

        echo $query;

        $result = $this->db->query($query);
        $filtre = array();
        foreach ($result->result_array() as $key) {
            $filtre[] = $key;
        }
        return $filtre;
    }
}               