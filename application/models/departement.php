<?php
include_once "BDtable.php";

class departement Extends BDtable {

    public $idDepartement;
    public $nom;
    public $descri;

    function __construct(){
        
    }
    public function getIdDepartement(){
        return $this->idDepartement;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getDescri(){
        return $this->descri;
    }
    public function setIdDepartement($idDepartement){
        $this->idDepartement=$idDepartement;
    }
    public function setNom($nom){
        $this->nom=$nom;
    }
    public function setDescri($descri){
        $this->descri=$descri;
    }
}