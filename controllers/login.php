<?php

require_once("lib/cloudstack.php");

class Login extends baseController {

	function __construct() {
		parent::__construct();
	}
	
	function run(){
		if (!isset($_SESSION['loggedIn'])) {
			// laad model in
			$model = $this->laadModel();
			//selecteer de database
			$db = $model->conDB();
			$model->run();
		}
	}//eind run

}//eind class