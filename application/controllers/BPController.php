<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BPController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
		if ($this->session->userdata('inRH')==false){
			$data = array (
				'viewRH' => 'denied'
			);
	
			$this -> load -> view('rh', $data);
		} else{
			$this->listeBulletin();
		}
		
	}
	

	public function getBP()
	{
		if ($this->session->userdata('inRH')==false){
			$data = array (
				'viewRH' => 'denied'
			);
	
			$this -> load -> view('rh', $data);
		}else{
			$this->load->model('BPModel');
			$idFichePaie = $this->input->get('idFichePaie');
			$data['listeBP'] = $this->BPModel->getBulletinDePaie($idFichePaie);
		}
		
	}

	public function listeBulletin()
	{
		if ($this->session->userdata('inRH')==false){
			$data = array (
				'viewRH' => 'denied'
			);
	
			$this -> load -> view('rh', $data);
		}else{
			$this->load->model('BPModel');
			$data=array();
			$nbPage=$this->BPModel->nbPagination();
			$data['nbPage']=$nbPage/20;
			$data['listeBP']=$this->BPModel->paginationListeBP(1,20);
			$this->load->view('listeBP',$data);
		}
		
	}

	public function listeBulletinEmploye()
	{
		if ($this->session->userdata('inRH')==false){
			$data = array (
				'viewRH' => 'denied'
			);
	
			$this -> load -> view('rh', $data);
		}else{
			$idEmploye = $this->input->get('idEmploye');
			$nom = $this->input->get('nom');
			$this->load->model('BPModel');
			$data=array();
			// var_dump($idEmploye);
			$nbPage=$this->BPModel->nbPaginationEmploye($idEmploye);
			// var_dump($nbPage);
			$data['nbPage']=$nbPage/20;
			$data['nom']=$nom;
			$data['listeBP']=$this->BPModel->ListeBPEmploye($idEmploye,1,20);
			$data['viewRH']='listeBP';
			$this->load->view('rh',$data);
		}
	}

	public function pagination()
	{
		if ($this->session->userdata('inRH')==false){
			$data = array (
				'viewRH' => 'denied'
			);
	
			$this -> load -> view('rh', $data);
		}else{
			$indicePage=$this->input->post('indicePage');
			$this->load->model('BPModel');
			$data=array();
			$indicePage=intval($indicePage);
			$data['listeBP']=$this->BPModel->paginationListeBP($indicePage,20);
			echo json_encode($data['listeBP']);
			// $this->load->view('viewTest',$data);
		}
	}


	// public function nbPageBP()
	// {
	// 	$this->load->model('BPModel');
	// 	$data=array();
	// 	$nbPage=$this->BPModel->nbPagination();
	// 	$data['nbPage']=$nbPage/20;
	// 	$this->load->view('viewTest',$data);
	// }


}

