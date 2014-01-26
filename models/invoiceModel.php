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
                   $sqlArray = $this->db->selectAll("SELECT * FROM invoice_files LIMIT $limit,2");
                return $sqlArray;
     }

     function getOnTime($limit){
                   $sqlArray = $this->db->selectAll("SELECT * FROM invoice_files WHERE ");
                return $sqlArray;
     }

}

