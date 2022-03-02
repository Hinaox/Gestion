<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class ControllerAchat extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
    public function index(){
        // $this->load->model('departement');
        // $this->load->model('ProduitDemander');
        // $data['ProduitDemander'] = $this->ProduitDemander->getProduitValider();
        // $data['departement'] = $this->departement->getDepartement();
        $data['view'] = 'AcceuilAchat.php';
        //var_dump($data);
        $this->load->view('template',$data);
    }

    public function listeNouveauProduit(){
        $this->load->model('ProduitDemander');
        $data['ProduitDemander'] = $this->ProduitDemander->getProduitNonValider();
        $data['view'] = 'produitNonValider.php';
        $this->load->view('template',$data);
    }

    public function validerProduit(){
        $this->load->model('ProduitDemander');
        $id = $this->input->get('id');
        $this->ProduitDemander->valider($id);
        $this->listeNouveauProduit();
    }

    public function listeDemande(){
        $this->load->model('Demande');
        $data['demandeGrouper']=$this->Demande->findDemande();
        $data['view'] = 'listeDemandeAComander.php';
        $this->load->view('template',$data);
    }

    public function addProformat(){
        $this->load->model('Demande');
        $id = $this->input->get('id');
        $data['demandeGrouper'] = $this->Demande->findGrouperById($id);
        $this->load->model('Fournisseur');
        $data['listeFournisseur'] = $this->Fournisseur->find();
        
        $data['view'] = 'ficheDemandeGrouper.php';
        $this->load->view('template',$data);
    }

    public function insertProformat(){
        $this->load->model('Proformat');
        $label = $this->input->get('reference');
        $quantite = $this->input->get('quantite');
        $prix = $this->input->get('prix');
        $dateValiditer = $this->input->get('date');
        $idFournisseur = $this->input->get('idFournisseur');
        $this->Proformat->insertProformat($dateValiditer,$label,$quantite,$prix,$idFournisseur);
        $this->listeDemande();
    }

    public function listeProformat(){
        $label = $this->input->get('label');
        $quantite = $this->input->get('quantite');
        //var_dump($label);
        $this->load->model('Proformat');
        // $this->load->model('Demande');
        $data['label'] = $label;
        $data['quantite'] = $quantite;
        
        $data['listeProformat'] = $this->Proformat->findProformatBylabelQuantite($label,$quantite);
        //var_dump($data['listeProformat']);
        $data['view'] = 'listeProforma.php';
        $this->load->view('template',$data);
        // $this->load->view('listeProforma',$data);
    }

    public function formulaireBonDeCommande(){
        $this->load->model('Proformat');
        $id = $this->input->get('id');
        $data['proformat'] = $this->Proformat->findProformat($id);
        $data['view'] = 'formulaireCommande.php';
        $this->load->view('template',$data);
    }

    public function genererBondDeCommande(){
        
        // var_dump($_GET);
        $idProformat = $this->input->get('proformat');
        $delaiLivraison = $this->input->get('date');
        $quantite = $this->input->get('quantite');
        $this->load->model('BonDeCommande');
        $this->BonDeCommande->insertBonCommande($idProformat,$quantite,$delaiLivraison);

        $this->load->model('BonDeCommande');
        $data['bonCommande']=$this->BonDeCommande->lastInserted();
        $data['view'] = 'afficheBonCommande.php';
        $this->load->view('template',$data);

    }
    
}