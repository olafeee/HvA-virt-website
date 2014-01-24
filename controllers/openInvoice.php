<?php

//class openInvoice {
@session_start();
//function __construct(){
	$fileToOpen = pack("H*", $_GET["f"]);
	echo "<pre>";
		var_dump($_SESSION);
	echo "</pre>";
	
	if (!isset($_SESSION['allowFile'])) {
		
		die('No allowed invoices');
	}
	
	if (!in_array($fileToOpen, $_SESSION['allowFile'])){
		die('This invoice belongs to someone else');
	}
	
	if(!file_exists("/var/invoices/".$fileToOpen)){
		die('Invoice could not be loaded.');
	} else {
		echo file_get_contents("/var/invoices/".$fileToOpen);
	}
//}
//}	
	
?>