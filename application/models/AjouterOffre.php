<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AjouterOffre extends CI_Model
{
    // public function getDiplomesOffre()
    // {
    //     $indice = 0;
    //     $retour = array();
    //     $query = $this->db->get('DiplomeOffre');
    //     foreach ($query->result_array() as $row) {
    //         $tab = array(
    //             'idDiplomeOffre' => null,
    //             'nomDiplome' => null
    //         );
    //         $tab['idDiplomeOffre'] = $row['idDiplomeOffre'];
    //         $tab['nomDiplome'] = $row['nomDiplome'];
    //         $retour[$indice] = $tab;
    //         $indice++;
    //     }
    //     return $retour;
    // }
    public function insertOffre($data)
    {
        $this->db->insert('Offre', $data);
        return true;
    }
    public function getListeOffre()
    {
        $indice = 0;
        $retour = array();
        $query = $this->db->query('select * from Offre join Grade on Grade.idGrade=Offre.idDiplomeOffre');
        foreach ($query->result_array() as $row) {
            $tab = array(
                'idOffre' => null,
                'Poste' => null,
                'description' => null,
                'responsabilite' => null,
                'ageMin' => null,
                'Experiences' => null,
                'AutreExperience' => null,
                'dateLimite' => null,
                'titre' => null

            );
            $tab['idOffre'] = $row['idOffre'];
            $tab['Poste'] = $row['Poste'];
            $tab['description'] = $row['description'];
            $tab['responsabilite'] = $row['responsabilite'];
            $tab['ageMin'] = $row['ageMin'];
            $tab['Experiences'] = $row['Experiences'];
            $tab['dateLimite'] = $row['dateLimite'];
            $tab['titre'] = $row['titre'];
            $retour[$indice] = $tab;
            $indice++;
        }
        return $retour;
    }
    // public function getDiplomesPerId($idDiplomes)
    // {
    //     $indice = 0;
    //     $retour = array();
    //     $idDiplomes = (int)$idDiplomes;
    //     $query = $this->db->get_where('DiplomeOffre', array('idDiplomeOffre' => $idDiplomes));
    //     foreach ($query->result_array() as $row) {
    //         $tab = array(
    //             'nomDiplome' => null
    //         );
    //         $tab['nomDiplome'] = $row['nomDiplome'];
    //         $retour[$indice] = $tab;
    //         $indice++;
    //     }
    //     return $retour;
    // }
    // public function getIdtypes($idTypes)
    // {
    //     $indice = 0;
    //     $retour = array();
    //     $idTypes = (int)$idTypes;
    //     $query = $this->db->get_where('TypeEmploi', array('idTypes' => $idTypes));
    //     foreach ($query->result_array() as $row) {
    //         $tab = array(
    //             'Intitule' => null
    //         );
    //         $tab['Intitule'] = $row['Intitule'];
    //         $retour[$indice] = $tab;
    //         $indice++;
    //     }
    //     return $retour;
    // }
    public function getDiplomeByCateg($idOffre)
    {
        $indice = 0;
        $retour = array();
        $idOffre = (int)$idOffre;
        $query = $this->db->get_where('grade', array('idGrade' => $idOffre));
        foreach ($query->result_array() as $row) {
            $tab = array(
                'idGrade' => null,
                'titre' => null

            );
            $tab['idGrade'] = $row['idGrade'];
            $tab['titre'] = $row['titre'];
            $retour[$indice] = $tab;
            $indice++;
        }
        // $this->db->close();
        return $retour;
    }
    public function getPosteById($id)
    {
        $indice = 0;
        $retour = array();
        $id = (int)$id;
        $query = $this->db->get_where('Poste', array('idPoste' => $id));
        foreach ($query->result_array() as $row) {
            $tab = array(
                'idPoste' => null,
                'nom' => null,
                'descri' => null

            );
            $tab['idPoste'] = $row['idPoste'];
            $tab['nom'] = $row['nom'];
            $tab['descri'] = $row['descri'];
            $retour[$indice] = $tab;
            $indice++;
        }
        // $this->db->close();
        return $retour;
    }
}
