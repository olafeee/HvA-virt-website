<?php

class baseModel {

	function __construct() {
	}

	//laad database 0 /// a.k.a cloudstack database
	function conDB(){
		$this->db = new Database();
	}
	//laad database 1 /// a.k.a debian database
	function conDB1(){
		$this->db = new Database1();
	}
	function conDBRole(){
		$this->dbRole = new databaseRole();
	}

	public function getRoleByPage($page){
			    $sqlArray = $this->db->select('SELECT rol_id 
													FROM CMS_pages_rollen
													INNER JOIN CMS_pages
													ON CMS_pages_rollen.pageid = CMS_pages.pageid
													WHERE CMS_pages.page = :page', 
                									array('page' => $page));
                return $sqlArray;
	}

	function getCmsIndex($table ,$part){
			    $sqlArray = $this->db->selectAll("SELECT $part FROM $table");
                return $sqlArray;
	}
	function getWhere($part, $table, $iets, $fiets){
		print_r($fiets);
		print_r($table);
		print_r($part);
			    $sqlArray = $this->db->selectAll("SELECT $part FROM $table WHERE 'CSID' = '0be19e80-4d63-4e8c-bc0e-27d84b31cdf7' ");
                return $sqlArray;
	}
}