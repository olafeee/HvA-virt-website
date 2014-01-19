<?php

require_once("lib/cloudstack.php");

class Login extends baseController {

	function __construct() {
		parent::__construct();
		if ($_SESSION['loggedIn'] === true) {
			header('location: ../account');
		} else {
			header('location: ./login');
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