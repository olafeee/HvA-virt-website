<?php

/********************
** Robert L
*********************/

include('template.php');

?>

<div class="tab-pane" id="tab3">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">System Overview</h3>
      </div>
      <div class="panel-body">
	  <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
		<?php 
			// Jep, I know, maar kreeg prepared statements niet helemaal lekker... dan maar ff zo...
			@session_start();
			$list = new mysqli('localhost','user_admin','T=56(Wp23', 'user_db_plaintech');
			$first = $_SESSION['logArr']['firstname'];
			$laste = $_SESSION['logArr']['lastname'];
			$query = "SELECT * FROM invoice_users WHERE firstname='$first' AND lastname='$laste' LIMIT 1";
			$sth = mysqli_query($list, $query);
			$row = mysqli_fetch_assoc($sth);
			$klantId = $row['id'];
			$querz = "SELECT * FROM invoice_files WHERE id='$klantId' LIMIT 0,30";
			$sti = mysqli_query($list, $querz);
			//$i = 0;
			//$_SESSION['allowFile'] = array();
			while($rij = mysqli_fetch_assoc($sti)){
				if(file_exists("/var/invoices/".$rij['file'])){
					echo "<tr>";
					echo "<td><a target=\"_blank\" href=\"../openInvoice?f=".bin2hex($rij['file'])."\">".$rij['file']."</a></td>";
					echo "<td>".$rij['date']."</td>";
					echo "</tr>";
					if (!isset($_SESSION['allowFile'])){
						$_SESSION['allowFile'][] = $rij['file'];
					}elseif (!in_array($rij['file'], $_SESSION['allowFile'])){
						$_SESSION['allowFile'][] = $rij['file'];
					}
				}else{
					echo "No invoices were found.";
				}
			}
		?>
		</tbody>
        </table>
		<br />
		<?php 
			echo "<pre>";
			var_dump($_SESSION['allowFile']);
			echo "</pre>";
			?>
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>
