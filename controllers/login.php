<?php

require_once("lib/cloudstack.php");

class Login extends baseController {

	function __construct() {
		parent::__construct();
		$this->index('BladeVPS');
	}

	function Login() {
		if (isset($_SESSION['loggedIn'])) {
			header('location: ../account');
		} else {
			$this->runLogin();
		}
	}
	
	function runLogin() {
		if (!isset($_SESSION['loggedIn'])) {
			// laad model in
			$model = $this->laadModel();
			//selecteer de database
			$db = $model->conDB();
			$model->run();
		}
	}//eind run

	function runLogout() {

	}

}//eind class