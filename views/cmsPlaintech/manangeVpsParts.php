<?php require 'inc/header.php'; ?>


<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Virtual Machine Panel</h3>
      </div>
      <div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<td>Amount</td>
					<td>Price</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
			<?php

				$text = $this->cmsMVP;
				$kindMVP = $this->kindMVP;
				
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
			<input type="text" class="form-control bfh-number AmountMVP1" name="AmountMVP">
			<input type="text" class="form-control bfh-number PriceMVP" name="PriceMVP" value="PriceMVP">
	        <div class="faultMVP"></div>
	        <button class="btn btn-lg btn-primary btn-block btn-soepmit" type="submit">Sign in</button>
	    </form>
	</div>

      </div>
    </div>
  </div><!-- END Col 9 -->
</div>




	

