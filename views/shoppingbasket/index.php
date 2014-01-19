<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="sb-div">
<?php
$totalprice = 0;
    if (!empty($_SESSION['cart'])) {
      $max = count($_SESSION['cart']);
      

      for($i=0;$i<$max;$i++){
            $CPU=$_SESSION['cart'][$i]['qty']['CPU'];
            $RAM=$_SESSION['cart'][$i]['qty']['RAM'];
            $DISK=$_SESSION['cart'][$i]['qty']['DISK'];
            $NT=$_SESSION['cart'][$i]['qty']['NT'];
            $IPv4=$_SESSION['cart'][$i]['qty']['IPv4'];
            $OS= $_SESSION['cart'][$i]['qty']['OS'];
            $SLA= $_SESSION['cart'][$i]['qty']['SLA'];
            $TP= $_SESSION['cart'][$i]['qty']['TP'];
        
?>
<div class="sb-speci-l1">
  <div class="sb-speci-1"> CPU cores</div>         
  <div class="sb-speci-1"> Memory</div>           
  <div class="sb-speci-1"> Disk space</div>       
</div>
<div class="sb-speci-l1">
  <div class="sb-speci-1"><?php echo $CPU; ?> cores</div>
  <div class="sb-speci-1"><?php echo $RAM; ?> MB</div>
  <div class="sb-speci-1"><?php echo $DISK; ?> GB</div>
</div>
<div class="sb-speci1">
  <div class="sb-speci-2"> Network traffic</div>  
  <div class="sb-speci-2"> IPv4 </div>  
  <div class="sb-speci-2"> Operating system</div>
  <div class="sb-speci-2"> SLA</div>              
</div>
<div class="sb-speci1">
  <div class="sb-speci-2"><?php echo $NT; ?></div>
  <div class="sb-speci-2"><?php echo $IPv4; ?></div>
  <div class="sb-speci-2"><?php echo $OS; ?></div>
  <div class="sb-speci-2"><?php echo $SLA; ?></div>
</div>

 <div class="sb-price">&euro;<?php echo $TP; ?></div>
  
<?php echo '<div class="sb-delete"><a href="/order/remove_product/'.$i.'">X</a></div>'; ?>
<div class="divROWorderTop"></div>
            
<?php    
$totalprice = $totalprice + $TP;
          }// end for
    }//end if
?>
    <div class="sb-totalprice">
      <div class="sb-totalprice-1"><b>Totaal bedrag</b></div>
      <div class="sb-totalprice-2">&euro; <?php echo $totalprice; ?></div>
    </div>

    <div class="divROWorderTop"></div>
      <div class="sb-totalprice">
      <div class="sb-totalprice-1"><a href="/invoice.php">Create Invoice</a></div>
      <div class="sb-totalprice-2"><button class="btn btn-lg btn-primary btn-block">Bestellen</button></div>
    </div>

    </div>
  </div>
  <div class="col-md-2"></div>
</div>