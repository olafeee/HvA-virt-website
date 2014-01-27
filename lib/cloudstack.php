<?php

class cloudstack 
{
    protected $_targetApi = NULL;
    public $responseType = 'json';
    public $return_signed_only = false;

    public function __construct($_targetApi = CS_URL)
    {
        $this->_targetApi = $_targetApi;
    }

    // NIET GEBRUIKEN!!!
    // IS ALLEEN NOG AANWEZIG VOOR COMPATIBILATIE MET OUDE AANROEPEN
    /*public function __construct()
    {
        $this->_targetApi = CS_URL;
    }*/

    /******** Start Custom Methods ********/
    public function execute_command($command, $array = null)
    {
        // If no array is given, create an empty array
        if (empty($array)) {
            $array = array();
        }

        // Now build the command array
        $command_array = array(
            'command' => $command,
        );

        // Merge the command and parameters arrays together
        $command_array = array_merge($command_array, $array);

        // Send the command to the API parser
        return $this->_apiRequest($command_array);
    }

    /******** Start Async job Related Methods *********/
    public function listAsyncJobs()
    {
        $command_array = array(
            'command' => 'listAsyncJobs'
        );
        return $this->_apiRequest($command_array);
    }
    
    public function queryAsyncJobResult($jobid)
    {
        $command_array = array(
            'command' => 'queryAsyncJobResult',
            'jobid' => $jobid
        );
        return $this->_apiRequest($command_array);
    }

    /******** Start Account Methods ********/

    // Logs a user into the CloudStack. 
    // A successful login attempt will generate a JSESSIONID cookie value
    // that can be passed in subsequent Query command calls until the 
    // "logout" command has been issued or the session has expired.
    public function login($username, $password)
    {
        $command_array = array(
            'command' => 'login',
            'password' => $password,
            'username' => $username
        );
        return $this->_apiRequest($command_array);
    }

    // Logout a user
    public function logout()
    {
        $command_array = array(
            'command' => 'logout'
        );
        return $this->_apiRequest($command_array);
    }

    // Return accounts by name
    public function listAccounts($accountname = null, $listall = 'true')
    {
        $command_array = array(
            'command' => 'listAccounts',
            'name' => $accountname,
            'listall' => $listall
        );
        return $this->_apiRequest($command_array);
    }

    // Create an account
    public function createAccount($email, $firstname, $lastname, $password, $username, $accounttype = '0')
    {
        $command_array = array(
            'command' => 'createAccount',
            'accounttype' => $accounttype,
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'password' => $password,
            'username' => $username
        );
        return $this->_apiRequest($command_array);
    }

    public function updateUser()
    {
        $command_array = array(
            'command' => 'updateUser',
            'id' => 'a7bd1ebf-9128-4a1c-90c3-72b63d41952e',
            'email' => 'orc@oscarlguvluthorcrocvlugt.nl',
            'firstname' => 'orcccc',
            'lastname' => 'oscarrrr'
        );
        return $this->_apiRequest($command_array);
    }
	
	/******** Start VirtualMachine Methods ********/

    // Starts a Virutal Machine
	public function startVirtualMachine($id)
    {
        $command_array = array(
            'command' => 'startVirtualMachine',
            'id' => $id, 
        );
        return $this->_apiRequest($command_array);
    }

    // Stops a Virtual Machine
    public function stopVirtualMachine($id, $forced = 'false')
    {
        $command_array = array(
            'command' => 'stopVirtualMachine',
            'forced' => $forced,
            'id' => $id, 
        );
        return $this->_apiRequest($command_array);
    }

    // Reboot a Virtual Machine
    public function rebootVirtualMachine($id)
    {
        $command_array = array(
            'command' => 'rebootVirtualMachine',
            'id' => $id,
        );
        return $this->_apiRequest($command_array);
    }

    // Creates and automatically starts a virtual machine based on a service offering, disk offering, and template.
    public function deployVirtualMachine($serviceofferingid, $templateid, $zoneid, $hypervisor, $hostid, $diskofferingid = null, $displayname = null, $name = null, $account = null, $domainid = null, $securitygroupids = null)
    {
        $command_array = array(
            'command' => 'deployVirtualMachine',
            'serviceofferingid' => $serviceofferingid,
            'templateid' => $templateid,
            'zoneid' => $zoneid,
            'hypervisor' => $hypervisor,
            'hostid' => $hostid,
            'diskofferingid' => $diskofferingid,
            'displayname' => $displayname,
            'name' => $name,
            'account' => $account,
            'domainid' => $domainid,
            'securitygroupids' => $securitygroupids,
        );
        return $this->_apiRequest($command_array);
    }

    // Destroys a virtual machine. Once destroyed, only the administrator can recover it.
    public function destroyVirtualMachine($id)
    {
        $command_array = array(
            'command' => 'destroyVirtualMachine',
            'id' => $id,
        );
        return $this->_apiRequest($command_array);
    }

    // Recovers a virtual machine that has been marked as destroyed
    public function recoverVirtualMachine($id)
    {
        $command_array = array(
            'command' => 'recoverVirtualMachine',
            'id' => $id,
        );
        return $this->_apiRequest($command_array);
    }

    // Restore a VM to original template/ISO or new template/ISO
    public function restoreVirtualMachine($virtualmachineid, $templateid = null)
    {
        $command_array = array(
            'command' => 'restoreVirtualMachine',
            'virtualmachineid' => $virtualmachineid,
            'templateid' => $templateid,
        );
        return $this->_apiRequest($command_array);
    }

    // List the virtual machines owned by the account.
    public function listVirtualMachines($id = null, $account = null, $name = null, $state = null, $domainid = null, $templateid = null, $isoid =null, $listall = 'true')
    {
        $command_array = array(
            'command' => 'listVirtualMachines',
            'id' => $id,
            'account' => $account,
            'name' => $name,
            'state' => $state,
            'domainid' => $domainid,
            'templateid' => $templateid,
            'isoid' => $isoid,
            'listall' => $listall,
        );
        return $this->_apiRequest($command_array);
    }

    public function listSecurityGroups ($account = null, $domainid = null){

        $command_array = array(
            'command' => 'listSecurityGroups',       
            'account' => $account,
            'domainid' => $domainid,
            );
        return $this->_apiRequest($command_array);
    }

    public function listServiceOfferings ($domainid) {
        $command_array = array(
            'command' => 'listServiceOfferings',       
            'domainid' => $domainid,
        );
        return $this->_apiRequest($command_array);
    }






    /******** Start Protected Methods ********/
    protected function _apiRequest($array_request)
    {
        /*******************************
        **  Create the API request URL
        ********************************/
        
        // Afew checks
        if (!is_array($array_request)) {
            throw new exception('Variable passed is not an array');
            return null;
        }
        if (!array_key_exists('command', $array_request)) {
            throw new exception('Command not detected in array');
            return null;
        }

        // First lets add the 'response' key
        $array_request = array_merge($array_request, array('response' => $this->responseType));

        //remove empty elements to prevent API error
        //use 'strlen' as callback function, ONLY remove NULL, FALSE and Empty Strings, but leave values of 0 (zero)!
        $array_request = array_filter($array_request,  'strlen' );

        //ksort($array); //DEBUG

        // Build a string from all the elements in the array
        // Add a '=' between key and value
        // Add a '&' after a key value pair
        // URL encode every value
        $i = 1;
        foreach ($array_request as $key => $val) {
            if ($i <= 1) {
                $commandString = $key . '=' . rawurlencode($val);
                $i++;
            } else {
                $commandString .= '&' . $key . '=' . rawurlencode($val);
            }
        }

        // Join the URI of the targeted cloudstack management server and the api request
        $request = ($this->_targetApi . '?' . $commandString) ;


        /********************************
        **  Send the command
        ********************************/

        // Check if cURL model is enabled, if not then only send the request
        if (!function_exists('curl_init')) {
            return '<p>Return: <b>cURL is not enabled;</b> Here is your signed request for testing via browser or other method: <br /><small><a href="' . $request . '">' . $request . '</a></small></p>';
        } elseif ($this->return_signed_only == true) {
            return $request;
        }else {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $request);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSLVERSION, 3);
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            $response = curl_exec($curl);
            
            // Check for errors
            if (curl_errno($curl)) {
                $curl_error = curl_error($curl);
            }

            // Close connection
            curl_close($curl);
            
            // If errors were found throw an exception
            if (!empty($curl_error)) {
                throw new Exception('Error communicating with API, CURL error ' . $curl_error);
            } else {
                /*if ($this->responseType == 'json') {
                    $response = $this->_indent($response);
                } else {
                    $response = $response;
                }*/
                return $response;
            }
        }
    } // END __apiRequest


}
?>