<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//include_once "BDtable.php";

class departement  extends CI_Model{

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

    public function getDepartement()
	{
        $sql = "SELECT * FROM departement";
        $query = $this->db->query($sql);
        $val = array();
        $i = 0;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val[$i][$key] = $value;  
            }
            $i++;
        }
        return $val;
	}
}