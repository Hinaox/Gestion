<?php


class EtatCongeEmploye extends CI_Controller
{
    public function index()
    {
        $idEmpl=$_GET['idEmpl'];

        $this->load->model('Connex');
        $this->load->model('EmployeConge');
        $this->load->model('CongeEmployer');

        $co=$this->Connex->getConnexion();
        $data['congeEmpl']=$this->CongeEmployer->getConger($idEmpl,$co);
        $data['nombreCongeDed']=$this->CongeEmployer->getNbrCongerDeductible($idEmpl,$co);
        $data['nombreCongeNDed']=$this->CongeEmployer->getNbrCongerNDeductible($idEmpl,$co);
        $this->load->view('AfficheConge',$data);

    }

}