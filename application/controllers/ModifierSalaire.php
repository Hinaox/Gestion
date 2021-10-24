<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModifierSalaire extends CI_Controller {
    public  function index() {
        $data['coucou']=null;
        $this -> template('ModifierSalaire',$data);
    }
    public function template($page,$data){
		$data['template'] = $page.'.php';
		$this->load->view('template',$data);
	}
    
}

?>