
<div"row">
<div class="col-md-3"></div>
<div class="col-md-6">
<table class="table">
	<thead>
		<tr>
			<td>GB</td>
			<td>Price</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	<?php
		$text = $this->cmsMVP;

		$i = 0;
		while ($i < count($text)) {
			echo '<tr>';
			echo '<td>'.$text[$i]["DiskAmount"].'</td>';
			echo '<td>'.$text[$i]["DiskPrice"].'</td>';
			echo '<td><a href="javascript:showMVP('.$i.', '.$text[$i]["DiskAmount"].', '.$text[$i]["DiskPrice"].')" class="sla_ms">more info</a></td>';	
			echo"<tr/>";
			$i++;
		}?>
	</tbody>
</table>


<div class="MVPdiv"> 
	<form name="input" action="/cmsPlaintech/insertMVP" method="post">
		<input type="text" id="idMVP" name="idMVP" value="idMVP">
		<input type="text" id="AmountMVP" name="AmountMVP" value="AmountMVP">
		<input type="text" id="PriceMVP" name="PriceMVP" value="PriceMVP">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
</div>
</div>
<div class="col-md-3"></div>	
</div>

<script type="text/javascript">
	onload=function(){
alert(regIsNumber(9));
}

function regIsNumber(fData)
{
    var reg = new RegExp(”^[-]?[0-9]+[\.]?[0-9]+$”);
    return reg.test(fData);
}

	
</script>


	

