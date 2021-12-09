<?php
include_once 'BDtable.php';
include_once 'Personne.php';

class Employe Extends Personne {
  public $idEmploye;
  public $idSalaire;
  public $dateEmbauche;
  public $nom;
  public $nomDepartement;
  public $idDepartement;
  public $descriDepartement;
  public $montantSalaire;
  public $dateMiseEnPlace;
  public $nomPoste;
  public $idPoste;
  public $descriPoste;

  function __construct()
  {

  }
  public function getIdemploye(){
    return $idEmploye;
  }
  public function setIdEmploye($id)
  {
    $idEmploye = $id;
  }
  public function getIdSalaire(){
    return $idSalaire;
  }
  public function setIdSalaire($id){
    $idSalaire = $id;
  }
  public function getDateEmbauche()
  {
    return $dateEmbauche;
  }
  public function setDateEmbauche($date){
    $dateEmbauche = $date;
  }
  public function getNom(){
    return $nom;
  }
  public function setNom($nom){
      $this->nom=$nom;
  }
  public function getNomDepartement(){
    return $nomDepartement;
  }
  public function setNomDepartement($nom){
    $nomDepartement = $nom;
  }
  public function getIdDepartement(){
    return $idDepartement;
  }
  public function setIdDepartement($id){
    $idDepartement = $id;
  }
  public function getDescriDepartement(){
    return $descriDepartement;
  }
  public function setDescriDepartement($descri)
  {
    $descriDepartement = $descri;
  }
  public function getMontantSalaire(){
    return $montantSalaire;
  }
  public function setMontantSalaire($s)
   {
     $montantSalaire = $s;
   }
   public function getDateMiseEnPlace(){
     return $dateMiseEnPlace;
   }
   public function setDateMiseEnPlace($d)
   {
     $dateMiseEnPlace = $d ;
   }
   public function getNomPoste()
   {
     return $nomPoste;
   }
   public function setNomPoste($n){
     $nomPoste = $n;
   }

   public function getIdPoste(){
     return $idPoste;
   }
   public function setIdPoste($id){
     $idPoste = $id;
   }
   public function getDescriPoste(){
     return $descriPoste;
   }
   public function setDescriPoste($d)
   {
     $descriPoste = $d;
   }
   public function getEmploye($id){
     $query = "select * from employe_view where idEmploye= %s";
     $query = sprintf($query,$id);
     $result = $this->db->query($query)->row_array();
     $query->freeResult();
     return $result;
   }
}
?>
