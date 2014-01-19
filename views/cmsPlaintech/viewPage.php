<?php

	$text = $this->viewpage;
	print_r($text);
	$i = 0;
	while ($i < count($text)) {
		echo 'number = '.$text[$i]["cwid"];
		echo"<br/>";
		echo $text[$i]["cmstext"];
		echo"<br/>";
		echo '<a href="/cmsPlaintech/editContent/'.$text[$i]["pageid"].'/'.$text[$i]["cwid"].'">X</a>';
		echo"<br/>";
		$i++;
	}

?>
