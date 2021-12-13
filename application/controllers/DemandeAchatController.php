<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class DemandeAchatController extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
    public function index(){
        $this->load->model('departement');
        $data['departement'] = $this->departement->getDepartement();
        //var_dump($data);
        $this->load->view('formulaireDemandeAchat',$data);
    }
    public function getDemande(){
        $this->load->model('demande');
        $data['demande'] = $this->demande->getDemande();
        //var_dump($data);
        $this->load->view('listeDemande',$data);
    }
    public function grouper(){
       // var_dump($_GET);
        $grouper = $this->input->get('aGrouper');
        $this->load->model('demande');
        $this->demande->grouper($grouper);
    }

    public function insererDemande(){
        $this->load->model('demande');
        $label = $this->input->get('labelCommande');
        $quantite = $this->input->get('quantite');
        $unite = $this->input->get('unite');
        $idDepartement = $this->input->get('idDepartement');
        var_dump($_GET);
        $this->demande->insert($label,$quantite,$unite,$idDepartement);
    }

    public function listeDemendeGrouper(){
        $this->load->model('DemandeGrouper');
        $data['demandeGrouper'] = $this->DemandeGrouper->findDemandeGrouper();
        $this->load->view('listeDemandeGrouper',$data);
    }

    public function ficheDemandeGrouer(){
        $this->load->model('DemandeGrouper');
        $id = $this->input->get('id');
        $data['demandeGrouper'] = $this->DemandeGrouper->findOne($id);
        // var_dump($data);
        $this->load->model('Fournisseur');
        $data['listeFournisseur'] = $this->Fournisseur->find();
        // var_dump($data);
        $this->load->view('ficheDemandeGrouper',$data);
        //var_dump($li);
    }
    

    
    /*public function demanderDeductible(){
        $this->load->model('conge');
        $motifs = $this->conge->getMotifsDeductible();
        $data = array(
            "view" => 'demandeConge',
            "motif" => $motifs
        );
        $this->load->view('template',$data);
    }

    public function demanderNonDeductible(){
        $this->load->model('conge');
        $motifs = $this->conge->getMotifsNonDeductible();
        $data = array(
            "view" => 'justificatifConge',
            "motif" => $motifs
        );
        $this->load->view('template',$data);
    }
    public function envoiDemande()
    {
        $idEmp = $this->input->post('idEmploye');
        $dateDebut = $this->input->post('dateDebut');
        $dateFin = $this->input->post('dateFin');
        $idMotif = $this->input->post('idMotif');
        $this->load->model('conge');

        $controleDate = $this->conge->controleDate($dateDebut,$dateFin);
        if ($controleDate!="Date Conge Valide"){
            $motifs = $this->conge->getMotifsDeductible();
            $data = array(
                "view" => 'demandeConge',
                "motif" => $motifs,
                "erreur" => $controleDate
            );
            $this->load->view('template',$data);
        }else{
            $this->conge->sendDemande($idEmp,$idMotif,$dateDebut,$dateFin);

            $motifs = $this->conge->getMotifsDeductible();
            $data = array(
                "view" => 'demandeConge',
                "motif" => $motifs,
                "send" => "Demande envoyée"
            );
            $this->load->view('template',$data);
        }
        
    }
    public function accepter()
    {
        $this->load->model('conge');
        $succes = $this->conge->accepterDemande($this->input->post('idDemande'));

        $demandes = $this->conge->getDemandeEnCours();
        $data = array(
            "view" => 'listeDemande',
            "demandes" =>$demandes,
            "reponse" => $succes
        );
        $this->load->view ('template',$data);
    }
    public function accepterNonDeductible()
    {
        $idEmp = $this->input->post('idEmploye');
        $dateDebut = $this->input->post('dateDebut');
        $dateFin = $this->input->post('dateFin');
        $idMotif = $this->input->post('idMotif');
        $this->load->model('conge');
        $controleDate = $this->conge->controleDate($dateDebut,$dateFin);
        if ($controleDate!="Date Conge Valide"){
            $motifs = $this->conge->getMotifsDeductible();
            $data = array(
                "view" => 'justificatifConge',
                "motif" => $motifs,
                "erreur" => $controleDate
            );
            $this->load->view('template',$data);
        }else{

            $this->conge->accepterND($idEmp,$idMotif,$dateDebut,$dateFin);

            $motifs = $this->conge->getMotifsNonDeductible();
            $data = array(
                "view" => 'justificatifConge',
                "motif" => $motifs,
                "send" => "Demande prise en compte"
            );
            $this->load->view('template',$data);
        }
    }
    public function refuser()
    {
        $this->load->model('conge');
        $refus = $this->conge->refuserDemande($this->input->post('idDemande'));

        $demandes = $this->conge->getDemandeEnCours();
        $data = array(
            "view" => 'listeDemande',
            "demandes" =>$demandes,
            "reponse" =>$refus
        );
        $this->load->view ('template',$data);
    }*/
    
}