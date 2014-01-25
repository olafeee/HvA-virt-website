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

     public function getVMbyID($vmid) {
          // Haal de VM op by ID
          $vmResponse = $this->cloud->listVirtualMachines($vmid);
          $vmResponse = json_decode($vmResponse, true);

          // Bouw nu een array for de VM
          $vmResponse = $vmResponse['listvirtualmachinesresponse']['virtualmachine'];

          return $vmResponse;
     }

     // Kijk wat het commando is, en voer deze uit.
     public function vmcommands($command, $vmid, $args = null) {

          if (strcmp($command,'start') == 0 ) 
          {
               $response = $this->cloudstack->startVirtualMachine($vmid);
               return json_encode($response);
          } 
          else if (strcmp($command,'stop') == 0 ) 
          {
               $response = $this->cloudstack->stopVirtualMachine($vmid, $args);
               return json_encode($response);
          } 
          else if (strcmp($command,'restart') == 0) 
          {
               $response = $this->cloudstack->rebootVirtualMachine($vmid);
               return json_encode($response);
          } 
          else if (strcmp($command,'destroy') == 0 ) 
          {
               $response = $this->cloudstack->destroyVirtualMachine($vmid);
               return json_encode($response);
          } 
          else if (strcmp($command,'recover') == 0 ) 
          {
               $response = $this->cloudstack->recoverVirtualMachine($vmid);
               return json_encode($response);
          } 
          else 
          {
               // Als geen van de bovenste commands kloppen
               throw new Exception('Unknown command!');
          }

     }

}

