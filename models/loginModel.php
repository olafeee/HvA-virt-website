<?php

/**
* 
*/
class loginModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
		echo"ik doe het wel maar ook niet";
	}

	public function run()
	{
		$username = $_POST['login'];
		$password = $_POST['password'];
		$sth = $cloudstack->login($username, $password);
		
		$data = $sth->fetchAll();
		print_r($data);

		$count =  $sth->rowCount();
		if ($count > 0) {
			// login
			Session::init();
			Session::set('loggedIn', true);
			Session::set('gebruikersnaam', $username);
			header('location: ../account');
		} else {
			header('location: ../login');
		}
		
	}
}

?>