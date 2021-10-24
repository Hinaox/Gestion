<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class IrsaController extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
	
	public function inscription(){
        $this->load->model('irsa');
        $this->irsa->modifyIrsa(1,0,$this->input->post('max1'),$this->input->post('taux1'));
        $this->irsa->modifyIrsa(2,$this->input->post('min2'),$this->input->post('max2'),$this->input->post('taux2'));
        $this->irsa->modifyIrsa(3,$this->input->post('min3'),$this->input->post('max3'),$this->input->post('taux3'));
        $this->irsa->modifyIrsa(4,$this->input->post('min4'),$this->input->post('max4'),$this->input->post('taux4'));
        $this->irsa->modifyIrsa(5,$this->input->post('min5'),$this->input->post('max5'),$this->input->post('taux5'));

        $data['succes']="Le taux d'IRSA a bien été modifié";
           
        $this->load->view('index',$data);

	}
}