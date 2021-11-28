<?php
include_once "BDtable.php";

class categorieLoisir Extends BDtable{
    
    public $idCategorieLoisire;
    public $categorie;

    function __construct(){
        
    }
    public function getIdCategorieLoisire(){
        return $this->idCategorieLoisire;
    }
    public function getCategorie(){
        return $this->categorie;
    }
    public function setIdCategorieLoisire($idCategorieLoisire){
        $this->idCategorieLoisire=$idCategorieLoisire;
    }
    public function setCategorie($categorie){
        $this->categorie=$categorie;
    }
}