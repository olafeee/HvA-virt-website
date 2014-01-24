<?php

//class openInvoice {

//function __construct(){
	$fileToOpen = pack("H*", $_GET["f"]);
	if(!file_exists("/var/invoices/".$fileToOpen){
		die('Invoice could not be loaded.');
	} else {
		echo file_get_contents("/var/invoices".$fileToOpen);
	}
//}
//}	
	
?>