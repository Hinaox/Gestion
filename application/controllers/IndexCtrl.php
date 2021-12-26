<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class IndexCtrl extends CI_Controller {

        public function __construct(){
		parent::__construct();
	}
    public function index(){
        $this->load->helper('url');
        $data = array();
        $this->load->model('AjouterOffre');

        $listeOffres = $this->AjouterOffre->getListeOffre();
        // $diplomes = $this->AjouterOffre->getDiplomesOffre();
        // $data['diplomes'] = $diplomes;
        // var_dump($listeOffres);
        $data['listeOffres'] = $listeOffres;
        $data['view']='ListeOffre';
        $this->load->view('index', $data);
    }
	
}