<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class PersonneDao extends CI_Model{

	function __construct()
	{
		
	}
    public function insertAttente($idpersonne){
    
        $requete="INSERT INTO attente VALUES (null,'%s')";
        $requete=sprintf($requete,$idpersonne);
        
        $query=$this->db->query($requete);
    
    }
    public function getPersonne(){
        $query=$this->db->query("SELECT * FROM personne");
        $personne=array();
        foreach($query->result_array() as $key) {
            $personne[]=$key;
        }
            return $personne;
        }
       public function insertEntretien($idpersonne,$note,$date,$heure){
    
        $requete="INSERT INTO entretien VALUES (null,'%s','%s','%s','%s')";
        $requete=sprintf($requete,$idpersonne,$note,$date,$heure);
        
        $query=$this->db->query($requete);
    
       }
       public function getEntretien(){
            $query=$this->db->query("SELECT entretien.*,personne.nom FROM entretien ,personne  where entretien.idPersonne=personne.idPersonne ");
            $personne=array();
            foreach($query->result_array() as $key) {
                $personne[]=$key;
            }
            return $personne;
        }
        public function getAttente(){
            $query=$this->db->query("SELECT attente.idAttente, personne.* FROM personne,attente where attente.idpersonne=personne.idpersonne and attente.idPersonne not in (select idPersonne from entretien)");
            $personne=array();
            foreach($query->result_array() as $key) {
                $personne[]=$key;
            }
            return $personne;
    
        }
        public function deleteAttente($idAttente){
    
         $requete="DELETE from attente where idAttente='%s'";
            $requete=sprintf($requete,$idAttente);
        
        $query=$this->db->query($requete);
        }
}