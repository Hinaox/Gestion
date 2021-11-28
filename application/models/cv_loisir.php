<?php
include_once "BDtable.php";

class cv_loisir Extends BDtable {
    
    public $idCv;
    public $idLoisir;

    function __construct() {
        
    }

    public function getIdCv(){
        return $this->idCv;
    }
    public function getIdLoisir(){
        return $this->idLoisir;
    }
    public function setIdCv($idCv){
        $this->idCv=$idCv;
    }
    public function setIdLoisir($idLoisir){
        $this->idLoisir=$idLoisir;
    }
}