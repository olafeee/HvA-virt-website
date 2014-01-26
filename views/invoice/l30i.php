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
			<table class="table table-condensed">
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
				echo "<td>".$invoices[$i]['date']."</td>";
				echo "<td>".$invoices[$i]['firstname']." ".$invoices[$i]['lastname']."</td>";
				echo "</tr>";
				
				//print_r($invoices[$i]);
				//Hier moet je mm doen 
			}

			?>
		<!-- nein man ich will no-->
		</tbody>
        </table>
		<?php /*echo "<pre>";print_r($invoices);echo "</pre>";*/ ?>
	</div>
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>