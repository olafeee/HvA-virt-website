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
			$model->checkUser($_POST['email']);
		}
	}

	function runRegister($input) {
		if ($input == 'email' && !$_POST['email']) {
			$model = $this->laadModel();
			$model->checkUser($_POST['email']);
		} else if(isset($_POST['submit'])) {
			echo "<pre>";
			$model = $this->laadModel();
			$response = $model->createAccount($_POST);
			if ($response == true ) {
				$this->index('register_success');
			}
		} else {
			header('location: ./register');
		}
	}

}//eind class