<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getEmployeFromBase ($bdd ,$matricule = 0, $nom = null, $prenom = null, $departement = 0, $poste = 0) {
    $retour = array();
    $requete = ("select * from employe_view where 1<2");
    if ($matricule > 0) {
        $requete = $requete." and idEmploye=".$matricule;
    }
    if ($nom != null && strlen($nom) > 0) {
        $requete = $requete." and nom like '%".$nom."%'";
    }
    if ($prenom != null && strlen($prenom) > 0) {
        $requete = $requete." and prenom like '%".$prenom."%'";
    }
    if ($departement > 0) {
        $requete = $requete." and idDepartement=".$departement;
    }
    if ($poste > 0) {
        $requete = $requete." and idPoste=".$poste;
    }
    
    $query  = $bdd->query($requete);
    foreach($query->result_array() as $row) {
        array_push($retour, $row);
    }

    return $retour;
}

function getEmployes ($db, $nom_prenom = null, $department = 0) {
    $retour = array();
    $requete = "select * from employe_view where 1<2";

    if ($nom_prenom != null & strlen($nom_prenom)>0) {
        $requete .= " and ( nom like '%".$nom_prenom."%' or prenom like '%".$nom_prenom."%' )";
    }
    if ($department > 0) {
        $requete .= " and idDepartement=".$department;
    }

    $stmt = $db -> query($requete);
    foreach($stmt -> result_array() as $row) {
        array_push($retour, $row);
    }
    return $retour;
}

?>