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
  if(!empty($vmResponse[0][$arrayKey])) {
    return $vmResponse[0][$arrayKey];
  } else {
    return '';
  }
}

$onOff = '';
// Check the state of the vm and make a lable for that state
if(strcmp($vmResponse[0]['state'],'Running') == 0) 
{
    $state = '<span class="label label-success">Running</span>';
    // Stop knop toevoegen
    $onOff .= '<button type="button" class="btn btn-danger sendCmdButton" id="stop" style="margin-bottom:5px; width:125px;">Stop System</button> ';
    // Restart knop toevoegen
    $onOff .= '<button type="button" class="btn btn-primary sendCmdButton" id="restart" style="margin-bottom:5px; width:125px;">Restart System</button> ';
} 
else if(strcmp($vmResponse[0]['state'],'Stopping') == 0) 
{
    $state = '<span class="label label-danger">Stopping</span>';
    // Disabled knop toevoegen
    $onOff .= '<button type="button" class="btn btn-default disabled" style="margin-bottom:5px; width:125px;">Start System</button> ';
    // Restart knop toevoegen
    //$onOff .= '<button type="button" class="btn btn-default disabled" style="margin-bottom:5px; width:125px;">Restart System</button>';
} 
else if(strcmp($vmResponse[0]['state'],'Stopped') == 0) 
{
    $state = '<span class="label label-danger">Stopped</span>';
    // Start knop toevoegen
    $onOff .= '<button type="button" class="btn btn-primary sendCmdButton" id="start" style="margin-bottom:5px; width:125px;">Start System</button> ';
} 
else if(strcmp($vmResponse[0]['state'], 'Starting') == 0)
{
    $state = '<span class="label label-warning">Starting</span>';
}
else if(strcmp($vmResponse[0]['state'],'Expunging') == 0) 
{
    $state = '<span class="label label-default">Deleted</span>';
    $onOff .= '';
} 
else if (strcmp($vmResponse[0]['state'],'Destroyed') == 0)
{
  $state = '<span class="label label-default">Destroyed</span>';
  $onOff .= '<button type="button" class="btn btn-primary sendCmdButton" id="recover" style="margin-bottom:5px; width:125px;">Recover System</button> ';
}
else 
{
    $state = '<span class="label label-default">Unknown</span>';
    // Force On knop toevoegen
    $onOff .= '<button type="button" class="btn btn-default sendCmdButton" id="start" style="margin-bottom:5px; width:125px;">Force On</button> ';
    // Force Off knop toevoegen
    $onOff .= '<button type="button" class="btn btn-default sendCmdButton" id="stop" style="margin-bottom:5px; width:125px;">Force Off</button> ';
    // Force Restart knop toevoegen
    $onOff .= '<button type="button" class="btn btn-default sendCmdButton" id="restart" style="margin-bottom:5px; width:125px;">Force Restart</button> ';
}

?>

<div class="panel-heading">
  <h3 class="panel-title"><?php echo $vmResponse[0]['name'] . ' - ' . $vmResponse[0]['state'] ; ?></h3>
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
        <th class="right">Name: </th>
        <td><?php echo $vmResponse[0]['name']; ?></td>
      </tr>
      <tr>
        <th class="right">Status: </th>
        <td><?php echo $state; ?></td>
      </tr>
      <tr>
        <th class="right">Created: </th>
        <td><?php echo $vmResponse[0]['created']; ?></td>
      </tr>
      <tr>
        <th class="right">Template:</th>
        <td><?php echo $vmResponse[0]['templatedisplaytext']; ?></td>
      </tr>
      <tr>
        <th class="right">Iso: </th>
        <td><?php echo getInfo('isodisplaytext') ?></td>
      </tr>
      <tr>
        <th class="right">Address: </th>
        <td><?php echo $vmResponse[0]['nic'][0]['ipaddress']." / ". prefixSubnet($vmResponse[0]["nic"][0]["netmask"]);?></td>
      </tr>
    </table>
  </div>

  <div class="col-md-6" role="main">
    <table>
      <tr>
        <th class="right">Offering: </th>
        <td><?php echo $vmResponse[0]['serviceofferingname']; ?></td>
      </tr>
      <tr>
        <th class="right">CPUs: </th>
        <td><?php echo $vmResponse[0]['cpunumber']; ?></td>
      </tr>
      <tr>
        <th class="right">CPU Speed: </th>
        <td><?php echo $vmResponse[0]['cpuspeed']; ?></td>
      </tr>
      <tr>
        <th class="right">Memory: </th>
        <td><?php echo $vmResponse[0]['memory']; ?></td>
      </tr>
    </table>
  </div>
</div>

<br />

<div class="row">
  <div class="col-md-12" role="main">
  
    <!-- VM Controls -->
    <h4><span class="glyphicon glyphicon-cog"></span>   System Controls</h4><hr />

  	<?php echo $onOff; ?>

    <a type="button"  class="btn btn-primary" href="/management/console/<?php echo $vmResponse[0]['id']; ?>" style="margin-bottom:5px; width:125px;" onclick="window.open(this.href, 'Console', 'width=735, height=540, left=24, top=24, scrollbars, resizable'); return false;">View Console</a>
  	<button type="button" class="btn btn-primary sendCmdButton disabled" id="upgrade" style="margin-bottom:5px; width:125px;">Upgrade System !!!</button>
    <button type="button" class="btn btn-primary sendCmdButton disabled" id="backup" style="margin-bottom:5px; width:125px;">Backup System</button>
     <a href="javascript:showWarning()"><button type="button" class="btn btn-danger" style="margin-bottom:5px; width:125px;"><span class="glyphicon glyphicon-exclamation-sign"></span>  Destroy System</button></a>
    <br />
  </div>
</div>


<script type="text/javascript">

  // Alle table headers align naar rechts geven
  $( ".right" ).css( "text-align", "right" );
  $( ".right" ).css( "margin-right", "35px" );
  $( ".right" ).css( "margin-bottum", "25px" );

  // AJAX commands versturen. 
  $('.sendCmdButton').click(function() { 
    var id = $(this).attr('id');
    var args = {
      command: id,
      vmid:'<?php echo $this->vmid ?>'
    };

    $.ajax({
      type: "POST",
      url: '/management/vmcontrol',
      data: args,
    });
  });

</script>

