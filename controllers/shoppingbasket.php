<?php

class Shoppingbasket extends baseController {

	public $model;

	function __construct() {
		parent::__construct();

		$this->model = $this->laadModel();

		session_start();
	}

	/**
	* render laad de header container en de footer
	* @param string $serviceofferingid is een id van een instance in cloudstack.
	* @param string $templateid is het id van het ISO bestand dat je wilt toevoegen.
	* @param string $zoneid is het id van de zone waar de VM in aangemaakt moet worden.
	* @param string $hypervisor, geeft het hypervisor method mee van cloudstack.
	* @param string $hostid is het id van de host waar cloudstack op draait.
	* @param string $disk-offering-id is het id van root storage op de host.
	* @param string $displayname is de naam die je ziet als gebruiker.
	* @param string $name is de naam die gegeven word aan de VM in cloudstack.
	* @param string $account dit is het account die huidig staat ingelogd en de VM creeert.
	* @param string $domain-id is het id van het domain waar het account aan gekoppeld is.
	* @param string $securitygroupids is het id van de securitygroup waar de VM aan gaat deelnemen.
	*/
	function createVM() {
		if (1 == 1) {
			$securityGroupId = json_decode($this->model->securityGroupsid($_SESSION['logArr']['account'], $_SESSION['logArr']['domainid']), true);

			
			$serviceofferingid = "eaacfa01-6e2f-4a5a-a789-03f259c8a644";
			$templateid= "6fdb27f7-49d2-426a-bec8-57c17040d1dc";
			$zoneid= "bc1354a3-58b4-4f98-ab51-7d4406260e15";
			$hypervisor= "KVM";
			$hostid= "84d9d37d-2078-4f27-9799-f634cb66a29c";
			$diskofferingid= "663eaff4-eacd-47e3-848b-08fba13fe4cb";
			$displayname= "WindowsServer2008";
			$name= "WindowsServer2008" . date('YmdHis');
			$account= $_SESSION['logArr']['account'];
			$domainid= $_SESSION['logArr']['domainid'];
			$securitygroupids = $securityGroupId['listsecuritygroupsresponse']['securitygroup'][0]['id'];


			//$_SESSION['logArr']['userid']
			//$_SESSION['logArr']['domainid']
			$response = $this->model->createVM($serviceofferingid, $templateid, $zoneid, $hypervisor, $hostid, $diskofferingid, $displayname, $name, $account, $domainid, $securitygroupids);		
			$response = json_decode($response, true);

			return $response;

		}else{
			header('location: /account');
		}
		
	}

	function order() {

		// Check if a order was made
		if (FALSE) {
			header('location: /shoppingbasket');
		}

		// Check if loged in!
		// && $_SESSION['orderPage'] == TRUE
		if (!isset($_SESSION['loggedIn']) ) {
			header('location: /account');
		}

		// Eerst vm aanmaken, vervolgens invoice maken en versturen. Als laatste de winkel wagen legen.
		$response = $this->createVM();
		$this->model->makeInvoice();
		unset($_SESSION['cart']);

		// Check succes
		if(isset($response['deployvirtualmachineresponse']['errorcode'])) {
			echo "<pre>";
			print_r($response);
			//header('location: /shoppingbasket');
		} else {
			sleep (2);
			header('location: /management');
		}

	}
	
}

