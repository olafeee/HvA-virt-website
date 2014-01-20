<?php

class Account extends baseController {

	function __construct() {
		parent::__construct();

		// Check if already logged in.
		session_start();
		if (isset($_SESSION['loggedIn'])) {
			header('location: ../');
		}
	}
	
	function login() {
		if (!isset($_SESSION['loggedIn'])) {
			$model = $this->laadModel();
			$model->runLogin();
		}
	}

	function logout() {
		session_destroy();
		header('location: ../account');
	}

	function register() {
		$this->index('register');
	}

	function runRegister() {
		if(isset($_POST['submit'])) {

			print_r($_POST)

			// Put all posted variables into a array and send it to the model
			$postData = $_POST;

			$model = $this->laadModel();
			$model->createAccount($postData);
		} else {
			header('location: ./register');
		}
	}

}//eind class