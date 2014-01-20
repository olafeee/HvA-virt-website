<?php

/**
* 
*/

require_once("lib/cloudstack.php");
require_once("lib/cloudstack_sign.php");

class accountModel extends baseModel
{
	
	public $cloudstack;
	public $cloudstack_sign;

	function __construct()
	{
		parent::__construct();
		$this->conDB();
		$this->cloudstack = new cloudstack();
		$this->cloudstack_sign = new cloudstack_sign();
	}

	public function runLogin()
	{
		$username = $_POST['login'];
		$password = $_POST['password'];
		$sth = $this->cloudstack_sign->login($username, $password);
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

	// Check if user exist. Sends a JSON responce for AJAX use
	public function checkUser($user)
	{

		$user = 'raouldijksman@gmail.com';

		$response = array(
			'valid' => false,
			'message' => 'Post argument "user" is missing.'
		);

		$sth = $this->cloudstack->listAccounts($user);
		$data = json_decode($sth,true);

		echo "<pre>";
		print_r($data);

		if( $data['listaccountsresponse']['account'][0]['name']==$user ) {
	    	// User name is registered on another account
	    	$response = array('valid' => false, 'message' => 'This user name is already registered.');
		} else {
	    	// User name is available
	    	$response = array('valid' => true, 'message' => 'No user but AJAX worked!!!');
		}

		echo json_encode($response);
	}

	public function createAccount($data) {

		echo "CreateAccount() Running!<br><br>";
		print_r($data);

		// Send to cloudstack DB
		$response = $this->cloudstack->createAccount($data['email'], $data['fname'], $data['lname'], $data['password'], $data['email']);
		print_r($response);
		
	}

}

?>