<?php

class baseModel {

	function __construct() {
	}

	function conDB(){
		$this->db = new Database();
	}

	function conDB1(){
		$this->db = new Database1();
	}

}