<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class DemandeAchatController extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
    public function index(){
        $this->load->model('departement');
        $this->load->model('ProduitDemander');
        $data['ProduitDemander'] = $this->ProduitDemander->getProduitValider();
        $data['departement'] = $this->departement->getDepartement();
        $data['view'] = 'formulaireDemandeAchat.php';
        //var_dump($data);
        $this->load->view('template',$data);
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
        $this->load->model('Demande');
        $this->Demande->grouper($grouper);
        $this->getDemande();
    }

    public function insererDemande(){

        $new = $this->input->get('new');
        //var_dump($new);
        $label;
        if($new!=""){
            $this->load->model('ProduitDemander');
            $label = $this->ProduitDemander->insertProduit($new)[0]['ma'];
            //var_dump($label);
        }
        else{
            $label = $this->input->get('labelCommande');
        }
        
        $this->load->model('Demande');
        $immobilisation = $this->input->get('immobilisation');
        $quantite = $this->input->get('quantite');
        $unite = $this->input->get('unite');
        $idDepartement = $this->input->get('idDepartement');
        
        $this->Demande->insert($label,$quantite,$unite,$idDepartement,$immobilisation);

        $data['listeDemande']=$this->Demande->findByIdDepartement($idDepartement);

        //$this->load->view('listeDemandeDept',$data);
        $data['view'] = 'listeDemandeDept.php';
        //var_dump($data);
        $this->load->view('template',$data);
        //$this.index();

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
        $this->load->model('Fournisseur');
        $data['listeFournisseur'] = $this->Fournisseur->find();
        $this->load->view('ficheDemandeGrouper',$data);
    }

    public function insertProformat(){
        $this->load->model('Proformat');
        $label = $this->input->get('reference');
        $quantite = $this->input->get('quantite');
        $prix = $this->input->get('prix');
        $dateValiditer = $this->input->get('date');
        $idFournisseur = $this->input->get('idFournisseur');
        $idDemandeGrouper = $this->input->get('idDemandeGrouper');
        $this->Proformat->insertProformat($dateValiditer,$label,$quantite,$prix,$idDemandeGrouper,$idFournisseur);
    }
    public function listeProformat(){
        $id = $this->input->get('id');
        $this->load->model('Proformat');
        $this->load->model('DemandeGrouper');
        $data['demandeGrouper'] = $this->DemandeGrouper->findOne($id);
        $data['listeProformat'] = $this->Proformat->allProformat($id);
        $this->load->view('listeProforma',$data);
    }


    public function formulaireBonDeCommande(){
        $this->load->model('Proformat');
        $id = $this->input->get('id');
        $data['proformat'] = $this->Proformat->findProformat($id);

        $this->load->view('formulaireCommande',$data);
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
        $this->load->view('afficheBonCommande',$data);

    }

    public function formLivraison(){
        $this->load->model('BonDeCommande');
        $this->BonDeCommande->findBonCommande();



    }
    

}