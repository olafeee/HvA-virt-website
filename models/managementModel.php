<?php

/**
* 
*/

class managementModel extends baseModel
{

     public $db;
     public $cloudstack;

	function __construct()
	{
		parent::__construct();
          $this->cloudstack = new cloudstack();
          $this->db = $this->model->conDB1();
	}

	public function getVM(){
          
          Session::init();
          
          $role = 7;
          if (isset($_SESSION['userRole'])) {
             for ($i=0; $i < count($_SESSION['userRole']); $i++) { 
               if ($_SESSION['userRole'][$i]['rol_id']=='2') {
                 $role = '2';
               }
             }
           }

          // Als role gelijk is aan 3, alle vms laten zien
          if ($role == '2') {
               $vmResponse = $this->cloudstack->listVirtualMachines();
          } else {
               // Haal de vms op voor de gebruiker die ingeloged is
               $vmResponse = $this->cloudstack->listVirtualMachines('',$_SESSION['logArr']['account']); 
          }
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
        $x = $this->db->updateGI($adstr, $adzip, $adcit, $CSID);
        return $x;
    }
}

