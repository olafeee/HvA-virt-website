<?php
	$text = $this->cmsMVP;

	$i = 0;
	echo'<form name="input" action="/cmsPlaintech/insertContent/" method="post">';
	while ($i < count($text)) {
		echo '<tr>';
		echo '<td>'.$text[$i]["DiskAmount"].'</td>';
		echo '<td>'.$text[$i]["DiskPrice"].'</td>';
		echo '<a href="javascript:showMVP('.$text[$i]["DiskAmount"].', '.$text[$i]["DiskPrice"].')" class="sla_ms">more info</a>';	
		echo"<tr/>";
		$i++;
	}
?>
</form>

<div class="MVPdiv"> 
	<input type="text" id="AmountMVP" name="AmountMVP" value="AmountMVP">
	<input type="text" id="PriceMVP" name="PriceMVP" value="PriceMVP">

</div>


	

