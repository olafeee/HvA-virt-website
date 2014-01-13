<?php

//require_once("lib/cloudstack.php");

class klantPaneel extends baseController {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false){
			Session::destroy();
			header('location: ../login');
			exit;
		}
		$this->view->vmResponce = $this->model->getVM();
	}
	
	function os_installatie(){

		$this->index('os_installatie');
	}

	function console(){

		$this->index('console');
	}
}