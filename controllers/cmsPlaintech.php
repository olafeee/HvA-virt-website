<?php

class cmsPlaintech extends baseController {

	public $model;
	public $db;

	function __construct() {
		parent::__construct();
		// laad model in & selecteer database
		$this->model = $this->laadModel();
		$this->db = $this->model->conDB1();
		#################################################
		# check of de persoon recht heeft	#yolo		#
		# laad hierboven nog wel conDB1() in!!!!!!!!!!!!#
		#################################################
		$url = $this->urlfix();
		$getRole = $this->model->getRoleByPage($url[0]);
		$role = $this->in_array_r($getRole);
		if($role == false){
			header('location: /account');
		}
		#################################################

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
		$cmstext = htmlentities($_POST['cmstext']);
		$this->model->insertOneCmsItem($cwid, $pageid, $cmstext);
		//header('location: /cmsPlaintech/viewPage/'.$pageid);
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
	 /**
     * 
     */
	function searchPrivileges(){
		if (!empty($_POST)){
			$name = $_POST['name'];
			$nameFound = $this->model->getUserByName($name);
			$this->baseView->nameFound = $nameFound;
		}
		$this->index('searchPrivileges');
	}

	function managePrivileges($CSID, $username){
		$manageUser = $this->model->managePrivileges($CSID);
		$allRoles = $this->model->getCmsIndex("rollen", "*");
		$this->baseView->manageUser = $manageUser;
		$this->baseView->allRoles = $allRoles;
		$this->baseView->username = $username;
		$this->index('managePrivileges');
	}
	 
	 function deletePrivileges($role_id, $CSID, $username){
	 	$delete = $this->model->deletePrivileges($role_id, $CSID);
		header('location: /cmsPlaintech/managePrivileges/'.$CSID.'/'.$username);
	}

	function addPrivileges(){
		$username = $_POST['username'];
		$CSID = $_POST['CSID'];
		$role_id = $_POST['rol_id'];
		$delete = $this->model->addPrivileges($role_id, $CSID);
		header('location: /cmsPlaintech/managePrivileges/'.$CSID.'/'.$username);
	}

	function jan(){
		$x = $this->model->modeljan();
		print_r($x);
	}
}