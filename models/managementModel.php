<?php

/**
* 
*/

require_once("lib/cloudstack.php");
require_once("lib/cloudstack_sign.php");

class managementModel extends baseModel
{
	
	public $cloudstack;
	public $cloudstack_sign;

	function __construct()
	{
		parent::__construct();
		$this->conDB();
		$this->cloudstack = new cloudstack();
		$this->cloudstack_sign = new cloudstack_sign();
	}

	// Create a session for a console window
	function consoleSession() {
		$cmdline = "command=login&username=admin&password=R_47*Qp12&response=json";
        $cmdline = str_replace(" ", "%20", $cmdline);
        $url = "http://145.92.14.90:8080/client/api?".$cmdline;
        echo "<iframe  style='display:none;' src='".$url."'></iframe>
        <meta url=/console />";
	}

	function consoleWindow($vmid) {
		$console_uuid = '163a66dc-1df6-4c75-b16f-2db34d91d026';
        $console_vps_name = 'ConsoleTest';
        //if($session == ""){
        //    echo "<meta HTTP-EQUIV='REFRESH' content='5; url=/console/refresh'> ";
        //} 
                                            
        $link = "http://145.92.14.90:8080/client/console?cmd=access&vm=".$console_uuid."";
        echo "<iframe frameborder='0' width='640' height='420' src=\"".$link."\"></iframe>";
	}

