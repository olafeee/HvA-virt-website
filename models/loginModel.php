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
		echo "<pre>USERS:<br />";
		print_r($_POST);

		$sth = $this->db->prepare("SELECT * FROM 'user'");
		print_r($sth->fetchAll());

		// ------------------------------------------------------------ //

		$username = $_POST['login'];
		$password = $_POST['password'];

		$sth = $this->db->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
		$sth->execute(array(
			':username' => $_POST['login'],
			':password' => $_POST['password'],
		));
		$data = $sth->fetchAll();
		print_r($data);

		$Blowfish_Pre = '$2y$11$';
		$Blowfish_End = '$';
  
		$sql = "SELECT Salt, Password FROM Login WHERE Email='$email'";
		$result = mysql_query($sql) or die( mysql_error() );
		$row = mysql_fetch_assoc($result);
		  
		$hashed_pass = crypt($password, $Blowfish_Pre . $row['Salt'] . $Blowfish_End);
		  
		if ($hashed_pass == $row['Password']) {
		    echo("Login successful");
		} else {
		    echo("Failed to login");
		}


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