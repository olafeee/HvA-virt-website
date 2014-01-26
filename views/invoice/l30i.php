<?php
$invoices = $this->invoices;
?>


<?php require 'inc/header.php'; ?>


<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Virtual Machine Panel</h3>
      </div>
      <div class="panel-body">
		<div class="viewPageTable">
			<!--content !!!!!!!!!-->
			<?php
			for ($i=0; $i < count($invoices); $i++) { 
				print_r($invoices[$i])
			}

			?>
		<!-- nein man ich will no-->
	</div>
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>