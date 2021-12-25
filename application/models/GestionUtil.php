<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class GestionUtil extends CI_Model{
   public function getEmployeById($id){
     $query = "select * from employe_view where idEmploye= %s";
     $query = sprintf($query,$id);
     $result = $this->db->query($query)->row_array();
     return $result;
   }
   public function isRH($id)
   {
       $emp = $this->getEmployeById($id);
       if($emp['nomDepartement']=="ressource humaine")
       {
           return true;
       }
       return false;
   }
}
?>
