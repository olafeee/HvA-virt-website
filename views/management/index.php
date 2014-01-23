<?php 

// Tijdelijk hier in
require_once('/lib/cloudstack.php');
$cloudstack = new cloudstack();

$account = $_SESSION['logArr']['account'];

$vmresponse = $this->cloudstack->listVirtualMachines('',$account);

include('template.php'); 
?>


<div class="tab-pane" id="tab3">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">System Overview</h3>
      </div>
      <div class="panel-body">
        
        <!-- Start VM listing here -->
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
        <td><a href="/management/vminfo/<?php echo $xy; ?>"><button type="button" class="btn btn-info"> Info </button></a> <button type="button" class="btn btn-success"> Upgrade </button></td>
        </tr><?
                      $xy++;
                    }
              ?></tbody>
        </table>

        
        <br />
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>
