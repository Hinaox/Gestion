<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonneController extends CI_Controller {
public function __construct(){
        parent::__construct();
    }
  
    public function index()
    {
        $this->load->helper('url');
        $this->load->model('PersonneDao','pdao');
        $val = $this->pdao->getAttente();
        $data = array(
            "view" => "personne",
            "personne" => $val
        );

        $this->load->view('templateCV',$data);

    }

    public function insertentretien(){
        
        $this->load->model('PersonneDao','pdao');
        $data = array();
      
        $idpersonne=$this->input->post('idPersonne');
        $date=$this->input->post('date');
        $heure=$this->input->post('heure');
        $note=$this->input->post('note');
        if($note>49)
        {
            $this->insertentretien($idpersonne,$note,$date,$heure);
            $this->deleteAttente($idpersonne);
        }

        $data['personne'] = $this->getAttente();

      $this->load->view('personne',$data);
    }
    public function afficheEntretien(){
        $this->load->helper('url');
          $this->load->model('PersonneDao','pdao');
        $data = array();
        $data['entretien']= $this->pdao->getEntretien();
        $this->load->view('liste_view',$data);

    }
}
