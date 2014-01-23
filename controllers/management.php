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
	}

	function vmTab() {
		
	}

	function console() {

	}

	function accountTab() {
		$this->index('accountTab');


	}

	

}