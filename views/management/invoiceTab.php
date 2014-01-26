<?php

/********************
** Robert L
*********************/

?>

<!--<div class="tab-pane" id="tab3">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">System Overview</h3>
      </div>
      <div class="panel-body">-->
	  
	  <div class="panel-heading">
        <h3 class="panel-title">Invoices</h3>
      </div>
      <div class="panel-body">
	  <table class="table">
        <thead>
          <tr>
            <th>Name</th>
			<?php @session_start(); if($_SESSION['logArr']['type'] == "1" && $_SESSION['logArr']['lastname'] == "Cartland"){ $CFO = true;
            echo "<th>Customer</th>"; }else{ $CFO = false;} ?>
			<th>Date</th>
          </tr>
        </thead>
        <tbody>
		<?php 
			$list = new mysqli('localhost','user_admin','T=56(Wp23', 'user_db_plaintech');
			$first = $_SESSION['logArr']['firstname'];
			$laste = $_SESSION['logArr']['lastname'];
			$klantId = $_SESSION['logArr']['username'];
			//$query = "SELECT * FROM CSUsers WHERE firstname='$first' AND lastname='$laste' LIMIT 1";
			$query = "SELECT * FROM CSUsers WHERE username='$klantId' LIMIT 1";
			$sth = mysqli_query($list, $query);
			$row = mysqli_fetch_assoc($sth);
			
			if(!isset($_GET['sort'])){
				$_GET['sort'] = "";
			}
			if(!isset($_GET['showc'])){
				$_GET['showc'] = "";
			}
			if(!isset($_GET['showd'])){
				$_GET['showd'] = "";
			}
			
			$sort = $_GET['sort'];
			switch($sort){
				case 'customer':
					$sortBy = "customer";
				case 'date':
					$sortBy = "date";
				default: $sortBy = "date";
			}
			//Show only firstname x with lastname y
			$show = $_GET['showc'];
			if(preg_match('/^[a-zA-Z ]+$/', $show)){
				$showMe = explode(" ", $show);
				$showQy = "WHERE firstname='".$showMe[0]."' AND lastname='".$showMe[1]."' ";
			}else{
				$showQy = "";
			}
			//Show only invoices from date x
			$day = $_GET['showd'];
			if(preg_match('/^[0-9 _]+$/', $day)){
				$date = explode(" ", $day);
				// date[0] is day, date[1] is time
				$showDa = "WHERE firstname='".$date[0]."' AND lastname='".$date[1]."' ";
			}else{
				$showDa = "";
			}
			if($CFO === true){
				$querz = "SELECT * FROM invoice_files $showQy ORDER BY $sortBy ASC ";
			} else {
				$querz = "SELECT * FROM invoice_files WHERE username='$klantId' ORDER BY date ASC ";
			}
			$sti = mysqli_query($list, $querz);
			$count = mysqli_num_rows($sti);
			if (isset($_GET['page'])) { $page = preg_replace('#[^0-9]#i', '', $_GET['page']);}else{	$page = 1;} 
			$itemsPerPage = 2;
			$lastPage = ceil($count / $itemsPerPage);
			if ($page < 1){ $page = 1; }else if($page > $lastPage) {$page = $lastPage;}
			$limit = 'LIMIT ' .($page - 1) * $itemsPerPage .',' .$itemsPerPage; 
			$stj = mysqli_query($list, $querz.$limit);
			$pagination = "";
			$next = "";
			$previous = "";
			if ($lastPage != "1"){ $pagination .= " Page ".$page." of ".$lastPage." "; if($page != "1"){$previous = $page - 1; $pagination .= "<a href=\"#nav-invoiceTab".$previous."\">previous</a>";}
			if ($page != $lastPage){ $next = $page + 1; $pagination .= "<a href=\"#nav-invoiceTabUpdate\">next</a><input type=\"hidden\" id=\"num\" value=\"".$next."\">";}}
			while($rij = mysqli_fetch_assoc($stj)){
				if(file_exists("/var/invoices/".$rij['file'])){
					echo "<tr>";
					echo "<td><a target=\"_blank\" href=\"../openInvoice?f=".bin2hex($rij['file'])."\">".$rij['file']."</a></td>";
					if($CFO){ echo "<td>".$rij['firstname']." ".$rij['lastname']."</td>";}
					echo "<td>".$rij['date']."</td>";
					echo "</tr>";
					if (!isset($_SESSION['allowFile'])){
						$_SESSION['allowFile'][] = $rij['file'];
					}elseif (!in_array($rij['file'], $_SESSION['allowFile'])){
						$_SESSION['allowFile'][] = $rij['file'];
					}
				//}else{
					//echo "No invoices were found.";
				}
			}
		?>
		</tbody>
        </table>
		<?php 
			echo $pagination;
		?>
		<br />
		<?php /*
			echo "<pre>";
			var_dump($_SESSION['allowFile']);
			echo "</pre>";*/
			?>
      </div>
    <!--</div>
  </div><!-- END Col 9 --
</div>-->