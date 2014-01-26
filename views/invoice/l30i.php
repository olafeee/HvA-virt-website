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
				echo "<td><a target=\"_blank\" href=\"../openInvoice?f=".bin2hex($rij['file'])."\">".$rij['file']."</a></td>";
				echo "<td>".$rij['date']."</td>";
				echo "<td>".$rij['firstname']." ".$rij['lastname']."</td>";
				echo "</tr>";
				
				//print_r($invoices[$i]);
				//Hier moet je mm doen 
			}

			?>
		<!-- nein man ich will no-->
		</tbody>
        </table>
	</div>
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>