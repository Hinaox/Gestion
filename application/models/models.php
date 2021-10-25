<?php if(! defined('BASEPATH')) exit('NO direct script access allowed');
class Models extends CI_Model
{
	public function get_info()
	{
		// On simule l'envoi d'une requete

		// return array('auteur' => 'Chuck Norris',
		// 			'date' => '24/07/05',
		// 			'email' => 'email@ndd.fr');
		$ligne=array();
		$query = $this->db->query('SELECT * from fichePaie');
		foreach($query->result_array() as $row)
		{
			 $ligne['first_name']=$row['first_name'];
		}
		return $ligne;
	}
}?>