<?php


class BDtable Extends CI_Controller

{
	
	function __construct()
	{
		
	}

    

	public function MakaConnex()
    {
        return $this->Connex;
    }

    
    public function setConnex($Conn)
    {
        $this->Connex = $Conn;
    }

    public function MakaReflectionClass()
    {
        $nom=get_class($this);
        $ReflectCla = new ReflectionClass($nom);
        return $ReflectCla;
    }

    public function MakaNomTable($ReflectCla)
    {
        $nomTable = $ReflectCla->getName();
        return $nomTable;
    }

    public function MakaAttributs($ReflectCla)
    {
        /**
        * fonction Reflect maka attribut rehetra
        * maka attributs
        **/
        return $ReflectCla->getproperties();
    }

    public function MakaNameAttributs($attributs)
    {
        $nomAtr=array();
        $indice=0;
        foreach ($attributs as $atr) 
        {
            $nomAtr[$indice] = $atr->getName();
            $indice++;
        }
        return $nomAtr;
    }

    public function MakaMethodesName($attributs)
    {
        $methodName= array();
        $indice=0;
        foreach ($attributs as $atr) 
        {
            $methodName[$indice] = 'get'.$atr->getName();
            $indice++;
        }
        return $methodName;
    }

    public function MakaSettersName($attributs)
    {
        $methodName= array();
        $indice=0;
        foreach ($attributs as $atr) 
        {
            $methodName[$indice] = 'set'.$atr->getName();
            $indice++;
        }
        return $methodName;
    }

    public function MakaMethodes($methodName)
    {
        $ReflectCla=$this->MakaReflectionClass();
        $method=array();
        $indiceMethode=0;
        for($i=0;$i<count($methodName);$i++)
        {
            $method[$indiceMethode]= $ReflectCla->getMethod($methodName[$i]) ;
            $indiceMethode++;
        }
        return $method;
    }

    public function MakaValeurMethodes($method)
    {
        $valeur=array();
        $indiceAttribut=0;
        $indiceMethode=0;
        for($i=0;$i<count($method);$i++)
        {
            $valeur[$indiceAttribut]= $method[$indiceMethode]->invoke($this);
            $indiceAttribut++;
            $indiceMethode++;
        }
        return $valeur;
    }

    public function Insert($conex)
    {
        $ReflectCla=$this->MakaReflectionClass();
    	$nomTable = $this->MakaNomTable($ReflectCla);
        /**
        * maka attributs
        **/
    	$attributs=$this->MakaAttributs($ReflectCla);
    	$indice=0;
    	/**
		* nom de chaque methode
    	*/
    	$methodName=$this->MakaMethodesName($attributs);
    	/**
        * les Methodes
        */
        $method=$this->MakaMethodes($methodName);
        $valeur=$this->MakaValeurMethodes($method);
        /**
        *les valeurs dans un string
        */
        $requete="insert into ".$nomTable." values"."(";
        for($i=0;$i<count($valeur);$i++)
        {
            
            
            if(is_double($valeur[$i])==true || is_float($valeur[$i])==true || is_integer($valeur[$i])==true || is_long($valeur[$i])==true)
            {
                if($i!=count($valeur)-1)
                {
                    $requete = $requete."$valeur[$i],";
                }
                else
                {
                    $requete = $requete."$valeur[$i])";
                }
            }
            else
            {
                if($i!=count($valeur)-1)
                {
                    $requete = $requete."'$valeur[$i]',";
                }
                else
                {
                    $requete = $requete."'$valeur[$i]')";
                }
            }
        }
        //echo $requete;
        $conex->exec($requete);
    }



    public function update($conex)
    {
        $ReflectCla=$this->MakaReflectionClass();
        $nomTable = $this->MakaNomTable($ReflectCla);
        $attributs=$this->MakaAttributs($ReflectCla);
        $methodName=$this->MakaMethodesName($attributs);
        /**
        * les Methodes
        */
        $method=$this->MakaMethodes($methodName);
        $valeur=$this->MakaValeurMethodes($method);
        $nomAtr=$this->MakaNameAttributs($attributs);
        $set="";
        for($i=1;$i<count($attributs);$i++)
        {
            if(is_double($valeur[$i])==true || is_float($valeur[$i])==true || is_integer($valeur[$i])==true || is_long($valeur[$i])==true)
            {
                if($i!=count($attributs)-1)
                {

                    $set = $set.$nomAtr[$i]." = ".$valeur[$i].",";
                }
                else
                {
                    $set = $set.$nomAtr[$i]." = ".$valeur[$i]." ";
                }
            }
            else
            {
                if($i!=count($attributs)-1)
                {

                    $set = $set.$nomAtr[$i]." = "."'$valeur[$i]'".",";
                }
                else
                {
                    $set = $set.$nomAtr[$i]." = "."'$valeur[$i]'"." ";
                }
            }
            
        }
        $where=" where ".$nomAtr[0]." = ".$valeur[0];
        $requete="UPDATE ".$nomTable." Set ".$set.$where;
        $conex->exec($requete);
    }

    public function delete($conex)
    {
        $ReflectCla=$this->MakaReflectionClass();
        $nomTable = $this->MakaNomTable($ReflectCla);
        $attributs=$this->MakaAttributs($ReflectCla);
        $methodName=$this->MakaMethodesName($attributs);
        /**
        * les Methodes
        */
        $method=$this->MakaMethodes($methodName);
        $valeur=$this->MakaValeurMethodes($method);
        $nomAtr=$this->MakaNameAttributs($attributs);
        $set="";
        for($i=0;$i<count($attributs);$i++)
        {
            if(is_double($valeur[$i])==true || is_float($valeur[$i])==true || is_integer($valeur[$i])==true || is_long($valeur[$i])==true)
            {
                if($i!=count($attributs)-1)
                {

                    $set = $set.$nomAtr[$i]." = ".$valeur[$i]." AND ";
                }
                else
                {
                    $set = $set.$nomAtr[$i]." = ".$valeur[$i]." ";
                }
            }
            else
            {
                if($i!=count($attributs)-1)
                {

                    $set = $set.$nomAtr[$i]." = "."'$valeur[$i]'"." AND ";
                }
                else
                {
                    $set = $set.$nomAtr[$i]." = "."'$valeur[$i]'"." ";
                }
            }
            
        }
        $requete="DELETE from ".$nomTable." where ".$set;
        $conex->exec($requete);
    }

    public function ExecuteList($conex,$requete)
    {
        $ReflectCla=$this->MakaReflectionClass();
        $nomTable = $this->MakaNomTable($ReflectCla);
        $attributs=$this->MakaAttributs($ReflectCla);

        $compteur=0;

        $stmt = $conex->query($requete);
        $stmt->setFetchMode(PDO::FETCH_NUM);

        while (($ito = $stmt->fetch())) {
            $compteur++;
        }


        /**
         * creation du retour de class BDtable et celui de l objet apellant
         */
        $reponse = array();
        $indiceRep=0;
        for($i=0;$i<$compteur;$i++)
        {
            $reponse[$i]=clone $this;
        }
        /**
         * les setters de la classe
         */

        if($reponse==null)
        {
            return null;
        }
        $settersName=$reponse[0]->MakaSettersName($attributs);
        $Methodsetters=$reponse[0]->MakaMethodes($settersName);
        $indiceSetters=0;
        /**

         */
        $stmt = $conex->query($requete);
        $stmt->setFetchMode(PDO::FETCH_NUM);
        while (($it = $stmt->fetch()))
        {
            for($i=0;$i<count($attributs);$i++)
            {
                $Methodsetters[$indiceSetters]->invoke($reponse[$indiceRep],$it[$i]);
                $indiceSetters++;
            }
            $indiceSetters=0;
            $indiceRep++;
        }
        return $reponse;
    }

    public function find($conex)
    {
        $ReflectCla = $this->MakaReflectionClass();
        $nomTable = $this->MakaNomTable($ReflectCla);
        $attributs = $this->MakaAttributs($ReflectCla);
        $methodName = $this->MakaMethodesName($attributs);
        /**
         * les Methodes
         */
        $method = $this->MakaMethodes($methodName);
        $valeur = $this->MakaValeurMethodes($method);
        $nomAtr = $this->MakaNameAttributs($attributs);

        /**
         * recherche de tout les attributs non null
         */
        $atrNonNull = array();
        $nomAtrNonNull = array();
        $indiceAttributNonNull = 0;
        for ($i = 0; $i < count($attributs); $i++) {

            if ($valeur[$i] != null) {
                $atrNonNull[$indiceAttributNonNull] = $valeur[$i];
                $nomAtrNonNull[$indiceAttributNonNull] = $nomAtr[$i];
                $indiceAttributNonNull++;
            }
        }

        /**
         *  initialisation de la requete
         */

        $requete = "";
        if (count($atrNonNull) == 0) {
            $requete = "select * from " . $nomTable;
        } else {
            $requete = "select * from " . $nomTable . " where ";
            $where = "";
            for ($i = 0; $i < count($atrNonNull); $i++) {
                if (is_double($atrNonNull[$i]) == true || is_float($atrNonNull[$i]) == true || is_integer($atrNonNull[$i]) == true || is_long($atrNonNull[$i]) == true) {
                    if ($i != count($atrNonNull) - 1) {
                        $where = $where . $nomAtrNonNull[$i] . " = " . $atrNonNull[$i] . " AND ";
                    } else {
                        $where = $where . $nomAtrNonNull[$i] . " = " . $atrNonNull[$i] . " ";
                    }
                } else {
                    if ($i != count($atrNonNull) - 1) {
                        $where = $where . $nomAtrNonNull[$i] . " = " . "'$atrNonNull[$i]'" . " AND ";
                    } else {
                        $where = $where . $nomAtrNonNull[$i] . " = " . "'$atrNonNull[$i]'" . " ";
                    }
                }
            }
            $requete = $requete . $where;
        }

        $valiny=$this->ExecuteList($conex,$requete);
        return $valiny;
    }
    
}

?>