<?php

	$text = $this->viewpage;

	$i = 0;
	while ($i < count($text)) {
		echo 'number = '.$text[$i]["cwid"];
		echo $text[$i]["cmstext"];
		echo '<a href="/cmsPlaintech/editContent/'.$text[$i]["cwid"].'">X</a>';
		echo"<br/>";
		$i++;
	}

?>
