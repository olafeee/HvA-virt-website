<?php
$invoices = $this->invoice;
//print_r($invoices);
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
			<?php 
			if(1 > count($invoices)){
				echo "No invoices were made";
			}else{ ?>
			<table class="table table-condensed">
			<thead>
				<tr>
					<th>File</th>
					<th>Date</th>
					<th>Customer <img src="/img/arrowdown.png"></th>
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
		<?php /*echo "<pre>";print_r($invoices);echo "</pre>";*/} ?>
	</div>
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>