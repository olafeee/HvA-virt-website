<?php

//class openInvoice {
@session_start();
//function __construct(){
	$fileToOpen = pack("H*", $_GET["f"]);
	/*echo "<pre>";
		var_dump($_SESSION['allowFile']);
	echo "</pre>";*/
	
	if (!isset($_SESSION['allowFile'])) {
		die('<h1>Access Denied!</h1><h2 style="color:red">Code 1</h2>');
	}
	
	if (!in_array($fileToOpen, $_SESSION['allowFile'])){
		die('<h1>Access Denied!</h1><h2 style="color:red">Code 2</h2>');
	}
	
	if(!file_exists("/var/invoices/".$fileToOpen)){
		die('<h1>Access Denied!</h1><h2 style="color:red">Code 3</h2>');
	} else {
		header('Content-Type: application/pdf');
		header('Content-Disposition: inline; filename="'.$fileToOpen.'"');
		header('Cache-Control: private, max-age=0, must-revalidate');
		header('Pragma: public');
		echo file_get_contents("/var/invoices/".$fileToOpen);
	}
//}
//}	
	exit();
?>