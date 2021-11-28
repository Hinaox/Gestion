<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulaire extends CI_Controller
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
        $this->load->model('BDtable');
        $this->load->model('Connex');
        $this->load->model('poste');
        $this->load->model('categorieLoisir');
        $this->load->model('langue');
        $this->load->model('grade');

        $con = new Connex();
        $dsn = 'mysql:dbname=gestion;host=localhost;charset=utf8';
        $utilisateur = 'root';
        $mdp = '';
        $connexion = $con->getConnexion($dsn, $utilisateur, $mdp);

        $categorie = new categorieLoisir();
        $data['nomCategorie'] = $categorie->find($connexion);

        $poste = new poste();
        $data['nomPoste'] = $poste->find($connexion);

        $langue = new langue();
        $data['listeLangue'] = $langue->find($connexion);

        $grade = new grade();
        $data['listeGrade'] = $grade->find($connexion);

        $this->load->view('formulaireCV', $data);
    }

    public function traiteCV()
    {
        $this->load->model('Connex');
        $this->load->model('Personne');
        $this->load->model('Contact');
        $this->load->model('cv');
        $this->load->model('cv_langue');
        $this->load->model('langue');
        $this->load->model('cv_loisir');
        $this->load->model('loisir');
        $this->load->model('categorieLoisir');
        $this->load->model('cv_poste');
        $this->load->model('poste');
        $this->load->model('grade');
        $this->load->model('diplome');
        $this->load->model('experience');
        $this->load->model('competence');

        $con = new Connex();
        $dsn = 'mysql:dbname=gestion;host=localhost;charset=utf8';
        $utilisateur = 'root';
        $mdp = '';
        $connexion = $con->getConnexion($dsn, $utilisateur, $mdp);

        $contact = new Contact();
        $contact->setIdContact(null);
        $contact->setEmail($_GET['email']);
        $contact->setAutre($_GET['contact']);

        $contact->Insert($connexion);

        //var_dump($contact->getAutre());

        $newcontact = new Contact();
        $newcontact->setEmail($_GET['email']);
        $newcontact->setAutre($_GET['contact']);

        $id = $newcontact->find($connexion);
        $contact->setIdContact($id[0]->getIdContact());


        /*var_dump($contact->getIdContact());
        var_dump($contact->getEmail());
        var_dump($contact->getAutre());*/

        $personne = new Personne();
        $personne->setIdPersonne(null);
        $personne->setNom($_GET['nom']);
        $personne->setPrenom($_GET['prenom']);
        $personne->setDtn($_GET['date']);
        $personne->setSexe($_GET['sexe']);
        $personne->setAdresse($_GET['adresse']);
        $personne->setDistance($_GET['distance']);
        $personne->setMatrimonial($_GET['matrimonial']);
        $personne->setIdContact($id[0]->getIdContact());

        $personne->Insert($connexion);


        /*var_dump($personne->getIdPersonne());
        var_dump($personne->getNom());
        var_dump($personne->getPrenom());
        var_dump($personne->getDtn());
        var_dump($personne->getSexe());
        var_dump($personne->getMatrimonial());
        var_dump($personne->getIdContact());*/

        $newPers = new Personne();
        $newPers->setNom($personne->getNom());
        $newPers->setPrenom($personne->getPrenom());

        $idPers = $newPers->find($connexion);


        $cv = new cv();
        $cv->setIdCv(null);
        $cv->setIdPersonne($idPers[0]->getIdPersonne());
        $cv->setDesciProfil($_GET['description']);

        $cv->Insert($connexion);

        /*var_dump($cv->getIdCv());
        var_dump($cv->getIdPersonne());
        var_dump($cv->getDesciProfil());*/

        $newCv = new cv();
        $newCv->setIdPersonne($idPers[0]->getIdPersonne());

        $idcv = $newCv->find($connexion);

        $cv->setIdCv($idcv[0]->getIdCv());

        //var_dump($cv->getIdCv());


        $cvlangue = new cv_langue();

        $cvlangue->setIdCV($cv->getIdCv());
        $cvlangue->setNiveau($_GET['niveau']);

        $langue = new langue();

        $langue->setTitre($_GET['langue']);
        $idLangue = $langue->find($connexion);

        $cvlangue->setIdLangue($idLangue[0]->getIdLangue());

        /*var_dump($cvlangue->getIdCV());
        var_dump($cvlangue->getIdLangue());
        var_dump($cvlangue->getNiveau());*/

        $cvlangue->Insert($connexion);


        $categorie = new categorieLoisir();
        $categorie->setCategorie($_GET['categorie']);

        $idCategorie = $categorie->find($connexion);

        /*var_dump($idCategorie[0]->getIdCategorieLoisire());
        var_dump($_GET['categorie']);
        var_dump($_GET['loisir']);*/

        $loisir = new loisir();

        $loisir->setIdLoisir(null);
        $loisir->setIdCategorieLoisire($idCategorie[0]->getIdCategorieLoisire());
        $loisir->setPratique($_GET['loisir']);

        $loisir->Insert($connexion);

        $newLoisir = new loisir();

        $newLoisir->setIdCategorieLoisire($idCategorie[0]->getIdCategorieLoisire());
        $newLoisir->setPratique($loisir->getPratique());

        $idLoisir = $newLoisir->find($connexion);

        //var_dump($idLoisir[0]->getIdLoisir());

        $cvLoisir = new cv_loisir();

        $cvLoisir->setIdCv($cv->getIdCv());
        $cvLoisir->setIdLoisir($idLoisir[0]->getIdLoisir());

        $cvLoisir->Insert($connexion);

        //var_dump($_GET["poste"]);

        $cvPoste = new cv_poste();
        $poste = new poste();

        $poste->setNom($_GET["poste"]);
        $idPoste = $poste->find($connexion);

        /*var_dump($idPoste[0]->getIdPoste());
        var_dump($cv->getIdCv());*/

        $cvPoste->setIdCV($cv->getIdCv());
        $cvPoste->setIdPoste($idPoste[0]->getIdPoste());

        $cvPoste->Insert($connexion);

        /*var_dump($_GET["grade"]);
        var_dump($_GET["diplomeTitre"]);
        var_dump($_GET["diplomeEtablissement"]);
        var_dump($_GET["diplomeObtention"]);*/

        $diplome = new diplome();

        $diplome->setIdDiplome(null);
        $diplome->setIdCV($cv->getIdCv());
        $diplome->setIdGrade($_GET["grade"]);
        $diplome->setTitre($_GET["diplomeTitre"]);
        $diplome->setEtablissement($_GET["diplomeEtablissement"]);
        $diplome->setObtention($_GET["diplomeObtention"]);

        $diplome->Insert($connexion);

        /*var_dump("<br>");
        var_dump("<br>");

        var_dump($_GET["posteExp"]);
        var_dump($_GET["societeExp"]);
        var_dump($_GET["dateEntre"]);
        var_dump($_GET["dateSorti"]);*/

        $experience = new experience();

        $experience->setIdExperience(null);
        $experience->setIdCV($cv->getIdCv());
        $experience->setDateEntre($_GET["dateEntre"]);
        $experience->setDateSortie($_GET["dateSorti"]);
        $experience->setPoste($_GET["posteExp"]);
        $experience->setSociete($_GET["societeExp"]);

        $experience->Insert($connexion);

        $competence = new competence();

        /*var_dump($_GET['titreCompetence']);
        var_dump($_GET['niveauTitre']);*/

        $competence->setIdCompetence(null);
        $competence->setIdCV($cv->getIdCv());
        $competence->setTitre($_GET['titreCompetence']);
        $competence->setNiveau($_GET['niveauTitre']);

        /*var_dump($competence->getIdCompetence());
        var_dump($competence->getIdCV());
        var_dump($competence->getTitre());
        var_dump($competence->getNiveau());*/

        $competence->Insert($connexion);
    }
}
