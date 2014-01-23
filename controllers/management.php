<?php

require_once("lib/cloudstack.php");

class Management extends baseController {

	function __construct() {
		// Check if logged in.
		session_start();
		if (!isset($_SESSION['loggedIn'])) {
			header('location: /account');
		}

		$this->laadModel();
		$this->baseView->vmresponse = $this->model->getVM();

		parent::__construct();
	}

	function vmInfo($vmid) {
		$this->baseView->vmid = $vmid;
		$this->index('vminfo');
		
	}

	function console() {
		$this->baseView->vmid = $vmid;
		$this->index('console');

	}

	function accountTab() {
		$this->index('accountTab');

	}

	

}