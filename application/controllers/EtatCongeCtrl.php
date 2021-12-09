<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class EtatCongeCtrl extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
    public function index()
    {
        $this->load->model('conge');
        $etat = $this->conge->getEtatConge();
        $data = array(
            "view" => 'listeEtatConge',
            "etat" =>$etat
        );
        $this->load->view ('template',$data);
    }
    
}