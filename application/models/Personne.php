<?php
include_once 'BDtable.php';

class Personne Extends BDtable {

    public $idPersonne;
    public $nom;
    public $prenom;
    public $dtn;
    public $sexe;
    public $adresse;
    public $distance;
    public $matrimonial;
    public $idContact;

	function __construct()
	{
		
	}
    
    public function getIdPersonne(){
        return $this->idPersonne;
    }

    public function setIdPersonne($idPersonne){
        $this->idPersonne=$idPersonne;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom=$nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom=$prenom;
    }
    
    public function getDtn(){
        return $this->dtn;
    }

    public function setDtn($dtn){
        $this->dtn=$dtn;
    }
    
    public function getSexe(){
        return $this->sexe;
    }

    public function setSexe($sexe){
        $this->sexe=$sexe;
    }
    
    public function getAdresse(){
        return $this->adresse;
    }

    public function setAdresse($adresse){
        $this->adresse=$adresse;
    }
    
    public function getDistance(){
        return $this->distance;
    }

    public function setDistance($distance){
        $this->distance=$distance;
    }
    
    public function getMatrimonial(){
        return $this->matrimonial;
    }

    public function setMatrimonial($matrimonial){
        $this->matrimonial=$matrimonial;
    }
    
    public function getIdContact(){
        return $this->idContact;
    }

    public function setIdContact($idContact){
        $this->idContact=$idContact;
    }
}
?>