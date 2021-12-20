<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Orga extends CI_Model
{
    function LoadData(){
        $query = $this->db->query( "SELECT * from Organigramme join Poste
        on Poste.nom = Organigramme.Poste 
        join Personne 
        on Personne.idPersonne = Poste.idPoste
        join categorieProfessionnel
        on categorieProfessionnel.idCat=Organigramme.idCategorie; 
        ");
        $indice=0;
        $retour=array();
        foreach ($query->result_array() as $row) {
            $tab = array(
                'key' => null,
                'parent' => null,
                'title' => null,
                'name'=>null,
                'ID' =>null,
                'Categorie'=>null,
                'idcat'=>null,
                'Idposte'=>null
            );
           
            $tab['key']=$row['Poste'];
            $tab['title']=$row['Poste'];
            $tab['parent']=$row['PosteSup'];
            $tab['name']=$row['nom'] ." ".$row['prenom'];
            $tab['Categorie']=$row['Categorie'];
            $tab['idcat']=$row['idcat'];
            $tab['Idposte']=$row['idPoste'];
            $tab['ID']=$indice;
            
            $retour[$indice] = $tab;
            $indice++;
    }
    $retour[0]['parent']=0;
    return $retour;
    }

    function getDiplomeByidCateg($nomCateg){
        $indice = 0;
        $retour = array();
        // $nomCateg = (int)$nomCateg;
        $query = $this->db->get_where('categorieprofessionnel', array('Categorie' => $nomCateg));
        foreach ($query->result_array() as $row) {
            $tab = array(
                'idcat' => null,
                'Categorie' => null

            );
            $tab['idcat'] = $row['idcat'];
            $tab['Categorie'] = $row['Categorie'];
            $retour[$indice] = $tab;
            $indice++;
        }
        // $this->db->close();
        return $retour;
    }
    function getPosteIdByNomPoste($nomPoste){
        $indice = 0;
        $retour = array();
        // $nomPoste="'".$nomPoste."'";
        // $nomPoste="Directeur general";
         $query = $this->db->get_where('poste', array('nom' => $nomPoste));
         
        //  echo $sql;
        // $query=$this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $tab = array(
                'idPoste' => null,
                'descri' => null,
                'nom'=>null,
                'idDepartement'=>null

            );
            $tab['idPoste'] = $row['idPoste'];
            $tab['descri'] = $row['descri'];
            $tab['nom'] = $row['nom'];
            $tab['idDepartement'] = $row['idDepartement'];


            $retour[$indice] = $tab;
            $indice++;
        }
        // $this->db->close();
        return $retour;
    }

}