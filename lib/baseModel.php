<?php

class baseModel {

	function __construct() {
	}

	function conDB(){
		$this->db = new Database();
		$db->conDB();
	}

}