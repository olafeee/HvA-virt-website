<?php

/**
* 
*/

class managementModel extends baseModel
{

     public $cloudstack;

	function __construct()
	{
		parent::__construct();
          $this->cloudstack = new cloudstack();
	}

	public function getVM(){
          
          Session::init();
          // Haal de vms op voor de gebruiker die ingeloged is
          $vmResponse = $this->cloudstack->listVirtualMachines('',$_SESSION['logArr']['account']);
          $vmResponse = json_decode($vmResponse, true);

          // Bouw nu een array for elke VM
          $vmResponse = $vmResponse['listvirtualmachinesresponse'];
          
          return $vmResponse;
	}

     public function getVMbyID($vmid) {
          // Haal de VM op by ID
          $vmResponse = $this->cloudstack->listVirtualMachines($vmid);
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

     function usm(){
          $this->cloudstack->updateUser();
     }

     function getInvoice($username){
                   $sqlArray = $this->db->select('SELECT * FROM invoice_files WHERE 
                              username = :username', 
                array('username' => $username));
                return $sqlArray;
     }

     function updateChangeGI($adstr, $adzip, $adcit, $CSID){
        $postData = array(
               'adstr' => $adstr,
               'adstr' => $adstr,
               'adzip' => $adzip
        );
        print_r($postData)
        //$this->db->update('CSUsers', $postData, "`CSID` = $CSID ");
    }
}

