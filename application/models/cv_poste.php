<?php
include_once "BDtable.php";

class cv_poste Extends BDtable {

    public $idCV;
    public $idPoste;

    function __construct(){
        
    }
    public function getIdCV(){
        return $this->idCV;
    }
    public function getIdPoste(){
        return $this->idPoste;
    }
    public function setIdCV($idCV){
        $this->idCV=$idCV;
    }
    public function setIdPoste($idPoste){
        $this->idPoste=$idPoste;
    }
}