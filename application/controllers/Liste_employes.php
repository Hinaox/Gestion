<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liste_employes extends CI_Controller {
    public  function index() {
        $this -> load -> database();
        $this -> load -> helper('Employes');
        $this -> load -> helper('Departement');

        $liste_emp = getEmployeFromBase($this->db);
        $liste_dept = getDepartements($this->db);

        $data = array (
            'liste_emp' => $liste_emp,
            'page' => 'liste_employes',
            'liste_dept' => $liste_dept
        );

        $this -> load -> view('template', $data);
    }
    public  function filtrer() {
        $this -> load -> database();
        $this -> load -> helper('Employes');

        // echo $_POST['nom'];

        $liste_emp = getEmployeFromBase($this->db, $_POST['matricule'], $_POST['nom'], $_POST['prenom'], $_POST['departement'], $_POST['poste']);

        $data = array(
            "liste_emp" => $liste_emp
        );

        $this -> load -> view('result_filter_liste_emp', $data);
    }

    public function changerDept() {
        $this -> load -> database();
        $this -> load -> helper('Departement');

        $dept = $_POST['departement'];

        $liste_postes = getPostes($this->db, $dept);

        $data = array (
            'liste_postes' => $liste_postes
        );
        $this -> load -> view('result_filter_liste_postes', $data);
    }


}

?>