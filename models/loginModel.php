<?php

/**
* 
*/

require_once("lib/cloudstack_sign.php");

class loginModel extends baseModel
{
	
	public $cloudstack;

	function __construct()
	{
		parent::__construct();
		$this->conDB();
		$this->cloudstack = new cloudstack_sign();
	}

	public function runLogin()
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
			//header('location: ../account');
		} else {
			//header('location: ../login');
		}
		
	}

	/*public function runLogin()
	{
		echo "<pre>USERS:<br />";
		print_r($_POST);

		$sth = $this->db->prepare("SELECT * FROM user");
		print_r($sth->fetchAll());

		// ------------------------------------------------------------ //

		$username = $_POST['login'];
		$password = $_POST['password'];

		$sth = $this->db->prepare("SELECT password FROM user WHERE username = :username AND password = :password");
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
	}*/

	public function craetePage() {

	}

	public function createAccount() {

	}
}

?>