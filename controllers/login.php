<?php

require_once("lib/cloudstack.php");

class Login extends baseController {

	public cloudstack = new cloudstack();

	function __construct() {
		parent::__construct();	
	}
	
	function run(){
		$model = $this->loadModel();
		$model->run();
	}//eind run

	function login($username, $password){
		$cloudstack->login($username, $password);
	}

	function logout(){
		$cloudstack->logout();
	}
}//eind class