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
		$this->cloudstack = new cloudstack();
		$this->cloudstack_sign = new cloudstack_sign();
	}

	public function runLogin($username, $password)
	{
		$sth = $this->cloudstack_sign->login($username, $password);
		$data = json_decode($sth,true);

		if (is_array($data) && array_key_exists("loginresponse", $data)) {
			$loginArray = $data['loginresponse'];
			Session::init();
			Session::set('loggedIn', true);
		    Session::set('logArr', $loginArray);
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	// Check if user exist. Sends a JSON responce for AJAX use
	public function checkUser($user)
	{
		$response = array(
			'valid' => false,
			'message' => 'Post argument "user" is missing.'
		);

		$sth = $this->cloudstack->listAccounts($user);
		$data = json_decode($sth,true);

		if(is_array($data) && array_key_exists('account', $data['listaccountsresponse'])) {
			if( $data['listaccountsresponse']['account'][0]['name']==$user ) {
		    	// User name is registered on another account
		    	$response = array('valid' => false, 'message' => 'This user name is already registered.');
			} else {
		    	// User name is available
		    	$response = array('valid' => true);
			}
		} else {
			// User name is available
		    $response = array('valid' => true);
		}
		echo json_encode($response);
	}

	public function createAccount($data) {
		// SQL Injection prefection TODO HERE ------------------------------------------------------------------!!!!!!!!!!!!!!!!!!!!!!!

		// Send to cloudstack DB
		$response = $this->cloudstack->createAccount($data['email'], $data['fname'], $data['lname'], $data['password'], $data['email']);
		$response = json_decode($response,true);

		if (array_key_exists('account', $response['createaccountresponse'])) {
			return TRUE;
		} else {
			print_r($response);
			return FALSE;
		}
		
	}

	function getRole($CSID){
			    $sqlArray = $this->db->select('SELECT rol_id FROM privileges WHERE 
						CSID = :CSID ', 
                array('CSID' => $CSID));
                return $sqlArray;
	}
}

?>