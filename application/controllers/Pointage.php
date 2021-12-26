<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pointage extends CI_Controller {

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

    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('inRH')==false){
            $data = array (
                'viewRH' => 'denied'
            );
            $this -> load -> view('rh', $data);
        } 
    }
    public function index(){
        $data['viewRH']= "pointage";
        $this->load->view('rh',$data);
    }
    public function erreur($erreur){
        $data['erreur']= $erreur;
        $data['viewRH']= "pointage";
        $this->load->view('rh',$data);
    }
    public function ajouterPointage(){
        $idEmploye = $this->input->post('idEmploye');
        $choix = $this->input->post('choix');
        $this->load->model('PointageModel');
        // $ret = $this->PointageModel->enregistrerPointage($idEmploye,$choix);
        
        $getEmploye = $this->PointageModel->getEmploye($idEmploye);
        if($getEmploye > 0 ){
            $existed = $this->PointageModel->DejaPointage($idEmploye,$choix);
            if($choix == 1){
                if($existed > 0){
                    $this->erreur("deja pointé");
                } else if($existed == -1){
                    $this->erreur("mauvais choix");
                }else{
                    $ret = $this->PointageModel->enregistrerPointage($idEmploye,$choix);
                    $this->erreur("pointage confirmer");
                }
            }
            else{
                $ret = $this->PointageModel->enregistrerPointage($idEmploye,$choix);
                $this->erreur("pointage confirmer");
            }
        }else{
            $this->erreur("Cet matricule n'existe pas");
        }
        
    }
}
