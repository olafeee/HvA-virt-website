<?php

/**
* 
*/
class Database extends PDO
{
	
	public function __construct()
	{
		parent::__construct();
	}

	function conCS(){
		$conn = new PDO(DB_TYPE.':host='.DB_HOST.';port=3307;dbname='.DB_NAME, DB_USER, DB_PASS);
	}

	function conDB(){
		
		$conn = new PDO(DB_TYPE.':host='.DB_HOST1.';port=3307;dbname='.DB_NAME1, DB_USER1, DB_PASS1);
	}
}

?>