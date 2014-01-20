
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
        <input type="hidden" class="idMVP" name="idMVP" value="idMVP">
        <input type="text" class="form-control bfh-number AmountMVP" name="AmountMVP" value="AmountMVP">
        <input type="text" class="form-control bfh-number PriceMVP" name="PriceMVP" value="PriceMVP">
        <div class="faultMVP"></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" onclick='checkInp()'>Sign in</button>
    </form>
</div>
</div>
<div class="col-md-3"></div>	
</div>



	

