<?php

class cmsPlaintech extends baseController {

	private $var1;

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
		$this->$var1 = "2";

	}

	function editContent($id){

		print_r($this->getCMS[$id]);
	}
	function viewPage($id){
		$var = $this->var1;
		echo "<pre>";
		print_r(get_defined_vars());
		echo "</pre>";
		//$cmsPage = $model->getPage();
		//$this->baseView->viewpage = $cmsPage;
	}
	
}