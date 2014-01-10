<?php

//require_once("lib/cloudstack.php");

class Login extends baseController {

	function __construct() {
		parent::__construct();	
	}
	
	function run(){
		$model = $this->loadModel();
		echo '<script type="text/javascript">alert("hello!");</script>';
		$model->run();
	}//eind run

}//eind class