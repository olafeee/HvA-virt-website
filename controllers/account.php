<?php

require_once("lib/cloudstack.php");

class Account extends baseController {

	function __construct() {
		parent::__construct();
		if (isset($_SESSION['loggedIn'])) {
			header('location: ../account');
		}
	}
	
	function login() {
		if (!isset($_SESSION['loggedIn'])) {
			$model = $this->laadModel();
			$model->runLogin();
		}
	}//eind run

	function logout() {

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