<?php 

/* ******************************
** Account Tab on Management Page
** ******************************/

$vmResponse = $this->vmResponse;

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

<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Virtual Machine Panel</h3>
      </div>
      <div class="panel-body">
        <div class="row">

          <h4><span class="glyphicon glyphicon-list-alt"></span>   System Information</h4><hr />
          
          <div class="col-md-4" role="main">
            <table>
              <tr>
                <th>Name: </th>
                <td><?php echo $vmResponse[0]['name']; ?></td>
              </tr>
              <tr>
                <th>Status: </th>
                <td><?php echo $state; ?></td>
              </tr>
              <tr>
                <th>Created: </th>
                <td><?php echo $vmResponse[0]['created']; ?></td>
              </tr>
              <tr>
                <th>Template:</th>
                <td><?php echo $vmResponse[0]['templatedisplaytext']; ?></td>
              </tr>
              <tr>
                <th>Iso: </th>
                <td><?php echo $vmResponse[0]['isodisplaytext']; ?></td>
              </tr>
              <tr>
                <th>Address: </th>
                <td><?php echo $vmResponse[0]['nic'][0]['ipaddress']." / ". prefixSubnet($vmResponse[0]["nic"][0]["netmask"]);?></td>
              </tr>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <table>
              <tr>
                <th>Offering: </th>
                <td><?php echo $vmResponse[0]['serviceofferingname']; ?></td>
              </tr>
              <tr>
                <th>CPUs: </th>
                <td><?php echo $vmResponse[0]['cpunumber']; ?></td>
              </tr>
              <tr>
                <th>CPU Speed: </th>
                <td><?php echo $vmResponse[0]['cpuspeed']; ?></td>
              </tr>
              <tr>
                <th>Memory: </th>
                <td><?php echo $vmResponse[0]['memory']; ?></td>
              </tr>
            </table>
          </div>
        </div>


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
  </div><!-- END Col 9 -->
</div>



