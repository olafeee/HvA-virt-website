<?php

class Index extends baseController {

	function __construct() {
		parent::__construct();
		$model = $this->laadModel();
		var_dump($model);
		echo "<br/>";
		$test = $model->getIndex();
		var_dump($test);
	}
	
}