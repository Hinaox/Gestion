<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogoutCtrl extends CI_Controller {

	public function index()
	{
        $this->session->sess_destroy();
		$data=array();
        $data['view']= 'login';
        $this->load->view('index',$data);
	}	
}
