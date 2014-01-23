<?php

	echo "<h1>Method 1</h1>";
	session_start();
    foreach ($_SESSION as $key=>$val)
    echo $key."-".$val."<br />";
	
		
?>