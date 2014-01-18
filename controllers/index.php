<?php

class Index extends baseController {

	function __construct() {
		parent::__construct();
		$model = $this->laadModel();
		$this->baseView->cmstext = $model->getIndex();
	}
	
}