<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Contrat extends CI_Model{
	
	function get_Employe($id) {
		$sql = "select Personne.nom,Personne.prenom,Personne.dtn,Personne.adresse,Poste.nom as postnom,Departement.nom as departnom,employe.dateEmbauche,salaire.montant,
		Employeur.nom as nomemployeur ,Employeur.statut,Employeur.adresse,Employeur.identi,Employeur.repre from employe
		join personne
		on employe.idPersonne=personne.idPersonne
		join poste
		on employe.idPoste=poste.idPoste
		join salaire
		on employe.idEmploye=salaire.idEmploye
		join departement
		on poste.idDepartement=departement.idDepartement
		join empemp
		on employe.idEmploye=empemp.IdEmploye
		join Employeur
		on empemp.idEmployeur=Employeur.idEmployeur
        where employe.idEmploye=%s";
		$sql = sprintf($sql,$this->db->escape($id));
		
		$query = $this->db->query($sql);
		$res = array();
		foreach ($query->result_array() as $key) {
			$res[] = $key;
		}
		return $res;
    }

    function get_All_Poste() {
        $sql="select * from poste";	
		$query = $this->db->query($sql);
		$res = array();
		foreach ($query->result_array() as $key) {
			$res[] = $key;
		}
		return $res;
    
    }

    function get_pers_id($id) {
		$sql = "select * from personne where idPersonne=%s";
		$sql = sprintf($sql,$this->db->escape($id));
		$query = $this->db->query($sql);
		$produit = array();
		foreach ($query->result_array() as $key) {
			$produit[] = $key;
		}
		return $produit;
    }

	function get_employe_id($id) {
		$sql = "select * from employe where idPersonne=%s";
		$sql = sprintf($sql,$this->db->escape($id));
		$query = $this->db->query($sql);
		$produit = array();
		foreach ($query->result_array() as $key) {
			$produit[] = $key;
		}
		return $produit;
    }

	function get_employeur_nom_statut($nom,$statut) {
		$sql = "select * from employeur where nom=%s and statut=%s" ;
		$sql = sprintf($sql,$this->db->escape($nom),$this->db->escape($statut));
		$query = $this->db->query($sql);
		$produit = array();
		foreach ($query->result_array() as $key) {
			$produit[] = $key;
		}
		return $produit;
    }

    public function insert_Employeur($nom,$stat,$adresse,$iden,$rep){
		$sql = "INSERT INTO Employeur(nom,statut,adresse,identi,repre) VALUES (%s,%s,%s,%s,%s)";
		$sql = sprintf($sql,$this->db->escape($nom),
        $this->db->escape($stat),
        $this->db->escape($adresse),
        $this->db->escape($iden),
        $this->db->escape($rep));
		$this->db->query($sql);
	}

    public function insert_Salaire($idemp,$montant,$date){
		$sql = "INSERT INTO salaire(idEmploye,montant,dateMiseEnplace) VALUES (%s,%s,%s)";
		$sql = sprintf($sql,$this->db->escape($idemp),
        $this->db->escape($montant),
        $this->db->escape($date));
		$this->db->query($sql);
	}

	function get_salaire_Employe($idEmploye) {
		$sql = "select * from salaire where idEmploye=%s" ;
		$sql = sprintf($sql,$this->db->escape($idEmploye));
		$query = $this->db->query($sql);
		$produit = array();
		foreach ($query->result_array() as $key) {
			$produit[] = $key;
		}
		return $produit;
    }

	public function update_employe($idsalaire,$idEmploye){
		$sql = "update employe set idSalaire=%s where idEmploye=%s";
		$sql = sprintf($sql,$this->db->escape($idsalaire),
        $this->db->escape($idEmploye));
		$this->db->query($sql);
	}
	

    public function insert_Employe($idpers,$idposte,$date){
		$sql = "INSERT INTO Employe(idPersonne,idPoste,dateEmbauche) VALUES (%s,%s,%s)";
		$sql = sprintf($sql,$this->db->escape($idpers),
        $this->db->escape($idposte),
        $this->db->escape($date));
		$this->db->query($sql);
	}
    
	public function insert_Empemp($idemployeur,$idemploye){
		$sql = "INSERT INTO Empemp(idEmployeur,idEmploye) VALUES (%s,%s)";
		$sql = sprintf($sql,$this->db->escape($idemployeur),
        $this->db->escape($idemploye));
		$this->db->query($sql);
	}

}
?>