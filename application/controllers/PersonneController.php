<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonneController extends CI_Controller {
public function __construct(){
        parent::__construct();
    }
    
    public function insertIntoAttente()
    {
        $this->load->model('PersonneDao','pdao');
        $idPersonne = $this->input->get('idPersonne');
        $this->pdao->insertAttente($idPersonne);
        $val = $this->pdao->getAttente();
        $data = array(
            "view" => "personne",
            "personne" => $val
        );

        $this->load->view('templateCV',$data);
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
            $this->pdao->insertentretien($idpersonne,$note,$date,$heure);
            // $this->pdao->deleteAttente($idpersonne);
        }

        $data['personne'] = $this->pdao->getAttente();
        $data['view'] = 'personne';

      $this->load->view('templateCV',$data);
    }
    public function refuserEntretien(){
        $this->load->model('PersonneDao','pdao');
        $data = array();
      
        $idAttente=$this->input->get('idAttente');
        $this->pdao->deleteAttente($idAttente);

        $data['personne'] = $this->pdao->getAttente();
        $data['view'] = 'personne';

        $this->load->view('templateCV',$data);
    }
    public function afficheEntretien(){
        $this->load->helper('url');
          $this->load->model('PersonneDao','pdao');
        $data = array();
        $data['entretien']= $this->pdao->getEntretien();
        $data['view'] = 'liste_view';
        $this->load->view('templateCV',$data);

    }
}
