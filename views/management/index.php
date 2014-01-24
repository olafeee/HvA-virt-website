<?php 
include('template.php'); 

$vmResponse = $this->vmResponse;



//if (!isset($_SESSION['loggedIn'])):

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
?>


<div class="tab-pane" id="tab3">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">System Overview</h3>
      </div>
      <div class="panel-body">
        
        <?php
          // Check if user has any Vms

        ?>


        <!-- Start VM listing here -->
        <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>CPU</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 0;
            //print_r($vmResponse);
            $maxArray = count($vmResponse['virtualmachine']);
            while ($i < $maxArray) { 
              if($vmResponse['virtualmachine'][$i]['state'] == 'Running' ) {
                $stateColor = 'alert-success';
              } else if($vmResponse['virtualmachine'][$i]['state'] == 'Stopped' ) {
                $stateColor = 'alert-danger';
              } else {
                $stateColor = '';
              }
          ?>
              
              <tr id="<?php echo $vmResponse[$i]['id']; ?>" class="success <?php echo $stateColor;?>" onclick="document.location= '/management/vminfo/'<?php echo $vmResponse['virtualmachine'][$i]['id']; ?>;">
                <td class"displayname"><?php echo $vmResponse['virtualmachine'][$i]['displayname'];?></td>
                <td class="CPU"><?php echo $vmResponse['virtualmachine'][$i]["cpunumber"];?></td>
                <td class="CPUSPEED"><?php echo $vmResponse['virtualmachine'][$i]["cpuspeed"];?> Mhz</td>
                <td class="memory"><?php echo $vmResponse['virtualmachine'][$i]["memory"];?> MB</td>
                <td class="HHD">20GB</td>
                <td class="IPAdres"><?php echo $vmResponse['virtualmachine'][$i]['nic'][0]['ipaddress']." / ". prefixSubnet($vmResponse['virtualmachine'][$i]["nic"][0]["netmask"]);?></td>
                <td class="status"><?php echo $vmResponse['virtualmachine'][$i]['state'];?></td>
              </tr>
          <?php
              $i++;
            } // End While loop
          ?>
        </tbody>
        </table>
        
        <br />
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>
