<?php

/**
* 
*/

require_once("lib/cloudstack.php");

class loginModel extends baseModel
{

	$cloudstack = new cloudstack();
	
	function __construct()
	{
		parent::__construct();
	}

	/*

		lolol raoul was een ; vergeten
		allebei moker lang zoeken
		nou eindelijk gevonden hoor....

*/
	public function run()
	{
		echo"ik doe het wel maar ook niet";
		$username = $_POST['login'];
		$password = $_POST['password'];
		$sth = $cloudstack->login($username, $password);
		
		$data = $sth->fetchAll();
		print_r($data);
		echo("Login test");

		$count =  $sth->rowCount();
		if ($count > 0) {
			// login
			Session::init();
			Session::set('loggedIn', true);
			Session::set('gebruikersnaam', $username);
			echo("IF FIRED");
			//header('location: ../account');
		} else {
			echo("else fired");
			//header('location: ../login');
		}
		
	}
}

?>