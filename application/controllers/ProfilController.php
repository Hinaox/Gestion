<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends CI_Controller {

	public function index()
	{
		$this->load->model('conge');
		$notif = $this->conge->getNotifications($this->session->userdata("employe")['idEmploye']);

		$data['notif']=$notif;
	   	$data['viewRH']='profilEmploye';
		$this->load->view('rh',$data);
	}
}
