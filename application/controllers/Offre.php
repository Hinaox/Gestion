<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Offre extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/Fiche
     *	- or -
     * 		http://example.com/index.php/Fiche/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/Fiche/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AjouterOffre');
        $this->load->model('Orga');

        $this->load->helper('url');
    }
    public function index()
    {
        $nomPoste=$this->input->get('FormNomEmp');
        echo $nomPoste;
        $detailsPoste=$this->Orga->getPosteIdByNomPoste($nomPoste);
        $posteId=$detailsPoste[0]['idPoste'];
        $poste = $this->AjouterOffre->getPosteById($posteId);
        // eto no soloina le izy $_GET['grade] de lasa diplome
        $categ=$this->input->get('FormPost');
        $diplomesInfo=$this->Orga->getDiplomeByidCateg($categ);
        // var_dump($diplomesInfo);
        $diplomesId=$diplomesInfo[0]['idcat'];
        var_dump($diplomesId);
        $diplomes = $this->AjouterOffre->getDiplomeByCateg($diplomesId);
        // var_dump($diplomes);
        $data=array();
        $data['postenom']=$poste;
        $data['diplomes']= $diplomes;
        $this->load->view('ajoutOffre',$data);
    }
    // public function pageAjoutOffre(){
    //     // eto no soloina get le izy $_GET['idPoste]
    //     $posteId=1;
    //     $poste = $this->AjouterOffre->getPosteById($posteId);
    //     // eto no soloina le izy $_GET['grade] de lasa diplome
    //     $diplomes = $this->AjouterOffre->getDiplomeByCateg(4);
    //     // var_dump($diplomes);
    //     $data=array();
    //     $data['postenom']=$poste;
    //     $data['diplomes']= $diplomes;
    //     $this->load->view('ajoutOffre',$data);
    // }
    public function index2()
    {
        $this->load->helper('url');
        $data = array();
        $listeOffres = $this->AjouterOffre->getListeOffre();
        // $diplomes = $this->AjouterOffre->getDiplomesOffre();
        // $data['diplomes'] = $diplomes;
        // var_dump($listeOffres);
        $data['listeOffres'] = $listeOffres;
        $this->load->view('ListeOffre', $data);
    }
    public function insertOffre()
    {
        date_default_timezone_set('Indian/Antananarivo');
        $data = array();
        $data['Poste']  = $this->input->post('poste');
        $data['description'] = $this->input->post('Description');
        $data['responsabilite'] = $this->input->post('responsabilite');
        $data['ageMin']  = $this->input->post('ageMIn');
        // $data['']  = $this->input->post('ageMax');
        $data['idDiplomeOffre']  = $this->input->post('diplomes');
        $data['Experiences']  = $this->input->post('experience');
        $data['AutreExperience']  = $this->input->post('AutreExigences');
        $date = $this->input->post('date');
        $mysqlDate = date("Y-m-d", strtotime($date));
        $data['dateLimite'] = $mysqlDate;
        echo $data['dateLimite'];
        // echo $post . '</br>' . $responsabilite . '</br>' . $Description . '</br>' . $ageMIn;
        // echo $ageMax . '</br>' . $diplomes . '</br>' . $experience . '</br>' . $AutreExigences . '</br>' . $date;
        $response = $this->AjouterOffre->insertOffre($data);
        if ($response == true) {
            echo "Records Saved Successfully";
        } else {
            echo "Insert error !";
        }
    }
}
