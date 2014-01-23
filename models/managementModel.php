<?php

/**
* 
*/

class managementModel extends baseModel
{

	function __construct()
	{
		parent::__construct();
          $cloud = new cloudstack();
	}

	public function getVM(){
          
          Session::init();
          // Haal de vms op voor de gebruiker die ingeloged is
          $vmResponce = $cloud->listVirtualMachines('',$_SESSION['logArr']['account']);
          $vmResponce = json_decode($vmResponce, true);

          // Bouw nu een array for elke VM
          $vmResponce = $vmResponce['listvirtualmachinesresponse'];
          $vmResponce = $vmResponce['virtualmachine'];
          
          return $vmResponce;
	}

}

