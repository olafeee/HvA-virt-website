<?php

class Register extends baseController {

	function __construct() {
		parent::__construct();
	}
	
	function registreer(){
		$model = $this->loadModel();
		$model->registreer();
	}
}