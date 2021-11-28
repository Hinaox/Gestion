<?php
include_once "BDtable.php";

class experience Extends BDtable {

    public $idExperience;
    public $idCV;
    public $dateEntre;
    public $dateSortie;
    public $poste;
    public $societe;

    function __construct() {
        
    }
    public function getIdExperience(){
        return $this->idExperience;
    }
    public function getIdCV(){
        return $this->idCV;
    }
    public function getDateEntre(){
        return $this->dateEntre;
    }
    public function getDateSortie(){
        return $this->dateSortie;
    }
    public function getPoste(){
        return $this->poste;
    }
    public function getSociete(){
        return $this->societe;
    }
    public function setIdExperience($idExperience){
        $this->idExperience=$idExperience;
    }
    public function setIdCV($idCV){
        $this->idCV=$idCV;
    }
    public function setDateEntre($dateEntre){
        $this->dateEntre=$dateEntre;
    }
    public function setDateSortie($dateSortie){
        $this->dateSortie=$dateSortie;
    }
    public function setPoste($poste){
        $this->poste=$poste;
    }
    public function setSociete($societe){
        $this->societe=$societe;
    }
}