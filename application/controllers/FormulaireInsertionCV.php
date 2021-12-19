<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FormulaireInsertionCV extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $bdd = mysqli_connect("localhost", "root", "", "gestion");

        $categorieloisir = mysqli_query($bdd, "select * from categorieloisir");
        $idCategorieLoisire = array();
        $categorie = array();

        $i = 0;
        while ($listeCategorie = mysqli_fetch_assoc($categorieloisir)) {
            $idCategorieLoisire[$i] = $listeCategorie['idCategorieLoisire'];
            $categorie[$i] = $listeCategorie['categorie'];
            $i++;
        }

        $data['idCategorieLoisire'] = $idCategorieLoisire;
        $data['categorieLoisire'] = $categorie;

        $poste = mysqli_query($bdd, "select * from poste");
        $nomPoste = array();
        $idPoste = array();

        $j = 0;
        while ($listePoste = mysqli_fetch_assoc($poste)) {
            $nomPoste[$j] = $listePoste['nom'];
            $idPoste[$j] = $listePoste['idPoste'];
            $j++;
        }

        $data['idPoste'] = $idPoste;
        $data['nomPoste'] = $nomPoste;

        $langue = mysqli_query($bdd, "select * from langue");
        $titreLangue = array();
        $idLangue = array();

        $k = 0;
        while ($listeLangue = mysqli_fetch_assoc($langue)) {
            $titreLangue[$k] = $listeLangue['titre'];
            $idLangue[$k] = $listeLangue['idLangue'];
            $k++;
        }

        $data['titreLangue'] = $titreLangue;
        $data['idLangue'] = $idLangue;

        $grade = mysqli_query($bdd, "select * from grade");
        $listGrade = array();
        $idGrade = array();

        $l = 0;
        while ($retourGrade = mysqli_fetch_assoc($grade)) {
            $listGrade[$l] = $retourGrade['titre'];
            $idGrade[$l] = $retourGrade['idGrade'];
            $l++;
        }

        $data["titre"] = $listGrade;
        $data["idGrade"] = $idGrade;

        $domaine = mysqli_query($bdd,"select * from domaine");
        $nomDomaine = Array();
        $idMomaine = Array();
        $m=0;
        while($listeDomaine=mysqli_fetch_assoc($domaine)){
            $nomDomaine[$m]=$listeDomaine['titre'];
            $idMomaine[$m]=$listeDomaine['idDomaine'];
            $m++;
        }

        $data["Titre"]=$nomDomaine;
        $data["IdDomaine"]=$idMomaine;

        $bdd->close();
        $data["view"]='FormulaireCV';

		$this->load->view('templateCV',$data);
    }

    public function traiteCV()
    {
        $bdd = mysqli_connect("localhost", "root", "", "gestion");

        $Email = $this->input->get('email');
        $Contact = $this->input->get('contact');
        $Nom = $this->input->get('nom');
        $Prenom = $this->input->get('prenom');
        $Date = $this->input->get('date');
        $Sexe = $this->input->get('sexe');
        $Adresse = $this->input->get('adresse');
        $Distance = $this->input->get('distance');
        $Matrimonial = $this->input->get('matrimonial');
        $Description = $this->input->get('description');
        $Grade = $this->input->get('grade');
        $Diplome = $this->input->get('diplomeTitre');
        $Etablissement = $this->input->get('diplomeEtablissement');
        $DiplomeObtention = $this->input->get('diplomeObtention');
        $PosteExp = $this->input->get('posteExp');
        $SocieteExp = $this->input->get('societeExp');
        $DateEntre = $this->input->get('dateEntre');
        $DateSorti = $this->input->get('dateSorti');
        $Langue = $this->input->get('langue');
        $Niveau = $this->input->get('niveau');
        $TitreCompetence = $this->input->get('titreCompetence');
        $NiveauTitre = $this->input->get('niveauTitre');
        $Categorie = $this->input->get('categorie');
        $Loisir = $this->input->get('loisir');
        $Poste = $this->input->get('poste');
        $Domaine  = $this->input->get('domaine');
        $EtablissementScolarite = $this->input->get('etablissementScolarite');
        $DateEntreScolarite = $this->input->get('dateEntreScolarite');
        $DateSortieScolarite = $this->input->get('dateSortieScolarite');

        $insertContact = "insert into Contact value ('" . null . "','" . $Email . "','" . $Contact . "')";
        $this->db->query($insertContact);

        $findContact = mysqli_query($bdd, "select * from Contact where email='" . $Email . "' and autre='" . $Contact . "'");
        $idContact = array();

        $i = 0;
        while ($listeGrade = mysqli_fetch_assoc($findContact)) {
            $idContact[$i] = $listeGrade['idContact'];
            $i++;
        }

        $insertPersonne = "insert into Personne value('null','" . $Nom . "','" . $Prenom . "','" . $Date . "','" . $Sexe . "','" . $Adresse . "','" . $Distance . "','" . $Matrimonial . "'," . $idContact[0] . ")";
        $this->db->query($insertPersonne);

        $findPersonne = mysqli_query($bdd, "select * from personne where nom='" . $Nom . "'and prenom='" . $Prenom . "'and adresse='" . $Adresse . "'");
        $idPersonne = array();
        
        $j = 0;
        while ($listePersonne = mysqli_fetch_assoc($findPersonne)) {
            $idPersonne[$j] = $listePersonne['idPersonne'];
            $j++;
        }

        $insertCv = "insert into cv value('null','".$idPersonne[0]."','".$Description."')";
        $this->db->query($insertCv);

        $findCv = mysqli_query($bdd,"select * from cv where idPersonne=".$idPersonne[0]."");
        $idCv = Array();

        $k=0;
        while($listeCv = mysqli_fetch_assoc( $findCv)){
            $idCv[$k]=$listeCv['idCV'];
            $k++;
        }

        $insertCvLangue = "insert into cv_langue value(".$idCv[0].",'".$Langue."',".$Niveau.")";
        $this->db->query($insertCvLangue);

        $insertLoisir = "insert into loisir value('null',".$Categorie.",'".$Loisir."')";
        $this->db->query($insertLoisir);

        $findLoisir = mysqli_query($bdd,"select * from loisir where idCategorieLoisire=".$Categorie." and pratique='".$Loisir."'");
        $idLoisir = Array();
        
        $l=0;
        while($listeLoisir = mysqli_fetch_assoc($findLoisir)){
            $idLoisir[$l]=$listeLoisir['idLoisir'];
            $l++;
        }

        $insertCvLoisir = "insert into cv_loisir value(".$idCv[0].",".$idLoisir[0].")";
        $this->db->query($insertCvLoisir);

        $insertCvPoste = "insert into cv_poste value(".$idCv[0].",".$Poste.")";
        $this->db->query($insertCvPoste);

        $insertDiplome = "insert into diplome value('null',".$idCv[0].",".$Grade.",'".$Diplome."','".$Etablissement."','".$DiplomeObtention."')";
        $this->db->query($insertDiplome);

        $insertExperience = "insert into experience value('null',".$idCv[0].",'".$DateEntre."','".$DateSorti."','".$PosteExp."','".$SocieteExp."')";
        $this->db->query($insertExperience);

        $findExperience = mysqli_query($bdd,"select * from experience where idCV=".$idCv[0]." and poste='".$PosteExp."' and societe='".$SocieteExp."'");
        $idExperience = Array();

        $m=0;
        while($listeExperience=mysqli_fetch_assoc($findExperience)){
            $idExperience[$m]=$listeExperience['idExperience'];
            $m++;
        }


        $insertDomaine = "insert into experience_domaine value(".$idExperience[0].",".$Domaine.")";
        $this->db->query($insertDomaine);
        
        $insertCompetence = "insert into competence value('null',".$idCv[0].",'".$TitreCompetence."',".$NiveauTitre.")";
        $this->db->query($insertCompetence);

        $insertMobile = "insert into mobile value('null',".$idContact[0].",'".$Contact."')";
        $this->db->query($insertMobile);

        $insertScolarite = "insert into scolarite value('null',".$idCv[0].",'".$DateEntreScolarite."','".$DateSortieScolarite."','".$EtablissementScolarite."')";
        $this->db->query($insertScolarite);
        
        $bdd->close();
        $data["succes"]="Votre CV a bien été envoyé";
        $data["view"]='FormulaireCV';

		$this->load->view('templateCV',$data);
    }
}
