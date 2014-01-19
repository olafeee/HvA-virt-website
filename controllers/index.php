<?php

class Index extends baseController {

	function __construct() {
		parent::__construct();
		// laad model in
		$model = $this->laadModel();
		//selecteer de database
		$db = $model->conDB1();
		//test of var gedropt wordt
		$test = $model->getIndex();
		echo $test;
		//var_dump($model);
		//echo "<br/>";
		
	}
	
}