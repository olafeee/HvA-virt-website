<?php

require_once("lib/cloudstack.php");

class Account extends baseController {

	function __construct() {
		parent::__construct();
		if (isset($_SESSION['loggedIn'])) {
			header('location: ../account_detail');
		}
	}
	
	function login() {
		if (!isset($_SESSION['loggedIn'])) {
			$model = $this->laadModel();
			$model->runLogin();
		}
	}//eind run

	function logout() {
		session_destroy();
		header('location: ../account')
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