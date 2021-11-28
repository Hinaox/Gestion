<?php
include_once "BDtable.php";

class grade Extends BDtable {

    public $idGrade;
    public $titre;

    function __construct() {
        
    }
    public function getIdGrade(){
        return $this->idGrade;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function setIdGrade($idGrade){
        $this->idGrade=$idGrade;
    }
    public function setTitre($titre){
        $this->titre=$titre;
    }
}