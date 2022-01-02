<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Demande extends CI_Model{

    public function insert($label,$quatite,$unite,$idDepartement){
        $query = "insert into demande values (null,'".$label."',".$quatite.",'".$unite."','".$idDepartement."','envoye')";
		$this->db->query($query);
    }

    public function getDemande()
	{
        $sql = "SELECT id,dem.idDepartement,label,nom,quantite,unite,etat FROM demande dem 
        join departement dep on dep.idDepartement = dem.idDepartement 
        WHERE id not in (select idDemande from detailDemandeGrouper)
         and etat != 'refuser' order by etat";
        //var_dump($sql);
        $query = $this->db->query($sql);
        $val = array();
        $i = 0;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val[$i][$key] = $value;  
            }
            $i++;
        }
        return $val;
	}

    public function find($idDemande)
	{
        $sql = "SELECT * from demande where id = '".$idDemande."'";
        $query = $this->db->query($sql);
        $val = array();
        $i = 0;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val[$i][$key] = $value;  
            }
            $i++;
        }
        return $val;
	}

    public function insertDemandeGrouper($label,$qtt){
        $query = "insert into demandeGrouper values (null,'".$label."',".$qtt.")";
		$this->db->query($query);
    }

    public function findLastEntry (){
        $sql = "SELECT max(idDemandeGrouper) from demandeGrouper";
        $query = $this->db->query($sql);
        $val = array();
        $i = 0;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val[$i][$key] = $value;  
            }
            $i++;
        }
        return $val;
    }

    public function insertDetailDemandeGrouper($label,$qtt){
        $query = "insert into detailDemandeGrouper values ('".$label."',".$qtt.")";
		$this->db->query($query);
    }



    public function grouper($liste){
        $somme =0.0;
        $dem;
        $label;
        for($i =0 ;$i<count($liste);$i++){
            $dem[]=$this->find($liste[$i]);
            $somme+=$dem[$i][0]['quantite'];
            $label = $dem[$i][0]['label'];
        }
        $this->load->model('DemandeGrouper');
        $this->DemandeGrouper->insert($label,$somme,$liste);

        // for($i=0$i<count($dem);)
        //var_dump(count($liste));
    }

    public function findByIdDepartement($idDepartemet)
	{
        $sql = "SELECT * from demande where idDepartement = '".$idDepartemet."' order by id DESC";
        $query = $this->db->query($sql);
        $val = array();
        $i = 0;
        foreach($query -> result_array() as $row)
        {
            foreach($row as $key => $value)
            {
                $val[$i][$key] = $value;  
            }
            $i++;
        }
        return $val;
	}

    
}