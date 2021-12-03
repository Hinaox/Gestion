<?php

class CongeEmployer extends CI_Model
{
    function getConger($idEmpl,$conex)
    {
        $sql ="select * from EmployeConge where idEmp=".$idEmpl;
        $stmt = $conex->query($sql);
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $nombre=0;
        while (($it = $stmt->fetch()))
        {
            $nombre++;
        }
        $EmplConge=array($nombre);
        for($i=0;$i<$nombre;$i++)
        {
            $EmplConge[$i]=new EmployeConge();
        }
        $indice=0;

        $stm=$conex->query($sql);
        $stm->setFetchMode(PDO::FETCH_NUM);
        while (($it = $stm->fetch()))
        {
            $EmplConge[$indice]->setId($it[0]);
            $EmplConge[$indice]->setIdEmp($it[1]);
            $EmplConge[$indice]->setMotif($it[2]);
            $EmplConge[$indice]->setDateDebut($it[3]);
            $EmplConge[$indice]->setDateFin($it[4]);
            $EmplConge[$indice]->setDescription($it[5]);
            $EmplConge[$indice]->setDeductibilite($it[6]);
            $EmplConge[$indice]->setIdPoste($it[7]);
            $EmplConge[$indice]->setIdSalaire($it[8]);
            $EmplConge[$indice]->setDateEmbauche($it[9]);
            $EmplConge[$indice]->setNom($it[10]);
            $EmplConge[$indice]->setPrenom($it[11]);
            $EmplConge[$indice]->setNbrJour($it[12]);
            $indice++;
        }
        return $EmplConge;
    }

    function getNbrCongerDeductible($idEmpl,$conex)
    {
        $sql ="select SUM(NbrJour) from EmployeConge where idEmp=".$idEmpl." and deductibilite='oui' and  (select YEAR(dateDebut)) = (select YEAR(NOW()))";
        $stmt = $conex->query($sql);
        $nombre=0;
        $stmt->setFetchMode(PDO::FETCH_NUM);
        while (($it = $stmt->fetch()))
        {
            $nombre=$it[0];
        }
        return $nombre;
    }

    function getNbrCongerNDeductible($idEmpl,$conex)
    {
        $sql ="select SUM(NbrJour) from EmployeConge where idEmp=".$idEmpl." and deductibilite='non' and  (select YEAR(dateDebut)) = (select YEAR(NOW()))";
        $stmt = $conex->query($sql);
        $nombre=0;
        $stmt->setFetchMode(PDO::FETCH_NUM);
        while (($it = $stmt->fetch()))
        {
            $nombre=$it[0];
        }
        return $nombre;
    }
}