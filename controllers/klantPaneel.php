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
		public $model = $this->laadModel();
		$this->baseView->vmResponce = $model->getVM();
	}
	
	function os_installatie(){

		$this->index('os_installatie');
	}

	function console($value){
		$this->baseView->vmResponce = $model->getVM();
		$this->baseView->vmNumber = $value;
		$this->index('console');
	}


	function VM(){
		$this->baseView->vmResponce = $this->model->getVM();
		$this->baseView->vmNumber = $value;
		$this->index('VM');	
	}

}