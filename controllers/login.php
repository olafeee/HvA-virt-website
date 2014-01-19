<?php

require_once("lib/cloudstack.php");

class Login extends baseController {

	function __construct() {
		parent::__construct();
		if (isset($_SESSION['loggedIn'])) {
			header('location: ../account');
		}
	}
	
	function runLogin() {
		if (!isset($_SESSION['loggedIn'])) {
			// laad model in
			$model = $this->laadModel();
			//selecteer de database
			$db = $model->conDB();
			$model->runLogin();
		}
	}//eind run

	function runLogout() {

	}

}//eind class