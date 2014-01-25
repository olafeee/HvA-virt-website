<?php


@session_start();
$_SESSION['logArr']['firstname'] = "Sir";
$_SESSION['logArr']['lastname'] = "Cartland";
$_SESSION['logArr']['type'] = "1";

echo "You are now CFO";


?>