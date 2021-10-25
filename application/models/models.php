<?php if(! defined('BASEPATH')) exit('NO direct script access allowed');
class Models extends CI_Model
{
	public function getListeBulletinPaie($idEmploye)
	{
        $sql = $this->db->query('SELECT * from fichePaie where idEmploye=%d');
        $sql = sprintf($sql,$this->db->escape($idEmploye));
        $query = $this->db->query($sql);
		$listeBP=array();
		foreach($query->result_array() as $row)
		{
            $bulletinDePaie=array();
            foreach($row as $key => $value){
                $bulletinDePaie[$key]=$value;
            }
            $listeBP[]=$bulletinDePaie;
		}
		return $listeBP[0];
	}

    public function getBulletinDePaie($idFichePaie)
    {
        $sql = $this->db->query('SELECT * from fichePaie where idFichePaie=%d');
        $sql = sprintf($sql,$this->db->escape($idFichePaie));
        $query = $this->db->query($sql);
		$bulletinDePaie=array();
        
        $query->result_array() as $row)
		
            $bp=array();
            foreach($row as $key => $value){
                $bulletinDePaie[$key]=$value;
            }
            $listeBP[]=$bulletinDePaie;
		
		return $listeBP;
    }

    public function getListeAchat($caisse){
		$sql = "SELECT *  FROM v_achat where idCaisse=%d";
		$sql = sprintf($sql,$this->db->escape($caisse));
		$query = $this->db->query($sql);
		$listeAchat = array();
		foreach($query->result_array() as $row) {
			$achat = array();
			foreach($row as $key => $value){
				$achat[$key] = $value;
			}
			$listeAchat[] = $achat;
		}
		return $listeAchat;
	}


}?>