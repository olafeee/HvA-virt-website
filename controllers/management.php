<?php

require_once("lib/cloudstack.php");

class Management extends baseController {

	public $model;
	public $db;
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
		$this->db = $this->model->conDB1();
		$this->baseView->accountInfo = $this->model->getWhere("*", "CSUsers", "CSID" , $_SESSION['logArr']['userid']);
		print_r($_SESSION['logArr']['userid']);
		$vmResponse = $this->model->getVM();
		$this->baseView->vmResponse = $vmResponse;
	}

	// List of all the Virtual Machines
	function vmlist() {
		$vmResponse = $this->model->getVM();
		$this->baseView->vmResponse = $vmResponse;
		$this->index('vmlist', TRUE);
	}

	function vminfo() {
		// Check of er een ID is mee gegeven
		if(!empty($_POST['vmid'])) {
			$this->baseView->vmid = $_POST['vmid'];

			$vmResponse = $this->model->getVMbyID($_POST['vmid']);
			$this->baseView->vmResponse = $vmResponse;

			$this->index('vminfo', TRUE);
		} else {
			header('location: /management');
		}
		
	}

	function accountTab() {
		$this->index('accountTab', TRUE);

	}

	function invoiceTab() {
		$this->index('invoiceTab', TRUE);
	}


	function vmcontrol() {
		if(isset($_POST['command']) && isset($_POST['vmid'])) {
				$vmResponse = $this->model->vmcommands($_POST['command'],$_POST['vmid']);
		} else {
			die(json_encode(array('message' => 'ERROR: No valid argumments in POST!', code => 1337)));
		}
	}

	function console($vmid) {
		$this->baseView->vmid = $vmid;
		$this->index('console', TRUE);
	}

	

}