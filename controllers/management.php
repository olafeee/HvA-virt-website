<?php

require_once("lib/cloudstack.php");

class Management extends baseController {

	public $model;
	public $cloudstack;

	function __construct() {
		// Check if logged in.
		session_start();
		if (!isset($_SESSION['loggedIn'])) {
			header('location: /account');
		}

		parent::__construct();

		$this->cloudstack = new cloudstack();

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
		if(isset($_POST['command']) && isset($_POST['vmid'])) {

			echo "<pre>";
			print_r($_POST);
			echo ($_POST['command']);
			
			// Kijk wat het commando is, en voer deze uit.
			$command = $_POST['command'];
			if (strcmp($command,'start') == 0 ) 
			{
				$this->cloudstack->startVirtualMachine($_POST['vmid']);
			} 
			else if (strcmp($command,'stop') == 0 ) 
			{
				$this->cloudstack->stopVirtualMachine($_POST['vmid'], $_POST['forced']);
			} 
			else if (strcmp($command,'restart') == 0) 
			{
				$response = $this->cloudstack->rebootVirtualMachine($_POST['vmid']);
				echo "TROLOLOLOL PARTY!!";
			} 
			else if (strcmp($command,'destroy') == 0 ) 
			{
				$this->cloudstack->destroyVirtualMachine($_POST['vmid']);
			} 
			else if (strcmp($command,'recover') == 0 ) 
			{
				$this->cloudstack->recoverVirtualMachine($_POST['vmid']);
			} 
			else 
			{
				// Als geen van de bovenste commands kloppen
				throw new Exception('Unknown command!');
			}
				
		} else {
			header('location: /management/');
		}
	}

	

}