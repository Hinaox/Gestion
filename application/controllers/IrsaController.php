<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class IrsaController extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
	
	public function updateIrsa(){
                $this->load->model('irsa');
                if($this->input->post('max1')!='' || $this->input->post('taux1')!=''){
                        $this->irsa->modifyIrsa(1,'',$this->input->post('max1'),$this->input->post('taux1'));
                }
                if($this->input->post('max2')!='' || $this->input->post('taux2')!='' || $this->input->post('min2')!=''){
                        $this->irsa->modifyIrsa(2,$this->input->post('min2'),$this->input->post('max2'),$this->input->post('taux2'));
                }
                if($this->input->post('max3')!='' || $this->input->post('taux3')!='' || $this->input->post('min3')!=''){
                        $this->irsa->modifyIrsa(3,$this->input->post('min3'),$this->input->post('max3'),$this->input->post('taux3'));
                }
                if($this->input->post('max4')!='' || $this->input->post('taux4')!='' || $this->input->post('min4')!=''){
                        $this->irsa->modifyIrsa(4,$this->input->post('min4'),$this->input->post('max4'),$this->input->post('taux4'));
                }
                if($this->input->post('min5')!='' || $this->input->post('taux5')!=''){
                        $this->irsa->modifyIrsa(5,$this->input->post('min5'),'',$this->input->post('taux5'));
                }

                $data['succes']="L'IRSA a bien été modifié";
                $data['irsa'] = $this->irsa->getIrsa();

                $this->load->view('irsa',$data);

	}
        public function index(){
                $this->load->model('irsa');
                $data['irsa'] = $this->irsa->getIrsa();
                $this->load->view('irsa',$data);
        }
}