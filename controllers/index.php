<?php

class Index extends baseController {

	function __construct() {
		parent::__construct();
		$model = $this->laadModel();
		$test = $model->getIndex();
		var_dump($test);
	}
	
}