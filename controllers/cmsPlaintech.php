<?php

class cmsPlaintech extends baseController {

	public $model;
	public $db;

	function __construct() {
		parent::__construct();
		// laad model in & selecteer database
		$this->model = $this->laadModel();
		$this->db = $this->model->conDB1();
		
		//test of var gedropt wordt
		$getCMS = $this->model->getCmsIndex("CMS_pages", "*");
		$this->baseView->cmstext = $getCMS;
		//var_dump($model);
		//echo "<br/>";
		//$this->$var1 = "2";
		$this->cleanString(9);

	}

	function viewPage($id){
		$cmsPage = $this->model->getPage($id);
		$this->baseView->viewpage = $cmsPage;
		$this->index('viewPage');
	}

	function manangeVpsParts($id){
		$table = $id.'_Array_Table';
		$cmsMVP = $this->model->getCmsIndex($table, "*");
		$this->baseView->cmsMVP = $cmsMVP;
		$this->index('manangeVpsParts');
	}


	function editContent($pid,$cwid){
		$cmsPage = $this->model->getOneCmsItem($pid,$cwid);
		$this->baseView->editContenVar = $cmsPage;
		$this->index('editContent');
		//print_r($this->getCMS[$id]);
		
	}

	function insertContent(){
		$cwid = $_POST['cwid'];
		$pageid = $_POST['pageid'];
		$cmstext = $_POST['cmstext'];
		$this->model->insertOneCmsItem($cwid, $pageid, $cmstext);
		header('location: /cmsPlaintech/viewPage/'.$pageid);
	}

	function insertMVP(){
		$idMVP = $_POST['idMVP'];
		$AmountMVP = $_POST['AmountMVP'];
		$PriceMVP = $_POST['PriceMVP'];
		$this->model->insertMVPitem($idMVP, $AmountMVP, $PriceMVP);
		header('location: /cmsPlaintech/manangeVpsParts/Disk');
	}

	function cleanString($number){
	    if (preg_match('/^[0-9]{1,}$/', $number)) {
	    	echo $number . " is numeric";
	    }else{
			echo $number . " is NOT numeric";
	   	}
	}
}
