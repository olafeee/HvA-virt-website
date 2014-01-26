<?php

/**
* 
*/

class invoiceModel extends baseModel {

	function __construct() {
		parent::__construct();
	}

    function getAll($limit){
        $sqlArray = $this->db->selectAll("SELECT * FROM invoice_files LIMIT $limit,30");
        return $sqlArray;
    }

    function getOnTime($date){
		if(empty($date)){ $date = date("Y-m-d");}
        $day = substr($date, 0, 10);
	    $sqlArray = $this->db->selectAll("SELECT * FROM invoice_files WHERE date LIKE '$day%' ORDER BY date ASC");
        return $sqlArray;
    }
	
	function getMyName($name){
		if(!preg_match('/^[a-zA-Z\s]+$/', $name)){ $name = "THISNAMESHOULDNEVERBEUSED";}else{ $names = explode(' ',$name);
	    $sqlArray = $this->db->selectAll("SELECT * FROM invoice_files WHERE firstname='$names[0]' AND lastname='$names[1]' ORDER BY date ASC");
        return $sqlArray;
		}
    }
}