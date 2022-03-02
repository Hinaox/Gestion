<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Immobilisation extends CI_Model{

    public function insertProformat($dateValiditer,$label,$quantite,$prix,$idFournisseur){
        $query = "insert into proformat values(null,'".$dateValiditer."','".$label."',".$quantite.",".$prix.",".$idFournisseur.")";
        $this->db->query($query);
    }



    public function findImmobilisationt(){
        $sql = "SELECT * FROM valeurImmobilisation";
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

    public function findImmobilisationtbyId($id){
        $sql = 'SELECT * FROM valeurImmobilisation where id='.$id;
        var_dump($id);
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