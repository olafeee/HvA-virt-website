<?php

/**
* 
*/

require_once("lib/cloudstack.php");
require_once("lib/cloudstack_sign.php");

class shoppingbasketModel extends baseModel
{
	
	public $cloudstack;
	public $cloudstack_sign;

	function __construct()
	{
		parent::__construct();
		//$this->conDB();
		$this->cloudstack = new cloudstack();
		$this->cloudstack_sign = new cloudstack_sign();
	}

	function securityGroupsid($x, $y){
		echo ($this->cloudstack->listSecurityGroups($x, $y));


	}

	function createVM($serviceofferingid, $templateid, $zoneid, $hypervisor, $hostid, $diskofferingid, $displayname, $name, $account, $domainid, $securitygroupids){
		echo ($this->cloudstack->deployVirtualMachine($serviceofferingid, $templateid, $zoneid, $hypervisor, $hostid, $diskofferingid, $displayname, $name, $account, $domainid, $securitygroupids));

		echo ($this->cloudstack->listAsyncJobs());
	}

}

?>
