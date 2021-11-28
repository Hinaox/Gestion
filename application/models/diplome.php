<?php
include_once "BDtable.php";

class diplome Extends BDtable {

    public $idDiplome;
    public $idCV;
    public $idGrade;
    public $titre;
    public $etablissement;
    public $obtention;

    function __construct() {
        
    }

    public function getIdDiplome(){
        return $this->idDiplome;
    }
    public function getIdCV(){
        return $this->idCV;
    }
    public function getIdGrade(){
        return $this->idGrade;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getEtablissement(){
        return $this->etablissement;
    }
    public function getObtention(){
        return $this->obtention;
    }
    public function setIdDiplome($idDiplome){
        $this->idDiplome=$idDiplome;
    }
    public function setIdCV($idCV){
        $this->idCV=$idCV;
    }
    public function setIdGrade($idGrade){
        $this->idGrade=$idGrade;
    }
    public function setTitre($titre){
        $this->titre=$titre;
    }
    public function setEtablissement($etablissement){
        $this->etablissement=$etablissement;
    }
    public function setObtention($obtention){
        $this->obtention=$obtention;
    }

}