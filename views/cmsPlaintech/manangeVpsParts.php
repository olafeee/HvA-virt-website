<?php
	$text = $this->cmsMVP;

	$i = 0;
	echo'<form name="input" action="/cmsPlaintech/insertContent/" method="post">';
	while ($i < count($text)) {
		echo '<input type="text" name="DiskAmount" value="'.$text[$i]['DiskAmount'].'">';
		echo '<input type="text" name="DiskValue" value="'.$text[$i]['DiskPrice'].'">';		
		echo"<br/>";
		$i++;
	}
?>
</form>



	

