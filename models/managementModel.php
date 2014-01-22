<?php

/**
* 
*/

class managementModel extends baseModel
{

	function __construct()
	{
		parent::__construct();
	}

	public function getVM(){
		  $cloud = new cloudstack();
          $cloud->responseType = 'json';

          Session::init();
          // Bouw een 3D array van de JSON responce
          $vmResponce = $cloud->listVirtualMachines();
          $vmResponce = json_decode($vmResponce, true);

          // Bouw nu een array for elke VM
          $vmResponce = $vmResponce['listvirtualmachinesresponse'];
          $vmResponce = $vmResponce['virtualmachine'];

          // Haal de vms er uit van de gebruiker die ingeloged is
          return $vmResponce;
	}

