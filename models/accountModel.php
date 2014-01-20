<?php

/**
* 
*/

require_once("lib/cloudstack_sign.php");

class accountModel extends baseModel
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

		//Debug
		echo "<pre>";
		print_r($data);

		if (is_array($data) && array_key_exists("loginresponse", $data)) {
			$loginArray = $data['loginresponse'];
			Session::init();
			Session::set('loggedIn', true);
		    Session::set('logArr', $loginArray);
			header('location: ../managementApp');
		} else {
			header('location: ../account');
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

	public function createAccount($data) {

		$data = array(
			'email' => $_POST['email'],
			'password' => $_POST['password'],
			'passwordConfirm' => $_POST['passwordConfirm'],
			'firstname' => $_POST['fname'],
			'lastname' => $_POST['lname'],
			'' => $_POST[''],
			'' => $_POST[''],
		);


		http://145.92.14.90:5990/client/api?command=createAccount&accounttype=0&email=test&firstname=test&lastname=testlast&password=test&username=test
		
	}

		public function register()
	{
		/*echo "Test!<br>";

		// We controleren of alle velden gevuld zijn en vervolgens of de mail klopt
		/*
		if(empty($_POST['inputEmail']) || empty($_POST['inputPassword']) || empty($_POST['fname']) ||
                empty($_POST['lname']) || empty($_POST['number']) || empty($_POST['adzip']) || empty($_POST['adnr']) ||
                empty($_POST['country']) || !filter_var($_POST['inputEmail'],FILTER_VALIDATE_EMAIL)) {
			//header('location: ../register');
			echo "<br />Er is een fout in het formulier gevonden. Controleer alle velden nogmaals.<br />";
			echo "<a href=\"javascript:history.go(-1);\">Ga terug naar het formulier</a><br />";
			
		} else { */
			// We knallen alle Post-variabelen PHP variabelen in, dit is voor overzichtelijkheid.
			/*$userEmail = $_POST['inputEmail'];
			$userPassw = $_POST['inputPassword'];
			$userFname = $_POST['inputFName'];
			$userLname = $_POST['inputLName'];
			

			echo "$userFname <br />";
			echo "$userLname <br />";
			echo "$userEmail <br />";
			echo "$userPassw <br />";
			echo "<br /><br />";

			$test = $this->cloudstack->listAccountsByName();
			print_r($test);
			echo "<br /><br />";

			$accounttype = 0;

			$responce = $this->cloudstack->createAccount($userEmail,$userFname,$userLname,$userPassw,$userEmail,$accounttype);

			print($responce);
		
			echo "<br />Gebruiker is succesvol aangemaakt.<br />";
		
		//}		*/
	}	
}

?>