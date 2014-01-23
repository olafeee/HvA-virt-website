<?php

class Account extends baseController {

	public $db;

	function __construct() {
		parent::__construct();
		

		// Check if already logged in.
		session_start();
		if (isset($_SESSION['loggedIn']) && $_SESSION['successPage'] == FALSE ) {
			//header('location: /');
		}
	}
	
	function login() {
		if (!isset($_SESSION['loggedIn'])) {
			$model = $this->laadModel();
			$response = $model->runLogin($_POST['login'], $_POST['password']);
			if ($response == true) {
				//laad db waar role staat
				$this->db = $model->conDB1();
				$responseRole = $model->getRole($_SESSION['logArr']['userid']);
				// als geen response krijgt insert user in db
				if(empty($responseRole)) {
					$model->insertRole();
					Session::set('userRole', '6');
					header('location: /management');
				 }else{
				 	Session::set('userRole', $responseRole[0]['rol_id']);
				 	header('location: /management');
				 }
			} else {
				header('location: /account');
			}
		}
	}

	function logout() {
		session_destroy();
		header('location: /');
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

	function runRegister() {
		if(isset($_POST['submit'])) {
			$model = $this->laadModel();
			$response = $model->createAccount($_POST);
			if ($response == TRUE ) {
				Session::set('successPage', TRUE);
				$model->runLogin($_POST['email'],$_POST['password']);
				header('location: /account/registerSuccess');
			}
		} else {
			header('location: /account/register');
		}
	}

	function registerSuccess() {
		if ($_SESSION['successPage'] == TRUE) {
			$this->index('registerSuccess');
			Session::set('successPage', FALSE);
		} else {
			header('location: /account');
		}
	}

}//eind class