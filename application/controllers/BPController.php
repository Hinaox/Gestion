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
	public function index()
	{
		$this->load->view('welcom_message');
		
	}
	
	public function listeBP()
	{
		$this->load->model('BPModel');
		$data=array();
		$nbPage=$this->BPModel->nbPagination();
		$data['nbPage']=$nbPage/20;
		$data['listeBP'] = $this->BPModel->getListeBP();
		$this->load->view('listeBP',$data);
		
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
		$this->load->view('viewTest',$data);
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

