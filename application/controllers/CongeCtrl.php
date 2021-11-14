<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class CongeCtrl extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
    public function index(){
        $this->load->model('conge');
        $motifs = $this->conge->getMotifs();
        $data = array(
            "motif" => $motifs
        );
        $this->load->view('demandeConge',$data);
    }
    public function envoiDemande()
    {
        $idEmp = $this->input->post('idEmploye');
        $dateDebut = $this->input->post('dateDebut');
        $dateFin = $this->input->post('dateFin');
        $idMotif = $this->input->post('idMotif');
        $this->load->model('conge');
        $this->conge->sendDemande($idEmp,$idMotif,$dateDebut,$dateFin);

        $motifs = $this->conge->getMotifs();
        $data = array(
            "motif" => $motifs,
            "send" => "Demande envoyée"
        );
        $this->load->view('demandeConge',$data);
    }
}