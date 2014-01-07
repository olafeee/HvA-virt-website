<?php

class Login extends baseController {

	function __construct() {
		parent::__construct();	
	}
	
	function run(){
		$model = $this->loadModel();
		$model->run();
	}//eind run
}//eind class