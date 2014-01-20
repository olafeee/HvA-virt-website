<?php

class Account extends baseController {

	function __construct() {
		parent::__construct();
		echo "TEST3";

		session_start();
		if ($_SESSION['loggedIn'] === true) {
			header('location: ../');
			echo "FIRED!!!!!!!!!!!!!!!!!";
		}
	}
	
	function login() {
		if (!isset($_SESSION['loggedIn'])) {
			$model = $this->laadModel();
			$model->runLogin();
		}
	}//eind run

	function logout() {
		//@session_start();
		session_destroy();
		header('location: ../account');
	}

	function register() {
		$this->index('register');
	}

	function runRegister() {
		if(isset($_POST['submit'])) {

			$data = array(
				'' => '',
				'' => '',
				'' => '',
				'' => '',
				'' => '',
				'' => '',
			);

			$model = $this->laadModel();
			$model->create_account($data);
		} else {
			echo "NO POST!";
		}
	}

}//eind class