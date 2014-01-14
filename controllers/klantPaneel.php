<?php

require_once("lib/cloudstack.php");

class klantPaneel extends baseController {
	public $cloudstack;

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
		
		//
		$this->cloudstack = new cloudstack();
	}
	
	function os_installatie(){

		$this->index('os_installatie');
	}

	function console($value){
		$this->baseView->vmResponce = $model->getVM();
		$this->baseView->vmNumber = $value;
		$this->index('console');
	}


	function VM($value){
		$this->baseView->vmNumber = $value;
		$this->index('VM');	
	}

	function VMstart($vmid , $vmpage){
		$this->cloudstack->startVirtualMachine($id);
		//header('location: /klantPaneel/VM/'.$vmpage);
	}

}