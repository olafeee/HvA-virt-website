<?php

class cmsPlaintech extends baseController {

	public $model;

	function __construct() {
		parent::__construct();
		// laad model in
		$this->model = $this->laadModel();
		//selecteer de database
		$this->db = $this->model->conDB1();
		//test of var gedropt wordt
		$getCMS = $this->model->getCmsIndex();
		$this->baseView->cmstext = $getCMS;
		//var_dump($model);
		//echo "<br/>";
		//$this->$var1 = "2";

	}

	function editContent($id){

		print_r($this->getCMS[$id]);
	}
	function viewPage($id){
		$cmsPage = $this->model->getPage();
		$this->baseView->viewpage = $cmsPage;
	}
	
}