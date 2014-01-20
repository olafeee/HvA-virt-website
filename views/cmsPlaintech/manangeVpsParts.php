<?php
	$text = $this->cmsMVP;

	$i = 0;
	echo'<form name="input" action="/cmsPlaintech/insertContent/" method="post">';
	while ($i < count($text)) {
		echo '<tr>';
		echo '<td>'.$text['DiskAmount'].'</td>';
		echo '<td>'.$text['DiskPrice'].'</td>';
		echo '<a href="javascript:showSLAMenu()" class="sla_ms">more info</a>';	
		echo"<tr/>";
		$i++;
	}
?>
</form>

<div class="SLAdiv"> 
	<input type="text" name="DiskAmount" value="">
	<input type="text" name="DiskValue" value="">

</div>


	

