<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RHController extends CI_Controller {

	public function index()
	{
		$this->load->model('Orga');
        $data=array();
       $data['Organigram']= $this->Orga->LoadData();
	   $data['viewRH']='Organigramme';
    //   var_dump($this->Orga->LoadData());
		$this->load->view('rh',$data);
	}		
}
