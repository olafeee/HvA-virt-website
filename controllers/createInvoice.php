<?php

class createInvoice extends baseController {

	public model;

	function __construct(){
		$this->model = $this->laadModel();
		$this->model->makeInvoice();
	}

}
?>