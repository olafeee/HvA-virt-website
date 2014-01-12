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


			/*  test scirpt	
		echo "<br/> <pre>";
		print_r($data);
		echo "<br/>";
		var_dump(json_decode($sth));
		echo $users;
		echo $data['loginresponse'];
		echo "<br/> </pre>";
		*/

		if (is_array($data) && array_key_exists("loginresponse", $data)) {
			// login
			Session::init();
			Session::set('loggedIn', true);
			foreach ($data['loginresponse'] as $k => $v) {
		    	Session::set($k, $v);
		    }
			
			header('location: ../account');
		} else {
			echo "<br/>";
			echo("else vaal");
			//header('location: ../login');
		}
		
	}
}

?>