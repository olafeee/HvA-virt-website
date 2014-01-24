<?php

require_once("lib/cloudstack.php");

class Management extends baseController {

	public $model;
	public $vmResponse;

	function __construct() {
		// Check if logged in.
		session_start();
		if (!isset($_SESSION['loggedIn'])) {
			header('location: /account');
		}

		$this->model = $this->laadModel();
		$this->baseView->vmResponse = $this->model->getVM();

		parent::__construct();
	}

	function vmInfo($vmid) {
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

	

}