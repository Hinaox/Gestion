<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getDepartements ($db) {
    $retour = array();
    $query = $db->query('select * from departement');
    foreach ($query->result_array() as $row) {
        array_push($retour, $row);
    }
    return $retour;
}

function getPostes ($db,  $dept) {
    $retour = array();
    $query = $db->query('select * from poste where idDepartement='.$dept);
    foreach ($query->result_array() as $row) {
        array_push($retour, $row);
    }
    return $retour;
}
?>