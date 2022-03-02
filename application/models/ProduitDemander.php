<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//include_once "BDtable.php";

class ProduitDemander  extends CI_Model{

    public $id;
    public $label;
    public $validation;

    function __construct(){
        
    }
    public function getId(){
        return $this->id;
    }
    public function getLabel(){
        return $this->label;
    }
    public function getDescri(){
        return $this->validation;
    }
    public function setId($idDepartement){
        $this->id=$idDepartement;
    }
    public function setLabel($nom){
        $this->label=$nom;
    }
    public function setValidation($descri){
        $this->validation=$descri;
    }

    public function getProduitNonValider()
	{
        $sql = "SELECT * FROM produitDemander where validation='0'";
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

    public function getProduitValider()
	{
        $sql = "SELECT * FROM produitDemander where validation='1'";
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
    public function getMax(){
        $sql = "SELECT max(id) as ma FROM produitDemander ";
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

    public function insertProduit($label){
        $query = "insert into produitDemander values (null,'".$label."','0')";
        $this->db->query($query);
        return $this->getMax();
    }

    public function valider($id){
        $query = "update produitDemander set validation='1' where id='".$id."'";
        $this->db->query($query);
    }
}