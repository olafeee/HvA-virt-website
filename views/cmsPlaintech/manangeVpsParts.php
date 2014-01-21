
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
		$kindMVP = $this->kindMVP;
		print_r($text);
		$i = 0;
		while ($i < count($text)) {
			?>
			<script type="text/javascript">var x<?php echo $i; ?> = <?php echo '"'.$text[$i][$kindMVP."Amount"].'"'; ?>;</script>
			<?php
			echo '<tr>';
			echo '<td>'.$text[$i][$kindMVP."Amount"].'</td>';
			echo '<td>'.$text[$i][$kindMVP."Price"].'</td>';
			echo '<td><a href="javascript:showMVP('.$text[$i][$kindMVP[0]."ID"].', x'.$i.', '.$text[$i][$kindMVP."Price"].')" class="sla_ms">more info</a></td>';	
			echo"<tr/>";
			$i++;
		}?>
	</tbody>
</table>


<div class="MVPdiv"> 
	<form name="input" action="/cmsPlaintech/insertMVP" onsubmit="return checkInp()" method="post">
        <input type="hidden" class="pageMVP" name="pageMVP" value="<?php echo $kindMVP; ?>">
        <input type="hidden" class="idMVP" name="idMVP" value="idMVP">
		<input type="text" class="form-control bfh-number AmountMVP" name="AmountMVP">
		<input type="text" class="form-control bfh-number PriceMVP" name="PriceMVP" value="PriceMVP">
        <div class="faultMVP"></div>
        <button class="btn btn-lg btn-primary btn-block btn-soepmit" type="submit">Sign in</button>
    </form>
</div>
</div>
<div class="col-md-3"></div>	
</div>



	

