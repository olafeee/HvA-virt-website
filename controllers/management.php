<?php

require_once("lib/cloudstack.php");

class Management extends baseController {

	function __construct() {
		// Check if logged in.
		session_start();
		if (!isset($_SESSION['loggedIn'])) {
			header('location: /account');
		}

		parent::__construct();
		include('/views/management/template.php');
	}

	function vmTab($vmid) {
		
	}

	function console($vmid) {

	}

	function accountTab() {

	}

	

}