<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class ImmobilisationController extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}

    public function index (){
        $this->load->model('Immobilisation');
        $data['immobilisation']=$this->Immobilisation->findImmobilisationt();
        $data['view'] = 'listeImmobilisation.php';
        $this->load->view('template',$data);
    }

    public function ficheImmobilisation(){
        $id = $this->input->get('id');
        $this->load->model('Immobilisation');
        $immo = $this->Immobilisation->findImmobilisationtById($id)[0];
       // var_dump($immo);
        $tab;
        for($i=0;$i<$immo['dureExpirer'];$i++){
            $tab[]=array(
                'annee' => $i,
                'valeur' => $immo['valeur']-$immo['valeur']*$i/$immo['ammortissement']
            );
        }
       // var_dump($tab);

        $data['immobilisation']=$immo;
        $data['fiche']=$tab;

        $data['view'] = 'ficheImmobilisation.php';
        $this->load->view('template',$data);

    }
    
}