<?php

class Shoppingbasket extends baseController {

	function __construct() {
		parent::__construct();

		session_start();
	}

	/**
	* render laad de header container en de footer
	* @param string $serviceofferingid is een id van een instance in cloudstack.
	* @param string $templateid is het id van het ISO bestand dat je wilt toevoegen.
	* @param string $zoneid is het id van de zone waar de VM in aangemaakt moet worden.
	* @param string $diskofferingid 
	*/
	function createVM() {
		if (1 == 1) {
			$model = $this->laadModel();
			$serviceofferingid = "eaacfa01-6e2f-4a5a-a789-03f259c8a644";
			$templateid= "7fd68000-5783-47f0-b0f1-4bae45946b4e";
			$zoneid= "bc1354a3-58b4-4f98-ab51-7d4406260e15";
			$hostid= "84d9d37d-2078-4f27-9799-f634cb66a29c";
			$diskofferingid= "663eaff4-eacd-47e3-848b-08fba13fe4cb";
			$displayname= "centos65";
			$name= "centos65minimal1";
			$account= "9e3ff1b7-a627-426e-a000-2779ae377fd6";
			$domainid= $_SESSION['logArr']['domainid'];
			$securitygroupids= "33ef1c00-7f70-11e3-9e69-0015c5eaa2fd";
			//$_SESSION['logArr']['userid']
			//$_SESSION['logArr']['domainid']
			$model->createVM($serviceofferingid, $templateid, $zoneid, $hostid, $diskofferingid, $displayname, $name, $account, $domainid, $securitygroupids);		
		}else{
			header('location: /account');
		}
		
	}
	
}

