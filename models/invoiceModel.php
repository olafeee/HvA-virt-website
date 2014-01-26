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
		if(empty($date)){ $date = date("Y-m-d ");}
        $day = substr($date, 0, 10);
	    $sqlArray = $this->db->selectAll("SELECT * FROM invoice_files WHERE date LIKE '$day%' ORDER BY date ASC");
        return $sqlArray;
    }
	
	function getMyName($name){
		if(empty($name)){ $names = explode(' ',"Karel Default Name"); }
		if(!preg_match('/^[a-zA-Z\s]+$/', $name)){ $names = explode(' ',"Karel Default Name");}else{ $names = explode(' ',$name);
		//Hmm still generates error on $names[1] when $name is empty...
	    $sqlArray = $this->db->selectAll("SELECT * FROM invoice_files WHERE firstname='$names[0]' AND lastname='$names[1]' ORDER BY date ASC");
        return $sqlArray;
		}
    }
	
	function getCustomers($cusName){
		$sqlArray = $this->db->selectAll("SELECT firstname,lastname FROM invoice_files WHERE (firstname OR lastname LIKE '%$cusName%') ORDER BY firstname");
		return $sqlArray;
	}
}




