<?php

class cmsPlaintech extends baseController {

	function __construct() {
		parent::__construct();
		// laad model in
		$model = $this->laadModel();
		//selecteer de database
		$db = $model->conDB1();
		//test of var gedropt wordt
		$getCMS = $model->getCmsIndex();
		$this->baseView->cmstext = $getCMS;
		//var_dump($model);
		//echo "<br/>";

	}

	function editContent($id){

		print_r($this->getCMS[$id]);
	}
	function viewPage($id){
		echo "<pre>";
		print_r(get_defined_vars());
		echo "</pre>";
		//$cmsPage = $model->getPage();
		//$this->baseView->viewpage = $cmsPage;
	}
	
}