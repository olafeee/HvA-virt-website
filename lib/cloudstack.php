<?php
/*
* 
* CloudStack Wrapper for PHP
* Version 1.0
* Created by Steven Lopez (Twitter: @augrunt | Email: steven@lopez.id.au)
* NO SUPPORT, GUARANTEES OR WARRANTY OFFERED WITH THIS CODE. USE AT OWN RISK.
*/


class cloudstack
{
    protected $_secretKey = NULL;
    protected $_apiKey = NULL;
    protected $_targetApi = NULL;
    private $_curlEnabled = NULL;
    public $responseType = 'xml';
    public $return_signed_only = false;
    
    /* public function __construct($targetApi, $apiKey, $secretKey)
    {
        $this->_apiKey = $apiKey;
        $this->_secretKey = $secretKey;
        $this->_targetApi = $targetApi;
        
        if ($this->_checkCurl() == false) {
            $this->_curlEnabled = 0;
        } else {
            $this->_curlEnabled = 1;
        }
    } */
	
	public function __construct()
    {
        $this->_apiKey = CS_APIKEY;
        $this->_secretKey = CS_SECRECTKEY;
        $this->_targetApi = CS_URL;
        
        if ($this->_checkCurl() == false) {
            $this->_curlEnabled = 0;
        } else {
            $this->_curlEnabled = 1;
        }
    }
    
    /******** Start Custom Methods ********/
    public function execute_command($command, $array = null)
    {
        if (empty($array)) {
            $array = array();
        }
        $static_array = array(
            'command' => $command,
            'response' => $this->responseType
        );
        $command_array = array_merge($array, $static_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    /******** Start Template Related Methods *********/
    public function listTemplates($filter = 'executable')
    {
        $command_array = array(
            'command' => 'listTemplates',
            'templateFilter' => $filter,
            'response' => $this->responseType
        );
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function createTemplate($displaytext, $name, $ostypeid, $bits = null, $details = null, $isfeatured = null, $ispublic = null, $passwordenabled = null, $requireshvm = null, $snapshotid = null, $templatetag = null, $url = null, $virtualmachineid = null, $volumeid = null)
    {
        /**
Creates a template of a virtual machine. A template created from this command is automatically designated as a private template visible to the account that created it.
Either the snapshotid or the volumeid must be passed - if you pass the volumeid, the Virtual Machine must be in a STOPPED state.
**/
        $command_array = array(
            'command' => 'createTemplate',
            'displaytext' => $displaytext,
            'name' => $name,
            'ostypeid' => $ostypeid,
            'bits' => $bits,
            'details' => $details,
            'isfeatured' => $isfeatured,
            'ispublic' => $ispublic,
            'passwordenabled' => $passwordenabled,
            'requireshvm' => $requireshvm,
            'snapshotid' => $snapshotid,
            'templatetag' => $templatetag,
            'url' => $url,
            'virtualmachineid' => $virtualmachineid,
            'volumeid' => $volumeid,
            'response' => $this->responseType
        );
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    /******** End Template Related Methods *********/
    /******** Start Async job Related Methods *********/
    public function listAsyncJobs()
    {
        $command_array = array(
            'command' => 'listAsyncJobs',
            'response' => $this->responseType
        );
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function queryAsyncJobResult($jobid)
    {
        $command_array = array(
            'command' => 'queryAsyncJobResult',
            'jobid' => $jobid,
            'response' => $this->responseType
        );
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    /******** End Async job Related Methods *********/
    /******** Start Virtual Machine Related Methods *********/
    public function listVirtualMachines($account = null, $domainId = null, $forVirtualNetwork = null, $groupId = null, $hostId = null, $hypervisor = null, $id = null, $isRecursive = null, $keyword = null, $name = null, $networkId = null, $page = null, $pageSize = null, $podId = null, $state = null, $storageId = null, $zoneId = null)
    {
        $command_array = array(
            'command' => 'listVirtualMachines',
            'account' => $account,
            'domainid' => $domainId,
            'forvirtualnetwork' => $forVirtualNetwork,
            'groupid' => $groupId,
            'hostid' => $hostId,
            'hypervisor' => $hypervisor,
            'id' => $id,
            'isrecursive' => $isRecursive,
            'keyword' => $keyword,
            'name' => $name,
            'networkid' => $networkId,
            'page' => $page,
            'pagesize' => $pageSize,
            'podid' => $podId,
            'state' => $state,
            'storageid' => $storageId,
            'zoneid' => $zoneId,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function startVirtualMachine($id)
    {
        $command_array = array(
            'command' => 'startVirtualMachine',
            'id' => $id,
            'response' => $this->responseType
        );
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function stopVirtualMachine($id)
    {
        $command_array = array(
            'command' => 'stopVirtualMachine',
            'id' => $id,
            'response' => $this->responseType
        );
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function rebootVirtualMachine($id)
    {
        $command_array = array(
            'command' => 'rebootVirtualMachine',
            'id' => $id,
            'response' => $this->responseType
        );
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function destroyVirtualMachine($id)
    {
        $command_array = array(
            'command' => 'destroyVirtualMachine',
            'id' => $id,
            'response' => $this->responseType
        );
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    /******** End Virtual Machine Related Methods *********/
    /******** Start Disk Related Methods *********/
    public function listVolumes($vm_id = null)
    {
        $command_array = array(
            'command' => 'listVolumes',
            'response' => $this->responseType
        );
        if ($vm_id != null) {
            $command_array['virtualmachineid'] = $vm_id;
        }
        
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function attachVolume($id, $virtualMachineId, $deviceId = null)
    {
        $command_array = array(
            'command' => 'attachVolume',
            'id' => $id,
            'virtualmachineid' => $virtualMachineId,
            'deviceid' => $deviceId,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function detachVolume($id, $virtualMachineId, $deviceId = null)
    {
        $command_array = array(
            'command' => 'detachVolume',
            'id' => $id,
            'virtualmachineid' => $virtualMachineId,
            'deviceid' => $deviceId,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function createVolume($name, $account = null, $diskOfferingId = null, $domainId = null, $size = null, $snapshotId = null, $zoneId = null)
    {
        $command_array = array(
            'command' => 'createVolume',
            'name' => $name,
            'account' => $account,
            'diskofferingid' => $diskOfferingId, //the ID of the disk offering. Either diskOfferingId or snapshotId must be passed in.
            'domainid' => $domainId,
            'size' => $size, //Arbitrary volume size. Mutually exclusive with diskOfferingId
            'snapshotid' => $snapshotId,
            'zoneid' => $zoneId,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function deleteVolume($id)
    {
        $command_array = array(
            'command' => 'deleteVolume',
            'id' => $id,
            'response' => $this->responseType
        );
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    /******** End Disk Related Methods *********/
    /******** Start NAT Methods *********/
    
    public function enableStaticNat($virtualMachineId, $ipAddressId)
    {
        $command_array = array(
            'command' => 'enableStaticNat',
            'virtualmachineid' => $virtualMachineId,
            'ipaddressid' => $ipAddressId,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function disableStaticNat($ipAddressId)
    {
        $command_array = array(
            'command' => 'disableStaticNat',
            'ipaddressid' => $ipAddressId,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function createIpForwardingRule($ipAddressId, $protocol, $startPort, $cidrList = null, $endport = null, $openFirewall = null)
    {
        $command_array = array(
            'command' => 'createIpForwardingRule',
            'ipaddressid' => $ipAddressId,
            'protocol' => $protocol,
            'startport' => $startPort,
            'cidrlist' => $cidrList,
            'endport' => $endPort,
            'openfirewall' => $openFirewall,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function deleteIpForwardingRule($id)
    {
        $command_array = array(
            'command' => 'deleteIpForwardingRule',
            'id' => $id, //id of the rule
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    
    public function listIpForwardingRules($account = null, $domainId = null, $id = null, $ipAddressId = null, $keyword = null, $page = null, $pagesize = null, $virtualMachineId = null)
    {
        $command_array = array(
            'command' => 'listIpForwardingRules',
            'account' => $account,
            'domainid' => $domainId,
            'id' => $id,
            'ipaddressid' => $ipAddressId,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pagesize,
            'virtualmachineid' => $virtualmachineId,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    /******** End NAT Methods *********/
    /******** Start Zone Methods *********/
    public function listZones($available = null, $domainId = null, $id = null, $keyword = null, $page = null, $pagesize = null)
    {
        $command_array = array(
            'command' => 'listZones',
            'available' => $available, //true if you want to retrieve all available Zones. False if you only want to return the Zones from which you have at least one VM. Default is false.
            'domainid' => $domainId,
            'id' => $id,
            'keyword' => $keyword,
            'page' => $page,
            'pagesize' => $pagesize,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    /******** End Zone Methods *********/
    /******** Start Misc. Methods *********/
    public function listHypervisors($zoneId = null)
    {
        $command_array = array(
            'command' => 'listHypervisors',
            'zone' => $zoneId, //the zone id for listing hypervisors.
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    public function listServiceOfferings($domainId = null, $id = null, $isSystem = null, $keyword = null, $name = null, $page = null, $pagesize = null, $systemVmType = null, $virtualMachineId = null)
    {
        $command_array = array(
            'command' => 'listServiceOfferings',
            'domainid' => $domainId,
            'id' => $id,
            'issystem' => $isSystem,
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pagesize,
            'systemvmtype' => $systemVmType,
            'virtualmachineid' => $virtualMachineId,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    public function listDiskOfferings($domainId = null, $id = null, $keyword = null, $name = null, $page = null, $pagesize = null)
    {
        $command_array = array(
            'command' => 'listDiskOfferings',
            'domainid' => $domainId,
            'id' => $id,
            'keyword' => $keyword,
            'name' => $name,
            'page' => $page,
            'pagesize' => $pagesize,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    public function listAccounts($zoneId = null)
    {
        $command_array = array(
            'command' => 'listHypervisors',
            'zone' => $zoneId, //the zone id for listing hypervisors.
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    // Create an account
    public function createAccount($accounttype = 1, $email, $firstname, $lastname, $password, $username)
    {
        $command_array = array(
            'accounttype' => $accounttype,
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'password' => $password,
            'username' => $username,
            'response' => $this->responseType
        );
        //remove empty elements to prevent API error
        $command_array = array_filter($command_array);
        $command = $this->_handleArray($command_array);
        return $this->_apiRequest($command);
    }
    // Update account information, usefull for password changes ect...
    /*public function updateAccount($account, )
    {
        
    }*/
    
    protected function _signRequest($apiRequest)
    {
        $hashUrl = 'apikey=' . strtolower($this->_apiKey) . '&' . strtolower($apiRequest);
        $hashedRequest = rawurlencode(base64_encode(hash_hmac('sha1', $hashUrl, $this->_secretKey, TRUE)));
        $apiRequest = $this->_targetApi . '?' . $apiRequest . '&apikey=' . $this->_apiKey . '&signature=' . $hashedRequest;
        
        return $apiRequest;
    }
    
    protected function _apiRequest($request)
    {
        $request = $this->_signRequest($request);
        
        if ($this->_curlEnabled == 0) {
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
            
            if (curl_errno($curl)) {
                $curl_error = curl_error($curl);
            }
            curl_close($curl);
            
            if (!empty($curl_error)) {
                throw new Exception('Error communicating with API, CURL error ' . $curl_error);
            } else {
                if ($this->responseType == 'json') {
                    $response = $this->_indent($response);
                } else {
                    $response = $response;
                }
                return $response;
            }
        }
    }
    
    protected function _parseXmlResponse($response)
    {
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        return json_decode($json, TRUE);
    }
    
    protected function _handleArray($array)
    {
        if (!is_array($array)) {
            throw new exception('Variable passed is not an array');
            return null;
        }
        if (!array_key_exists('command', $array)) {
            throw new exception('Command not detected in array');
            return null;
        }
        ksort($array);
        $i = 1;
        foreach ($array as $key => $val) {
            if ($i <= 1) {
                $string = $key . '=' . rawurlencode($val);
                $i++;
            } else {
                $string .= '&' . $key . '=' . rawurlencode($val);
            }
        }
        return $string;
    }
    /**
* Indents a flat JSON string to make it more human-readable
*
* @param string $json The original JSON string to process
* @return string Indented version of the original JSON string
*/
    protected function _indent($json)
    {
        $result = '';
        $pos = 0;
        $strLen = strlen($json);
        $indentStr = ' ';
        $newLine = "\n";
        $prevChar = '';
        $outOfQuotes = true;
        
        for ($i = 0; $i <= $strLen; $i++) {
            // Grab the next character in the string
            $char = substr($json, $i, 1);
            
            // Are we inside a quoted string?
            if ($char == '"' && $prevChar != '\\') {
                $outOfQuotes = !$outOfQuotes;
            }
            // If this character is the end of an element,
            // output a new line and indent the next line
            else if (($char == '}' || $char == ']') && $outOfQuotes) {
                $result .= $newLine;
                $pos--;
                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indentStr;
                }
            }
            // Add the character to the result string
            $result .= $char;
            
            // If the last character was the beginning of an element,
            // output a new line and indent the next line
            if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
                $result .= $newLine;
                if ($char == '{' || $char == '[') {
                    $pos++;
                }
                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indentStr;
                }
            }
            $prevChar = $char;
        }
        
        return $result;
    }
    
    protected function _checkCurl()
    {
        if (function_exists('curl_init')) {
            return true;
        } else {
            return false;
        }
    }
    
}

function listCloudStackMethods()
{
    $class_methods = get_class_methods('cloudstack');
    
    foreach ($class_methods as $method_name) {
        if ($method_name != '__construct') {
            echo $method_name . '<br />';
        }
    }
}