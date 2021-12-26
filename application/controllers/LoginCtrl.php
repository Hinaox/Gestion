<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginCtrl extends CI_Controller {

	public function index()
	{
        $data=array();
        $data['view']= 'login';
        $this->load->view('index',$data);
	}		
    public function traitement()
    {
        $mail= $this->input->post('email');
        $mdp = $this->input->post('mdp');
        $this->load->model('Employe','emp');
        $emp = $this->emp->checkLogin($mail,$mdp);
        if(count($emp)>0){
            if ($this->session->userdata('employe')==null)
            {
                $this->session->set_userdata('employe',$emp[0]);
                
                $bool = $this->emp->isInRH($emp[0]['idEmploye']);
                $this->session->set_userdata('inRH',$bool);
                
                $this->load->model('Orga');

                $data=array();
                $data['Organigram']= $this->Orga->LoadData();
                $data['viewRH']='Organigramme';
                $this->load->view('rh',$data);
            }       
        }else{
            $data=array(
                "erreur" => "Mail ou mot de passe incorrect"
            );
            $this->load->view('login',$data);
        }
    }
}
