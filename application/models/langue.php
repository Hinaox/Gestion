<?php
include_once "BDtable.php";

class langue Extends BDtable {
    public $idLangue;
    public $titre;

    function __construct() {
        
    }

    public function getIdLangue(){
        return $this->idLangue;
    }
    
    public function getTitre(){
        return $this->titre;
    }
    
    public function setIdLangue($idLangue){
        $this->idLangue=$idLangue;
    }
        
    public function setTitre($titre){
        $this->titre=$titre;
    }
    
}