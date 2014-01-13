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

          // /var_dump($vmResponce);
          echo "<pre>";
          print_r($vmResponce);
           echo "</pre>";


        ?>
        <tbody>
          <tr class="success">
            <td>1</td>
            <td class="status"></td>
            <td class="CPU"></td>
            <td class="CPUSPEED"></td>
            <td class="memory"></td>
            <td class="HHD"></td>
            <td class="IPAdres"></td>
            <td><button type="button" class="btn btn-info"> Info </button> <button type="button" class="btn btn-success"> Upgrade </button></td>
          </tr>

        </tbody>
      </table>
    </div>
<?php else: 
header('location: ../login');
 endif; ?>


