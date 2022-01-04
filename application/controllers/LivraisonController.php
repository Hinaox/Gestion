<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class LivraisonController extends CI_Controller {

    public function index(){
        $this->load->model('livraison');
        $data['bdc'] = $this->livraison->getAllBonDeCommande();
        //var_dump($data);
        $this->load->view('listeBonDeCommande',$data);
    }

    public function livrer(){
        $idBdc=$this->input->get('idBdc');
        $this->load->model('livraison');
        $this->livraison->insertLivraison($idBdc);
        $data['bdc'] = $this->livraison->getAllBonDeCommande();
        $data['bdcNonLivre'] = $this->livraison->getAllBonDeCommandeNonLivre();
        $this->load->view('listeBonDeCommande',$data);
    }
}