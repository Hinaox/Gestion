<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeCtrl extends CI_Controller {

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
		$this->load->model('Employe');
		$data = array();
		$idEmploye = $_GET['idEmploye'];
		//maka anaty base
		// $data = $this->Employe->getEmploye($this->input->post('idEmploye'));
		$data = ($this->Employe->getEmployeFromBase($this->db, $idEmploye))[0];
		$this->load->view('fiche',$data);
	}

	public function liste() {
		$this->load->model('Employe');
		$this->load->model('departement');
        $liste_emp = $this->Employe->getEmployes($this->db);
		$liste_dept = $this->departement->getDepartements($this->db);

        $data = array(
            "employes" => $liste_emp,
			"departements" => $liste_dept
        );

        $this->load->view("employes", $data);
	}

	public function filtre() {
		$this->load->model('Employe');

		$nom_prenom = $_GET['nom_prenom'];
		$departement = $_GET['departement'];

		$liste_emp =  $this->Employe->getEmployes($this->db, $nom_prenom, $departement);

		echo json_encode($liste_emp);
	}
}
