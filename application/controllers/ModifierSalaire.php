<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class ModifierSalaire extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
    public function afficher(){
        $this->load->model('modifierSal');

        $data['employe']= $this->modifierSal->getEmploye($this->session->userdata('idEmploye'));
        $data['montant']= $this->modifierSal->getSalaire($this->session->userdata('idEmploye'));
        $this->load->view('modifierSalaire',$data);
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
    public function versModification(){
        $data['montant'] =$this->input->get('montant');
        $this->load->model('modifierSal');
        if($this->input->get('montant') == "" ){
            $this->annulation();
        }
        $salaireMin = $this->modifierSal-> salaireMinimum($this->session->userdata('idEmploye'));
        if( $salaireMin > $this->input->get('montant')){
            $data['employe']= $this->modifierSal->getEmploye($this->session->userdata('idEmploye'));
            $data['montant']= $this->modifierSal->getSalaire($this->session->userdata('idEmploye'));
            $data['erreur']="processus d'exécution annuler !! le valeur minimale est ".$salaireMin." ariary";
            $this->load->view('modifierSalaire',$data);
        }
        $this->load->view('ConfirmeModif',$data);
    }
    public function annulation(){
        $this->load->model('modifierSal');
        $data['employe']= $this->modifierSal->getEmploye($this->session->userdata('idEmploye'));
        $data['montant']= $this->modifierSal->getSalaire($this->session->userdata('idEmploye'));
        $data['erreur']="processus d'exécution annuler !!";
        $this->load->view('modifierSalaire',$data);
    }
}