<?php if(! defined('BASEPATH')) exit('NO direct script access allowed');
class BPModel extends CI_Model
{
    public function getListeBP()
	{
        $sql="SELECT * from listeBulletin";
        // $sql = sprintf($sql,$this->db->escape($idEmploye));
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
		return $listeBP;
	}

    public function getBulletinDePaie($idFichePaie)
    {
        $sql = $this->db->query('SELECT * from fichePaie where idFichePaie=%d');
        $sql = sprintf($sql,$this->db->escape($idFichePaie));
        $query = $this->db->query($sql);
		// $bulletinDePaie=array();
        
        foreach($query->result_array() as $row)
		
            $ligne=array();
            foreach($row as $key => $value){
                $ligne[$key]=$value;
            }
            $bp=$ligne;
		
		return $bp;
    }

}?>