<?php

class Bank extends baseController {

	function __construct() {
		parent::__construct();
	}
	/*
	function index() {
		$this->baseView->render('error/index');
	}*/

	function banker(){
		$this->index('index', TRUE);

	}

}