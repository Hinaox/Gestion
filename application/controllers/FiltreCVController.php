<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FiltreCVController extends CI_Controller {
	public function __construct(){
		parent::__construct();
        if ($this->session->userdata('inRH')==false){
            $data = array (
                'viewRH' => 'denied'
            );
            $this -> load -> view('rh', $data);
			return;
        } 
		
	}
	public function index()
	{
		$this->load->helper('url');
		$data = array(
			"view" => "filtre"
		);

		$this->load->view('templateCV',$data);
	}
	public function tousCV(){
		$this->load->model('filtre');
		$all = $this->filtre->getAllCV();
		$data = array(
			"view" => "tousLesCV",
			"filtre" => $all
		);
		$this->load->view('templateCV',$data);
	}
	public function filtreCV(){
		
		$this->load->model('filtre');
		$data = array();

		$matrimoniale = $this->input->post('matrimoniale');
		$ageMin = $this->input->post('ageMin');
		$distanceMax = $this->input->post('distanceMax');
		$langue = $this->input->post('langue');
		$sexe = $this->input->post('sexe');
		$poste = $this->input->post('poste');
		$domaine = $this->input->post('domaine');
		$diplome = $this->input->post('titreDiplome');
		$grade = $this->input->post('titreGrade');
		// $annee = $this->input->post('annee');


		// $matrimoniale ='Mariée';
		// $ageMin =20;
		// $distanceMax =1;
		// $langue ='';
		// $sexe = 'F';
		// $poste = "caissier";
		// $domaine = 'financier';
		// $diplome = 'BACC';
		// $annee = $this->input->post('annee');


		$filtre= $this->filtre->getFiltre($matrimoniale,$ageMin,$distanceMax,$langue,$sexe,$poste,$domaine,$diplome,$grade);
		$data = array(
			"view" => "resultat_filtre",
			"filtre" => $filtre
		);

		$this->load->view('templateCV',$data);
	}
}