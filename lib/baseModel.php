<?php

require_once("lib/cloudstack.php");
require_once("lib/cloudstack_sign.php");

class baseModel {

	public $cloudstack;
	public $cloudstack_sign;

	function __construct() {
		$this->cloudstack = new cloudstack();
		$this->cloudstack_sign = new cloudstack_sign();
	}
	//laad database 0 /// a.k.a cloudstack database
	function conDB(){
		$this->db = new Database();
	}
	//laad database 1 /// a.k.a debian database
	function conDB1(){
		$this->db = new Database1();
	}

}