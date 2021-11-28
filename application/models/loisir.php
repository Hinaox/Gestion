<?php
include_once "BDtable.php";

class loisir Extends BDtable {

    public $idLoisir;
    public $idCategorieLoisire;
    public $pratique;

    function __construct() {
        
    }

    public function getIdLoisir(){
        return $this->idLoisir;
    }
    public function getIdCategorieLoisire(){
        return $this->idCategorieLoisire;
    }
    public function getPratique(){
        return $this->pratique;
    }
    public function setIdLoisir($idLoisir){
        $this->idLoisir=$idLoisir;
    }
    public function setIdCategorieLoisire($idCategorieLoisire){
        $this->idCategorieLoisire=$idCategorieLoisire;
    }
    public function setPratique($pratique){
        $this->pratique=$pratique;
    }
}