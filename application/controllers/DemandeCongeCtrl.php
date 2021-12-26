<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class DemandeCongeCtrl extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
    public function index()
    {
        $this->load->model('conge');
        $demandes = $this->conge->getDemandeEnCours();
        $data = array(
            "view" => 'listeDemande',
            "demandes" =>$demandes
        );
        $this->load->view ('template',$data);
    }
    public function demanderDeductible(){
        $this->load->model('conge');
        $motifs = $this->conge->getMotifsDeductible();
        $data = array(
            "view" => 'demandeConge',
            "motif" => $motifs
        );
        $this->load->view('template',$data);
    }
    public function demanderNonDeductible(){
        $this->load->model('conge');
        $motifs = $this->conge->getMotifsNonDeductible();
        $data = array(
            "view" => 'justificatifConge',
            "motif" => $motifs
        );
        $this->load->view('template',$data);
    }
    public function envoiDemande()
    {
        $idEmp = $this->input->post('idEmploye');
        $dateDebut = $this->input->post('dateDebut');
        $dateFin = $this->input->post('dateFin');
        $idMotif = $this->input->post('idMotif');
        $this->load->model('conge');

        $controleDate = $this->conge->controleDate($dateDebut,$dateFin);
        if ($controleDate!="Date Conge Valide"){
            $motifs = $this->conge->getMotifsDeductible();
            $data = array(
                "view" => 'demandeConge',
                "motif" => $motifs,
                "erreur" => $controleDate
            );
            $this->load->view('template',$data);
        }else{
            $this->conge->sendDemande($idEmp,$idMotif,$dateDebut,$dateFin);

            $motifs = $this->conge->getMotifsDeductible();
            $data = array(
                "view" => 'demandeConge',
                "motif" => $motifs,
                "send" => "Demande envoyée"
            );
            $this->load->view('template',$data);
        }
        
    }
    public function accepter()
    {
        $this->load->model('conge');
        $reponse = null;
        $idDemande = $this->input->post('idDemande');
        $dateDebut = $this->input->post('dateDebut');
        $idDepartement = $this->input->post('idDepartement');

        if (!empty($this->input->post('confirmation'))){
            $reponse = $this->conge->accepterDemande($idDemande,$dateDebut,$idDepartement,$this->input->post('confirmation'));
        }else{
            $reponse = $this->conge->accepterDemande($idDemande,$dateDebut,$idDepartement,null);
        }


        if ($reponse != "Demande Acceptée"){
            $data = array(
                "view" => 'confirmation',
                "reponse" => $reponse,
                "idDemande" => $idDemande,
                "dateDebut" =>$dateDebut,
                "idDepartement"=> $idDepartement
            );
            $this->load->view ('template',$data);
        }else{
            $demandes = $this->conge->getDemandeEnCours();

            $this->conge->sendNotfication($idDemande);
            
            $data = array(
                "view" => 'listeDemande',
                "demandes" =>$demandes,
                "reponse" => $reponse
            );
            $this->load->view ('template',$data);
        }
        
    }
    public function accepterNonDeductible()
    {
        $idEmp = $this->input->post('idEmploye');
        $dateDebut = $this->input->post('dateDebut');
        $dateFin = $this->input->post('dateFin');
        $idMotif = $this->input->post('idMotif');
        $this->load->model('conge');
        
        $controleDate = $this->conge->controleDate($dateDebut,$dateFin);
        if ($controleDate!="Date Conge Valide"){
            $motifs = $this->conge->getMotifsNonDeductible();
            $data = array(
                "view" => 'justificatifConge',
                "motif" => $motifs,
                "erreur" => $controleDate
            );
            $this->load->view('template',$data);
        }else{

            $this->conge->accepterND($idEmp,$idMotif,$dateDebut,$dateFin);

            $motifs = $this->conge->getMotifsNonDeductible();
            $data = array(
                "view" => 'justificatifConge',
                "motif" => $motifs,
                "send" => "Demande prise en compte"
            );
            $this->load->view('template',$data);
        }
    }
    public function refuser()
    {
        $this->load->model('conge');
        $refus = $this->conge->refuserDemande($this->input->post('idDemande'));

        $demandes = $this->conge->getDemandeEnCours();
        $data = array(
            "view" => 'listeDemande',
            "demandes" =>$demandes,
            "reponse" =>$refus
        );
        $this->load->view ('template',$data);
    }
    
}