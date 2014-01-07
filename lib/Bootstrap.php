<?php

class Bootstrap {

	function __construct() {
		// laad url in 
		$url = $this->urlfix1();
		//print_r($url);
		echo"hoi";
		// kijk of url doorgegevens word. als hij leeg is word index ingevuld
		if(empty($url[0])){
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index('index');
			return false;
		}

		// de eerste deel van array vult hie hier in
		$file = 'controllers/' . $url[0] . '.php';

		//controller of file wel bestaad en daarna laat bijvoorbeeld controllers/index.php in
		if (file_exists($file)) {
			require $file;
		} else {
			$this->error();
			return false;
		}
		
		// laad class van desbetrefende contoller in
		$controller = new $url[0];

		print_r($url);
		// laad functie van class in en geef variable mee }else{ laad funtie
		if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}
		} else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}('index');
				} else {
				$this->error();
				}
			} else {
				$controller->index('index');
			}
		}
	}// einde construtopr

	//functie om error pagina niet gevonden te weergeven
	function error() {
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);
		require 'controllers/error.php';
		$controller = new Error();
		$controller->index('index');
		return false;
	}

	function urlfix1(){
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);
		return $url;
	}
	
	

}
