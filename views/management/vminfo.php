<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

$vmResponse = $this->vmResponse;

function prefixSubnet($input) {
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

function getInfo($arrayKey) {
  if(empty($vmResponse[0][$arrayKey])) {
    return $vmResponse[0][$arrayKey];
  } else {
    return '';
  }
}

// Check the state of the vm and make a lable for that state
if(strcmp($vmResponse[0]['state'],'Running') == 0) {
  $state = '<span class="label label-success">Running</span>';
} else if(strcmp($vmResponse[0]['state'],'Stopping') == 0) {
  $state = '<span class="label label-danger">Stopping</span>';
} else if(strcmp($vmResponse[0]['state'],'Stopped') == 0) {
  $state = '<span class="label label-danger">Stopped</span>';
} else if(strcmp($vmResponse[0]['state'],'Expunging') == 0) {
  $state = '<span class="label label-default">Deleted</span>';
} else {
  $state = '<span class="label label-default">Unknown</span>';
}

include('template.php');
?>

<div class="col-md-9" role="main">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Virtual Machine Panel</h3>
    </div>
    <div class="panel-body">

    <div class="row">
      <div class="col-md-12" role="main">
        <h4><span class="glyphicon glyphicon-list-alt"></span>   System Information</h4><hr />
      </div>
    </div>
    <div class="row">
      <div class="col-md-6" role="main">

        <table>
          <tr>
            <th>Name: </th>
            <td><?php echo getInfo('name'); ?></td>
          </tr>
          <tr>
            <th>Status: </th>
            <td><?php echo $state; ?></td>
          </tr>
          <tr>
            <th>Created: </th>
            <td><?php echo getInfo('created'); ?></td>
          </tr>
          <tr>
            <th>Template:</th>
            <td><?php echo getInfo('templatedisplaytext'); ?></td>
          </tr>
          <tr>
            <th>Iso: </th>
            <td><?php echo getInfo('isodisplaytext') ?></td>
          </tr>
          <tr>
            <th>Address: </th>
            <td><?php echo $vmResponse[0]['nic'][0]['ipaddress']." / ". prefixSubnet($vmResponse[0]["nic"][0]["netmask"]);?></td>
          </tr>
        </table>
      </div>

      <div class="col-md-6" role="main">
        <table>
          <tr>
            <th>Offering: </th>
            <td><?php echo getInfo('serviceofferingname'); ?></td>
          </tr>
          <tr>
            <th>CPUs: </th>
            <td><?php echo getInfo('cpunumber'); ?></td>
          </tr>
          <tr>
            <th>CPU Speed: </th>
            <td><?php echo getInfo('cpuspeed'); ?></td>
          </tr>
          <tr>
            <th>Memory: </th>
            <td><?php echo getInfo('memory'); ?></td>
          </tr>
        </table>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="col-md-12" role="main">
      
        <!-- VM Controls -->
        <h4><span class="glyphicon glyphicon-cog"></span>   System Controls</h4><hr />

      	<button type="button" class="btn btn-primary" style="margin-bottom:5px; width:125px;" href="/management/api">Start / Stop VM</button>
        
        <!-- Restart VM -->
        <form action="/management/vmcontrol" role="form" method="post">
          <input type="hidden" name="command" value="restart" />
          <input type="hidden" name="vmid" value="<?php echo 'e86a8cce-af66-42a9-9e94-695aa6ece678' ?>" />
          <button type="submit" class="btn btn-primary" style="margin-bottom:5px; width:125px;">Restart VM</button>
        </form>

      	<a type="button" class="btn btn-primary" style="margin-bottom:5px; width:125px;" href="/management/api">VM Console</a>
      	<a type="button" class="btn btn-primary" style="margin-bottom:5px; width:125px;" href="/management/api">Backup VM</a>
      	<a type="button" class="btn btn-danger" style="margin-bottom:5px; width:125px;" href="/management/api"><span class="glyphicon glyphicon-exclamation-sign"></span>  Destroy VM</a>
      	<a type="button" class="btn btn-primary" style="margin-bottom:5px; width:125px;" href="">Upgrade VM</a>

        <br />
      </div>

      </div>

    </div>
  </div><!-- END Col 9 -->
</div>

<script type="text/javascript">
  tr td:nth-child(2) { /* I don't think they are 0 based */
    text-align: right;
  }
</script>



