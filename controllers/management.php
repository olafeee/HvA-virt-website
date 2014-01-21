<?php

require_once("lib/cloudstack.php");

class Management extends baseController {

	function __construct() {
		// Check if already logged in.
		session_start();
		if (!isset($_SESSION['loggedIn'])) {
			header('location: /account');
		}

		parent::__construct();
	}

	function console($vmid, $display = null) {

		$model = $this->laadModel();

		if ($display == null) {
			$model->consoleSession();
		} else {
			$model->consoleWindow();
		}

	}

	

}