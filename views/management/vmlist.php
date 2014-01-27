<?php

$vmResponse = $this->vmResponse;

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

<div class="panel-heading">
  <h3 class="panel-title">System Overview</h3>
</div>
<div class="panel-body">
        
<?php
  // Check if user has any Vms
  if (empty($vmResponse)) {
    echo ('
      <div class="jumbotron">
        <h1>No VMs, YET!</h1>
        <p>Get your own personal virtual private server today!</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="/order">Get one now!</a></p>
      </div>
    '); // End echo
  } else {
  // START vm list here
?>

    <!-- Start VM listing here -->
    <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>CPU</th>
        <th>CPU speed</th>
        <th>Memory</th>
        <th>Harddisk</th>
        <th>Address</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i = 0;
        //print_r($vmResponse);
        $maxArray = count($vmResponse['virtualmachine']);
        while ($i < $maxArray) {

          if ($vmResponse['virtualmachine'][$i]['state'] != 'Expunging') {
            if ($vmResponse['virtualmachine'][$i]['state'] != 'Error') {
                if($vmResponse['virtualmachine'][$i]['state'] == 'Running' ) {
              $stateColor = 'alert-success';
            } else if($vmResponse['virtualmachine'][$i]['state'] == 'Stopped' ) {
              $stateColor = 'alert-danger';
            } else {
              $stateColor = '';
            }
        ?>

            <tr id="<?php echo $vmResponse['virtualmachine'][$i]['id']; ?>" class="nav-vminfo <?php echo $stateColor ?>" style="cursor: pointer;">
              <td class"displayname"><?php echo $vmResponse['virtualmachine'][$i]['displayname'];?></td>
              <td class="CPU"><?php echo $vmResponse['virtualmachine'][$i]["cpunumber"];?></td>
              <td class="CPUSPEED"><?php echo $vmResponse['virtualmachine'][$i]["cpuspeed"];?> Mhz</td>
              <td class="memory"><?php echo $vmResponse['virtualmachine'][$i]["memory"];?> MB</td>
              <td class="HHD">20GB</td>
              <td class="IPAdres"><?php echo $vmResponse['virtualmachine'][$i]['nic'][0]['ipaddress']." / ". prefixSubnet($vmResponse['virtualmachine'][$i]["nic"][0]["netmask"]);?></td>
              <td class="status"><?php echo $vmResponse['virtualmachine'][$i]['state'];?></td>
              <td><button type="button" class="btn btn-default nav-vminfo" id="<?php echo $vmResponse['virtualmachine'][$i]['id']; ?>" style="margin-bottom:5px; width:125px;">More Info</button></td>
            </tr>
        <?php
           
            }
             

          }
          $i++;
        } // End While loop
      ?>
    </tbody>
    </table>
    
    <br />
  </div>
</div>

<script type="text/javascript">
// Link naar de vmInfo pagina
$('.nav-vminfo').click(function (){
  var id = $(this).attr('id');
  args={vmid: id};
  url='/management/vminfo';
  $('#vmContentWindow').load(url, args);
});
</script>

<?php
} // END else statement for VM check
?>
