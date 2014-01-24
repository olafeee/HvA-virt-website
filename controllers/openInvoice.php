<?php

//class openInvoice {

//function __construct(){
	$fileToOpen = pack("H*", $_GET["f"]);
	
	if (!isset($_SESSION['allowFile'])) {
		echo "<pre>";
		var_dump($_SESSION);
		echo "</pre>";
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