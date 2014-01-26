<?php

	$customers = $this->invoice;
	
	if(1 > count($customers)){
		echo "None";
	}else{
		for ($i=0; $i < count($customers); $i++) { 
			echo($customers[$i]['firstname']." ".$customers[$i]['lastname']);
		}
	}
?>