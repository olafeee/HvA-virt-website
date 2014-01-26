<?php

class invoice extends baseController {

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

	}

	function l30i($limit){
		echo"hoi";
 		 $invoice = $this->model->getAll($limit);
      print_r($invoice);
		print_r($invoice);
		$this->index('l30i');
	}
	function sortOnTime($limit){
		$invoice = $this->model->getOnTime($limit);
		print_r($invoice);
		$this->index('index');
	}

}
