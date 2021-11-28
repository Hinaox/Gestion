<?php
include_once "BDtable.php";

class competence Extends BDtable {

    public $idCompetence;
    public $idCV;
    public $titre;
    public $niveau;

    function __construct(){
        
    }
    public function getIdCompetence(){
        return $this->idCompetence;
    }
    public function getIdCV(){
        return $this->idCV;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getNiveau(){
        return $this->niveau;
    }
    public function setIdCompetence($idCompetence){
        $this->idCompetence=$idCompetence;
    }
    public function setIdCV($idCV){
        $this->idCV=$idCV;
    }
    public function setTitre($titre){
        $this->titre=$titre;
    }
    public function setNiveau($niveau){
        $this->niveau=$niveau;
    }
}