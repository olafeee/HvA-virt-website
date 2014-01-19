<?php

	$text = $this->viewpage;

	$i = 0;
	while ($i < count($text)) {
		echo $text[$i]["cmstext"];
		echo"<br/>";
		$i++;
	}

?>


