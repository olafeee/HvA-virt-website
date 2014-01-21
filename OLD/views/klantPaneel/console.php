<?php if (isset($_SESSION['loggedIn'])):
$vmResponce = $this->vmResponce;
$vmNumber = $this->vmNumber;
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