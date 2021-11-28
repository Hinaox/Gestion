<?php
include_once 'BDtable.php';

class cv Extends BDtable{
    public $idCv;
    public $idPersonne;
    public $desciProfil;

    function __construct(){

    }

    public function getIdCv(){
        return $this->idCv;
    }
    public function getIdPersonne(){
        return $this->idPersonne;
    }
    public function getDesciProfil(){
        return $this->desciProfil;
    }
    public function setIdCv($idCv){
        $this->idCv=$idCv;
    }
    public function setIdPersonne($idPersonne){
        $this->idPersonne=$idPersonne;
    }
    public function setDesciProfil($desciProfil){
        $this->desciProfil=$desciProfil;
    }
}