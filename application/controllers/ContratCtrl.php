
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContratCtrl extends CI_Controller
{

	public function index()
	{
		$data = array();
		///$data['content']='Admin/index';
		$this->load->model('Contrat');
		//$id = $this->input->post('id');
		//$data['info'] = $this->Employe->get_Employe($id);
		///$data['info'] = $this->Contrat->get_Employe(6);

		$data['poste'] = $this->Contrat->get_All_Poste();

		$id = $this->input->post('idEmploye');
		$data['pers']=$this->Contrat->get_pers_id($id);
		// $data['pers'] = $this->Contrat->get_pers_id(10);
		$data['viewRH']='formCDI';
		$this->load->view('rh', $data);
	}

	public function contrat()
	{
		$data = array();
		$this->load->model('Contrat');
		$Enom = $this->input->post('Enom');
		$Estat = $this->input->post('Estatut');
		$Eadresse = $this->input->post('Eadresse');
		$Eiden = $this->input->post('Eiden');
		$Erep = $this->input->post('Erep');

		$this->Contrat->insert_Employeur($Enom, $Estat, $Eadresse, $Eiden, $Erep);

		$data['employeur'] = $this->Contrat->get_employeur_nom_statut($Enom, $Estat);


		$poste = $this->input->post('poste');
		$date = $this->input->post('dateembauche');
		$idolona = $this->input->post('idolo');
		$this->Contrat->insert_Employe($idolona, $poste, $date);


		$data['pers'] = $this->Contrat->get_employe_id($idolona);

		$lieu = $this->input->post('lieu');

		$salaire = $this->input->post('salaire');
		$this->Contrat->insert_Salaire($data['pers'][0]['idEmploye'], $salaire, $date);

		$data['salaire'] =	$this->Contrat->get_salaire_Employe($data['pers'][0]['idEmploye']);
		$this->Contrat->update_employe($data['salaire'][0]['idSalaire'], $data['pers'][0]['idEmploye']);

		$this->Contrat->insert_Empemp($data['employeur'][0]['idEmployeur'], $data['pers'][0]['idEmploye']);

		$data['info1'] = $data['pers'][0]['idEmploye'];
		//$data['info'] = $this->Employe->get_Employe($id);

		$data['info'] = $this->Contrat->get_Employe($data['pers'][0]['idEmploye']);
		$data['viewRH'] = 'cdi';
		$this->load->view('rh', $data);
	}

}
