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

	function createVM($serviceofferingid, $templateid, $zoneid, $diskofferingid, $displayname, $name, $account, $domainid){
		$this->cloudstack->deployVirtualMachine($serviceofferingid, $templateid, $zoneid, $diskofferingid, $displayname, $name, $account, $domainid);
	}

}

?>