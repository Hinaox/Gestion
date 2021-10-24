<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class ModifierSalaire extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}

    public function index(){
            $this->load->view('modifierSalaire');
    }
}