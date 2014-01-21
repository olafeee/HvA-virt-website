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
    <td><?php echo $vmResponce[$vmNumber]["cpunumber"];?></td>
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
    <?php
    if ($vmResponce[$vmNumber]["state"]=="Running") {?>
    <a href="/klantPaneel/VMstop/<?php echo $vmResponce[$vmNumber]["id"].'/'.$vmNumber; ?>"><button type="button" class="btn btn-danger"> Stop </button></a>
    <?php }else{ ?>
       <a href="/klantPaneel/VMstart/<?php echo $vmResponce[$vmNumber]["id"].'/'.$vmNumber;?>"><button type="button" class="btn btn-success"> Start </button></a>
    <?php } ?>
    </td>
    <td><a href="/klantPaneel/VMrestart/<?php echo $vmResponce[$vmNumber]["id"].'/'.$vmNumber;?>"><button type="button" class="btn btn-info"> Restart </button></a></td>
  </tr>
  <tr>
    <td>
      <a href="http://145.92.14.90:8080/client/console?cmd=access&sessionkey=<?php echo $_SESSION["logArr"]["sessionkey"];?>&vm=<?php echo $vmResponce[$vmNumber]['id'];?>" target="http://145.92.14.90:8080/client/console?cmd=access&sessionkey=<?php echo $_SESSION["logArr"]["sessionkey"];?>&vm=<?php echo $vmResponce[$vmNumber]['id'];?>">console</a>

    </td>
  </tr>
  <tr>
    <td>
      <div class="progress progress-striped">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $vmResponce[$vmNumber]["cpuused"];?>%">
        <span class="sr-only">40% Complete (success)</span>
      </div>
    </div>
    </td>
  </tr>
</table>


    </div>
<?php else: 
header('location: ../login');
 endif; ?>