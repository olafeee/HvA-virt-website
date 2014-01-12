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
		echo "<br/>";
		print_r($sth);
		$obj = json_decode($sth);
		print $obj->{'loginresponse'}; // 12345
		echo "<br/>";


		if (is_array($sth) && array_key_exists("loginresponse", $sth)) {
			// login
			Session::init();
			Session::set('loggedIn', true);
			Session::set('gebruikersnaam', $sth);
			echo("IF FIRED");
			header('location: ../account');
		} else {
					echo "<br/>";
			echo("else vaal");
			//header('location: ../login');
		}
		
	}
}

?>