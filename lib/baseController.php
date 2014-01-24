<?php
class baseController {

	function __construct() {
		$this->baseView = new baseView();
		$url = $this->urlfix();
		$this->baseView->url0 = $url[0];

		#################################################
		# check of de persoon recht heeft	#yolo		#
		# laad hierboven nog wel conDB1() in!!!!!!!!!!!!#
		#################################################
		$url = $this->urlfix();
		$getRole = $this->model->getRoleByPage();
		$role = $this->in_array_r($getRole);
		if($role == false){
			header('location: /account');
		}
		#################################################
	}

	/**
     * index
     * @param string $value welke pagina geladen moet worden 
     */
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
			$pagina ='index';
		}

		$this->baseView->render($map.'/'.$pagina);

	}

	/**
     * laadModel laad model in
     */
	function laadModel(){
		$url = $this->urlfix();
		if(empty($url[0])){
			$url[0] = "index";
		}
		$file = $url[0].'Model';
		$dir_file = 'models/'.$file.'.php';
		//print_r($dir_file);
		if(file_exists($dir_file)){
			require $dir_file;
			$model = new $file();
			return $model;
		}
	}
	/**
     * zorgt dat url schoon is
     */
	function urlfix(){
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);
		return $url;
	}

	/**
     * matchInt kijk of alleen cijfers is 
     * @param string $number is cijfer dat gechecked wordt
     */
	function matchInt($number){
	    if (preg_match('/^[0-9]{1,}$/', $number)) {
	    	return $number;
		}
	}

	function in_array_r($roleArray) {
	    session_start();
	    $x=0;
	    while ($x < count($_SESSION['userRole'])) {
	    	$i=0;
		    while ($i < count($roleArray)) {
		    	
		    	if ($_SESSION['userRole'][$x]['rol_id'] == $roleArray[$i]['rol_id']){
		    		return true;
		    	}
	    		$i++;
	    	}
	    	$x++;
	    }
	    return false;
	}

	
}
