<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeController extends CI_Controller {

	public  function index() {
        $this -> load -> database();
        $this -> load -> model('Employe');
        $this -> load -> model('Departement');

        $liste_emp = $this->Employe->getEmployeFromBase($this->db);
        $liste_dept = $this->Departement->getDepartements($this->db);

        $data = array (
            'liste_emp' => $liste_emp,
            'viewRH' => 'liste_employes',
            'liste_dept' => $liste_dept
        );

        $this -> load -> view('rh', $data);
    }	
	public function fiche()
	{
		$this->load->model('Employe');
		$data = array();
		$idEmploye = $_GET['idEmploye'];
		//maka anaty base
		// $data = $this->Employe->getEmploye($this->input->post('idEmploye'));
		$data = ($this->Employe->getEmployeFromBase($this->db, $idEmploye))[0];
        $data['view']='fiche';
		$this->load->view('templateUser',$data);
	}
	
    public  function filtrer() {
        $this -> load -> database();
        $this -> load -> model('Employe');

        // echo $_POST['nom'];

        $liste_emp = $this->Employe->getEmployeFromBase($this->db, $_POST['matricule'], $_POST['nom'], $_POST['prenom'], $_POST['departement'], $_POST['poste']);
        echo json_encode($liste_emp);
    }

    public function changerDept() {
        $this -> load -> database();
        $this -> load -> model('Departement');

        $dept = $_POST['departement'];

        $liste_postes = $this->Departement->getPostes($this->db, $dept);
        echo json_encode($liste_postes);
    }
}
