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
		$data['listeBP'] = $this->BPModel->getListeBP();
		$this->load->view('listeBP',$data);
		
	}	

	public function getBP()
	{
		$this->load->model('BPModel');
		$idFichePaie = $this->input->get('idFichePaie');
		$data['listeBP'] = $this->BPModel->getBulletinDePaie($idFichePaie);

	
	}
}
