<?php 

if (isset($_SESSION['loggedIn'])):
$vmResponce = $this->vmResponce;

  // maak van subnet een prifix
  function prefixSubnet($input){
    $subBin = explode( '.', $input );
    $subBinX = 0;
    $subnet = 0;

    while ($subBinX <= 3) {
      $x = decbin($subBin[$subBinX]);
      $var3 = strlen(str_replace('0', '', $x));
      $subnet = $subnet + $var3;
      $subBinX++;
    }
    return $subnet;
  }
  //alleen voor test doeleinden
  echo "<pre>";
  echo "<br/>";
  print_r($_SESSION);
  var_dump($vmResponce);
  echo "</pre>";

?>
<div class="row">
  <div class="col-md-2">
<?php include $_SERVER['DOCUMENT_ROOT'].'/views/klantPaneel/klantpaneelHeader.php'; ?>
</div>
<div class="col-md-8">
  <table class="table">
        <thead>
          <tr>
            <th>VM</th>
            <th>Status</th>
            <th>CPU</th>
            <th>CPU speed</th>
            <th>Memory</th>
            <th>HDD</th>
            <th>IP Adres</th>
            <th></th>
          </tr>
        </thead>
          <tbody><?php
            $xy = 0;
            $maxArray = count($vmResponce);
            while ($xy < $maxArray) {?>
              <tr class="success">
                <td class"displayname"><?php echo $vmResponce[$xy]["displayname"];?></td>
                <td class="status"><?php echo $vmResponce[$xy]["state"];?></td>
                <td class="CPU"><?php echo $vmResponce[$xy]["cpunumber"];?></td>
                <td class="CPUSPEED"><?php echo $vmResponce[$xy]["cpuspeed"];?> Mhz</td>
                <td class="memory"><?php echo $vmResponce[$xy]["memory"];?> MB</td>
                <td class="HHD">20GB</td>

                <td class="IPAdres"><?php echo $vmResponce[$xy]["nic"][0]["ipaddress"]." /". prefixSubnet($vmResponce[$xy]["nic"][0]["netmask"]);?></td>
                <td><a href="/klantPaneel/VM/<?php echo $xy; ?>"><button type="button" class="btn btn-info"> Info </button></a> <button type="button" class="btn btn-success"> Upgrade </button></td>
              </tr><?
              $xy++;
            } 
      ?></tbody>
      </table>

<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
    <span class="sr-only">40% Complete (success)</span>
  </div>
</div>
  
    </div>
<?php else: 
header('location: /login');
 endif; ?>


