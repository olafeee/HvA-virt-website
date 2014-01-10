<?php

/**
* 
*/

require_once("lib/cloudstack.php");

class loginModel extends baseModel
{

	public cloudstack = new cloudstack();
	
	function __construct()
	{
		parent::__construct();
		echo"ik doe het wel maar ook niet";
	}

	public function run()
	{
		$username = $_POST['login'];
<<<<<<< HEAD
		$password = $_POST['password'];
		$sth = $cloudstack->login($username, $password);
=======
<<<<<<< HEAD
		$sth = $this->db->prepare("SELECT id FROM users WHERE 
				login = :login AND password = :password");
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => $_POST['password']
		));
=======
		$password = $_POST['password'];
		$sth = $cloudstack->login($username, $password);
>>>>>>> pr/3
>>>>>>> 05e920b2ffa2917fa89bd0ebf12541c480994b78
		
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