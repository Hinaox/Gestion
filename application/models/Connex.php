<?php

class Connex extends CI_Model
{
    private $connex;

    /**
     * @return mixed
     */
    public function getConnex()
    {
        return $this->connex;
    }

    /**
     * @param mixed $connex
     */
    public function setConnex($connex)
    {
        $this->connex = $connex;
    }


    public function getConnexion(){
        $db=new PDO('mysql:dbname=gestion;host=localhost:3306,charset=utf8','root','');
        $this->connex=$db;
        return $db;
    }


}
?>
