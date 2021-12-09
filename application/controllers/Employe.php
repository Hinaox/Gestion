<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Fiche
	 *	- or -
	 * 		http://example.com/index.php/Fiche/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Fiche/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function fiche()
	{
		$this->load->model('EmployeModel');
		$data = array();
		//maka anaty base
		// $data = $this->Employe->getEmploye($this->input->post('idEmploye'));
		$data = $this->EmployeModel->getEmploye("1");
		$this->load->view('fiche',$data);
	}
}
