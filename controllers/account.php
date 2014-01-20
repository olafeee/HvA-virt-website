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

	function registerValidate($input) {
		if ($input == 'email') {
			$model = $this->laadModel();
			$model->checkUser($input);
		}
	}

	function runRegister() {
		if(isset($_POST['submit'])) {

			echo "<pre>";
			print_r($_POST);

			$model = $this->laadModel();
			$model->createAccount($_POST);
		} else {
			header('location: ./register');
		}
	}

}//eind class