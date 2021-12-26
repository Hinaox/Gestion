<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BPController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
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

	public function index()
	{
		$this->listeBulletin();
	}
	

	public function getBP()
	{
		$this->load->model('BPModel');
		$idFichePaie = $this->input->get('idFichePaie');
		$data['listeBP'] = $this->BPModel->getBulletinDePaie($idFichePaie);
	}

	public function listeBulletin()
	{
		$this->load->model('BPModel');
		$data=array();
		$nbPage=$this->BPModel->nbPagination();
		$data['nbPage']=$nbPage/20;
		$data['listeBP']=$this->BPModel->paginationListeBP(1,20);
		$this->load->view('listeBP',$data);
	}

	public function listeBulletinEmploye()
	{
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

	public function pagination()
	{
		$indicePage=$this->input->post('indicePage');
		$this->load->model('BPModel');
		$data=array();
		$indicePage=intval($indicePage);
		$data['listeBP']=$this->BPModel->paginationListeBP($indicePage,20);
		echo json_encode($data['listeBP']);
		// $this->load->view('viewTest',$data);
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

