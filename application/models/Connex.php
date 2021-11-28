<?php

class Connex
{
	function __construct()
	{
		
	}

	function getConnexion($dsn,$util,$mdp)
	{
		$db=new PDO($dsn,$util,$mdp);
		return $db;
	}


}

?>