<?php
$invoices = $this->invoice;
//print_r($invoices);
@session_start();
?>


<?php require 'inc/header.php'; ?>


<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Invoices</h3>
      </div>
      <div class="panel-body">
		<div class="viewPageTable">
			<!--content !!!!!!!!!-->
			
			<?php /*<script type="text/javascript">
			$(document).ready(function() {
				var current=(window.location.pathname).str.slice(-1);
				var tbnext=(current + 1);
				var tbprev=(current - 1);
				
				if(current = 0){
					$('#tbprev').hide();
					$('#tbprev').click(function(){
						window.location='/invoice/l30i/'+ tbprev;
					}
				}else{
					$('#tbprev').click(function(){
						window.location='/invoice/l30i/'+ tbprev;
					}
					$('#tbnext').click(function(){
						window.location='/invoice/l30i/'+ tbnext;
					}
				}
			});
			</script>
			<!--<table id="pager" class="table">
				<thead>
				<tr>
					<th id="tbprev">Previous</th>
					<th id="tbnext">Next</th>
			</table>	-->
			<button id="tbprev" class="btn btn-default">Previous</button>
			<button id="tbnext" class="btn btn-default">Next</button>*/ ?>
			
			<table id="invoices" class="table table-condensed tablesorter">
			<thead>
				<tr>
					<th>File</th>
					<th>Date</th>
					<th>Customer</th>
				</tr>
			</thead>
			<tbody>
			<?php
			for ($i=0; $i < count($invoices); $i++) { 
				echo "<tr>";
				echo "<td><a target=\"_blank\" href=\"/openInvoice?f=".bin2hex($invoices[$i]['file'])."\">".$invoices[$i]['file']."</a></td>";
				echo "<td><a href=\"/invoice/showByDate/".substr($invoices[$i]['date'],0,10)."\">".$invoices[$i]['date']."</a></td>";
				echo "<td><a href=\"/invoice/showByName/".$invoices[$i]['firstname']." ".$invoices[$i]['lastname']."\">".$invoices[$i]['firstname']." ".$invoices[$i]['lastname']."</a></td>";
				echo "</tr>";
				
				//print_r($invoices[$i]);
				//Hier moet je mm doen 
				$_SESSION['allowFile'][] = $invoices[$i]['file'];
			}

			?>
		<!-- nein man ich will no-->
		</tbody>
        </table>
		
		<?php /*<div id="pager" class="pager">
			<form>
				<span class="glyphicon glyphicon-fast-backward"></span>
				<span class="glyphicon glyphicon-backward"></span>
				<input type="text" class="pagedisplay"/>
				<span class="glyphicon glyphicon-forward"></span>
				<span class="glyphicon glyphicon-fast-forward"></span>
				<select class="pagesize">
					<option selected="selected"  value="5">5</option>
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</form>
		</div>*/?>

		<?php /*echo "<pre>";print_r($invoices);echo "</pre>";*/ ?>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#invoices").tablesorter({
				sortList: [[1,0]],
				widthFixed: true, 
				widgets: ['zebra'],
				container: $("#pager")
			}); 
		});
		</script>
	</div>
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>