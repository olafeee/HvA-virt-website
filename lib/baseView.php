<?php

class baseView {

	function __construct() {
		//echo 'this is the view';
	}

	public function render($name)
	{
			require 'views/header.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';	
	}

}