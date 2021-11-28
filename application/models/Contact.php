<?php
include_once 'BDtable.php';

class Contact Extends BDtable{

    public $idContact;
    public $email;
    public $autre;

    function __construct(){

    }

    public function getIdContact(){
        return $this->idContact;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getAutre(){
        return $this->autre;
    }
    
    public function setIdContact($idContact){
        $this->idContact=$idContact;
    }
        
    public function setEmail($email){
        $this->email=$email;
    }
        
    public function setAutre($autre){
        $this->autre=$autre;
    }
    
}
