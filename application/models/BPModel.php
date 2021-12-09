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
		$bp=array();
        
        foreach($query->result_array() as $row)
        {
            $ligne=array();
            foreach($row as $key => $value){
                $ligne[$key]=$value;
            }
            $bp=$ligne;          
        }

		
		return $bp;
    }

    public function paginationListeBP($numPage,$nbElemParPage)
    {
        $sql='SELECT * FROM listeBulletin LIMIT %d,%d';
        $debut=($numPage-1)*$nbElemParPage; 
        $sql = sprintf($sql,$this->db->escape($debut),$this->db->escape($nbElemParPage));
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

    public function ListeBPEmploye($idEmploye,$numPage,$nbElemParPage)
    {
        $sql='SELECT * FROM listeBulletin  where idEmploye=%s LIMIT %d,%d';
        $debut=($numPage-1)*$nbElemParPage; 
        $sql = sprintf($sql,$this->db->escape($idEmploye),$this->db->escape($debut),$this->db->escape($nbElemParPage));
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

    public function nbPagination()
    {
        $sql="SELECT COUNT(idEmploye) FROM listeBulletin";
        $query = $this->db->query($sql);
        $val=$query->result_array();
        $res=intval($val[0]['COUNT(idEmploye)']);
        // var_dump($res);
        return $res;
    }


    public function nbPaginationEmploye($idEmploye)
    {
        $sql="SELECT COUNT(idEmploye) FROM listeBulletin where idEmploye=%s";
        $sql = sprintf($sql,$this->db->escape($idEmploye));
        $query = $this->db->query($sql);
        $val=$query->result_array();
        $res=intval($val[0]['COUNT(idEmploye)']);
        return $res;
    }

}?>