<?php
include_once "BDtable.php";

class cv_langue Extends BDtable {

    public $idCV;
    public $idLangue;
    public $niveau;

    function __construct() {
        
    }

    public function getIdCV(){
        return $this->idCV;
    }
    
    public function getIdLangue(){
        return $this->idLangue;
    }
    
    public function getNiveau(){
        return $this->niveau;
    }
       
    public function setIdCV($idCV){
        $this->idCV=$idCV;
    }
           
    public function setIdLangue($idLangue){
        $this->idLangue=$idLangue;
    }
           
    public function setNiveau($niveau){
        $this->niveau=$niveau;
    }
    
}