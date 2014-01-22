<?php

class Shoppingbasket extends baseController {

	function __construct() {
		parent::__construct();
	}

	/**
	* render laad de header container en de footer
	* @param string $serviceofferingid is een id van een instance in cloudstack.
	* @param string $templateid is het id van het ISO bestand dat je wilt toevoegen.
	* @param string $zoneid is het id van de zone waar de VM in aangemaakt moet worden.
	* @param string $diskofferingid 
	*/
	function createVM() {
		if (Session::get('loggedIn') == true) {
			$serviceofferingid ="eaacfa01-6e2f-4a5a-a789-03f259c8a644";
			$templateid="7fd68000-5783-47f0-b0f1-4bae45946b4e";
			$zoneid="bc1354a3-58b4-4f98-ab51-7d4406260e15";
			$diskofferingid= null;
			$displayname= "centos6.5";
			$name="centos6.5minimal";
			$account= null;
			$domainid= null;
			//$_SESSION['logArr']['userid']
			//$_SESSION['logArr']['domainid']
			$this->cloudstack->deployVirtualMachine($serviceofferingid, $templateid, $zoneid, $diskofferingid, $displayname, $name, $account, $domainid );
			header('location: /order');			
		}else{
			header('location: /account');
		}
		
	}
	
}