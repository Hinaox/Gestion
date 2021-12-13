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
    
}