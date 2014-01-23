<?php

class cmsPlaintech extends baseController {

	public $model;
	public $db;

	function __construct() {
		parent::__construct();
		// laad model in & selecteer database
		$this->model = $this->laadModel();
		$this->db = $this->model->conDB1();
		
		$getRole = $this->model->getRoleByPage();
		echo "<pre>";
		print_r($getRole);
		echo "</pre>";

		$role = $this->in_array_r($getRole);

		print_r($role);

		echo"hande lul";

		if($role == true){
			echo"het werkt";
		}

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
		$this->baseView->kindMVP = $id;
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
		$pageMVP = $_POST['pageMVP'];
        $idMVP = $_POST['idMVP'];
        $AmountMVP = $_POST['AmountMVP'];
        $PriceMVP = $_POST['PriceMVP'];
        $this->model->insertMVPitem($idMVP, $AmountMVP, $PriceMVP, $pageMVP);
        header('location: /cmsPlaintech/manangeVpsParts/'.$pageMVP);
    }
	 /**
     * manangeRoles show alle rows
     */
	function manangeRoles(){
		$rolesMR = $this->model->getCmsIndex("CMS_pages_rollen", "*");
		$this->baseView->rolesMR = $rolesMR;
		$this->index('manangeRoles');
	}
}
