<?php 

require_once("lib/cloudstack.php");

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

          $cloud = new cloudstack();
          $cloud->responseType = 'json';

          Session::init();
          // Bouw een 3D array van de JSON responce
          $vmResponce = $cloud->listVirtualMachines();
          $vmResponce = json_decode($vmResponce, true);

          // Bouw nu een array for elke VM
          $vmResponce = $vmResponce['listvirtualmachinesresponse'];
          $vmResponce = $vmResponce['virtualmachine'];

          // Haal de vms er uit van de gebruiker die ingeloged is
          function accountFilter($account)
          {
              return (is_array($account) && $account['account'] == $_SESSION['account']);
          }

          print_r(array_filter($vmResponce, "accountFilter"));


          function splitSubnet(){
            $input1 = "255,255";
            $input2 = "hello,there";
            var_dump( explode( ',', $input1 ) );
            var_dump( explode( ',', $input2 ) );
            //return $poetinout;
          }
          
          echo "<pre>";
          echo splitSubnet();
          //$john = splitSubnet("255,255,255,0");
          //print_r($john);
          var_dump($vmResponce);
          //$test = accountFilter();
          //print_r($vmResponce);
           echo "</pre>";

           

        ?>
        <tbody>
          <?php
            $xy = 0;
            $maxArray = count($vmResponce);
            echo $maxArray;

            while ($xy < $maxArray) {
              echo "snackbar".$xy;
              $xy++;
            }



          ?>
          <tr class="success">
            <td class"displayname"><?php echo $vmResponce[$xy]["displayname"];?></td>
            <td class="status"><?php echo $vmResponce[$xy]["state"];?></td>
            <td class="CPU"><?php echo $vmResponce[$xy]["cpunumber"];?></td>
            <td class="CPUSPEED"><?php echo $vmResponce[$xy]["cpuspeed"];?></td>
            <td class="memory"><?php echo $vmResponce[$xy]["memory"];?></td>
            <td class="HHD"><?php echo $vmResponce[$xy]["displayname"];?></td>
            <td class="IPAdres"><?php echo $vmResponce[$xy]["nic"][0]["ipaddress"];?></td>
            <td><button type="button" class="btn btn-info"> Info </button> <button type="button" class="btn btn-success"> Upgrade </button></td>
          </tr>
          <tr class="success">
            <td class"displayname"><?php echo $vmResponce[$xy]["displayname"];?></td>
            <td class="status"><?php echo $vmResponce[$xy]["state"];?></td>
            <td class="CPU"><?php echo $vmResponce[$xy]["cpunumber"];?></td>
            <td class="CPUSPEED"><?php echo $vmResponce[$xy]["cpuspeed"];?></td>
            <td class="memory"><?php echo $vmResponce[$xy]["memory"];?></td>
            <td class="HHD"><?php echo $vmResponce[$xy]["displayname"];?></td>
            <td class="IPAdres"><?php echo $vmResponce[$xy]["nic"][0]["ipaddress"];?></td>
            <td><button type="button" class="btn btn-info"> Info </button> <button type="button" class="btn btn-success"> Upgrade </button></td>
          </tr>

        </tbody>
      </table>
    </div>
<?php else: 
header('location: ../login');
 endif; ?>


