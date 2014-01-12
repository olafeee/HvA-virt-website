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
		
		print_r($sth);
		echo("<br />Login test");

		if (1==1) {
			// login
			Session::init();
			Session::set('loggedIn', true);
			Session::set('gebruikersnaam', $sth[ 'loginresponse']);
			echo("IF FIRED");
			//header('location: ../account');
		} else {
			echo("else fired");
			//header('location: ../login');
		}
		
	}
}

?>