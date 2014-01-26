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
                   //$sqlArray = $this->db->selectAll("SELECT * FROM invoice_files WHERE date='$date'");
				   $sqlArray = $this->db->selectAll("SELECT * FROM invoice_files WHERE date='2014-01-25 14:08:00'");
                return $sqlArray;
     }

}

