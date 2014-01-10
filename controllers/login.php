<?php

require_once("lib/cloudstack.php");

class Login extends baseController {

	function __construct() {
		parent::__construct();	
	}
	
	function run(){
		$model = $this->laadModel();
		$model->run();
	}//eind run

}//eind class