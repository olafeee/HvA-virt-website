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
		$model = $this->laadModel();
		$this->baseView->vmResponce = $model->getVM();
		$this->baseView->prefixSubnet() = $this->prefixSubnet();
	}
	
	function os_installatie(){

		$this->index('os_installatie');
	}

	function console(){

		$this->index('console');
	}
}