<?php

require_once("lib/cloudstack.php");

class klantPaneel extends baseController {
	public $cloudstack;

	function __construct() {
		parent::__construct();

		$model = $this->laadModel();
		var_dump($model);
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
		$this->cloudstack->startVirtualMachine($vmid);
		header('location: /klantPaneel/VM/'.$vmpage);
	}

	function VMstop($vmid , $vmpage){
		$this->cloudstack->stopVirtualMachine($vmid);
		header('location: /klantPaneel/VM/'.$vmpage);
	}
	function VMrestart($vmid , $vmpage){
		$this->cloudstack->rebootVirtualMachine($vmid);
		//header('location: /klantPaneel/VM/'.$vmpage);
	}

}