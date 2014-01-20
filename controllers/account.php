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
		echo "FIRED";
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