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
    
}