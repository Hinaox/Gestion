<?php


class EtatCongeEmploye extends CI_Controller
{
    public function index()
    {
        $idEmp=$_GET['idEmpl'];

        $this->load->model('Connex');
        $this->load->model('EmployeConge');
        $this->load->model('CongeEmployer');

        $co=$this->Connex->getConnexion();
        $data['congeEmpl']=$this->CongeEmployer->getConger($idEmp,$co);
        $data['nombreCongeDed']=$this->CongeEmployer->getNbrCongerDeductible($idEmp,$co);
        $data['nombreCongeNDed']=$this->CongeEmployer->getNbrCongerNDeductible($idEmp,$co);
        $this->load->view('AfficheConge',$data);

    }

}
