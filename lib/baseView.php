<?php

class baseView {

	function __construct() {
	}

	/**
	* render laad de header container en de footer
	* @param string $name is folder/pagina
	*/
	public function render($name)
	{
			require 'views/header.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';	
	}

}