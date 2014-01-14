<?php if (isset($_SESSION['loggedIn'])):
$vmResponce = $this->vmResponce;
$vmNumber = $this->vmNumber;
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

<div class="row">
  <div class="col-md-2">
<?php include $_SERVER['DOCUMENT_ROOT'].'/views/klantPaneel/klantpaneelHeader.php'; ?>
</div>
<div class="col-md-8">
<table class="table">
  <tr>
    <td>VM naam</td>
    <td><?php echo $vmResponce[$vmNumber]["displayname"];?></td>
  </tr>
  <tr>
    <td>State:</td>
    <td><?php echo $vmResponce[$vmNumber]["state"];?></td>
  </tr>
  <tr>
    <td>CPU cores:</td>
    <td><?php echo $vmResponce[$vmNumber]["cpunumber"];?>/td>
  </tr>
  <tr>
    <td>CPU speed:</td>
    <td><?php echo $vmResponce[$vmNumber]["cpuspeed"];?> MHz</td>
  </tr>
  <tr>
    <td>Memory:</td>
    <td><?php echo $vmResponce[$vmNumber]["memory"];?> MB</td>
  </tr>
  <tr>
    <td>Harddisk:</td>
    <td>20 GB</td>
  </tr>
  <tr>
    <td>IP addres</td>
    <td><?php echo $vmResponce[$vmNumber]["nic"][0]["ipaddress"]." /". prefixSubnet($vmResponce[$vmNumber]["nic"][0]["netmask"]);?></td>
  </tr>
  <tr>
    <td>
      <a href="/klantPaneel/VMstart/<?php echo $blalblablal.'/'.$vmNumber?>"><button type="button" class="btn btn-info"> Info </button></a> Upgrade </button></td>
  </tr>
</table>


    </div>
<?php else: 
header('location: ../login');
 endif; ?>