<?php

class baseModel {

	function __construct() {
	}

	function conDB(){
		$this->db = new Database();
		$this->db->conDB();
	}

}