<?php

require_once("lib/cloudstack.php");

class Management extends baseController {

	public $model;

	function __construct() {
		// Check if logged in.
		session_start();
		if (!isset($_SESSION['loggedIn'])) {
			header('location: /account');
		}

		parent::__construct();

		$this->model = $this->laadModel();
		$vmResponse = $this->model->getVM();
		$this->baseView->vmResponse = $vmResponse;
	}

	function vminfo($vmid) {
		$this->baseView->vmid = $vmid;
		$this->index('vminfo');
		
	}

	function console($vmid) {
		$this->baseView->vmid = $vmid;
		$this->index('console');

	}

	function accountTab() {
		$this->index('accountTab');

	}

	function invoiceTab() {
		$this->index('invoiceTab');
	}

	function vmcontrol() {
		//if(isset($_POST['command']) && isset($_POST['vmid'])) {

			print_r($_POST);
			
			// Kijk wat het commando is, en voer deze uit.
			$command = $_POST['command'];
			if ($command == 'start') {
				$this->cloudstack->startVirtualMachine($_POST['vmid']);
			} else if ($command == 'stop') {
				$this->cloudstack->stopVirtualMachine($_POST['vmid'], $_POST['forced']);
			} else if ($command == 'restart') {
				$this->cloudstack->rebootVirtualMachine($_POST['vmid']);
				echo "TROLOLOLOL PARTY!!";
			} else if ($command == 'destroy') {
				$this->cloudstack->destroyVirtualMachine($_POST['vmid']);
			} else if ($command == 'recover') {
				$this->cloudstack->recoverVirtualMachine($_POST['vmid']);
			} else {
				// Als geen van de bovenste commands kloppen
				throw new Exception('Unknown command!');
			}
				
		//} else {
		//	header('location: /management/');
		//}
	}

	

}