<?php

require_once("lib/cloudstack.php");

class Register extends baseController {

	function __construct() {
		parent::__construct();
	}
	
	function register(){
		$model = $this->laadModel();
		$model->register();
	}
}