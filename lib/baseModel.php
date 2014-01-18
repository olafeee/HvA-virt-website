<?php

class baseModel {

	function __construct() {
		$this->db = new Database();
	}

	function conDB(){
		
	}

	function conDB1(){
		$this->db1 = new Database();
	}

}