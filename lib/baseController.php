<?php
class baseController {

	function __construct() {
		$this->baseView = new baseView();
	}

	function index($value) {

		$url = $this->urlfix();

		if (isset($value)){
			$pagina = $value;
		}else{
			$pagina = 'index';
		}

		//als er geen url is opgegeven vul rul in
		if(empty($url[0])){
			$url[0]='index';
		}

		// Laad view in al die er is
		$file = 'views/' . $url[0] . '/index.php';
		
		if (isset($url[1])) {
			$file = 'views/' . $url[0] .'/'. $url[1].'.php';
		}

		if (file_exists($file)) {
			$map = $url[0];
		}else{
			$map = 'error';
		}

		$this->baseView->render($map.'/'.$pagina);

	}

	function loadModel(){
		$url = $this->urlfix();
		print_r($url);
		//laad model in als die er is
		$file = $url[0].'Model';
		$dir_file = 'models/'.$file.'.php';
		
		if(file_exists($dir_file)){
			require $dir_file;
			print_r($dir_file);
			$model = new $file();
			return $model;
		}
	}

	function urlfix(){
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);
		return $url;
	}

	function logout(){
		Session::destroy();
		header('location: ../index');
		exit;
	}

	
}
