<?php

/**
* 
*/

require_once("lib/cloudstack.php");

class loginModel extends baseModel
{

	public $cloudstack;
	
	function __construct()
	{
		parent::__construct();
		$this->cloudstack = new cloudstack();
	}

	public function run()
	{
		echo"ik doe het wel maar ook niet";
		$username = $_POST['login'];
		$password = $_POST['password'];
		$sth = $this->cloudstack->login($username, $password);
		$data = json_decode($sth,true);
		$gebruikersnaam=$data['loginresponse']['username'];
		echo $data['loginresponse'][1];

		
		echo "<br/> <pre>";
		print_r($data);
		echo "<br/>";
		/*  test scirpt
		var_dump(json_decode($sth));
		echo $users;
		echo $data['loginresponse'];
		echo "<br/> </pre>";
		*/

		if (is_array($datsa) && array_key_exists("loginresponse", $data)) {
			// login
			Session::init();
			Session::set('loggedIn', true);
			Session::set('gebruikersnaam', $gebruikersnaam);
			header('location: ../account');
		} else {
			echo "<br/>";
			echo("else vaal");
			//header('location: ../login');
		}
		
	}
}

?>