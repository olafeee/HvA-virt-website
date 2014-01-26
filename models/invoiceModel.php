<?php

/**
* 
*/

class invoiceModel extends baseModel
{


	function __construct()
	{
		parent::__construct();
	}

     function getAll($limit){
                   $sqlArray = $this->db->selectAll("SELECT * FROM invoice_files LIMIT $limit,30");
                return $sqlArray;
     }

     function getOnTime($date){
                   $day = substr($date, 0, 10);
				   //$sqlArray = $this->db->selectAll("SELECT * FROM invoice_files WHERE date LIKE '$day%'");
				   $sqlArray = $this->db->selectAll("SELECT * FROM invoice_files WHERE SUBSTRING('$day',1,10)"
                return $sqlArray;
     }

}

