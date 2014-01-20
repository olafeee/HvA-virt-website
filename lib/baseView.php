<?php

class baseView {

	function __construct() {
		$url = $this->urlfix();
		print_r($url[0]);
		//$this->baseView->url0 = $url[0];
	}

	public function render($name)
	{
			require 'views/header.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';	
	}

	function urlfix(){
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);
		return $url;
	}

}