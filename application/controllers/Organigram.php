<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organigram extends CI_Controller {

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
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Orga');
        $this->load->helper('url');
    }
	public function index()
	{
        $data=array();
       $data['Organigram']= $this->Orga->LoadData();
	   $data['viewRH']='Organigramme';
		$this->load->view('rh',$data);
		
	}	
}
