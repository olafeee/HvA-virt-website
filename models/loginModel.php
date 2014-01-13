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
		$username = $_POST['login'];
		$password = $_POST['password'];
		$sth = $this->cloudstack->login($username, $password);
		$data = json_decode($sth,true);
		$test = $data['loginresponse'];
		echo"<pre>";
		print_r($test['username']);

		/*if (is_array($data) && array_key_exists("loginresponse", $data)) {
			Session::init();
			Session::set('loggedIn', true);
			foreach ($data['loginresponse'] as $k => $v) {
		    	Session::set($k, $v);
		    }
			//header('location: ../account');
		} else {
			header('location: ../login');
		}*/
		
	}
}

?>