<?php 

if (isset($_SESSION['loggedIn'])):?>

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
        <?php
        $vmResponce = $this->vmResponce;
          echo "<pre>";
          echo "<br/>";
          var_dump($this->vmResponce);
          echo "</pre>";
        ?><tbody><?php
            $xy = 0;
            $maxArray = count($vmResponce);
            echo $maxArray;

            while ($xy < $maxArray) {?>
              <tr class="success">
                <td class"displayname"><?php echo $vmResponce[$xy]["displayname"];?></td>
                <td class="status"><?php echo $vmResponce[$xy]["state"];?></td>
                <td class="CPU"><?php echo $vmResponce[$xy]["cpunumber"];?></td>
                <td class="CPUSPEED"><?php echo $vmResponce[$xy]["cpuspeed"];?> Mhz</td>
                <td class="memory"><?php echo $vmResponce[$xy]["memory"];?> MB</td>
                <td class="HHD">20GB</td>
                <td class="IPAdres"><?php echo $vmResponce[$xy]["nic"][0]["ipaddress"]." /".prefixSubnet($vmResponce[$xy]["nic"][0]["netmask"]);?></td>
                <td><button type="button" class="btn btn-info"> Info </button> <button type="button" class="btn btn-success"> Upgrade </button></td>
              </tr>
             <? $xy++;
            }



          ?>


        </tbody>
      </table>
    </div>
<?php else: 
header('location: ../login');
 endif; ?>


