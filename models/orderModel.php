<?php

/**
* 
*/
class orderModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
		echo"ik doe het wel maar ook niet";
	}

	function getValue($table){
			    $sqlArray = $this->db->selectAll("SELECT * FROM $table");
                return $sqlArray;
	}

}

?>
