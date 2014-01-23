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

	function getRoleByPage(){
			    $sqlArray = $this->db->select('SELECT * 
													FROM CMS_pages_rollen
													INNER JOIN CMS_pages
													ON CMS_pages_rollen.pageid = CMS_pages.pageid
													WHERE CMS_pages.page = :page', 
                									array('page' => 'index'));
                return $sqlArray;
	}
}