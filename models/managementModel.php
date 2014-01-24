<?php

/**
* 
*/

class managementModel extends baseModel
{

     public $cloud;

	function __construct()
	{
		parent::__construct();
          $this->cloud = new cloudstack();
	}

	public function getVM(){
          
          Session::init();
          // Haal de vms op voor de gebruiker die ingeloged is
          $vmResponse = $this->cloud->listVirtualMachines('',$_SESSION['logArr']['account']);
          $vmResponse = json_decode($vmResponse, true);

          // Bouw nu een array for elke VM
          $vmResponse = $vmResponse['listvirtualmachinesresponse'];

          // Check if the user has no VMs.
          if(count($vmResponse)==0) {

          } else {

          }

          //$vmResponse = $vmResponse['virtualmachine'];
          
          return $vmResponse;
	}

}

