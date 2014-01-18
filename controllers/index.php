<?php

class Index extends baseController {

	function __construct() {
		parent::__construct();
		$model = $this->laadModel();
		$db = $model->conDB();
		$test = $model->getIndex();

		var_dump($model);
		echo "<br/>";
		var_dump($test);
	}
	
}