<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FiltreCVController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Fiche
	 *	- or -
	 * 		http://example.com/index.php/Fiche/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Fiche/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$data = array();


		$this->load->view('filtre',$data);
	}
	public function tousCV(){
		$this->load->model('filtre');
		$data = array();
		$data['filtre'] = $this->filtre->getAllCV();

		$this->load->view('tousLesCV',$data);
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


		$data['filtre'] = $this->filtre->getFiltre($matrimoniale,$ageMin,$distanceMax,$langue,$sexe,$poste,$domaine,$diplome,$grade);

		$this->load->view('resultat_filtre',$data);
	}
}