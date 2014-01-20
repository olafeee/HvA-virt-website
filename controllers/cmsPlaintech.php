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
	}

	/**
     * viewPage
     * @param string $id 
     */
	function viewPage($id){
		$cmsPage = $this->model->getPage($id);
		$this->baseView->viewpage = $cmsPage;
		$this->index('viewPage');
	}
	 /**
     * manangeVpsParts = laad hardware onderdeel krijgt id-amount+prijs
     * @param string $id welke hardware onderdeel gelanden moet worden
     */
	function manangeVpsParts($id){
		$table = $id.'_Array_Table';
		$cmsMVP = $this->model->getCmsIndex($table, "*");
		$this->baseView->cmsMVP = $cmsMVP;
		$this->index('manangeVpsParts');
	}
	 /**
     * Edit content laad een bepaald onderdeel voor te editen
     * @param string $pid op welke pagina het is
     * @param string $cwid het id van de text
     */
	function editContent($pid,$cwid){
		$cmsPage = $this->model->getOneCmsItem($pid,$cwid);
		$this->baseView->editContenVar = $cmsPage;
		$this->index('editContent');
		//print_r($this->getCMS[$id]);
		
	}
	 /**
     * insertContent veranderd text van bepaalde content
     */
	function insertContent(){
		$cwid = $_POST['cwid'];
		$pageid = $_POST['pageid'];
		$cmstext = $_POST['cmstext'];
		$this->model->insertOneCmsItem($cwid, $pageid, $cmstext);
		header('location: /cmsPlaintech/viewPage/'.$pageid);
	}

	 /**
     * insertMVP = verander prijs en hoeveelheid hardware
     */
	function insertMVP(){
		$idMVP = mysql_real_escape_string($_POST['idMVP']);
		$AmountMVP = mysql_real_escape_string($_POST['AmountMVP']);
		$PriceMVP = mysql_real_escape_string($_POST['PriceMVP']);
		print_r($AmountMVP);
		$this->model->insertMVPitem($idMVP, $AmountMVP, $PriceMVP);
		//header('location: /cmsPlaintech/manangeVpsParts/Disk');
	}
}
