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
    public function index()
    {
        $this->load->helper('url');
        $data = array();
        //maka anaty base
        // $data['nom'] = "RAKOTO";
        // $data['prenom'] = "ZAFY";
        // $data['matricule'] = "781227";
        // $data['photo'] =  base_url("assets/photos/icon.png");

        $this->load->view('ajoutOffre', $data);
    }
}
