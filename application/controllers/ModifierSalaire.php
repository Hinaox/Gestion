<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class ModifierSalaire extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if ($this->session->userdata('inRH')==false){
            $data = array (
                'viewRH' => 'denied'
            );
            $this -> load -> view('rh', $data);
        } 
	}
    public function afficher(){
        $this->load->model('modifierSal');
        $idEmploye = $this->input->get('idEmploye');
        $data = array ();
        $data['employe']= $this->modifierSal->getEmploye($idEmploye)[0];
        $data['montant']= $this->modifierSal->getSalaire($idEmploye);
        
        $data['viewRH']= "modifierSalaire";
        $this->load->view('rh',$data);
    }
    public function index(){
        $this->load->model('modifierSal');
        $idEmploye = $this->input->get('idEmploye');
        $this->session->set_userdata('idEmploye',$idEmploye);
        var_dump($this->session->userdata('idEmploye'));
        $this->afficher();
    }
    public function modification(){
        $this->load->model('modifierSal');
        $montant = $this->input->get('montant');
        $data['idEmploye']= $this->modifierSal->getEmploye($this->session->userdata('idEmploye'));
        $data['montant']= $this->modifierSal->getSalaire($this->session->userdata('idEmploye'));
        $this->modifierSal->modifierSalaire($this->session->userdata('idEmploye'),$montant);
        $this->afficher();
    }
}