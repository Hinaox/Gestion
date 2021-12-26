<?php


class EtatCongeEmploye extends CI_Controller
{
    public function __construct(){
		parent::__construct();
        if ($this->session->userdata('inRH')==false){
            $data = array (
                'viewRH' => 'denied'
            );
            $this -> load -> view('rh', $data);
        } 
	}
    public function index()
    {
        $idEmpl=$this->input->get('idEmpl');
        $this->load->model('conge');

        $data['congeEmpl']=$this->conge->getConger($idEmpl);
        $data['nombreCongeDed']=$this->conge->getNbrCongerDeductible($idEmpl);
        $data['nombreCongeNDed']=$this->conge->getNbrCongerNDeductible($idEmpl);
        $data['view']='AfficheConge';
        $this->load->view('template',$data);

    }

}