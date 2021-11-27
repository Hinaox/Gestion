<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Filtre extends CI_Model{

	public  function getFiltre($matrimonial,$age,$distance,$titreLangue,$sexe,$nomPosteExperience,$titreDomaine,$titreDiplome,$titreGrade){
        $isFirst=0;
        $query = "select idPersonne,nomPersonne,age,sexe,distance,matrimonial,titrediplome,titregrade,titredomaine,
                        CONCAT(
                        (IF(idPersonne in (select idPersonne from filtre_view where nomposteexperience='caissier'),'Caissier','')),',',
                        (IF(idPersonne in (select idPersonne from filtre_view where nomposteexperience='Comptable'),'Comptable','')),',',
                        (IF(idPersonne in (select idPersonne from filtre_view where nomposteexperience='infirmiere'),'Infirmiere','')),',',
                        (IF(idPersonne in (select idPersonne from filtre_view where nomposteexperience='responsable marketing'),' Responsable marketing','')) 
                        ) as nomPosteExperience,
                        dateentreexperience,datesortieexperience,nomposte,nomdepartement,
                        CONCAT(
                        (IF(idPersonne in (select idPersonne from filtre_view where titreLangue='Anglais'),'Anglais','')),',',
                        (IF(idPersonne in (select idPersonne from filtre_view where titreLangue='Francais'),'Francais','')),',',
                        (IF(idPersonne in (select idPersonne from filtre_view where titreLangue='Russe'),'Russe','')),',',
                        (IF(idPersonne in (select idPersonne from filtre_view where titreLangue='Mandarin'),'Mandarin','')),',',
                        (IF(idPersonne in (select idPersonne from filtre_view where titreLangue='Malgache'),'Malgache',''))
                        ) as AllLangue
                        from filtre_view ";
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

                $query.="group by idpersonne,nomPersonne,age,sexe,distance,matrimonial,titrediplome,titregrade,titredomaine,nomPosteExperience,dateentreexperience,datesortieexperience,nomposte,nomdepartement";
        // echo $query;

        $result = $this->db->query($query);
        $filtre = array();
        foreach ($result->result_array() as $key) {
            $filtre[] = $key;
        }
        return $filtre;
    }
}               