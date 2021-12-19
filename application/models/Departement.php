<?php if(! defined('BASEPATH')) exit('NO direct script access allowed');
class Departement extends CI_Model
{
    public function getDepartements ($db) {
        $retour = array();
        $query = $db->query('select * from departement');
        foreach ($query->result_array() as $row) {
            array_push($retour, $row);
        }
        return $retour;
    }
    
    public function getPostes ($db,  $dept) {
        $retour = array();
        $query = $db->query('select * from poste where idDepartement='.$dept);
        foreach ($query->result_array() as $row) {
            array_push($retour, $row);
        }
        return $retour;
    }

}?>