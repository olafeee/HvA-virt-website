<?php

/**
* 
*/
class orderModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getValue($table){
			    $sqlArray = $this->db->selectAll("SELECT * FROM $table");
                print_r($sqlArray)
                return $sqlArray;
	}

}

?>
