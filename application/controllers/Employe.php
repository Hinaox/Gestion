<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends CI_Controller {

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
	public function fiche()
	{
		$this->load->database();
		$this->load->helper("employes");
		$this->load->model('EmployeModel');
		$data = array();
		$idEmploye = $_GET['idEmploye'];
		//maka anaty base
		// $data = $this->Employe->getEmploye($this->input->post('idEmploye'));
		$data = (getEmployeFromBase($this->db, $idEmploye))[0];
		$this->load->view('fiche',$data);
	}

	public function liste() {
		$this->load->helper('employes');
		$this->load->helper('url');
		$this->load->helper('departement');
        $this->load->database();
        $liste_emp = getEmployes($this->db);
		$liste_dept = getDepartements($this->db);

        $data = array(
            "employes" => $liste_emp,
			"departements" => $liste_dept
        );

        $this->load->view("employes", $data);
	}

	public function filtre() {
		$this->load->helper('employes');
		$this->load->database();

		$nom_prenom = $_GET['nom_prenom'];
		$departement = $_GET['departement'];

		$liste_emp = getEmployes($this->db, $nom_prenom, $departement);

		echo json_encode($liste_emp);
	}
}
