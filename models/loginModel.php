<?php

/**
* 
*/

require_once("lib/cloudstack.php");

class loginModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
		$this->conDB();	
	}

	/*public function run()
	{
		$username = $_POST['login'];
		$password = $_POST['password'];
		$sth = $this->cloudstack->login($username, $password);
		$data = json_decode($sth,true);

		if (is_array($data) && array_key_exists("loginresponse", $data)) {
			$loginArray = $data['loginresponse'];
			Session::init();
			Session::set('loggedIn', true);
		    Session::set('logArr', $loginArray);
			header('location: ../account');
		} else {
			header('location: ../login');
		}
		
	}*/

	public function runLogin()
	{
		echo "<pre>";
		print_r($_POST);

		$username = $_POST['login'];
		$password = $_POST['password'];

		$sth = $this->db->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
		$sth->execute(array(
			':username' => $_POST['login'],
			':password' => $_POST['password'],
		));
		$data = $sth->fetchAll();
		print_r($data);


		if (is_array($data) && array_key_exists("loginresponse", $data)) {
			$loginArray = $data['loginresponse'];
			Session::init();
			Session::set('loggedIn', true);
		    Session::set('logArr', $loginArray);
			header('location: ../account');
		} else {
			//header('location: ../login');
		}
	}

	public function craetePage() {

	}

	public function createAccount() {

	}
}

?>