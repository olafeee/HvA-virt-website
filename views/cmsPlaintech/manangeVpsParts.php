<?php
	$text = $this->cmsMVP;

	$i = 0;
	echo'<table class="table">';
	while ($i < count($text)) {
		echo '<tr>';
		echo '<td>'.$text[$i]["DiskAmount"].'</td>';
		echo '<td>'.$text[$i]["DiskPrice"].'</td>';
		echo '<td><a href="javascript:showMVP('.$i.', '.$text[$i]["DiskAmount"].', '.$text[$i]["DiskPrice"].')" class="sla_ms">more info</a></td>';	
		echo"<tr/>";
		$i++;
	}
	echo'</table>';
?>


<div class="MVPdiv"> 
	<form name="input" action="/cmsPlaintech/insertMVP" method="post">
		<input type="text" id="idMVP" name="idMVP" value="idMVP">
		<input type="text" id="AmountMVP" name="AmountMVP" value="AmountMVP">
		<input type="text" id="PriceMVP" name="PriceMVP" value="PriceMVP">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
</div>


	

