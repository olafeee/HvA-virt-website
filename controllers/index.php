<?php

class Index extends baseController {

	function __construct() {
		parent::__construct();
		$model = $this->laadModel();
		var_dump($model);
		//$test = $model->getIndex();
		//var_dump($test);
	}
	
}