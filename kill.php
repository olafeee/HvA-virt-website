<?php

	@session_start();
	unset($_SESSION['allowFile']);
	echo('Session has been killed, look!');
	echo "<pre>";
		var_dump($_SESSION);
	echo "</pre>";
		
?>