<?php if(! defined('BASEPATH')) exit('NO direct script access allowed');
class EmployeModel extends CI_Model
{

   public function getEmploye($id){
     $query = "select * from employe_view where idEmploye= %s";
     $query = sprintf($query,$id);
     $result = $this->db->query($query)->row_array();
     // $query->freeResult();
     return $result;
   }
   
}?>