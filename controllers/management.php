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
		if(isset($_POST['command']) && isset($_POST['vmid'])) {
			

		} else {
			header('location: /management/');
		}
	}

	

}