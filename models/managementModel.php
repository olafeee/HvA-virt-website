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
          $vmResponce = $this->cloud->listVirtualMachines('',$_SESSION['logArr']['account']);
          $vmResponce = json_decode($vmResponce, true);

          // Bouw nu een array for elke VM
          $vmResponce = $vmResponce['listvirtualmachinesresponse'];

          // Check if the user has no VMs.
          if(count($vmResponce)==0) {

          } else {

          }

          //$vmResponce = $vmResponce['virtualmachine'];
          
          return $vmResponce;
	}

}

