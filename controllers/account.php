<?php

class Account extends baseController {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false){
			Session::destroy();
			header('location: ../login');
			exit;
		}
	}

	function veranderWachtwoord(){

		$this->index('veranderWachtwoord');
	}

	function wijzigWachtwoord(){
		$model = $this->loadModel();
		if (isset($model)) {
			$model->wijzigWachtwoord();
		}else{
			echo"stoek";
		}

	
		}
	}